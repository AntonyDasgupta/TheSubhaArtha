<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 1. Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match. <a href='signup.html'>Go back</a>");
    }

    // 2. Connect to database
    $conn = new mysqli("localhost", "root", "", "subha_artha");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 3. Hash password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // 4. Insert data
    $sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $fullname, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Signup successful. <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
