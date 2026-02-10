<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Capture all the new inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $guests = $_POST['guests'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $notes = $_POST['notes'];
    $status = 'Pending';

    // 2. Prepare the new SQL statement
    $stmt = $conn->prepare("INSERT INTO bookings (customer_name, email, phone, service_type, guests, booking_date, booking_time, notes, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // 3. Bind parameters (s = string, i = integer)
    $stmt->bind_param("ssssissss", $name, $email, $phone, $service, $guests, $date, $time, $notes, $status);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>