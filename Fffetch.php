<?php
include('db.php'); // Database connection

// Fetch all services
$result = $conn->query("SELECT * FROM services ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f4f7fa;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }
        .service-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            max-width: 900px;
            margin: auto;
        }
        .service-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 18px rgba(0,0,0,0.15);
        }
        .service-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        .service-price {
            font-size: 16px;
            color: #27ae60;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Our Services</h2>

<div class="service-container">
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='service-card'>";
        echo "<div class='service-name'>" . htmlspecialchars($row['name']) . "</div>";
        echo "<div class='service-price'>₹" . number_format($row['price'], 2) . "</div>";
        echo "</div>";
    }
} else {
    echo "<p style='text-align:center;'>No services available</p>";
}
?>
</div>

</body>
</html>
