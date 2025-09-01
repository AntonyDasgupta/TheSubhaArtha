<?php
$host = "localhost";              // Usually stays as localhost
$user = "u197762167_login_Info";    // Replace with your MySQL username from Hostinger
$pass = "Gulluantony@123";    // Replace with your MySQL password from Hostinger
$db   = "u197762167_login_Info";  // Your database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>

