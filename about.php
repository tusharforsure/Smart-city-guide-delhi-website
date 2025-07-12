<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/header.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>About Delhi - Smart City Planner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('images/bg3.jpg') no-repeat center center/cover;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        
            color: #333;
        }

        /* Hero Section */
        .hero-section {
            height: 60vh;
            background: url('images/about_img1.jpg') no-repeat center center/cover;
            position: relative;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-overlay {
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 20px;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        /* Section Title */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #1e3c72;
            border-bottom: 3px solid #1e3c72;
            display: inline-block;
            padding-bottom: 10px;
        }

        /* About Section */
        .about-section {
            padding: 80px 0;
        }

        .info-box {
            background: url('images/card2.jpg') no-repeat center center/cover; 
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            transition: all 0.3s ease-in-out;
        }

        .info-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .info-box p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }

        .info-box ul {
            list-style: none;
            padding: 0;
        }

        .info-box ul li {
            margin-bottom: 15px;
            font-size: 1.1rem;
            color: #555;
        }

        .info-box ul li strong {
            color: #1e3c72;
        }

        /* Map Embed */
        .map-embed {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 15px;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 3rem;
            }

            .hero-content p {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .info-box {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>About Delhi</h1>
        <p class="lead">A Modern Metropolis with Ancient Roots</p>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <!-- Introduction Section -->
        <div class="info-box">
            <h2 class="section-title">Welcome to Delhi</h2>
            <p>
                <strong>Delhi</strong>, the capital city of India, is a vibrant blend of history, culture, and modernity. Known for its rich heritage, bustling markets, and mouth-watering cuisine, Delhi is one of the oldest cities in the world.
            </p>
        </div>

        <!-- History Section -->
        <div class="info-box">
            <h2 class="section-title">Historical Overview</h2>
            <p>
                Delhi’s history dates back to the 6th century BC, serving as the seat of power for many dynasties including the Mauryas, Mughals, and British. The establishment of the Delhi Sultanate in 1206 and the flourishing Mughal rule have left indelible marks on the city's culture, architecture, and spirit.
            </p>
        </div>

        <!-- Geography & Map Section -->
        <div class="info-box">
            <h2 class="section-title">Geographical Location & Map</h2>
            <p>
                Located in northern India, Delhi spans approximately 1,484 square kilometers, sharing borders with Haryana and Uttar Pradesh.
            </p>
            <iframe 
                class="map-embed"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d448181.01167915485!2d76.81306367745354!3d28.647279935785154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1cb1d2c535b3%3A0x421bb6d3cfb92c79!2sDelhi!5e0!3m2!1sen!2sin!4v1711137418794!5m2!1sen!2sin"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>

        <!-- Climate Section -->
        <div class="info-box">
            <h2 class="section-title">Climate & Weather</h2>
            <p>
                Delhi experiences an extreme climate, with hot summers (April to June), monsoon rains (July to September), and chilly winters (December to February). Temperatures can range from 5°C in winter to 45°C during summer months.
            </p>
        </div>

        <!-- Key Facts Section -->
        <div class="info-box">
            <h2 class="section-title">Key Facts About Delhi</h2>
            <ul>
                <li><strong>Population:</strong> Approximately 32 million (2025 estimate)</li>
                <li><strong>Languages:</strong> Hindi, English, Punjabi, Urdu</li>
                <li><strong>Cultural Highlights:</strong> A vibrant mix of Mughal, British, and modern Indian influences</li>
                <li><strong>Famous Landmarks:</strong> Red Fort, India Gate, Qutub Minar, Lotus Temple</li>
                <li><strong>Economic Significance:</strong> Home to government offices, global corporations, and tech hubs</li>
            </ul>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>