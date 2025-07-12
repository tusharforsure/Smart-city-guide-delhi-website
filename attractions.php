<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/header.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Attractions & Landmarks - Smart City Planner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <style>
        body {
            background: url('images/bg2.jpg') no-repeat center center/cover;
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        /* Hero Section */
        .hero-section {
            height: 80vh;
            background: url('images/attractions1.jpg') no-repeat center center/cover;
            position: relative;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
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
            font-size: 4.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            animation: fadeInDown 1s ease-in-out;
        }

        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 1s ease-in-out;
        }

        /* Section Styling */
        .section {
            padding: 60px 20px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
            padding-bottom: 10px;
            border-bottom: 3px solid #007bff;
            display: inline-block;
        }

        .section-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        /* Place Card */
        .place-card {
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.8), rgba(42, 82, 152, 0.8));
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            transition: all 0.3s ease-in-out;
            animation: fadeInUp 1s ease-in-out;
        }

        .place-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(156, 101, 11, 0.5);
        }

        .place-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .place-card-content {
            padding: 20px;
        }

        .place-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #fff;
        }

        .place-card p {
            font-size: 1rem;
            color: #ddd;
            margin-bottom: 15px;
        }

        .place-card a {
            text-decoration: none;
            color: #007bff;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .place-card a:hover {
            color: #0056b3;
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

            .section {
                padding: 30px 15px;
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
        <h1>Attractions & Landmarks</h1>
        <p class="lead">Discover the beauty, culture, and history of Delhi</p>
    </div>
</section>

<!-- Historical Sites Section -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Historical Sites</h2>
        <div class="section-container">

            <div class="place-card">
                <img src="images/redfort.png" alt="Red Fort">
                <div class="place-card-content">
                    <h3>Red Fort</h3>
                    <p>A UNESCO World Heritage Site and a symbol of India's rich history.</p>
                    <a href="redfort.php">Learn More</a>
                </div>
            </div>

            <div class="place-card">
                <img src="images/qutubminar.png" alt="Qutub Minar">
                <div class="place-card-content">
                    <h3>Qutub Minar</h3>
                    <p>The tallest brick minaret in the world.</p>
                    <a href="qutubminar.php">Learn More</a>
                </div>
            </div>

            <div class="place-card">
                <img src="images/humayunstomb.jpg" alt="Humayun’s Tomb">
                <div class="place-card-content">
                    <h3>Humayun’s Tomb</h3>
                    <p>An architectural masterpiece of the Mughal era.</p>
                    <a href="humayunstomb.php">Learn More</a>
                </div>
            </div>

            <div class="place-card">
                <img src="images/indiagate.png" alt="India Gate">
                <div class="place-card-content">
                    <h3>India Gate</h3>
                    <p>A war memorial dedicated to Indian soldiers.</p>
                    <a href="indiagate.php">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Parks & Nature Section -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Parks & Nature</h2>
        <div class="section-container">
            <div class="place-card">
                <img src="images/lodhigardens.jpg" alt="Lodhi Gardens">
                <div class="place-card-content">
                    <h3>Lodhi Gardens</h3>
                    <p>A historical garden featuring tombs and lush greenery.</p>
                    <a href="lodhigardens.php">Learn More</a>
                </div>
            </div>

            <div class="place-card">
                <img src="images/yamuna.jpg" alt="Yamuna Biodiversity Park">
                <div class="place-card-content">
                    <h3>Yamuna Biodiversity Park</h3>
                    <p>Home to diverse flora and fauna along the Yamuna River.</p>
                    <a href="yamunapark.php">Learn More</a>
                </div>
            </div>

            <div class="place-card">
                <img src="images/five_senses.jpg" alt="Garden of Five Senses">
                <div class="place-card-content">
                    <h3>Garden of Five Senses</h3>
                    <p>A sensory treat with flowers, sculptures, and food spots.</p>
                    <a href="five_senses.php">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cultural & Entertainment Venues Section -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Cultural & Entertainment Venues</h2>
        <div class="section-container">
            <div class="place-card">
                <img src="images/national_museum.jpg" alt="National Museum">
                <div class="place-card-content">
                    <h3>National Museum</h3>
                    <p>A treasure trove of India's art and history.</p>
                    <a href="museum.php">Learn More</a>
                </div>
            </div>

            <div class="place-card">
                <img src="images/pragati_maidaan.jpg" alt="Pragati Maidan">
                <div class="place-card-content">
                    <h3>Pragati Maidan</h3>
                    <p>Delhi’s largest exhibition and convention center.</p>
                    <a href="pragati.php">Learn More</a>
                </div>
            </div>

            <div class="place-card">
                <img src="images/kamani.jpg" alt="Kamani Auditorium">
                <div class="place-card-content">
                    <h3>Kamani Auditorium</h3>
                    <p>A premier venue for cultural performances.</p>
                    <a href="kamani.php">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shopping & Markets Section -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Shopping & Markets</h2>
        <div class="section-container">
            <div class="place-card">
                <img src="images/cp.jpg" alt="Connaught Place">
                <div class="place-card-content">
                    <h3>Connaught Place</h3>
                    <p>Delhi’s iconic shopping and business district.</p>
                    <a href="connaught_place.php">Learn More</a>
                </div>
            </div>

            <div class="place-card">
                <img src="images/chandni_chowk.jpg" alt="Chandni Chowk">
                <div class="place-card-content">
                    <h3>Chandni Chowk</h3>
                    <p>A vibrant market offering everything from street food to textiles.</p>
                    <a href="chandni_chowk.php">Learn More</a>
                </div>
            </div>

            <div class="place-card">
                <img src="images/dilli_haat.png" alt="Dilli Haat">
                <div class="place-card-content">
                    <h3>Dilli Haat</h3>
                    <p>A unique market showcasing handicrafts from across India.</p>
                    <a href="dilli_haat.php">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>