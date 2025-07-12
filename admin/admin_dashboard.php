<?php
session_start();
error_reporting(0);
include('../include/config.php');

// Check if user is admin
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../login.php");
    exit();
}

// Handle delete event
if (isset($_GET['delete'])) {
    $event_id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM events WHERE id = ?");
    $stmt->bind_param("i", $event_id);
    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error deleting event: " . $conn->error;
    }
}

// Fetch all events
$events = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        /* Dark Mode */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #121212;
            color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            background-color: #1f1f1f;
            padding: 15px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 500;
        }

        /* Main Container */
        .container {
            margin-top: 30px;
            padding: 20px;
        }

        /* Buttons */
        .btn-custom {
            padding: 10px 16px;
            font-size: 0.9rem;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .btn-add {
            background: #ff5722;
            color: white;
        }

        .btn-add:hover {
            background: #e64a19;
            transform: scale(1.05);
        }

        .btn-view {
            background: #4caf50;
            color: white;
        }

        .btn-view:hover {
            background: #388e3c;
            transform: scale(1.05);
        }

        /* Event Cards */
        .event-card {
            background: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .event-card:hover {
            transform: scale(1.02);
        }

        .event-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #ff9800;
        }

        .event-info {
            font-size: 0.9rem;
            color: #bbb;
        }

        /* Event Actions */
        .event-actions {
            margin-top: 15px;
        }

        .btn-edit {
            background: #2196f3;
            color: white;
        }

        .btn-edit:hover {
            background: #1976d2;
        }

        .btn-delete {
            background: #f44336;
            color: white;
        }

        .btn-delete:hover {
            background: #d32f2f;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .event-title {
                font-size: 1.1rem;
            }

            .event-info {
                font-size: 0.85rem;
            }

            .btn-custom {
                padding: 8px 14px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_dashboard.php">Admin Dashboard</a>
            <div class="d-flex">
                <a href="../login.php" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to logout?');">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Buttons -->
    <div class="container text-center mb-4">
        <a href="add_event.php" class="btn btn-custom btn-add me-3">
            <i class="fas fa-plus"></i> Add New Event
        </a>
        <a href="user_bookings.php" class="btn btn-custom btn-view">
            <i class="fas fa-users"></i> View User Bookings
        </a>
    </div>

    <!-- Events Section -->
    <div class="container">
        <h2 class="text-center">Manage Events</h2>

        <?php while ($event = $events->fetch_assoc()) : ?>
            <div class="event-card">
                <div class="event-title"><?= htmlspecialchars($event['title']) ?></div>
                <div class="event-info">
                    <strong>Category:</strong> <?= htmlspecialchars($event['category']) ?><br>
                    <strong>Date:</strong> <?= htmlspecialchars($event['event_date']) ?><br>
                    <strong>Time:</strong> <?= date("h:i A", strtotime($event['start_time'])) . " - " . date("h:i A", strtotime($event['end_time'])) ?><br>
                    <strong>Location:</strong> <?= htmlspecialchars($event['location']) ?><br>
                    <strong>Ticket:</strong> <?= $event['ticket_price'] == 0 ? "Free Entry" : "$" . $event['ticket_price'] ?><br>
                    <strong>Age Criteria:</strong> <?= htmlspecialchars($event['age_criteria']) ?>
                </div>
                <div class="event-actions">
                    <a href="edit_event.php?id=<?= $event['id'] ?>" class="btn btn-sm btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="admin_dashboard.php?delete=<?= $event['id'] ?>" class="btn btn-sm btn-delete" onclick="return confirm('Are you sure?');">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
