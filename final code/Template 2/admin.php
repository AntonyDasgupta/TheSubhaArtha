<?php
session_start();
include("connection.php");

if (!isset($_SESSION['user']) || $_SESSION['email'] != "admin@subhaartha.com") {
    die("Access denied!");
}

$result = $conn->query("SELECT * FROM users");
?>

<h2>Admin Panel - Users List</h2>
<table border="1">
    <tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['role']; ?></td>
        </tr>
    <?php } ?>
</table>
<a href="logout.php">Logout</a>
