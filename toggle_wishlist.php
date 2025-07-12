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

// Check if the place is already in the wishlist
$check_wishlist_stmt = $conn->prepare("SELECT id FROM wishlist WHERE user_id = ? AND place_name = ?");
$check_wishlist_stmt->bind_param("is", $user_id, $place_name);
$check_wishlist_stmt->execute();
$check_wishlist_stmt->store_result();

if ($check_wishlist_stmt->num_rows > 0) {
    // Place is in the wishlist, so remove it
    $delete_stmt = $conn->prepare("DELETE FROM wishlist WHERE user_id = ? AND place_name = ?");
    $delete_stmt->bind_param("is", $user_id, $place_name);
    if ($delete_stmt->execute()) {
        $_SESSION['wishlist_message'] = "Removed from wishlist!";
    } else {
        $_SESSION['wishlist_message'] = "Failed to remove from wishlist. Please try again.";
    }
    $delete_stmt->close();
} else {
    // Place is not in the wishlist, so add it
    $insert_stmt = $conn->prepare("INSERT INTO wishlist (user_id, place_name, place_link) VALUES (?, ?, ?)");
    $insert_stmt->bind_param("iss", $user_id, $place_name, $place_link);
    if ($insert_stmt->execute()) {
        $_SESSION['wishlist_message'] = "Added to wishlist!";
    } else {
        $_SESSION['wishlist_message'] = "Failed to add to wishlist. Please try again.";
    }
    $insert_stmt->close();
}

$check_wishlist_stmt->close();
$conn->close();

// Redirect back to the attraction page
header("Location: " . $place_link);
exit();
?>