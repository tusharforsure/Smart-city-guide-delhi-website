<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Save to Database (Optional)
    // require 'database.php'; 
    // mysqli_query($conn, "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')");

    echo "Thank you, $name! We will get back to you soon.";
}
?>
