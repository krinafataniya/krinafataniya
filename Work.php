<?php include 'request.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Our Work Gallery</title>
    <style>
        .tabs a { margin: 5px; text-decoration: none; padding: 6px 12px; border: 1px solid #ccc; }
        .gallery img { width: 150px; height: auto; margin: 10px; border-radius: 10px; }
    </style>
</head>
<body>

<h2>🖼️ Our Work Gallery</h2>

<!-- 🔘 Category Tabs -->
<div class="tabs">
    <?php
    $categories = ['All', 'Make Up', 'Massage', 'Facial', 'Spa', 'Hair', 'Nail'];
    foreach ($categories as $cat) {
        $active = ($cat === $selectedCategory) ? 'style="background:#ccc;"' : '';
        echo "<a href='?category=$cat' $active>$cat</a>";
    }
    ?>
</div>

<hr>

<!-- 📤 Upload Form -->
<h3>Upload Images to: <?= htmlspecialchars($selectedCategory) ?> Category</h3>
<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="category" value="<?= htmlspecialchars($selectedCategory) ?>">
    <input type="text" name="title" placeholder="Image Title" required>
    <input type="file" name="images[]" multiple required>
    <button type="submit">Upload</button>
</form>

<!-- ✅ Upload Message -->
<?php if ($uploadMessage == 'success'): ?>
    <p style="color:green;">✅ Image(s) uploaded successfully!</p>
<?php elseif ($uploadMessage == 'fail'): ?>
    <p style="color:red;">❌ Image upload failed!</p>
<?php endif; ?>

<hr>

<!-- 🖼️ Display Images -->
<div class="gallery">
    <?php foreach ($images as $img): ?>
        <div>
            <img src="<?= $img['image_path'] ?>" alt="<?= $img['title'] ?>">
            <p><?= htmlspecialchars($img['title']) ?></p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
