<?php

include "config.php";

$errInfo = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="book.css">
    <title>Login</title>
</head>
<body>

<h1>List of books</h1>

<label for="" class="error"><?php echo $errInfo; ?></label>
<form action="" method="post">

    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Date</th>
            <th>ISBN no</th>
            <th>Edition</th>
            <th>No of Pages</th>
            <th>Price</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    
    <div>
        <button type="submit" name="editBook">Edit book</button>
    </div>
    



</form>
    
    
</body>
</html>