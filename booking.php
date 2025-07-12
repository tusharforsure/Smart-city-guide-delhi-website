<?php
session_start();
include('include/header.php'); 
include('include/config.php');


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=booking.php?event_id=" . $_GET['event_id']);
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

// Fetch event time, ticket price, and age criteria
$event_time = date("h:i A", strtotime($event['start_time'])) . " - " . date("h:i A", strtotime($event['end_time']));
$ticket_price = $event['ticket_price'];
$age_criteria = $event['age_criteria'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Event - <?= $event['title'] ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background: url('images/events1.jpg') no-repeat center center/cover;
            position: relative;
            color: #fff;
            padding-top: 0px; 

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: -1;
        }
       
        .container {
            max-width: 800px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 40px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 100px; 
            margin-left: 500px; 
        }

        

        /* Heading Styles */
        h2 {
            color: #fff;
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        h3 {
            color: #fff;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 60px;
            height: 4px;
            background: #007bff;
            border-radius: 2px;
        }

        /* Event Details */
        .event-details {
            margin-bottom: 30px;
        }

        .event-details p {
            font-size: 1.1rem;
            color: #ddd;
            margin-bottom: 10px;
        }

        .event-details strong {
            color: #007bff;
        }

        /* Form Styles */
        .form-label {
            color: #fff;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .error-message {
            color: #ff6f61;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Attendee Section */
        .attendee-section {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        /* Submit Button */
        .btn-success {
            background: #007bff;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.3s ease;
            width: 100%;
        }

        .btn-success:hover {
            background: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Book Event: <?= $event['title'] ?></h2>
    <div class="event-details">
        <p><strong>Date:</strong> <?= $event['event_date'] ?></p>
        <p><strong>Time:</strong> <?= $event_time ?></p>
        <p><strong>Location:</strong> <?= $event['location'] ?></p>
        <p><strong>Ticket Price:</strong> <?= $ticket_price == 0 ? "Free Entry" : "₹" . $ticket_price ?></p>
        <p><strong>Age Criteria:</strong> <?= $age_criteria ?></p>
    </div>

    <form action="save_booking.php" method="POST" onsubmit="return validateForm()">
        <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
        <input type="hidden" name="ticket_price" value="<?= $ticket_price ?>">
        <input type="hidden" name="event_time" value="<?= $event_time ?>">
        <input type="hidden" name="age_criteria" value="<?= $age_criteria ?>">
        <div class="mb-3">
            <label for="numBookings" class="form-label">Number of Bookings:</label>
            <input type="number" class="form-control" id="numBookings" name="numBookings" min="1" required>
        </div>
        <div id="attendeesFields"></div>
        <button type="submit" class="btn btn-success">Submit Booking</button>
    </form>
</div>

<script>
    document.getElementById('numBookings').addEventListener('input', function () {
        let count = this.value;
        let attendeesFields = '';
        for (let i = 1; i <= count; i++) {
            attendeesFields += `
                <div class="attendee-section">
                    <div class="mb-3">
                        <label>Attendee ${i} Name:</label>
                        <input type="text" class="form-control" name="attendeeName${i}" required>
                    </div>
                    <div class="mb-3">
                        <label>Attendee ${i} Age:</label>
                        <input type="number" class="form-control attendeeAge" name="attendeeAge${i}" min="1" required>
                        <div class="error-message" id="ageError${i}"></div>
                    </div>
                </div>
            `;
        }
        document.getElementById('attendeesFields').innerHTML = attendeesFields;
    });

    function validateForm() {
        const ageInputs = document.querySelectorAll('.attendeeAge');
        let isValid = true;

        ageInputs.forEach((input, index) => {
            const age = parseInt(input.value);
            const errorMessage = document.getElementById(`ageError${index + 1}`);

            if (isNaN(age) || age < 12) {
                errorMessage.textContent = "Attendee must be 12 years or older.";
                isValid = false;
            } else {
                errorMessage.textContent = "";
            }
        });

        return isValid;
    }
</script>
</body>
</html>