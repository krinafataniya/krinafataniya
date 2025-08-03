<form action="upload.php" method="post" enctype="multipart/form-data">
    <select name="category" required>
        <option value="">Select Category</option>
        <option value="Make Up">Make Up</option>
        <option value="Massage">Massage</option>
        <option value="Facial">Facial</option>
        <option value="Spa">Spa</option>
        <option value="Hair">Hair</option>
        <option value="Nail">Nail</option>
    </select><br><br>

    <input type="file" name="images[]" multiple required><br><br>
    <button type="submit" name="upload">Upload Images</button>
</form>
