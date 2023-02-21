<!-- 8. Write a server side script to retrieve books data stored form above question no 7. -->


<?php

include "config.php";

$errInfo = "";

if($_SERVER['REQUEST_METHOD']=="POST") {
    if(isset($_POST['editbook'])) {
        header("Location: editbook.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./book.css">
    <style>
        table {
            border-collapse: collapse;
            border: 2px solid #CCCCCC;
        }
        tr,td,th {
            border: 1px solid #CCCCCC;
            padding: 0.2em;
        }
    </style>
    <title>Login</title>
</head>

<body>

    <h1>List of books</h1>

    <label for="" class="error"><?php echo $errInfo; ?></label>
    <form action="" method="post">

        <table>
            <thead>
                <tr>
                    <!-- <th>Id</th> -->
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Date</th>
                    <th>ISBN no</th>
                    <th>Edition</th>
                    <th>No of Pages</th>
                    <th>Price</th>
                    <!-- <th>Operations</th> -->
                </tr>
            </thead>

            <tbody>

                <?php
                $query = "SELECT * FROM `books` ORDER BY `id` ASC";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $author = $row['author'];
                        $publisher = $row['publisher'];
                        $date = $row['date'];
                        $isbn = $row['isbn'];
                        $edition = $row['edition'];
                        $pages = $row['pages'];
                        $price = $row['price'];
                        // <td>' . $id . '</td>
                        echo ' <tr>

                                
                                <td>' . $title . '</td>
                                <td>' . $author . '</td>
                                <td>' . $publisher . '</td>
                                <td>' . $date . '</td>
                                <td>' . $isbn . '</td>
                                <td>' . $edition . '</td>
                                <td>' . $pages . '</td>
                                <td>' . $price . '</td>
                                <td><button><a href="editbook.php?update_id='.$id.'"> Update </a></button></td>
                                <td><button><a href="delbook.php?delete_id='.$id.'"> Delete </a></button></td>
                                                                  
                            <tr>';
                    }
                } else {
                    $errInfo = "No Record Found!";
                }
                ?>
            </tbody>
            <div>
                <button><a href="addbook.php">New book</a></button>
            </div>
            

        </table>


    </form>


</body>

</html>