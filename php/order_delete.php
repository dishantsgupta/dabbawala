<?php

include 'connection.php';
session_start();
$id = $_GET['id'];
$user_id = $_GET['user_id'];

if (isset($_SESSION['email']) or isset($_SESSION['admin_mail'])) {
    $sql = "delete from order_master where id = '$id'";
    $query = mysqli_query($connect,$sql);
    if($query){
        header('location: receipt.php?id='.$user_id);
    }
}
else{
    header('location: login.php');
}



