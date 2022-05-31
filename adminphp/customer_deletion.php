<?php

include 'connection.php';
$id = $_GET['id'];

$query = "delete from customer_master where id = '$id'";

$result = mysqli_query($connect,$query);

if($result){
    header('location:Customer.php?id='.$id);
}

?>