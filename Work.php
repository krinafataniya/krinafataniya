<?php
$conn = new mysqli("localhost", "root", "", "beauty_salon");
if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");
$services = [];
while ($row = $result->fetch_assoc()) {
    $services[] = $row;
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Our Work</title>
    <style>
        .filter-buttons button { padding: 10px; margin: 4px; }
        .item { display: none; width: 250px; margin: 10px; }
        .gallery { display: flex; flex-wrap: wrap; justify-content: center; }
        img { width: 100%; border-radius: 8px; }
    </style>
</head>
<body>

<h2 style="text-align:center;">OUR WORK</h2>

<div class="filter-buttons" style="text-align:center;">
    <button onclick="filter('All')">All</button>
    <button onclick="filter('Make Up')">Make Up</button>
    <button onclick="filter('Massage')">Massage</button>
    <button onclick="filter('Facial')">Facial</button>
    <button onclick="filter('Spa')">Spa</button>
    <button onclick="filter('Hair')">Hair</button>
    <button onclick="filter('Nail')">Nail</button>
</div>

<div class="gallery">
    <?php foreach ($services as $service): ?>
        <div class="item" data-category="<?= htmlspecialchars($service['category']); ?>">
            <img src="images/<?= htmlspecialchars($service['image']); ?>" alt="<?= htmlspecialchars($service['title']); ?>">
            <p style="text-align:center;"><?= htmlspecialchars($service['title']); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<script>
function filter(category) {
    let items = document.querySelectorAll('.item');
    items.forEach(item => {
        if (category === 'All' || item.dataset.category === category) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}
filter('All');
</script>

</body>
</html>
