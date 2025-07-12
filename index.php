<?php
session_start();

include('include/config.php');
include('include/header.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Discover Delhi - Your Ultimate City Guide</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('images/bg2.jpg') no-repeat center center/cover;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Hero Section */
        .hero-section {
            height: 100vh;
            background: url('images/delhi.png') no-repeat center center/cover;
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

        /* Featured Section */
        .featured-section {
            background: url('images/index_bg.jpg') no-repeat center center/cover;
            padding: 80px 0;
        }

        .featured-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 50px;
            text-align: center;
            color:rgb(255, 255, 255);
        }

        .feature-box {
            text-align: center;
            padding: 40px 20px;
            background: url('images/card2.jpg') no-repeat center center/cover; 
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            margin-bottom: 30px;
        }

        .feature-box i {
            font-size: 3rem;
            margin-bottom: 20px;
            color:rgb(101, 28, 17);
        }

        .feature-box h4 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color:rgb(101, 28, 17);
        }

        .feature-box p {
            font-size: 1rem;
            color:rgb(101, 28, 17);
            margin-bottom: 20px;
        }

        .feature-box a {
            color:rgb(101, 28, 17);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .feature-box a:hover {
            color:rgb(101, 28, 17);
        }

        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgb(134, 13, 13);
        }

        /* Footer */
        .footer {
            background: #1e3c72;
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        .footer p {
            margin: 0;
            font-size: 1rem;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Discover Delhi – Your Ultimate City Guide</h1>
        <p>Explore attractions, services, events & emergency contacts at your fingertips.</p>
        
    </div>
</section>

<!-- Featured Sections -->
<section class="featured-section">
    <div class="container">
        <h2>Explore Our City</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Top Attractions</h4>
                    <p>Explore famous landmarks and tourist spots around Delhi.</p>
                    <a href="top-attractions.php">Explore Top Attractions</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-city"></i>
                    <h4>City Services</h4>
                    <p>Find essential services like utilities, transport, and more.</p>
                    <a href="services.php">Explore</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-calendar-alt"></i>
                    <h4>Upcoming Events</h4>
                    <p>Stay updated with festivals, concerts, and events happening in the city.</p>
                    <a href="events.php">Explore</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-phone-alt"></i>
                    <h4>Emergency Contacts</h4>
                    <p>Quick access to police, hospitals, and helplines in emergencies.</p>
                    <a href="emergency.php">Explore</a>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<?php
include('include/footer.php');
?>