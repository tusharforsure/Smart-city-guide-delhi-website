<?php
session_start();
include('include/config.php');

// Check if event ID is provided
if (!isset($_GET['event_id'])) {
    header("Location: events.php");
    exit();
}

$eventId = $_GET['event_id'];

// Fetch event details
$event = $conn->query("SELECT * FROM events WHERE id = $eventId")->fetch_assoc();
if (!$event) {
    header("Location: events.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Event - City Guide</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: 500;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Book Event: <?= htmlspecialchars($event['title']) ?></h2>
        <form method="POST" action="save_booking.php">
            <input type="hidden" name="event_id" value="<?= $eventId ?>">
            <div class="mb-3">
                <label for="numBookings" class="form-label">Number of Bookings:</label>
                <input type="number" class="form-control" id="numBookings" name="numBookings" min="1" required>
            </div>
            <div id="attendeesFields"></div>
            <button type="submit" class="btn btn-primary">Submit Booking</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // When the number of bookings changes
            $('#numBookings').on('input', function () {
                const numBookings = $(this).val();
                let attendeesFields = '';
                for (let i = 1; i <= numBookings; i++) {
                    attendeesFields += `
                        <div class="mb-3">
                            <label for="attendeeName${i}" class="form-label">Attendee ${i} Name:</label>
                            <input type="text" class="form-control" id="attendeeName${i}" name="attendeeName${i}" required>
                        </div>
                        <div class="mb-3">
                            <label for="attendeeAge${i}" class="form-label">Attendee ${i} Age:</label>
                            <input type="number" class="form-control" id="attendeeAge${i}" name="attendeeAge${i}" min="1" required>
                        </div>
                    `;
                }
                $('#attendeesFields').html(attendeesFields); // Update the attendee fields
            });
        });
    </script>
</body>
</html>