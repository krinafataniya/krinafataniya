<?php
include "db.php";

// IMAGE UPLOAD
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['images'])) {
    $category = $_POST['category'];
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $image_name = uniqid() . "_" . $_FILES['images']['name'][$key];
        $target_path = "uploads/" . $image_name;

        if (move_uploaded_file($tmp_name, $target_path)) {
            $stmt = $conn->prepare("INSERT INTO gallery (category, image) VALUES (?, ?)");
            $stmt->bind_param("ss", $category, $image_name);
            $stmt->execute();
        }
    }
    echo "Images uploaded successfully.";
}

// FETCH IMAGES
if (isset($_GET['category'])) {
    $cat = $_GET['category'];
    $sql = ($cat == 'All') ? "SELECT * FROM gallery" : "SELECT * FROM gallery WHERE category = ?";
    
    $stmt = $conn->prepare($sql);
    if ($cat != 'All') $stmt->bind_param("s", $cat);
    $stmt->execute();
    $result = $stmt->get_result();

    $images = [];
    while ($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
    echo json_encode($images);
}
?>
