<?php
session_start();
error_reporting(0);

include('include/config.php');
include('include/header.php');
$place_name = "Dilli Haat"; 
$place_link = "dillihaat.php"; 

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    $check_wishlist_stmt = $conn->prepare("SELECT id FROM wishlist WHERE user_id = ? AND place_name = ?");
    $check_wishlist_stmt->bind_param("is", $user_id, $place_name);
    $check_wishlist_stmt->execute();
    $check_wishlist_stmt->store_result();
    $is_in_wishlist = $check_wishlist_stmt->num_rows > 0;
    $check_wishlist_stmt->close();
} else {
    $is_in_wishlist = false;
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Dilli Haat - Delhi Attraction</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        h1, h2, h3 {
            font-weight: 600;
        }

        .hero-section {
            height: 60vh;
            background: url('images/dilli_haat.png') no-repeat center center/cover;
            position: relative;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-overlay {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5));
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

        .section {
            padding: 60px 30px;
            background: url('images/card1.jpg') no-repeat center center/cover; /* Add your image path here */
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: all 0.3s ease-in-out;
        }

        .section:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .section-title {
            font-size: 2.5rem;
            color: #1e3c72;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
            border-bottom: 3px solid #007bff;
            display: inline-block;
        }

        .section p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }

        .section ul {
            list-style: none;
            padding-left: 0;
        }

        .section ul li {
            font-size: 1.1rem;
            padding: 10px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .section ul li strong {
            color: #1e3c72;
        }

        .map-embed {
            width: 100%;
            height: 500px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .wishlist-form {
            bottom: 20px;
            right: 20px;
            z-index: 3;
        }

        .wishlist-btn {
            padding: 12px 24px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 500;
            border: none;
        }

        .wishlist-btn.btn-primary {
            background: #007bff;
            color: white;
        }

        .wishlist-btn.btn-success {
            background: #28a745;
            color: white;
        }

        .wishlist-btn:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Dilli Haat</h1>
        <p class="lead">A Vibrant Cultural Marketplace</p>

        <div class="wishlist-container">
            <form method="POST" action="toggle_wishlist.php" class="wishlist-form">
                <input type="hidden" name="place_name" value="<?php echo $place_name; ?>">
                <input type="hidden" name="place_link" value="<?php echo $place_link; ?>">
                <?php if ($is_in_wishlist): ?>
                    <button type="submit" class="btn btn-success wishlist-btn">Added to Wishlist</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary wishlist-btn">Add to Wishlist</button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>

<div class="container py-5">

    <div class="section">
        <h2 class="section-title">Overview</h2>
        <p><strong>Dilli Haat</strong> is a vibrant open-air market that showcases India's rich culture, crafts, and cuisine. It’s a perfect blend of traditional art and modern shopping experiences.</p>
    </div>

    <div class="section">
        <h2 class="section-title">Key Features</h2>
        <ul>
            <li><strong>Handicrafts & Textiles:</strong> Authentic items from various states of India.</li>
            <li><strong>Food Stalls:</strong> Taste delicacies from across the country.</li>
            <li><strong>Cultural Performances:</strong> Regular events showcasing Indian traditions.</li>
            <li><strong>Workshops & Exhibitions:</strong> Ideal for learning Indian crafts and arts.</li>
        </ul>
    </div>

    <!-- Map Section -->
    <div class="section">
        <h2 class="section-title">Location</h2>
        <iframe 
            class="map-embed"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14007.098346085237!2d77.19176941752004!3d28.573206977712286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfcf385555555%3A0x8a456f18f1e16b6a!2sDilli%20Haat!5e0!3m2!1sen!2sin!4v1711234567891!5m2!1sen!2sin"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <div class="text-center mt-3">
            <a href="https://maps.app.goo.gl/XpG9x" target="_blank" class="btn btn-primary">View on Google Maps</a>
        </div>
    </div>

</div>
</body>
</html>
