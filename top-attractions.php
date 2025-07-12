<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/header.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Top Attractions in Delhi - Smart City Planner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .hero-section {
            height: 50vh;
            background: url('images/attractions-bg.jpg') no-repeat center center/cover;
            position: relative;
            color: white;
            text-align: center;
        }
        .hero-overlay { background: rgba(0, 0, 0, 0.6); position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
        .hero-content { position: relative; top: 50%; transform: translateY(-50%); z-index: 2; }
        .hero-content h1 { font-size: 4rem; font-weight: bold; }
        .section-title { font-size: 2.5rem; color: #007bff; border-bottom: 3px solid #007bff; margin-bottom: 20px; }
        .attraction-card { border-radius: 10px; overflow: hidden; transition: 0.3s; }
        .attraction-card img { width: 100%; height: 200px; object-fit: cover; }
        .attraction-card:hover { transform: translateY(-5px); box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15); }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Top Attractions</h1>
        <p>Explore the best tourist spots in Delhi</p>
    </div>
</section>

<div class="container py-5">
    <h2 class="section-title text-center">Top Attractions</h2>
    <div class="row gy-4">
        <?php
        $attractions = [
            ["Red Fort", "images/redfort.png", "A symbol of Mughal grandeur."],
            ["Qutub Minar", "images/qutubminar.png", "A UNESCO heritage site."],
            ["National Museum", "images/national_museum.jpg", "Architectural marvel and spiritual space."]
        ];
        foreach ($attractions as $attraction) {
            echo "<div class='col-md-4'>
                    <div class='attraction-card'>
                        <img src='{$attraction[1]}' alt='{$attraction[0]}'>
                        <div class='p-3'>
                            <h5>{$attraction[0]}</h5>
                            <p>{$attraction[2]}</p>
                        </div>
                    </div>
                  </div>";
        }
        ?>
    </div>
</div>

<?php include('include/footer.php'); ?>

</body>
</html>
