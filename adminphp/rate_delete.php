<?php

include 'connection.php';
$id = $_GET['id'];

$query = "update rate_card set isActive = '0' where id = '$id'";

$result = mysqli_query($connect,$query);

if($result){
    header('location:add_rate_card.php');
}

?>