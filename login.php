<?php
include('include/config.php');
include('include/header.php');
session_start();
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';

$conn = new mysqli("localhost", "root", "", "city_guide");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $stmt = $conn->prepare($role === "user" ? "SELECT * FROM users WHERE username = ?" : "SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if ($password === $row["password"]) {
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["role"] = $role;
            header("Location: " . ($role === "admin" ? "admin/admin_dashboard.php" : $redirect));
            exit();
        } else {
            $error = "Invalid credentials.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - City Guide</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: url('images/attractions2.jpg');
            padding: 0;
        }
      
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 80px; /* Space for the fixed header */
        }
        .login-box {
            display: flex;
            width: 1100px;
            height: 500px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .left {
            flex: 1;
            padding: 50px;
        }
        .left h2 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #333;
        }
        .left p {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }
        .right {
            flex: 0.8;
            background: linear-gradient(135deg, #5cb85c, #4cae4c);
            padding: 50px;
            color: white;
            text-align: center;
        }
        .right h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }
        .right p {
            font-size: 14px;
            margin-bottom: 20px;
        }
        .right button {
            background: white;
            color: #28a745;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }
        .right button:hover {
            background: #f5f7fa;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }
        button {
            width: 100%;
            background: #28a745;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        button:hover {
            background: #218838;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="left">
                <h2>Login to Your Account</h2>
                <p>Enter your credentials to access your account.</p>
                <?php if (!empty($error)): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                <form method="POST" action="login.php">
                    <input type="text" name="username" placeholder="Username" required><br>
                    <input type="password" name="password" placeholder="Password" required><br>
                    <select name="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select><br>
                    <button type="submit">Login</button>
                </form>
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>
            <div class="right">
                <h2>New Here?</h2>
                <p>Sign up and discover a great amount of new opportunities!</p>
                <a href="register.php"><button>Sign Up</button></a>
            </div>
        </div>
    </div>
</body>
</html>