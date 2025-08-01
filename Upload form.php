<!DOCTYPE html>
<html>
<head>
    <title>Admin - Upload Images</title>
</head>
<body>

<h2>Upload Multiple Images by Category</h2>

<form action="request.php" method="POST" enctype="multipart/form-data">
    <label>Select Category:</label>
    <select name="category" required>
        <option value="Make Up">Make Up</option>
        <option value="Massage">Massage</option>
        <option value="Facial">Facial</option>
        <option value="Spa">Spa</option>
        <option value="Hair">Hair</option>
        <option value="Nail">Nail</option>
    </select><br><br>

    <label>Select Images:</label>
    <input type="file" name="images[]" multiple required><br><br>

    <button type="submit" name="upload">Upload</button>
</form>

</body>
</html>
