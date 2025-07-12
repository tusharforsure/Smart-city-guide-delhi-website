<?php
session_start();
error_reporting(0);
?>

<nav class="navbar navbar-expand-lg bg-dark fixed-top">
    <div class="container-fluid d-flex justify-content-center align-items-center px-4">

        <!-- Navigation Links - Modern Button Style -->
        <div class="d-flex gap-3 align-items-center flex-wrap">
            <a href="index.php" class="nav-btn">Home</a>
            <a href="about.php" class="nav-btn">About</a>
            <a href="attractions.php" class="nav-btn">Attractions & Landmarks</a>
            <a href="services.php" class="nav-btn">Services</a>
            <a href="events.php" class="nav-btn">Events</a>
            <a href="contact.php" class="nav-btn">Contact</a>
            
            <!-- Show these options only if logged in as a user or admin -->
            <?php if (isset($_SESSION['username']) && ($_SESSION['role'] === 'user' || $_SESSION['role'] === 'admin')) : ?>
                <?php if ($_SESSION['role'] === 'user') : ?>
                    <a href="account_details.php" class="nav-btn">My Account</a>
                <?php elseif ($_SESSION['role'] === 'admin') : ?>
                    <a href="admin/admin_dashboard.php" class="nav-btn">Admin Dashboard</a>
                <?php endif; ?>

              
            <?php endif; ?>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="nav-btn" style="background-color: #dc3545;">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="nav-btn" style="background-color: #dc3545;">Login</a>
                    <?php endif; ?>
        </div>

    </div>
</nav>

<style>
/* Navbar height and centering */
.navbar {
    background-color: #212529;
    height: 70px;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    top: 0;
}

/* Container flex centering */
.navbar .container-fluid {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 15px;
}

/* Button-like navigation items */
.nav-btn {
    color: white;
    text-decoration: none;
    padding: 10px 30px;
    border-radius: 40px;
    background-color: rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    font-weight: 500;
    white-space: nowrap;
    display: inline-block;
}

/* Hover effect */
.nav-btn:hover {
    background-color: #17a2b8;
    color: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

/* Contact button with different color */
.contact-btn {
    background-color: #17a2b8;
    color: white;
}

/* Push body down so content doesn't overlap navbar */
body {
    padding-top: 70px; /* Ensure content doesn't get hidden under the navbar */
    margin: 0;
}

/* Responsive - Stack buttons vertically on smaller screens */
@media (max-width: 992px) {
    .navbar .d-flex {
        flex-direction: column;
        gap: 10px;
        align-items: center;
    }

    .nav-btn {
        padding: 12px 25px;
    }
}
</style>