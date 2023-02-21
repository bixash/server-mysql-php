<!-- 10. Write a server side script to remove books data stored form above question no 7. -->
<?php 

include "config.php";

if(isset($_GET['delete_id'])){

    $id = $_GET['delete_id'];
    $query = "delete from books where id ='$id'";

    $result = mysqli_query($con, $query);
    if($result){
        header("Location: listbook.php");
    }else {
        die ("Connection Failed");
    }
}


?>