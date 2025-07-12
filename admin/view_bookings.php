<?php
session_start();
include('../include/config.php');

// Check if user is admin
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['event_id'])) {
    die("Invalid event.");
}

$event_id = $_GET['event_id'];
$event = $conn->query("SELECT * FROM events WHERE id='$event_id'")->fetch_assoc();

if (!$event) {
    die("Event not found.");
}

// Fetch bookings for the event
$bookings = $conn->query("SELECT * FROM bookings WHERE event_id='$event_id' ORDER BY booking_date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Bookings - <?= $event['title'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Bookings for <?= $event['title'] ?></h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Attendee Name</th>
                    <th>Attendee Age</th>
                    <th>Booking Date</th>
                    <th>Ticket Price</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($booking = $bookings->fetch_assoc()) : ?>
                    <tr>
                        <td><?= htmlspecialchars($booking['attendee_name']) ?></td>
                        <td><?= htmlspecialchars($booking['attendee_age']) ?></td>
                        <td><?= htmlspecialchars($booking['booking_date']) ?></td>
                        <td><?= $booking['ticket_price'] == 0 ? "Free Entry" : "$" . $booking['ticket_price'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="text-end">
            <a href="admin_dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>