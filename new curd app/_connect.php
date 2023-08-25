<?php

$server= "localhost";
$username  = "root";
$pass = "";
$dbname = "new_curd_app";

$conn = mysqli_connect($server,$username,$pass,$dbname);

if(!$conn){
    echo mysqli_connect_error($conn);
}

?>