<?php
session_start();
error_reporting(0);

include('include/config.php');
include('include/header.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Delhi Transport Corporation (DTC) - City Services & Facilities</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('images/dtc.jpg');
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3 {
            font-weight: 600;
        }


        .dtc-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .dtc-header {
            text-align: center;
            margin-bottom: 40px;
            grid-column: 1 / -1;
        }

        .dtc-header h1 {
            font-size: 3rem;
            color: rgb(255, 255, 255);
            margin-bottom: 10px;
        }

        .dtc-header p {
            font-size: 1.2rem;
            color: rgb(255, 255, 255);
        }

        .dtc-card {
            background: url('images/card2.jpg') no-repeat center center/cover; /* Add your image path here */
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: all 0.3s ease-in-out;
            color: white; /* Change text color to white for better contrast */
        }

        .dtc-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .dtc-card h2 {
            font-size: 2rem;
            color:rgb(0, 159, 13);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .dtc-card h2 i {
            margin-right: 10px;
            color:rgb(0, 159, 13);
        }

        .dtc-card ul {
            color:rgb(215, 55, 55);
            list-style: none;
            padding-left: 0;
        }

        .dtc-card ul li {
            color:rgb(215, 55, 55);
            font-size: 1rem;
            padding: 10px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .dtc-card ul li strong {
            color:rgb(124, 20, 20);
        }

        .dtc-map {
            background:rgb(0, 128, 255);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
            grid-column: 1 / -1;
        }

        .dtc-map img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .dtc-map p {
            font-size: 0.9rem;
            color: #666;
            margin-top: 10px;
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
            .dtc-header h1 {
                font-size: 2.5rem;
            }

            .dtc-card h2 {
                font-size: 1.8rem;
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

<!-- Delhi Transport Corporation (DTC) Page -->
<div class="dtc-container">
    <!-- Header -->
    <div class="dtc-header">
        <h1><i class="fas fa-bus"></i> Delhi Transport Corporation (DTC)</h1>
        <p>Your Reliable Ride Across Delhi</p>
    </div>

    <!-- Types of DTC Buses Section -->
    <div class="dtc-card">
        <h2><i class="fas fa-bus-alt"></i> Types of DTC Buses</h2>
        <ul>
            <li><strong>Red Buses (AC):</strong> Comfortable air-conditioned buses ideal for beating Delhi's heat.</li>
            <li><strong>Green Buses (Non-AC):</strong> Budget-friendly buses for everyday travel.</li>
            <li><strong>Electric Buses:</strong> Eco-friendly option with zero emissions and modern features.</li>
        </ul>
    </div>

    <!-- Popular Tourist Routes Section -->
    <div class="dtc-card">
        <h2><i class="fas fa-route"></i> Popular Tourist Routes</h2>
        <ul>
            <li><strong>Route 419:</strong> Red Fort → Jama Masjid → Rajiv Chowk → India Gate</li>
            <li><strong>Route 764:</strong> Qutub Minar → Hauz Khas → AIIMS → Central Secretariat</li>
            <li><strong>Route 894:</strong> Akshardham Temple → Pragati Maidan → Connaught Place</li>
        </ul>
        <p><strong>Pro Tip:</strong> Use the "One Delhi" app to find the best route for your destination.</p>
    </div>

    <!-- Timings and Frequency Section -->
    <div class="dtc-card">
        <h2><i class="fas fa-clock"></i> Timings and Frequency</h2>
        <ul>
            <li><strong>Operating Hours:</strong> 6:00 AM – 10:00 PM</li>
            <li><strong>Peak Hour Frequency:</strong> Every 5-10 minutes</li>
            <li><strong>Non-Peak Frequency:</strong> Every 15-20 minutes</li>
        </ul>
    </div>

    <!-- Fares and Ticketing Section -->
    <div class="dtc-card">
        <h2><i class="fas fa-ticket-alt"></i> Fares and Ticketing</h2>
        <ul>
            <li><strong>AC Buses:</strong> Starting from ₹10</li>
            <li><strong>Non-AC Buses:</strong> Starting from ₹5</li>
            <li><strong>Tourist Pass:</strong> Unlimited travel in DTC buses for ₹50/day</li>
        </ul>
        <p><strong>Tip:</strong> Metro smart cards are also accepted on DTC buses for seamless travel.</p>
    </div>

    <!-- Facilities and Features Section -->
    <div class="dtc-card">
        <h2><i class="fas fa-concierge-bell"></i> Facilities and Features</h2>
        <ul>
            <li><strong>Comfortable Seating</strong> with ample legroom</li>
            <li><strong>CCTV Surveillance</strong> for enhanced safety</li>
            <li><strong>Wheelchair Accessibility</strong> on select buses</li>
            <li><strong>Digital Displays</strong> for route and stop information</li>
        </ul>
    </div>

    <!-- How to Use DTC Buses Section -->
    <div class="dtc-card">
        <h2><i class="fas fa-info-circle"></i> How to Use DTC Buses</h2>
        <ul>
            <li>Identify your route using the "One Delhi" app or Google Maps.</li>
            <li>Wait at the designated bus stop and wave when your bus arrives.</li>
            <li>Board from the front door and purchase your ticket directly from the conductor.</li>
            <li>Keep your ticket handy for inspection.</li>
        </ul>
    </div>

    <!-- Travel Tips for Tourists Section -->
    <div class="dtc-card">
        <h2><i class="fas fa-lightbulb"></i> Travel Tips for Tourists</h2>
        <ul>
            <li>Travel during non-peak hours (10:00 AM – 4:00 PM) for a comfortable ride.</li>
            <li>Always keep an eye on your belongings.</li>
            <li>For popular tourist spots, prefer AC buses for added comfort.</li>
        </ul>
    </div>

    <!-- Contact Information Section -->
    <div class="dtc-card">
        <h2><i class="fas fa-phone-alt"></i> Contact Information</h2>
        <ul>
            <li><strong>DTC Helpline:</strong> 1800-118-181</li>
            <li><strong>Official Website:</strong> <a href="http://dtc.delhi.gov.in" target="_blank" style="color: #1e3c72;">dtc.delhi.gov.in</a></li>
        </ul>
    </div>

    <!-- Visit Official Website Button -->
    <div class="visit-button">
        <a href="http://dtc.delhi.gov.in" target="_blank">
            <i class="fas fa-external-link-alt"></i> Visit Official Website
        </a>
    </div>
</div>
</body>
</html>