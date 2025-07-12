<?php
session_start();
error_reporting(0);

include('include/config.php');
include('include/header.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>City Services & Facilities - Delhi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url('images/services_bg.jpg') no-repeat center center/cover;
            color: white;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        h1, h2, h3 {
            font-weight: 600;
        }
        .hero-section {
            height: 40vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
           
        }

        .hero-content {
            max-width: 800px;
            padding: 20px;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .hero-content p {
            font-size: 1.5rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
    
        }

        .services-grid .wide {
            grid-column: span 2;
        }

        .service-card {
            background: url('images/card1.jpg') no-repeat center center/cover;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: all 0.3s ease-in-out;
            color: #333; 
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .service-card h2 {
            font-size: 1.8rem;
            color:rgb(71, 83, 46);
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            padding-bottom: 10px;
            border-bottom: 3px solidrgb(2, 3, 3);
            display: inline-block;
        }

        .service-card ul {
            list-style: none;
            padding-left: 0;
        }

        .service-card ul li {
            font-size: 1rem;
            padding: 10px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .service-card ul li strong {
            color:rgb(97, 114, 64);
        }

        .icon {
            font-size: 1.5rem;
            margin-right: 10px;
            color:rgb(71, 83, 46);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .services-grid .wide {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <h1>City Services & Facilities</h1>
        <p class="lead">Essential Information for Residents & Visitors</p>
    </div>
</section>

<!-- Services Grid Layout -->
<div class="services-grid">
    <!-- First Row: 2 Sections -->
    <div class="service-card">
        <h2><i class="fas fa-bus icon"></i> Public Transportation</h2>
        <ul>
        <li><strong>Delhi Metro:</strong> Extensive metro network covering the city. <a href="delhi_metro.php">View more</a></li>
            <li><strong>DTC Buses:</strong> Affordable and widely available. <a href="dtc.php">View more</a></li>
            <li><strong>Taxi Services:</strong> Ola, Uber, and local taxis.<a href="taxi_services.php">View more</a></li></li>
            <li><strong>Bike Rentals:</strong> Yulu and other bike-sharing services.</li>
        </ul>
    </div>

    <div class="service-card">
        <h2><i class="fas fa-hospital icon"></i> Healthcare Facilities</h2>
        <ul>
            <li><strong>Hospitals:</strong> AIIMS, Safdarjung Hospital, Max Healthcare.<a href="hospitals.php">View more</a></li></li>
            <li><strong>Clinics:</strong> Numerous private and government clinics.</li>
            <li><strong>Emergency Numbers:</strong> Ambulance - 102, Police - 100, Fire - 101.</li>
        </ul>
    </div>

    <!-- Second Row: 2 Sections -->
    <div class="service-card">
        <h2><i class="fas fa-book icon"></i> Education & Libraries</h2>
        <ul>
            <li><strong>Schools:</strong> Delhi Public School, Kendriya Vidyalaya.</li>
            <li><strong>Universities:</strong> Delhi University, JNU, IIT Delhi.</li>
            <li><strong>Public Libraries:</strong> Delhi Public Library, British Council Library.</li>
        </ul>
    </div>

    <div class="service-card">
        <h2><i class="fas fa-shield-alt icon"></i> Safety & Emergency Services</h2>
        <ul>
            <li><strong>Police:</strong> Dial 100 for emergencies.</li>
            <li><strong>Fire Department:</strong> Dial 101 for fire emergencies.</li>
            <li><strong>Ambulance:</strong> Dial 102 for medical emergencies.</li>
        </ul>
    </div>

    <!-- Third Row: 1 Centered Section -->
    <div class="service-card wide">
        <h2><i class="fas fa-trash-alt icon"></i> Waste Management & Utilities</h2>
        <ul>
            <li><strong>Water:</strong> Delhi Jal Board - <a href="https://www.delhijalboard.nic.in" target="_blank">Visit Website</a></li>
            <li><strong>Electricity:</strong> BSES and Tata Power - <a href="https://www.bsesdelhi.com" target="_blank">Visit Website</a></li>
            <li><strong>Recycling:</strong> Municipal Corporation of Delhi (MCD) - <a href="https://www.mcdonline.gov.in" target="_blank">Visit Website</a></li>
        </ul>
    </div>
</div>

<?php include('include/footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>