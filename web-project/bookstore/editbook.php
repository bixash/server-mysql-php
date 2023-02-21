<!-- 9. Write a server side script to modify books data stored form above question no 7. -->

<?php

include "config.php";

$errTitle = $errPublisher = $errDate = $errIsbn = $errEdition = $errPages = $errInfo= "";
$id = $_GET['update_id'];

$query = "SELECT * FROM `books` where id = $id";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);

$title = $row['title'];
$author = $row['author'];
$publisher = $row['publisher'];
$date = $row['date'];
$isbn = $row['isbn'];
$pages = $row['pages'];
$edition = $row['edition'];
$price = $row['price'];


if($_SERVER['REQUEST_METHOD']== "POST") {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $date = $_POST['date'];
    $isbn = $_POST['isbn'];
    $edition = $_POST['edition'];
    $pages = $_POST['pages'];
    $price = $_POST['price'];


    $query = "update books set title='$title', author='$author', publisher= '$publisher', date='$date', isbn='$isbn', edition='$edition', pages='$pages', price='$price' where id = '$id'";

    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: listbook.php");
    } else
        $errInfo = "error occurred!!";
   
        // $errInfo = "Please enter valid info!!";

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="book.css">
    
    <title>Addbook</title>
</head>
<body>

    <h1>Update book details:</h1>

    <label for="" class="error"><?php echo $errInfo; ?></label>
    <form action="" method="post">

        <div>
            <label for="">Title: </label>
            <input type="text" name="title" value="<?php echo $title?>" required >
            <span class="error">* <?php echo $errTitle; ?></span>
            
        </div>

        <div>
            <label for="">Author: </label>
            <input type="text" name="author" value="<?php echo $author?>">
        </div>

        <div>
            <label for="">Publisher:</label>
            <input type="text" name="publisher" value="<?php echo $publisher?>" required>
            <span class="error">* <?php echo $errPublisher; ?></span>
        </div>
        <div>
            <label for="">Published Date: </label>
            <input type="date" name="date" value="<?php echo $date?>" required>
            <span class="error">* <?php echo $errDate; ?></span>
        </div>
        <div>
            <label for="">ISBN no:</label>
            <input type="text" name="isbn" value="<?php echo $isbn?>" required>
            <span class="error">* <?php echo $errIsbn; ?></span>
        </div>
        <div>
            <label for="">Edition no:</label>
            <input type="number" name="edition" value="<?php echo $edition?>" required>
            <span class="error">* <?php echo $errEdition; ?></span>
        </div>
        <div>
            <label for="">No of Pages: </label>
            <input type="number" name="pages" value="<?php echo $pages?>" required>
            <span class="error">* <?php echo $errPages; ?></span>
        </div>
        <div>
            <label for="">Price:</label>
            <input type="number" name="price" value="<?php echo $price?>">
        </div>
    

        <div>
            <button type="submit" name="updateBook">Update</button>
        </div>
        
    </form>
        
</body>
</html>