<?php
session_start(); // start the session

if (isset($_POST['username']) && isset($_POST['password'])) {
    // validate the username and password here
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // check if the username and password are correct
    if ($username === 'johndoe' && $password === 'password123') {
        $_SESSION['username'] = $username; // store the username in the session
        header('Location: dashboard.php'); // redirect to the dashboard page
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<form method="post" action="login.php">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>

<?php if (isset($error)) { echo $error; } ?>