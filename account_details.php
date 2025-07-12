<?php
session_start();
include('include/config.php');
include('include/header.php');

$conn = new mysqli("localhost", "root", "", "city_guide");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$stmt = $conn->prepare("SELECT name, age, email, contact, password FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die("User not found in the database.");
}
$user = $result->fetch_assoc();

$wishlist_stmt = $conn->prepare("SELECT place_name, place_link FROM wishlist WHERE user_id = ?");
$wishlist_stmt->bind_param("i", $user_id);
$wishlist_stmt->execute();
$wishlist_result = $wishlist_stmt->get_result();
$wishlist_items = [];
while ($row = $wishlist_result->fetch_assoc()) {
    $wishlist_items[] = $row;
}

$bookings_stmt = $conn->prepare("
    SELECT b.id, e.title AS event_title, e.event_date, e.location, b.attendee_name, b.attendee_age 
    FROM bookings b
    JOIN events e ON b.event_id = e.id
    WHERE b.user_id = ?
");
$bookings_stmt->bind_param("i", $user_id);
$bookings_stmt->execute();
$bookings_result = $bookings_stmt->get_result();
$bookings = [];
while ($row = $bookings_result->fetch_assoc()) {
    $bookings[] = $row;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_contact"])) {
    $new_contact = $_POST["contact"];
    if (preg_match("/^[0-9]{10}$/", $new_contact)) {
        $update_stmt = $conn->prepare("UPDATE users SET contact = ? WHERE id = ?");
        $update_stmt->bind_param("si", $new_contact, $user_id);
        $update_stmt->execute();
        header("Location: account_details.php");
        exit();
    } else {
        $error_message = "Invalid contact number. Please enter a 10-digit number.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["change_password"])) {
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if (password_verify($current_password, $user['password'])) {
        if (strlen($new_password) < 6) {
            $password_error = "New password must be at least 6 characters long.";
        } elseif ($new_password !== $confirm_password) {
            $password_error = "New password and confirm password do not match.";
        } else {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_password_stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $update_password_stmt->bind_param("si", $hashed_password, $user_id);
            $update_password_stmt->execute();
            $password_success = "Password updated successfully!";
        }
    } else {
        $password_error = "Current password is incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Account - City Guide</title>
    <style>
    /* General Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background: url('images/events1.jpg') no-repeat center center/cover;
        position: relative;
        color: #fff;
        padding-top: 0px; /* Add padding to account for the fixed header */
    }
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
    .account-container {
        background: rgba(255, 255, 255, 0.95);
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        max-width: 800px;
        margin: 100px auto 20px; /* Adjusted margin to account for the fixed header */
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .account-container h2 {
        margin-bottom: 20px;
        font-size: 2rem;
        color: #1e3c72;
        text-align: center;
    }

    .account-info {
        text-align: left;
        margin-bottom: 20px;
    }

    .account-info p {
        margin: 10px 0;
        font-size: 1rem;
        color: #555;
    }

    .edit-section label {
        font-size: 1.1rem;
        font-weight: bold;
        color: #001f3f; /* Dark Blue */
        display: block;
        margin-bottom: 5px;
    }

    .password-toggle {
        cursor: pointer;
        color: #1e3c72;
        text-decoration: none;
        margin-top: 15px;
        display: inline-block;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .password-toggle:hover {
        color: #2a5298;
    }

    .password-section {
        display: none;
        margin-top: 15px;
        text-align: left;
        animation: slideDown 0.3s ease-in-out;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus, input[type="password"]:focus {
        border-color: #1e3c72;
        outline: none;
    }

    button {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        margin-top: 15px;
        font-size: 16px;
        font-weight: bold;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .success {
        color: #28a745;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .error {
        color: #dc3545;
        margin-bottom: 10px;
        font-weight: bold;
    }

    a {
        color: #1e3c72;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #2a5298;
    }

    /* Wishlist Section CSS */
    .wishlist-section {
        margin-top: 20px;
        text-align: left;
    }

    .wishlist-section h3 {
        font-size: 1.5rem;
        color: #1e3c72;
        margin-bottom: 10px;
    }

    .wishlist-section ul {
        list-style: none;
        padding-left: 0;
    }

    .wishlist-section ul li {
        font-size: 1.1rem;
        padding: 10px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .wishlist-section ul li a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s ease;
    }

    .wishlist-section ul li a:hover {
        color: #0056b3;
    }

    /* Bookings Section CSS */
    .bookings-section {
        margin-top: 20px;
        text-align: left;
    }

    .bookings-section h3 {
        font-size: 1.5rem;
        color:rgb(114, 13, 13);
        margin-bottom: 10px;
    }

    .bookings-section ul {
        list-style: none;
        padding-left: 0;
    }

    .bookings-section ul li {
        font-size: 1.1rem;
        padding: 15px;
        margin-bottom: 10px;
        background: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        color: #001f3f; /* Dark Blue Text */
    }

    .bookings-section ul li:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .bookings-section ul li strong {
        color: #001f3f; /* Dark Blue */
    }

    .cancel-link {
        display: inline-block;
        margin-top: 10px;
        color: #dc3545;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .cancel-link:hover {
        color: #c82333;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .account-container {
            padding: 20px;
            margin: 80px auto 20px;
        }

        .account-container h2 {
            font-size: 1.8rem;
        }

        .wishlist-section h3, .bookings-section h3 {
            font-size: 1.3rem;
        }

        .wishlist-section ul li, .bookings-section ul li {
            font-size: 1rem;
        }
    }
</style>
    <script>
        function togglePasswordForm() {
            const passwordSection = document.getElementById('password-section');
            passwordSection.style.display = passwordSection.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</head>
<body>
<div class="account-container">
    <h2>My Account</h2>
    <?php if (!empty($success_message)) echo "<p class='success'>$success_message</p>"; ?>
    <?php if (!empty($error_message)) echo "<p class='error'>$error_message</p>"; ?>
    <?php if (!empty($password_success)) echo "<p class='success'>$password_success</p>"; ?>
    <?php if (!empty($password_error)) echo "<p class='error'>$password_error</p>"; ?>

    <div class="account-info">
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        <p><strong>Age:</strong> <?php echo htmlspecialchars($user['age']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Contact Number:</strong> <?php echo htmlspecialchars($user['contact']); ?></p>
    </div>

    <div class="wishlist-section">
        <h3>Your Wishlist</h3>
        <?php if (count($wishlist_items) > 0): ?>
            <ul>
                <?php foreach ($wishlist_items as $item): ?>
                    <li>
                        <a href="<?php echo htmlspecialchars($item['place_link']); ?>">
                            <?php echo htmlspecialchars($item['place_name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Your wishlist is empty.</p>
        <?php endif; ?>
    </div>

    <div class="bookings-section">
        <h3>Your Bookings</h3>
        <?php if (count($bookings) > 0): ?>
            <ul>
                <?php foreach ($bookings as $booking): ?>
                    <li>
                        <strong>Event:</strong> <?php echo htmlspecialchars($booking['event_title']); ?><br>
                        <strong>Date:</strong> <?php echo date("M d, Y", strtotime($booking['event_date'])); ?><br>
                        <strong>Location:</strong> <?php echo htmlspecialchars($booking['location']); ?><br>
                        <strong>Attendee:</strong> <?php echo htmlspecialchars($booking['attendee_name']); ?> (Age: <?php echo htmlspecialchars($booking['attendee_age']); ?>)<br>
                        <a href="cancel_booking.php?booking_id=<?php echo $booking['id']; ?>" 
                           class="cancel-link" 
                           onclick="return confirm('Are you sure you want to cancel this booking?');">
                           Cancel Booking
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>You have no bookings yet.</p>
        <?php endif; ?>
    </div>

    <div class="edit-section">
        <form method="POST">
            <label for="contact">Edit Contact Number:</label>
            <input type="text" name="contact" id="contact" placeholder="Enter new contact number" required>
            <button type="submit" name="update_contact">Update Contact</button>
        </form>
    </div>

    <div class="password-toggle" onclick="togglePasswordForm()">Change Password</div>
    <div class="password-section" id="password-section" style="display:none;">
        <form method="POST">
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" id="current_password" required>

            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password" required>

            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>

            <button type="submit" name="change_password">Change Password</button>
        </form>
    </div>

    <br>
    <a href="index.php">Back to Home</a>
</div>
</body>
</html>






