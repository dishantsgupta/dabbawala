<?php

include 'connection.php';
$id = $_GET['id'];

$query = "update district set isActive = '0' where id = '$id'";

$result = mysqli_query($connect,$query);

if($result){
    header('location:add_fields.php');
}

?>