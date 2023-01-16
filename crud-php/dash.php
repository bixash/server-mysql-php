<?php

include "config.php";
include "session.php";

session_start();

// $_SESSION;
$user_data = check_login($con); 

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
        <h1 class ="my-4">Dashboard</h1>
        <form action="" method="post" class="form-control">

            

            <div class ="my-1">
                <label for="" class="form-label">Name:</label>
                <label for="" class="form-label"><?php echo $user_data['name']?></label>
              
            </div>

            <div class ="my-1">
                <label for="" class="form-label">Username:</label>
                <label for="" class="form-label"><?php echo $user_data['username']?></label>
                
                
            </div>
           

            <div class ="my-1">
                <label for=""> Password:</label>
                <label for=""><?php echo $user_data['password']?></label>
                
            </div>
           
            <a href="./update.php" class="btn btn-primary my-4">Edit</a> 
            <a href="./logout.php" class="btn btn-danger my-4">Logout</a> 
            

        </form>
        
        
    </div>

    
</body>
</html>