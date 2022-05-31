<?php

try{
    include 'connection.php';

    $id = $_GET['id'];
    $active_inactive = $_GET['active_inactive'];
    date_default_timezone_set("Asia/Kolkata");
    $updatedAt = date("Y-m-d h:i:s");

    $adminQuery = "select admin_email from admin_master";
    $query = mysqli_query($connect,$adminQuery);
    $result = mysqli_fetch_assoc($query);
    $updatedBy = $result['admin_email'];

    $query = "update customer_master set active_inactive = '$active_inactive', updated_at = '$updatedAt', updated_by = '$updatedBy' where id = '$id'";

    $result = mysqli_query($connect,$query);

    if($result){
        header('location:customer_view.php?id='.$id);
    }
}
catch(Exception $e) {
    echo 'Message: ' .$e;
  }
