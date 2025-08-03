<?php include("db.php"); ?>

<!-- Category Filter Buttons -->
<form method="get">
    <button type="submit" name="cat" value="All">All</button>
    <button type="submit" name="cat" value="Make Up">Make Up</button>
    <button type="submit" name="cat" value="Massage">Massage</button>
    <button type="submit" name="cat" value="Facial">Facial</button>
    <button type="submit" name="cat" value="Spa">Spa</button>
    <button type="submit" name="cat" value="Hair">Hair</button>
    <button type="submit" name="cat" value="Nail">Nail</button>
</form>

<br>

<?php
$cat = $_GET['cat'] ?? 'All';

if ($cat == 'All') {
    $query = "SELECT * FROM images";
} else {
    $query = "SELECT * FROM images WHERE category='$cat'";
}

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<img src='" . $row['image_path'] . "' width='200' style='margin:10px;'>";
}
?>
