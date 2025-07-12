<?php
session_start();
error_reporting(0);

include('include/config.php');
include('include/header.php');
$place_name = "India Gate"; // Replace with dynamic place name if needed
$place_link = "indiagate.php"; // Replace with dynamic place link if needed

// Check if the user is logged in
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
    $is_in_wishlist = false; // Default to false if user is not logged in
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>India Gate - Delhi Attraction</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Hero Section */
        .hero-section {
            height: 60vh;
            background: url('images/indiagate2.jpg') no-repeat center center/cover;
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

        /* Section Styling */
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

        /* Map Embed */
        .map-embed {
            width: 100%;
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

                /* Wishlist Button Styles */
            .wishlist-form {
                bottom: 20px;
                right: 20px;
                z-index: 3; /* Ensure it's above the overlay */
            }

            .wishlist-btn {
                padding: 12px 24px;
                border-radius: 30px;
                font-size: 1rem;
                font-weight: 500;
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
            .icon {
                margin-right: 8px;
            }
            .wishlist-btn:active {
                transform: scale(0.95);
            }
            /* Responsive Design for Wishlist Button */
            @media (max-width: 768px) {
                .wishlist-form {
                    bottom: 10px;
                    right: 10px;
                }

                .wishlist-btn {
                    padding: 10px 20px;
                    font-size: 0.9rem;
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
        <h1>India Gate</h1>
        <p class="lead">A Monumental War Memorial</p>
        
        <!-- Wishlist Button Container -->
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

    <!-- Overview Section -->
    <div class="section">
        <h2 class="section-title">Overview</h2>
        <p><strong>India Gate</strong> is a prominent war memorial located in New Delhi, built in memory of the Indian soldiers who died in World War I and the Third Anglo-Afghan War.</p>
    </div>

    <!-- History Section -->
    <div class="section">
        <h2 class="section-title">History</h2>
        <p>Completed in 1931, the 42-meter tall structure was designed by Sir Edwin Lutyens. It serves as a symbol of bravery, and the Amar Jawan Jyoti (eternal flame) burns in memory of fallen soldiers.</p>
    </div>

    <!-- Key Features Section -->
    <div class="section">
        <h2 class="section-title">Key Features</h2>
        <ul>
            <li><strong>Height:</strong> 42 meters tall, inspired by the Arc de Triomphe.</li>
            <li><strong>Inscriptions:</strong> Names of over 13,000 soldiers are inscribed on the walls.</li>
            <li><strong>Popular Spot:</strong> Known for evening strolls and cultural events.</li>
        </ul>
    </div>

    <!-- Map Section -->
    <div class="section">
        <h2 class="section-title">Location</h2>
        <iframe 
            class="map-embed"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7001.551697633907!2d77.2167212!3d28.6129126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce2b122f3b83f%3A0x353d759f02aebb06!2sIndia%20Gate!5e0!3m2!1sen!2sin!4v1711197701234!5m2!1sen!2sin"
            allowfullscreen=""
            loading="lazy">
        </iframe>
        <div class="text-center mt-3">
            <a href="https://maps.app.goo.gl/XxxL6BzD18RPPzXcA" target="_blank" class="btn btn-primary">View on Google Maps</a>
        </div>
    </div>

</div>
 
<?php include('include/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>