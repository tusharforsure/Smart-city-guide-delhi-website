<?php
session_start();
error_reporting(0);

include('include/config.php');
include('include/header.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Hospitals in Delhi - List of Top Hospitals</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: url(images/hospitals_bg.jpg);
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3 {
            font-weight: 600;
        }

        /* Hospitals List Container */
        .hospitals-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .hospitals-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .hospitals-header h1 {
            font-size: 3rem;
            color: #1e3c72;
            margin-bottom: 10px;
        }

        .hospitals-header p {
            font-size: 1.2rem;
            color: #666;
        }

        .hospitals-list {
            list-style: none;
            padding-left: 0;
        }

        .hospitals-list li {
            font-size: 1.1rem;
            color: #555;
            padding: 15px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .hospitals-list li:last-child {
            border-bottom: none;
        }

        .hospitals-list li i {
            margin-right: 10px;
            color: #007bff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hospitals-header h1 {
                font-size: 2.5rem;
            }

            .hospitals-list li {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<!-- Hospitals Page -->
<div class="hospitals-container">
    <!-- Header -->
    <div class="hospitals-header">
        <h1><i class="fas fa-hospital"></i> Hospitals in Delhi</h1>
        <p>List of Top Hospitals in Delhi</p>
    </div>

    <!-- Hospitals List -->
    <ul class="hospitals-list">
        <li><i class="fas fa-clinic-medical"></i> All India Institute of Medical Sciences (AIIMS)</li>
        <li><i class="fas fa-clinic-medical"></i> Apollo Hospital</li>
        <li><i class="fas fa-clinic-medical"></i> Fortis Hospital</li>
        <li><i class="fas fa-clinic-medical"></i> Max Super Speciality Hospital</li>
        <li><i class="fas fa-clinic-medical"></i> Sir Ganga Ram Hospital</li>
        <li><i class="fas fa-clinic-medical"></i> Indraprastha Apollo Hospital</li>
        <li><i class="fas fa-clinic-medical"></i> Safdarjung Hospital</li>
        <li><i class="fas fa-clinic-medical"></i> Ram Manohar Lohia Hospital</li>
        <li><i class="fas fa-clinic-medical"></i> BLK Super Speciality Hospital</li>
        <li><i class="fas fa-clinic-medical"></i> Medanta - The Medicity</li>
        <li><i class="fas fa-clinic-medical"></i> Lok Nayak Hospital</li>
        <li><i class="fas fa-clinic-medical"></i> Guru Teg Bahadur Hospital</li>
        <li><i class="fas fa-clinic-medical"></i> St. Stephen's Hospital</li>
        <li><i class="fas fa-clinic-medical"></i> Batra Hospital and Medical Research Centre</li>
        <li><i class="fas fa-clinic-medical"></i> Holy Family Hospital</li>
    </ul>
</div>

</body>
</html>