<?php
session_start();
include('include/config.php');

// Redirect if the user is not logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Get the place details from the form
$place_name = $_POST['place_name'];
$place_link = $_POST['place_link'];
$user_id = $_SESSION["user_id"];

// Insert into the wishlist table
$stmt = $conn->prepare("INSERT INTO wishlist (user_id, place_name, place_link) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $user_id, $place_name, $place_link);

if ($stmt->execute()) {
    // Success: Redirect back to the attraction page with a success message
    $_SESSION['wishlist_message'] = "Added to wishlist!";
    header("Location: " . $place_link);
} else {
    // Error: Redirect back with an error message
    $_SESSION['wishlist_message'] = "Failed to add to wishlist. Please try again.";
    header("Location: " . $place_link);
}

$stmt->close();
$conn->close();
exit();
?>