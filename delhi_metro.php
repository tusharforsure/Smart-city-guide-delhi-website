<?php
session_start();
error_reporting(0);

include('include/config.php');
include('include/header.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Delhi Metro - City Services & Facilities</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: url(images/delhimetro_bg.jpg);
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3 {
            font-weight: 600;
        }

        /* Instagram-Style Layout */
        .metro-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .metro-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .metro-header h1 {
            font-size: 3rem;
            color: rgb(255, 255, 255);
            margin-bottom: 10px;
        }

        .metro-header p {
            font-size: 1.2rem;
            color: rgb(255, 255, 255);
        }

        .metro-card {
        background: url('images/metro_card.jpg') no-repeat center center/cover; 
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        padding: 20px;
        transition: all 0.3s ease-in-out;
        color: white; 
    }

        .metro-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .metro-card h2 {
            font-size: 2rem;
            color: #1e3c72;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .metro-card h2 i {
            margin-right: 10px;
            color: #007bff;
        }

        .metro-card ul {
            color:rgb(10, 22, 89);
            list-style: none;
            padding-left: 0;
        }

        .metro-card ul li {
            color:rgb(40, 17, 114);
            font-size: 1rem;
            padding: 10px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .metro-card ul li strong {
            color: #1e3c72;
        }

        .metro-map {
            background: #e9ecef;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .metro-map img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .metro-map p {
            font-size: 0.9rem;
            color: #666;
            margin-top: 10px;
        }
        .visit-button {
            text-align: center;
            margin-top: 40px;
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

        /* This is for Responsive Design */
        @media (max-width: 768px) {
            .metro-header h1 {
                font-size: 2.5rem;
            }

            .metro-card h2 {
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

<div class="metro-container">
    <div class="metro-header">
        <h1><i class="fas fa-subway"></i> Delhi Metro</h1>
        <p>Your Gateway to Seamless Travel in Delhi</p>
    </div>

    <!-- Metro Lines Section -->
    <div class="metro-card">
        <h2><i class="fas fa-train"></i> Metro Lines</h2>
        <ul>
            <li><strong>Red Line:</strong> Dilshad Garden to Rithala</li>
            <li><strong>Yellow Line:</strong> Samaypur Badli to HUDA City Centre</li>
            <li><strong>Blue Line:</strong> Dwarka Sector 21 to Noida Electronic City / Vaishali</li>
            <li><strong>Green Line:</strong> Inderlok / Kirti Nagar to Brigadier Hoshiyar Singh</li>
            <li><strong>Violet Line:</strong> Kashmere Gate to Raja Nahar Singh</li>
            <li><strong>Pink Line:</strong> Majlis Park to Shiv Vihar</li>
            <li><strong>Magenta Line:</strong> Janakpuri West to Botanical Garden</li>
            <li><strong>Grey Line:</strong> Dwarka to Najafgarh</li>
            <li><strong>Airport Express Line:</strong> New Delhi to Dwarka Sector 21</li>
        </ul>
    </div>

    <!-- Metro Facilities Section -->
    <div class="metro-card">
        <h2><i class="fas fa-concierge-bell"></i> Facilities</h2>
        <ul>
            <li><strong>Smart Cards:</strong> Rechargeable cards for seamless travel.</li>
            <li><strong>Token System:</strong> Single journey tokens available.</li>
            <li><strong>Wi-Fi:</strong> Free Wi-Fi at all stations.</li>
            <li><strong>Parking:</strong> Ample parking space at major stations.</li>
            <li><strong>Feeder Buses:</strong> Last-mile connectivity with DTC feeder buses.</li>
            <li><strong>Accessibility:</strong> Elevators and ramps for differently-abled passengers.</li>
        </ul>
    </div>

    <div class="metro-map">
        <h2><i class="fas fa-map"></i> Delhi Metro Map</h2>
        <p>Zoom in to explore the Delhi Metro network.</p>
        <img src="images/delhimetromap.png" alt="Delhi Metro Map">
    </div>

    <div class="visit-button">
        <a href="https://www.delhimetrorail.com" target="_blank">
            <i class="fas fa-external-link-alt"></i> Visit Official Website
        </a>
    </div>
</div>
</body>
</html>