<?php

session_start();
include 'connection.php';

mysqli_select_db($connect, "login_dabbawala");

$email = mysqli_real_escape_string($connect, $_POST['email']);
$pass = mysqli_real_escape_string($connect, md5($_POST['password']));


$query = "select * from admin_master where admin_email = '$email' && admin_password = '$pass'";

$result = mysqli_query($connect, $query);

$num = mysqli_num_rows($result);

if ($num == 1) {
    $_SESSION['admin_mail'] = $email;
    header("location: Dashboard.php");
} else {
    $_SESSION['status'] = "Not Registered";
    $_SESSION['status_code'] = "error";
    $_SESSION['name'] = $name;
    header('location: ../index.php');
}
