<?php
// Turn off error reporting
error_reporting(0);

// Include database connection
include("connection.php");
?>

<html>
<body>

<!-- HTML Form for uploading file -->
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="uploadfile">
    <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>

<?php
// Check if the form was submitted
if (isset($_POST['submit'])) {

    // Get file name and temp path
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];

    // Folder to store uploaded file
    $folder = "gallery/" . $filename;

    // Move file to gallery folder
    move_uploaded_file($tempname, $folder);

    // If file name is not empty
    if ($filename != "") {
        // Insert file path into database
        $query = "INSERT INTO gallery VALUES ('$folder')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            echo "inserted";
        } else {
            echo "failed";
        }
    } else {
        echo "Please select a file!";
    }
}
?>
