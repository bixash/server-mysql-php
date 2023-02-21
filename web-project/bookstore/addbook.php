<!-- 7. Write a server side script to store books data with following columns
(id,title,publisher,author,edition,no_of_page,price,publish_date,isbn) . -->

<?php

include "config.php";
// session_start();

$errTitle = $errPublisher = $errDate = $errIsbn = $errEdition = $errPages = $errInfo= "";

$error = 0;

if($_SERVER['REQUEST_METHOD']== "POST") {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $date = $_POST['date'];
    $isbn = $_POST['isbn'];
    $edition = $_POST['edition'];
    $pages = $_POST['pages'];
    $price = $_POST['price'];
 

    if (empty($title)) {
        $errTitle = "required!";
        $error++;
    }
        
    if (empty($date)) {
        $errDate = "required!";
        $error++;
    }

    if (empty($publisher)) {
        $errPublisher = "required!";
        $error++;
    }
    
    if (empty($isbn)) {
        $errIsbn = "required!";
        $error++;
    }
    
    if (empty($pages)) {
        $errPages = "required!";
        $error++;
    }
    
    if (empty($edition)) {
        $errEdition = "required!";
        $error++;
    }
    

    if($error == 0) {


        $query = "insert into books(title, author, publisher, date, isbn, edition, pages, price) 
        values ('$title','$author', '$publisher','$date','$isbn','$edition','$pages','$price')";

        mysqli_query($con, $query);

        header("Location: listbook.php");
        die("Book successfully added!");
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
    <link rel="stylesheet" href="book.css">
    
    <title>Addbook</title>
</head>
<body>

    <h1>Enter book details:</h1>

    <label for="" class="error"><?php echo $errInfo; ?></label>
    <form action="" method="post">

        <div>
            <label for="">Title: </label>
            <input type="text" name="title">
            <span class="error">* <?php echo $errTitle; ?></span>
            
        </div>

        <div>
            <label for="">Author: </label>
            <input type="text" name="author">
        </div>

        <div>
            <label for="">Publisher:</label>
            <input type="text" name="publisher">
            <span class="error">* <?php echo $errPublisher; ?></span>
        </div>
        <div>
            <label for="">Published Date: </label>
            <input type="date" name="date">
            <span class="error">* <?php echo $errDate; ?></span>
        </div>
        <div>
            <label for="">ISBN no:</label>
            <input type="text" name="isbn">
            <span class="error">* <?php echo $errIsbn; ?></span>
        </div>
        <div>
            <label for="">Edition no:</label>
            <input type="number" name="edition">
            <span class="error">* <?php echo $errEdition; ?></span>
        </div>
        <div>
            <label for="">No of Pages: </label>
            <input type="number" name="pages">
            <span class="error">* <?php echo $errPages; ?></span>
        </div>
        <div>
            <label for="">Price:</label>
            <input type="number" name="price">
        </div>
    

        <div>
            <button type="submit" name="addBook">Create</button>
        </div>
        
    </form>
        
</body>
</html>