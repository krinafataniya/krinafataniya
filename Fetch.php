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
</head>
<body>

<h2>Our Services</h2>

<?php
if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['name']) . " - ₹" . $row['price'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No services available</p>";
}
?>

</body>
</html>
