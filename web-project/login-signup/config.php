<?php

$dbuser = "root";
$dbpass = "";
$dbname = "projects";
$dbhost = "localhost";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn)
{
    die("Failed to connect!");
}


?>