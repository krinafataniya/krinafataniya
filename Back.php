<?php
include("db.php");

$cat = $_GET['cat'] ?? 'All';
$query = ($cat == 'All') ? "SELECT * FROM images" : "SELECT * FROM images WHERE category='$cat'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<img src='" . $row['image_path'] . "' width='200' style='margin:10px;'>";
}
?>
