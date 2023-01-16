<!-- 1. Write a server side script to create simple web form to take input of principle, rate and interest
and calculate simple and compound interest based on the button click. -->

<?php


include "config.php";
session_start();


$result = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $time = $_POST['time'];
    $principal = $_POST['principal'];
    $rate = $_POST['rate'];


    if (isset($_POST['simple'])) {

        $result = $time * $principal * $rate / 100;
    }

    if (isset($_POST['compound'])) {

        $base = $principal*(1 + $rate / 100);
        $result = pow($base, $time) - $principal;
        
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interest</title>
    <style>
        .error{
            color: red;
        }
        div {
            margin-bottom: 0.3em;
        }
        label {
            display: inline-block;
            width: 60px;
        }
    </style>
</head>

<body>

    <h1>Calulate Interest</h1>

    <form action="" method="post">

        <div>
            <label for="">Principal:</label>
            <input type="number" name="principal">
        </div>
        <div>
            <label for="">Rate:</label>
            <input type="number" name="rate">

        </div>
        <div>
            <label for="">Time:</label>
            <input type="number" name="time">

        </div>

        <div>
            <label for="">Interest:</label>
            <label for=""><?php echo $result ?></label>
        </div>

        <button type="submit" name="simple">Simple Interest</button>
        <button type="submit" name="compound">Compound Interest</button>



    </form>

</body>

</html>