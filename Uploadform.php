<!-- Show this only to admin -->
<form action="request.php" method="POST" enctype="multipart/form-data">
  <label>Select Category:</label>
  <select name="category" required>
    <option value="Make Up">Make Up</option>
    <option value="Massage">Massage</option>
    <option value="Facial">Facial</option>
    <option value="Spa">Spa</option>
    <option value="Hair">Hair</option>
    <option value="Nail">Nail</option>
  </select>
  <input type="file" name="images[]" multiple required>
  <button type="submit">Upload</button>
</form>
