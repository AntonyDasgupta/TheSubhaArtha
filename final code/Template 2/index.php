<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Welcome <?= $_SESSION['user']; ?> to The Subha Artha</h2>
<a href="logout.php">Logout</a>
