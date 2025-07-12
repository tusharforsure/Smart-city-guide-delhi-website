<?php
session_start();
error_reporting(0);

include('include/config.php');
include('include/header.php');
$place_name = "Chandni Chowk";
$place_link = "chandni_chowk.php";

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    // Check if the place is already in the wishlist
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
    <title>Chandni Chowk - Delhi Attraction</title>
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
            background: url('images/chandni_chowk.jpg') no-repeat center center/cover;
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
            background: url('images/card1.jpg') no-repeat center center/cover; 
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
            border-bottom: 3px solid #007bff;
            display: inline-block;
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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
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
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Chandni Chowk</h1>
        <p class="lead">A Bustling Market in Old Delhi</p>

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
        <p><strong>Chandni Chowk</strong> is Delhi's oldest and busiest market, brimming with shops, eateries, and vibrant street life. Known for its cultural richness and commercial significance, it offers a delightful blend of tradition and modernity.</p>
    </div>

    <div class="section">
        <h2 class="section-title">History</h2>
        <p>Built in the 17th century by Mughal Emperor Shah Jahan, Chandni Chowk was designed to reflect moonlight in its central canal, earning its name "Moonlit Square." Over time, it evolved into a major commercial hub rich with history and tradition.</p>
    </div>

    <div class="section">
        <h2 class="section-title">Key Features</h2>
        <ul>
            <li><strong>Paranthe Wali Gali:</strong> Famous for its mouth-watering stuffed parathas.</li>
            <li><strong>Kinari Bazaar:</strong> A bustling street for wedding shopping and decorative items.</li>
            <li><strong>Jama Masjid:</strong> One of the largest mosques in India nearby.</li>
            <li><strong>Street Food:</strong> Iconic eateries like Karim's and Natraj Dahi Bhalle.</li>
        </ul>
    </div>

    <div class="section">
        <h2 class="section-title">Visitor Information</h2>
        <ul>
            <li><strong>Timings:</strong> Open daily from 10 AM to 8 PM (Closed on Sundays).</li>
            <li><strong>Entry Fee:</strong> Free entry for all visitors.</li>
            <li><strong>Best Time to Visit:</strong> Early mornings or evenings for a less crowded experience.</li>
        </ul>
    </div>
 <!-- Map Section -->
<div class="section">
    <h2 class="section-title">Location</h2>
    <div style="width: 100%; height: 500px; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
        <iframe 
            class="map-embed"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14005.114578651845!2d77.22133759890288!3d28.651374310467315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd1a88dcc559%3A0x24fa43c081dbe51!2sChandni%20Chowk%2C%20Delhi!5e0!3m2!1sen!2sin!4v1741453694251!5m2!1sen!2sin"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    <div class="text-center mt-3">
        <a href="https://maps.app.goo.gl/XpG9x" target="_blank" class="btn btn-primary">View on Google Maps</a>
    </div>
</div>


</div>
</div>

</body>
</html>
