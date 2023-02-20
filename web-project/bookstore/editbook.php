<?php

include "config.php";
include "session.php";

session_start();

// $user_data = check_login($con);

$id = $user_data['id'];

$errUsername = $errPassword = $errInfo = $errName ="";

if($_SERVER['REQUEST_METHOD']== "POST") {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $errUsername = $errPassword = $errInfo = $errName ="";
    $error = 0;
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

    if($error == 0) {
      
        $query = "update books set name='$name', username='$username', password='$password' where id = $id";

        mysqli_query($con, $query);

        header("Location: dash.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<div class="container">
        <h1 class ="my-4">Update</h1>
        <form action="" method="post" class="form-control">

            

            <div class ="my-1">
                <label for="" class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" placeholder="<?php echo $user_data['name']?>" id="txtEmail">
                <span class="error">* <?php echo $errName;?></span>
              
            </div>

            <div class ="my-1">
                <label for="" class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" placeholder="<?php echo $user_data['username']?>" id="txtEmail">
                <span class="error">* <?php echo $errUsername;?></span>
                
            </div>
           

            <div class ="my-1">
                <label for=""> Password:</label>
                <input type="text" name="password" class="form-control" placeholder="<?php echo $user_data['password']?>" id="txtEmail">
                <span class="error">* <?php echo $errPassword;?></span>
                
            </div>
           
            <button type="submit" class="btn btn-primary my-4">Save</button> 
            <a href="./dash.php" class="btn btn-secondary my-4">Cancel</a> 
            

        </form>
        
    </div>

    
</body>
</html>



