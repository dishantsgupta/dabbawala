<?php

session_start();
header('location: login.php');

include 'connection.php';


mysqli_select_db($connect,"login_dabbawala");


$name = mysqli_real_escape_string($connect,$_POST['name']);
$mobile = mysqli_real_escape_string($connect,$_POST['mobile']);
$email = mysqli_real_escape_string($connect,$_POST['email']);
$pass = md5(mysqli_real_escape_string($connect,$_POST['password']));
$role = "user";
date_default_timezone_set("Asia/Kolkata");
$createdAt = date("Y-m-d h:i:s");
$createdBy = mysqli_real_escape_string($connect,$_POST['name']);


$q = "select * from customer_master where email = '$email' && password = '$pass'";

$result = mysqli_query($connect,$q);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "duplicate data";
}
else{

    $qy1 = " insert into customer_master(name,mobile_num,email,password,role,active_inactive,created_at,created_by) values ('$name','$mobile','$email','$pass','$role','1','$createdAt','$createdBy') ";
    $num1 = mysqli_query($connect,$qy1);

    if($num1){
        $_SESSION['status'] = "Registered Successfully";
        $_SESSION['status_code'] = "success";
        $_SESSION['name'] = $name;

        $subject = "Welcome to dabbawala";
        $body = "Dear, ".$name." Thanks for register in dabbawala";
        $headers = "From: dabbawala46@gmail.com";

        // if(mail($email,$subject,$body,$headers)){
        //     header('location: login.php');
        // }

    }
    else{
        $_SESSION['status'] = "Not Registered";
        $_SESSION['status_code'] = "error";
        $_SESSION['name'] = $name;
    }
}
mysqli_close($con);
