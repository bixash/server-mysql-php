<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "projects";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$con)
    die("Fail to connect database!");


$errInfo = $errEmail = $errName = $errGender = $errFaculty = $errPassword = $errPhone = "";
$error = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $faculty = $_POST['faculty'];

    if (empty($name)) {
        $errName = "Name is required!";
        $error++;
    }
    if (empty($email)) {
        $errEmail = "Email is required!";
        $error++;
    }
    if (empty($phone)) {
        $errPhone = "Phone is required!";
        // $error++;
    }
    if (empty($password)) {
        $errPassword = "Password is required!";
        $error++;
    }
    if (empty($faculty)) {
        $errFaculty = "Faculty is required!";
        $error++;
    }
    if ($gender !='male'&& $gender!='female') {
        $errGender = "Gender is required!";
        $error++;
    }

    if($error == 0) {

        $query = "insert into registrations(name, email, password,gender,faculty,phone) values ('$name','$email', '$password', '$gender','$faculty','$phone')";
        mysqli_query($con, $query);
        $errInfo = "Succesfully Registered!!";

        // header("Location: login.php");
        die("Succesfully Registered!!");
    } 
    else
        $errInfo = "Please enter valid info!!";
}
?>