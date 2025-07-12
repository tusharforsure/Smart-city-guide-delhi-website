<?php
session_start();
include('include/config.php');
include('include/header.php');

// Fetching all event categories
$categories = ["Festivals", "Concerts", "Workshops", "Community Events", "Sports"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Events - City Guide</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('images/events1.jpg') no-repeat center center/cover;
            position: relative;
            color: #fff;
            padding-top: 0px; 
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: -1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }

        /* Heading Styles */
        h2 {
            color: #fff;
            text-align: center;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 50px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        h3 {
            color: #fff;
            font-size: 2rem;
            font-weight: 600;
            margin-top: 50px;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }

        h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 60px;
            height: 4px;
            background: #007bff;
            border-radius: 2px;
        }

        /* Event Card Styling */
        .event-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 30px;
            position: relative;
            padding: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .event-card-content {
            text-align: left;
        }

        .event-card h4 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #007bff;
            margin-bottom: 15px;
        }

        .event-card p {
            font-size: 1rem;
            color: #ddd;
            margin-bottom: 10px;
        }

        /* Event Metadata */
        .event-date {
            color: #ff6f61;
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .event-location {
            color: #bbb;
            font-weight: 500;
            margin-bottom: 15px;
        }

        /* Booking Button */
        .book-now-btn {
            display: block;
            width: 100%;
            background: #007bff;
            color: white;
            text-align: center;
            padding: 5px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .book-now-btn:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        /* Success Message */
        .alert-success {
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            background: rgba(40, 167, 69, 0.9);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h2 {
                font-size: 2.5rem;
            }

            h3 {
                font-size: 1.8rem;
            }

            .event-card-content {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>🔥 Discover Exciting Events Near You!</h2>

    <?php foreach ($categories as $category) : ?>
        <h3><?= $category ?></h3>
        <div class="row">
            <?php
            $result = $conn->query("SELECT * FROM events WHERE category='$category' ORDER BY event_date ASC");
            if ($result->num_rows > 0) :
                while ($event = $result->fetch_assoc()) : ?>
                    <div class="col-md-4">
                        <div class="event-card">
                            <div class="event-card-content">
                                <h4><?= $event['title'] ?></h4>
                                <p class="event-date"><i class="fas fa-calendar-alt"></i> <?= date("M d, Y", strtotime($event['event_date'])) ?></p>
                                <p class="event-location"><i class="fas fa-map-marker-alt"></i> <?= $event['location'] ?></p>
                                <p><?= substr($event['description'], 0, 100) ?>...</p>
                                    <a href="<?php echo isset($_SESSION['user_id']) ? 'booking.php?event_id=' . $event['id'] : 'login.php?redirect=booking.php?event_id=' . $event['id']; ?>" class="book-now-btn">
                                        <i class="fas fa-ticket-alt"></i> Book Now
                                    </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            else :
                echo "<p class='text-muted'>No events found in this category.</p>";
            endif;
            ?>
        </div>
    <?php endforeach; ?>
</div>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        ✅ Booking successful! Your tickets are confirmed. 🎉
    </div>
<?php endif; ?>

<?php include('include/footer.php'); ?>
</body>
</html>