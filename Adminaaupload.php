<form action="upload.php" method="POST" enctype="multipart/form-data">
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

    <input type="submit" value="Upload">
</form>
