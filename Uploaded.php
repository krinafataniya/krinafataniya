<!DOCTYPE html>
<html>
<head>
  <title>Upload Images (Admin)</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    .form-box {
      max-width: 500px;
      padding: 20px;
      background-color: #f9f9f9;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    label, select, input, button {
      display: block;
      width: 100%;
      margin-bottom: 10px;
    }
    button {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px;
      cursor: pointer;
    }
    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<h2>Upload Images (Admin Panel)</h2>

<div class="form-box">
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

    <label>Select Images:</label>
    <input type="file" name="images[]" multiple required>

    <button type="submit">Upload</button>
  </form>
</div>

</body>
</html>
