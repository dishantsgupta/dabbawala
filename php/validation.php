<?php
session_start();


include 'connection.php';


mysqli_select_db($connect,"login_dabbawala");


$email = mysqli_real_escape_string($connect,$_POST['email']);
$pass = md5(mysqli_real_escape_string($connect,$_POST['password']));



$q = "select * from customer_master where email = '$email' && password = '$pass' && active_inactive = '1'";

$result = mysqli_query($connect,$q);



$numuser = mysqli_fetch_assoc($result);

$num = mysqli_num_rows($result);


if($num == 1){
    if($numuser['role'] == 'user'){
        $_SESSION['email'] = $email;
        header('location: home_page.php');
    }
    elseif($numuser['role'] == 'superadmin' || $numuser['role'] == 'admin'){
        $_SESSION['admin_mail'] = $email;
        header('location: ../adminphp/Dashboard.php');
    }
    
}
else{
    $_SESSION['status'] = "Incorrect Email or Password";
    $_SESSION['status_code'] = "error";
    $_SESSION['name'] = $name;
    header('location: login.php');
}


mysqli_close($connect);
