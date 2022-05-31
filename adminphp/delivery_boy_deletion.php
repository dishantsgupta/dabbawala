<?php

include 'connection.php';
$id = $_GET['id'];

$query = "delete from delivery_master where id = '$id'";

$result = mysqli_query($connect,$query);

if($result){
    header('location:Dabbawala.php?id='.$id);
}

?>