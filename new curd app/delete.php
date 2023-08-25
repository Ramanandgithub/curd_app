<?php
include "_connect.php";

$id = $_GET['id'];
$sql = "DELETE FROM `new_curd_table`  WHERE serial = '$id'";
$result = mysqli_query($conn,$sql);
if($result){
    echo "Row deleted successfully";
    header("location: showdata.php");
}

?>