<?php

include "config.php";
// session_start();

$errUsername = $errPassword = $errInfo = $errName =  $errRePassword = "";
$error = 0;

if($_SERVER['REQUEST_METHOD']== "POST") {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    
   
    // $errUsername = $errName = $errPassword = "";

    if (empty($name)) {
        $errName = "Name is required!";
        $error++;
    }
        
    if (empty($username)) {
        $errUsername = "Username is required!";
        $error++;
    }

    if (empty($password)) {
        $errPassword = "Password is required!";
        $error++;
    }
    if( $password != $re_password){
        $errRePassword = "Password doesn't match!";
        $error++;
    }

    if($error == 0) {


        $query = "insert into users(name, username, password) values ('$name','$username', '$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    
    <title>Sign up</title>
</head>
<body>

    <div class="container">
        <h1 class ="my-4">Sign up</h1>
        <label for="" class="error form-label" id=errInfo><?php echo $errInfo;?></label>
        <form action="" method="post" class="form-control">

            <div class ="my-1">
                <label for="" class="form-label">Name</label>
                <input type="name" name="name" class="form-control" id="txtName">
                <span class="error">* <?php echo $errName;?></span>
            </div>
            <div class ="my-1">
                <label for="" class="form-label">Username or Email</label>
                <input type="username" name="username" class="form-control" id="txtEmail">
                <span class="error">* <?php echo $errUsername;?></span>
            </div>
           

            <div class ="my-1">
                <label for="">Create Password</label>
                <input type="password" name="password" class="form-control" id="txtPassword">
                <span class="error">* <?php echo $errPassword;?></span>
            </div>
            <div class ="my-1">
                <label for="">Confirm Password</label>
                <input type="password" name="re_password" class="form-control" id="txtPassword">
                <span class="error">* <?php echo $errRePassword;?></span>
            </div>
            
            
            <button type="submit" class="btn btn-primary my-3 me-3">Create</button> 
            <a type="reset" href="./login.php" class="btn btn-danger my-4">Cancel</a>
            

        </form>
        
        
    </div>