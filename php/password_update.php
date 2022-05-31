<?php

include 'connection.php';
if(!isset($_GET['id'])){
    header('location: login.php');
}
$id = $_GET['id'];
if (isset($_POST['adminSubmit'])) {
    $pass = md5(mysqli_real_escape_string($connect,$_POST['cnfpassword']));
    $sql = "update customer_master set password = '$pass' where id = '$id'";
    $query = mysqli_query($connect,$sql);
    if($query){
        header('location: login.php');
    }
    else{
        echo "fail";
    }
}

?>