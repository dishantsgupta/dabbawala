<?php

session_start();
header('location: userProfile.php');

include 'connection.php';

mysqli_select_db($connect,"login_dabbawala");

$name = mysqli_real_escape_string($connect,$_POST['name']);
$mobile = mysqli_real_escape_string($connect,$_POST['mobile']);
$altmobile = mysqli_real_escape_string($connect,$_POST['altmobile']);
$gender = mysqli_real_escape_string($connect,$_POST['gender']);
$age = mysqli_real_escape_string($connect,$_POST['age']);
$flatnum = mysqli_real_escape_string($connect,$_POST['flatnum']);
$area = mysqli_real_escape_string($connect,$_POST['area']);
$landmark = mysqli_real_escape_string($connect,$_POST['landmark']);
$city = mysqli_real_escape_string($connect,$_POST['city']);
date_default_timezone_set("Asia/Kolkata");
$updatedAt = date("Y-m-d h:i:s");
$updatedBy = mysqli_real_escape_string($connect,$_POST['name']);


if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}
elseif(isset($_SESSION['admin_mail'])){
    $email = $_SESSION['admin_mail'];
}


$q = "update customer_master set name = '$name', mobile_num = '$mobile', alt_mobile_num = '$altmobile', gender = '$gender', age = '$age', flat_num = '$flatnum', area = '$area', landmark = '$landmark', city = '$city', updated_at = '$updatedAt', updated_by = '$updatedBy' where email = '$email'";

$result = mysqli_query($connect,$q);

if($result){
    $_SESSION['status'] = "Update Successfully";
    $_SESSION['status_code'] = "success";
    $_SESSION['name'] = $name;
}
else{
    $_SESSION['status'] = "Not Update";
    $_SESSION['status_code'] = "error";
    $_SESSION['name'] = $name;
}


