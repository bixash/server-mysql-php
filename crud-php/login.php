<?php

session_start();

include "config.php";


$errUsername = $errPassword = $errInfo="";

if($_SERVER['REQUEST_METHOD']== "POST") {

    $errUsername = $errPassword = $errInfo="";
    // $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $error = 0;
    
    if (empty($username)) {
        $errUsername = "Username is required!";
        $error++;
    }
        
    if (empty($password)) {
        $errPassword = "Password is required!";
        $error++;
    }
        

    if($error == 0) {


        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        // mysqli_query($con, $query);
        
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0){

            $user_data = mysqli_fetch_assoc($result);

            if($user_data['password']=== $password){

                $_SESSION['username'] = $user_data['username'];
                header("Location: dash.php");
                die;
            }
        }
        else {
            $errInfo = "Invalid username or password!";
        }
    } 
    else
    $errInfo = "Please enter valid info!!";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1 class ="my-4">Login page</h1>

        <label for="" class="error form-label" id=errInfo><?php echo $errInfo;?></label>
        <form action="" method="post" class="form-control">

            <div class ="my-1">
                <label for="" class="form-label">Username</label>
                <input type="username" name="username" class="form-control" id="txtEmail">
                <span class="error">* <?php echo $errUsername;?></span>
            </div>

            <div class ="my-1">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="txtPassword">
                <span class="error">* <?php echo $errPassword;?></span>
            </div>

            <button type="submit" class="btn btn-primary my-3 me-3">Login</button> 
            <a href="./signup.php"class="btn btn-danger my-4">Sign up</a> 

        </form>
        
        
    </div>

    
</body>
</html>