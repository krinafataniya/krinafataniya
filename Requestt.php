<?php
include 'db.php';

$uploadMessage = "";
$images = [];

// 🟢 Image Upload Logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $title = $_POST['title'];

    $total = count($_FILES['images']['name']);
    $uploadMessage = "success";

    for ($i = 0; $i < $total; $i++) {
        $imageName = $_FILES['images']['name'][$i];
        $tmpName = $_FILES['images']['tmp_name'][$i];
        $target = "uploads/" . basename($imageName);

        if (move_uploaded_file($tmpName, $target)) {
            $stmt = $conn->prepare("INSERT INTO gallery (category, image_path, title) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $category, $target, $title);
            $stmt->execute();
        } else {
            $uploadMessage = "fail";
        }
    }
}

// 🟡 Fetch Images Based on Category
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'All';

if ($selectedCategory === 'All') {
    $sql = "SELECT * FROM gallery ORDER BY id DESC";
    $result = $conn->query($sql);
} else {
    $stmt = $conn->prepare("SELECT * FROM gallery WHERE category = ? ORDER BY id DESC");
    $stmt->bind_param("s", $selectedCategory);
    $stmt->execute();
    $result = $stmt->get_result();
}

// 🖼️ Store images in array
while ($row = $result->fetch_assoc()) {
    $images[] = $row;
}
?>
