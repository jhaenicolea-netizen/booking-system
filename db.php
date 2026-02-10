<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // Default for Codespaces
$db = 'booking_db';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>