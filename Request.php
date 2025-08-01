<?php
include 'db.php';

if (isset($_POST['upload'])) {
    $category = $_POST['category'];
    $images = $_FILES['images'];

    foreach ($images['tmp_name'] as $key => $tmp_name) {
        $image_name = $images['name'][$key];
        $target = "upload/" . basename($image_name);

        if (move_uploaded_file($tmp_name, $target)) {
            $conn->query("INSERT INTO images (category, image_path) VALUES ('$category', '$target')");
        }
    }

    echo "Images uploaded successfully!";
}
?>
