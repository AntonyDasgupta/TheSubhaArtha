<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h2>Welcome, <?php echo $_SESSION['email']; ?>!</h2>
  <a href="logout.php">Logout</a>
</body>
</html>
