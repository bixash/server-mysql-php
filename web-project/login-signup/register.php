<!-- 2. Develop a simple web page that asks the users input for name, email, password, phone, gender,
and faculty and validate, store into database project table registrations. -->
<?php

    include "backend.php"

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
            <select name="faculty">
                <option value="" selected hidden>Select your faculty</option>
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