<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if (mysqli_connect_errno()) {
    die("not connected". mysqli_connect_error());
}

// else
// {
//     echo"database connected successfully !";
// }

?>