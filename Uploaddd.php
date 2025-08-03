<?php
include("db.php");

if (isset($_POST['upload'])) {
    $category = $_POST['category'];

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $image_name = $_FILES['images']['name'][$key];
        $image_tmp = $_FILES['images']['tmp_name'][$key];
        $target = "upload/" . basename($image_name);

        if (move_uploaded_file($image_tmp, $target)) {
            $sql = "INSERT INTO images (category, image_path) VALUES ('$category', '$target')";
            mysqli_query($conn, $sql);
        }
    }

    echo "Images uploaded successfully!";
}
?>
