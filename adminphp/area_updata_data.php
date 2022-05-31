<?php
include 'connection.php';

$dis_id = $_GET['id'];
if(isset($_POST['update'])){
    $name = $_POST['district'];
    $sql = "update area set area = '$name' where id = '$dis_id'";
    $query = mysqli_query($connect,$sql);
    if($query){
        header('location: add_area.php');
    }
}