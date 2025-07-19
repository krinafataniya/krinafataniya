/* ✅ index.php (Gallery Frontend for Users) */

<?php
$conn = new mysqli("localhost", "root", "", "your_database");
$result = $conn->query("SELECT * FROM images");
?><!DOCTYPE html><html>
<head>
  <title>Gallery</title>
  <style>
    .filter-btns button {
      margin: 5px;
      padding: 10px;
      cursor: pointer;
    }
    .gallery-item {
      display: inline-block;
      margin: 10px;
      border: 1px solid #ddd;
    }
    .gallery-item img {
      width: 200px;
      height: 150px;
    }
  </style>
  <script>
    function filterGallery(category) {
      let items = document.getElementsByClassName('gallery-item');
      for (let i = 0; i < items.length; i++) {
        let item = items[i];
        if (category === 'All' || item.classList.contains(category)) {
          item.style.display = 'inline-block';
        } else {
          item.style.display = 'none';
        }
      }
    }
  </script>
</head>
<body><h2>OUR WORK</h2>
<div class="filter-btns">
  <button onclick="filterGallery('All')">All</button>
  <button onclick="filterGallery('Makeup')">Make Up</button>
  <button onclick="filterGallery('Hair')">Hair</button>
  <button onclick="filterGallery('Massage')">Massage</button>
  <button onclick="filterGallery('Facial')">Facial</button>
</div><div>
<?php while ($row = $result->fetch_assoc()) { ?>
  <div class="gallery-item <?php echo $row['category']; ?>">
    <img src="uploads/<?php echo $row['image_name']; ?>">
    <p><?php echo $row['title']; ?></p>
  </div>
<?php } ?>
</div></body>
</html>/* ✅ admin/upload.php (Admin Panel to Upload) */

<?php
$conn = new mysqli("localhost", "root", "", "your_database");

if (isset($_POST['submit'])) {
    $image = $_FILES['image']['name'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $tmp = $_FILES['image']['tmp_name'];
    $path = "../uploads/" . $image;

    if (move_uploaded_file($tmp, $path)) {
        $conn->query("INSERT INTO images (image_name, title, category) VALUES ('$image', '$title', '$category')");
        echo "<p style='color:
