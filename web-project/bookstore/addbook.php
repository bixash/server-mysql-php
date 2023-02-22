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
<html lang="en">
<head>
    <link rel="stylesheet" href="book.css">
    <title>Addbook</title>
</head>
<body>

    <h1>Enter book details:</h1>

    <label class="error"><?php echo $errInfo; ?></label>
    
    <form action="" method="post">


        <label>Title: </label>
        <input type="text" name="title">
        <span class="error">* <?php echo $errTitle; ?></span>
    <br><br>

        <label>Author: </label>
        <input type="text" name="author">
    <br><br>


        <label>Publisher:</label>
        <input type="text" name="publisher">
        <span class="error">* <?php echo $errPublisher; ?></span>
    <br><br>

        <label>Published Date: </label>
        <input type="date" name="date">
        <span class="error">* <?php echo $errDate; ?></span>
    <br><br>

        <label>ISBN no:</label>
        <input type="text" name="isbn">
        <span class="error">* <?php echo $errIsbn; ?></span>
    <br><br>

        <label>Edition no:</label>
        <input type="number" name="edition">
        <span class="error">* <?php echo $errEdition; ?></span>
    <br><br>

        <label>No of Pages: </label>
        <input type="number" name="pages">
        <span class="error">* <?php echo $errPages; ?></span>
    <br><br>

        <label>Price:</label>
        <input type="number" name="price">
    <br><br>

        <button type="submit" name="addBook">Create</button>
    <br><br>
        
    </form>
        
</body>
</html>