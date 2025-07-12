<?php
session_start();
include('include/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'];
    $numBookings = $_POST['numBookings'];
    $ticket_price = $_POST['ticket_price'];
    $event_time = $_POST['event_time'];
    $age_criteria = $_POST['age_criteria'];
    $user_id = $_SESSION['user_id']; // Assuming user_id is stored in the session

    // Validate each attendee's age
    for ($i = 1; $i <= $numBookings; $i++) {
        $attendee_name = $_POST["attendeeName$i"];
        $attendee_age = $_POST["attendeeAge$i"];

        // Check age criteria
        if ($age_criteria !== "All Ages") {
            $min_age = intval(str_replace('+', '', $age_criteria));
            if ($attendee_age < $min_age) {
                die("Error: Attendee $i must be $age_criteria.");
            }
        }

        // Insert booking into database
        $stmt = $conn->prepare("INSERT INTO bookings (event_id, attendee_name, attendee_age, booking_date, user_id, ticket_price, event_time, age_criteria) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?)");
        $stmt->bind_param("isssdss", $event_id, $attendee_name, $attendee_age, $user_id, $ticket_price, $event_time, $age_criteria);

        if (!$stmt->execute()) {
            die("Error saving booking: " . $conn->error);
        }
    }

    echo "Booking successful!";
}
?>