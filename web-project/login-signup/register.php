<!-- 2. Develop a simple web page that asks the users input for name, email, password, phone, gender,
and faculty and validate, store into database project table registrations. -->
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

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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

    <h1>Register</h1>


    <label for="" class="error"><?php echo $errInfo; ?></label>
    <form action="" method="post">

        <div>
            <label for="">Name: </label>
            <input type="text" name="name">
            <span class="error">* <?php echo $errName; ?></span>

        </div>

        <div>
            <label for="">Email:</label>
            <input type="email" name="email">
            <span class="error">* <?php echo $errEmail; ?></span>
        </div>

        <div>
            <label for="">Create Password:</label>
            <input type="password" name="password">
            <span class="error">* <?php echo $errPassword; ?></span>
        </div>
        <div>
            <label for="">Phone:</label>
            <input type="phone" name="phone">
            <!-- <span class="error">* <?php echo $errPhone; ?></span> -->
        </div>

        <div>
            <label for="">Gender:</label>

            <input type="radio" name="gender" value="male" checked>
            <label for="">Male</label>

            <input type="radio" name="gender" value="female">
            <label for="">Female</label>

            <span class="error">* <?php echo $errGender; ?></span>
        </div>

        <div>
            <label for="">Faculty</label>
            <select name="faculty" default="">
                <option value="" selected hidden></option>
                <option value="humanities">Humanities</option>
                <option value="science">Science</option>
                <option value="engineering">Engineering</option>
                
            </select>
            <span class="error">* <?php echo $errFaculty; ?></span>
        </div>

        <div>
            <button type="submit" name="register">Register</button>
        </div>
        



    </form>

</body>

</html>