<!-- 3. Write a server side script for login process assume that your data is already store from previous
question no 2. -->

<?php


session_start();

$dbuser = "root";
$dbpass = "";
$dbname = "projects";
$dbhost = "localhost";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn)
{
    die("Failed to connect!");
}


$errInfo = $errEmail = $errPassword = "";
$error = 0;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $errEmail = "Email is required!";
        $error++;
    }

    if(empty($password)){
        $errPassword = "Password is required!";
        $error++;
    }

    if (isset($_POST['signup'])) {
        header("Location: register.php");
        
    }



    if ($error == 0) {

        $query = "SELECT * from registrations where email = '$email' AND password = '$password'";

        $result = mysqli_query($conn, $query);

        if($result && mysqli_num_rows($result)>0)
        {
            $user_data = mysqli_fetch_assoc($result);


            if($user_data['password'] === $password){
                $_SESSION['id'] = $user_data['id'];
                header("Location: interest.php");
                die;
            }
        }
        else
        {
            $errInfo = "Invalid email or password!";
        }

    }

    




}

?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        .error{
            color: red;
        }
        div {
            margin-bottom: 0.3em;
        }
        </style>
</head>

<body>
    
    <h1>Login</h1>

    
    <label class="error"><?php echo $errInfo; ?></label>
    
    <form action="" method="post">

        
            <label>Email:</label>
            <input type="email" name="email">
            <span class="error"><?php echo $errEmail; ?></span>
            <br><br>

            <label>Password:</label>
            <input type="password" name="password">
            <span class="error"><?php echo $errPassword; ?></span>
            <br><br>
        

        
            <button type="submit" name="login">Login</button>
            <button type="submit" name="signup" >Sign up</button>
            <br><br>
        
        



    </form>

</body>

</html>