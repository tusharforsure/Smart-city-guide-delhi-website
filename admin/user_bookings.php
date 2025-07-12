<?php
session_start();
include('../include/config.php');

// Check if user is admin
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../login.php");
    exit();
}

// Handle search input safely
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Pagination settings
$limit = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

// Prepare SQL query with search filter
$query = "
    SELECT 
        users.name AS user_name,
        users.email AS user_email,
        users.contact AS user_contact,
        events.title AS event_title,
        events.event_date AS event_date,
        events.location AS event_location,
        bookings.attendee_name,
        bookings.attendee_age,
        bookings.booking_date,
        bookings.ticket_price,
        bookings.event_time,
        bookings.age_criteria
    FROM 
        bookings
    JOIN 
        users ON bookings.user_id = users.id
    JOIN 
        events ON bookings.event_id = events.id
    WHERE 
        users.name LIKE ? OR 
        events.title LIKE ?
    ORDER BY 
        bookings.booking_date DESC
    LIMIT ?, ?
";

$stmt = $conn->prepare($query);
$search_param = "%$search%";
$stmt->bind_param("ssii", $search_param, $search_param, $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();

// Get total records count for pagination
$total_query = "
    SELECT COUNT(*) AS total 
    FROM bookings 
    JOIN users ON bookings.user_id = users.id 
    JOIN events ON bookings.event_id = events.id 
    WHERE users.name LIKE ? OR events.title LIKE ?";
$total_stmt = $conn->prepare($total_query);
$total_stmt->bind_param("ss", $search_param, $search_param);
$total_stmt->execute();
$total_result = $total_stmt->get_result();
$total_records = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_records / $limit);

// Handle CSV export
if (isset($_GET['export'])) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="user_bookings.csv"');

    $output = fopen('php://output', 'w');
    fputcsv($output, [
        'User Name', 'User Email', 'User Contact', 'Event Title', 'Event Date', 'Event Location', 
        'Attendee Name', 'Attendee Age', 'Ticket Price', 'Event Time', 'Age Criteria', 'Booking Date'
    ]);

    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Bookings - Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .table {
            border-radius: 8px;
            overflow: hidden;
            background: white;
        }
        th {
            background: #007bff;
            color: white;
            text-transform: uppercase;
            white-space: nowrap;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .search-bar {
            max-width: 500px;
        }
        .pagination a {
            padding: 8px 16px;
            margin: 2px;
            border: 1px solid #007bff;
            color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .pagination a.active {
            background-color: #007bff;
            color: white;
        }
        .pagination a:hover {
            background-color: #0056b3;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card p-4">
            <h2 class="text-center mb-4">User Bookings</h2>

            <!-- Search Form -->
            <form method="GET" action="user_bookings.php" class="d-flex justify-content-center mb-3">
                <div class="input-group search-bar">
                    <input type="text" name="search" class="form-control" placeholder="Search by name or event title" value="<?= htmlspecialchars($search) ?>">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </form>

            <!-- Export to CSV Button -->
            <a href="user_bookings.php?export=1" class="btn btn-success mb-3">
                <i class="fas fa-download"></i> Export to CSV
            </a>

            <!-- User Bookings Table -->
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Event Title</th>
                            <th>Event Date</th>
                            <th>Location</th>
                            <th>Attendee Name</th>
                            <th>Age</th>
                            <th>Ticket Price</th>
                            <th>Event Time</th>
                            <th>Age Criteria</th>
                            <th>Booking Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['user_name']) ?></td>
                                    <td><?= htmlspecialchars($row['user_email']) ?></td>
                                    <td><?= htmlspecialchars($row['user_contact']) ?></td>
                                    <td><?= htmlspecialchars($row['event_title']) ?></td>
                                    <td><?= date("M d, Y", strtotime($row['event_date'])) ?></td>
                                    <td><?= htmlspecialchars($row['event_location']) ?></td>
                                    <td><?= htmlspecialchars($row['attendee_name']) ?></td>
                                    <td><?= htmlspecialchars($row['attendee_age']) ?></td>
                                    <td><?= htmlspecialchars($row['ticket_price']) ?></td>
                                    <td><?= htmlspecialchars($row['event_time']) ?></td>
                                    <td><?= htmlspecialchars($row['age_criteria']) ?></td>
                                    <td><?= date("M d, Y H:i", strtotime($row['booking_date'])) ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="12" class="text-center">No bookings found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>
