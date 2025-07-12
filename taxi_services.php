<?php
session_start();
error_reporting(0);

include('include/config.php');
include('include/header.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Taxi Services in Delhi - Ola, Uber, Rapido, inDrive, BluSmart & Local Taxis</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: url(images/taxi_bg.jpg);
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3 {
            font-weight: 600;
        }

        /* Pinterest-Style Grid Layout */
        .taxi-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .taxi-header {
            text-align: center;
            margin-bottom: 40px;
            grid-column: 1 / -1;
        }

        .taxi-header h1 {
            font-size: 3rem;
            color: rgb(255, 255, 255);
            margin-bottom: 10px;
        }

        .taxi-header p {
            font-size: 1.2rem;
            color: rgb(255, 255, 255);
        }

        .taxi-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .taxi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .taxi-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .taxi-card-content {
            padding: 20px;
        }

        .taxi-card h2 {
            font-size: 1.8rem;
            color: #1e3c72;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .taxi-card h2 i {
            margin-right: 10px;
            color: #007bff;
        }

        .taxi-card p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
        }

        .taxi-card ul {
            list-style: none;
            padding-left: 0;
        }

        .taxi-card ul li {
            font-size: 0.9rem;
            color: #666;
            padding: 5px 0;
        }

        .taxi-card ul li strong {
            color: #1e3c72;
        }

        /* Visit Official Website Button */
        .visit-button {
            text-align: center;
            margin-top: 40px;
            grid-column: 1 / -1;
        }

        .visit-button a {
            background-color: #007bff;
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 600;
            transition: all 0.3s ease-in-out;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .visit-button a:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .visit-button a i {
            font-size: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .taxi-header h1 {
                font-size: 2.5rem;
            }

            .taxi-card h2 {
                font-size: 1.5rem;
            }

            .visit-button a {
                padding: 12px 25px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<!-- Taxi Services Page -->
<div class="taxi-container">
    <!-- Header -->
    <div class="taxi-header">
        <h1><i class="fas fa-taxi"></i> Taxi Services in Delhi</h1>
        <p>Book your ride with Ola, Uber, Rapido, inDrive, BluSmart & Local Taxis</p>
    </div>

    <!-- Ola Card -->
    <div class="taxi-card">
        <img src="images/ola.jpg" alt="Ola Taxi">
        <div class="taxi-card-content">
            <h2><i class="fas fa-car"></i> Ola</h2>
            <p>Affordable and reliable rides across Delhi. Choose from a variety of options like Micro, Mini, Prime, and more.</p>
            <ul>
                <li><strong>App:</strong> Ola Cabs</li>
                <li><strong>Fare:</strong> Starts at ₹25/km</li>
                <li><strong>Features:</strong> 24/7 availability, multiple ride options</li>
            </ul>
        </div>
    </div>

    <!-- Uber Card -->
    <div class="taxi-card">
        <img src="images/uber.jpg" alt="Uber Taxi">
        <div class="taxi-card-content">
            <h2><i class="fas fa-car-side"></i> Uber</h2>
            <p>Convenient and fast rides with options like Uber Go, Uber Premier, and Uber Auto.</p>
            <ul>
                <li><strong>App:</strong> Uber</li>
                <li><strong>Fare:</strong> Starts at ₹30/km</li>
                <li><strong>Features:</strong> Real-time tracking, cashless payments</li>
            </ul>
        </div>
    </div>

    <!-- Rapido Card -->
    <div class="taxi-card">
        <img src="images/rapido.jpg" alt="Rapido Bike Taxi">
        <div class="taxi-card-content">
            <h2><i class="fas fa-motorcycle"></i> Rapido</h2>
            <p>Quick and affordable bike taxis for short-distance travel in Delhi.</p>
            <ul>
                <li><strong>App:</strong> Rapido</li>
                <li><strong>Fare:</strong> Starts at ₹10/km</li>
                <li><strong>Features:</strong> Fastest way to beat traffic</li>
            </ul>
        </div>
    </div>

    <!-- inDrive Card -->
    <div class="taxi-card">
        <img src="images/indrive.jpg" alt="inDrive Taxi">
        <div class="taxi-card-content">
            <h2><i class="fas fa-car"></i> inDrive</h2>
            <p>Negotiate your fare directly with drivers for a personalized ride experience.</p>
            <ul>
                <li><strong>App:</strong> inDrive</li>
                <li><strong>Fare:</strong> Negotiable</li>
                <li><strong>Features:</strong> Transparent pricing, no surge charges</li>
            </ul>
        </div>
    </div>

    <!-- BluSmart Card -->
    <div class="taxi-card">
        <img src="images/blusmart.jpg" alt="BluSmart Electric Taxi">
        <div class="taxi-card-content">
            <h2><i class="fas fa-car"></i> BluSmart</h2>
            <p>Eco-friendly electric cabs with premium features for a comfortable ride.</p>
            <ul>
                <li><strong>App:</strong> BluSmart</li>
                <li><strong>Fare:</strong> Starts at ₹35/km</li>
                <li><strong>Features:</strong> Zero emissions, no surge pricing</li>
            </ul>
        </div>
    </div>

    <!-- Local Taxis Card -->
    <div class="taxi-card">
        <img src="images/local_taxi.jpg" alt="Local Taxis">
        <div class="taxi-card-content">
            <h2><i class="fas fa-taxi"></i> Local Taxis</h2>
            <p>Traditional taxis available for hire at stands or via phone booking.</p>
            <ul>
                <li><strong>Fare:</strong> Metered or negotiable</li>
                <li><strong>Features:</strong> Available 24/7, no app required</li>
            </ul>
        </div>
    </div>

    <!-- Visit Official Websites Button -->
    <div class="visit-button">
        <a href="https://www.olacabs.com" target="_blank">
            <i class="fas fa-external-link-alt"></i> Explore More
        </a>
    </div>
</div>

<?php include('include/footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>