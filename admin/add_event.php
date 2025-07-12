<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('../include/config.php');

// Check if user is admin
if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "admin") {
    header("Location: ../login.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $category = $_POST["category"];
    $event_date = $_POST["event_date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $location = $_POST["location"];
    $description = $_POST["description"];
    $ticket_price = $_POST["ticket_price"];
    $age_criteria = $_POST["age_criteria"];

    $stmt = $conn->prepare("INSERT INTO events (title, category, event_date, start_time, end_time, location, description, ticket_price, age_criteria) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssssssss", $title, $category, $event_date, $start_time, $end_time, $location, $description, $ticket_price, $age_criteria);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error adding event: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Event</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgba(18, 35, 53, 0.8), rgba(5, 15, 30, 0.9));
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            background: #ffffff;
            color: #333;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
            padding: 30px;
            width: 100%;
            max-width: 600px;
        }

        h2 {
            font-weight: 600;
            text-align: center;
            color: rgb(18, 35, 53);
            margin-bottom: 20px;
        }

        /* Form Fields */
        .form-floating label {
            color: #777;
        }

        .form-control {
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: rgb(18, 35, 53);
            box-shadow: 0 0 6px rgba(18, 35, 53, 0.5);
        }

        /* Buttons */
        .btn-custom {
            background: rgb(18, 35, 53);
            color: white;
            border-radius: 8px;
            padding: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: rgb(12, 25, 40);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <h2><i class="fas fa-calendar-plus"></i> Add New Event</h2>
        <form method="POST" action="">

            <div class="form-floating mb-3">
                <input type="text" name="title" class="form-control" id="title" placeholder="Event Title" required>
                <label for="title">Event Title</label>
            </div>

            <div class="form-floating mb-3">
                <select name="category" class="form-control" id="category" required>
                    <option value="Festivals">Festivals</option>
                    <option value="Concerts">Concerts</option>
                    <option value="Workshops">Workshops</option>
                    <option value="Community Events">Community Events</option>
                    <option value="Sports">Sports</option>
                </select>
                <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
                <input type="date" name="event_date" class="form-control" id="event_date" required>
                <label for="event_date">Event Date</label>
            </div>

            <div class="form-floating mb-3">
                <input type="time" name="start_time" class="form-control" id="start_time" required>
                <label for="start_time">Start Time</label>
            </div>

            <div class="form-floating mb-3">
                <input type="time" name="end_time" class="form-control" id="end_time" required>
                <label for="end_time">End Time</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="location" class="form-control" id="location" placeholder="Event Location" required>
                <label for="location">Location</label>
            </div>

            <div class="form-floating mb-3">
                <textarea name="description" class="form-control" id="description" placeholder="Event Description" style="height: 100px;"></textarea>
                <label for="description">Event Description</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="ticket_price" class="form-control" id="ticket_price" placeholder="Enter price or 'Free Entry'">
                <label for="ticket_price">Ticket Price</label>
            </div>

            <div class="form-floating mb-3">
                <select name="age_criteria" class="form-control" id="age_criteria" required>
                    <option value="All Ages">All Ages</option>
                    <option value="12+">12+</option>
                    <option value="16+">16+</option>
                    <option value="18+">18+</option>
                    <option value="21+">21+</option>
                </select>
                <label for="age_criteria">Age Criteria</label>
            </div>

            <button type="submit" class="btn btn-custom w-100">
                <i class="fas fa-plus"></i> Add Event
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
