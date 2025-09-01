<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check->num_rows > 0) {
        echo "Email already registered!";
    } else {
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['temp_email'] = $email;
        $_SESSION['temp_name'] = $name;
        $_SESSION['temp_pass'] = $password;

        // Send OTP via email
        $subject = "Your OTP Code - The Subha Artha";
        $message = "Hello $name,\nYour OTP code is: $otp";
        $headers = "From: no-reply@subhaartha.com";

        if (mail($email, $subject, $message, $headers)) {
            header("Location: otp.php");
        } else {
            echo "Failed to send OTP!";
        }
    }
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Sign Up</button>
</form>
