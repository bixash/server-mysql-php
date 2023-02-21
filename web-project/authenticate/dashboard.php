<?php
session_start(); // start the session

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // redirect to the login page if the user is not logged in
    exit();
}

$username = $_SESSION['username']; // retrieve the username from the session
?>

<h1>Welcome, <?php echo $username; ?></h1>

<a href="logout.php">Logout</a>