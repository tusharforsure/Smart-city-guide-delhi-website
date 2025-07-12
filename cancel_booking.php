<?php
session_start();
include('include/config.php');

$conn = new mysqli("localhost", "root", "", "city_guide");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

if (!isset($_GET['booking_id']) || !is_numeric($_GET['booking_id'])) {
    die("Invalid booking ID.");
}

$booking_id = intval($_GET['booking_id']);

$verify_stmt = $conn->prepare("SELECT id FROM bookings WHERE id = ? AND user_id = ?");
$verify_stmt->bind_param("ii", $booking_id, $user_id);
$verify_stmt->execute();
$verify_result = $verify_stmt->get_result();

if ($verify_result->num_rows === 0) {
    die("Booking not found or you do not have permission to cancel it.");
}

$delete_stmt = $conn->prepare("DELETE FROM bookings WHERE id = ? AND user_id = ?");
$delete_stmt->bind_param("ii", $booking_id, $user_id);
$delete_stmt->execute();

header("Location: account_details.php?cancel=success");
exit();
?>
