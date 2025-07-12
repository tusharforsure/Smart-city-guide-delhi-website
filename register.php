<?php
session_start();

$conn = new mysqli("localhost", "root", "", "city_guide");

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $contact = $_POST["contact"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 

    $stmt = $conn->prepare("INSERT INTO users (name, age, contact, username, email, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissss", $name, $age, $contact, $username, $email, $password);

    if ($stmt->execute()) {
        // ✅ Auto-login after successful registration
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $stmt->insert_id;
        $_SESSION["role"] = "user";

        header("Location: index.php"); // Redirect to homepage
        exit();
    } else {
        $error = "Registration failed. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register - City Guide</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('images/attractions2.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }
        .register-container h2 {
            margin: 0 0 15px;
            font-size: 24px;
            color: #333;
        }
        input {
            width: 90%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 18px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            font-size: 14px;
            color: #555;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" required><br>
            <input type="number" name="age" placeholder="Age" min="1" max="120" required><br>
            <input type="text" name="contact" placeholder="Contact Number" pattern="[0-9]{10}" title="Enter a valid 10-digit contact number" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
