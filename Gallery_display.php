<!DOCTYPE html>
<html>
<head>
    <title>Gallery Display</title>
</head>
<body>

<?php
include("connection.php");
error_reporting(0);

$query = "SELECT * FROM gallery";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total != 0) {
    while ($result = mysqli_fetch_assoc($data)) {
        echo "
        <div style='margin: 10px; display: inline-block;'>
            <img src='" . $result['picsource'] . "' height='400' width='400'>
        </div>
        ";
    }
} else {
    echo "No records found";
}
?>

</body>
</html>
