<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $date       = $_POST['date'];
    $phone      = $_POST['phone'];
    $message    = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO appointments (first_name, last_name, appointment_date, phone, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $first_name, $last_name, $date, $phone, $message);

    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
