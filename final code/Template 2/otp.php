<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = $_POST['otp'];

    if ($entered_otp == $_SESSION['otp']) {
        $name = $_SESSION['temp_name'];
        $email = $_SESSION['temp_email'];
        $password = $_SESSION['temp_pass'];

        $conn->query("INSERT INTO users (name, email, password) VALUES ('$name','$email','$password')");

        unset($_SESSION['otp']);
        unset($_SESSION['temp_email']);
        unset($_SESSION['temp_name']);
        unset($_SESSION['temp_pass']);

        echo "Registration successful! <a href='login.php'>Login Here</a>";
    } else {
        echo "Invalid OTP!";
    }
}
?>

<form method="POST">
    <input type="text" name="otp" placeholder="Enter OTP" required>
    <button type="submit">Verify OTP</button>
</form>
