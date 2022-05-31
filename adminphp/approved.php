<?php
session_start();
try{
    include 'connection.php';

    $id = $_GET['id'];
    $approved = $_GET['approved'];
    $assign = $_GET['assign'];
    date_default_timezone_set("Asia/Kolkata");
    $updatedAt = date("Y-m-d h:i:s");

    $updatedBy = $_SESSION['admin_mail'];

    $query = "update order_master set assignDabbawala = '$assign', approved = '$approved', updated_at = '$updatedAt', updated_by = '$updatedBy' where id = '$id'";

    $result = mysqli_query($connect,$query);

    if($result){
        header('location:Dashboard.php?id='.$id);
    }
}
catch(Exception $e) {
    echo 'Message: ' .$e;
  }