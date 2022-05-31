<?php
include 'connection.php';

$dis_id = $_GET['id'];
if(isset($_POST['update'])){
    $name = $_POST['district'];
    $sql = "update district set district = '$name' where id = '$dis_id'";
    $query = mysqli_query($connect,$sql);
    if($query){
        header('location: add_fields.php');
    }
}