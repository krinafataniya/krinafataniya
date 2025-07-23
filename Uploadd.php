<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "beauty_salon");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uploadDir = 'images/';
$category = $_POST['category'];

foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
    $fileName = $_FILES['images']['name'][$key];
    $tmpFile = $_FILES['images']['tmp_name'][$key];
    $filePath = $uploadDir . basename($fileName);

    if (move_uploaded_file($tmpFile, $filePath)) {
        $title = pathinfo($fileName, PATHINFO_FILENAME);
        $stmt = $conn->prepare("INSERT INTO gallery (image, title, category) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fileName, $title, $category);
        $stmt->execute();
    }
}

$conn->close();
echo "Images uploaded successfully.";
?>
