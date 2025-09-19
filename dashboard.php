<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>

<!-- Include your full dashboard HTML template here -->
<h2>Welcome <?php echo $_SESSION["email"]; ?></h2>
<a href="logout.php">Logout</a>
