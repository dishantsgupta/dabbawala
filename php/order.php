<?php

session_start();
include 'connection.php';
header('location: home_page.php');
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}
elseif(isset($_SESSION['admin_mail'])){
    $email = $_SESSION['admin_mail'];
}

$q = "select * from customer_master where email = '$email'";
$result = mysqli_query($connect, $q);
$num = mysqli_fetch_assoc($result);


mysqli_select_db($connect, "login_dabbawala");

if (isset($_POST['order'])) {

    $customID = $num['id'];
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $mobile = mysqli_real_escape_string($connect, $_POST['mobile']);
    $package = mysqli_real_escape_string($connect, $_POST['package']);
    $quantity = mysqli_real_escape_string($connect, $_POST['quantity']);
    $datatime = mysqli_real_escape_string($connect, $_POST['datetime']);
    $time = mysqli_real_escape_string($connect, $_POST['time']);
    $pflatnum = mysqli_real_escape_string($connect, $_POST['pflatnum']);
    $parea = mysqli_real_escape_string($connect, $_POST['parea']);
    $plandmark = mysqli_real_escape_string($connect, $_POST['plandmark']);
    $pcity = mysqli_real_escape_string($connect, $_POST['pcity']);
    $dflatnum = mysqli_real_escape_string($connect, $_POST['dflatnum']);
    $darea = mysqli_real_escape_string($connect, $_POST['darea']);
    $dlandmark = mysqli_real_escape_string($connect, $_POST['dlandmark']);
    $dcity = mysqli_real_escape_string($connect, $_POST['dcity']);
    date_default_timezone_set("Asia/Kolkata");
    $createdAt = date("Y-m-d H:i:s");
    $createdBy = mysqli_real_escape_string($connect, $_POST['name']);

    $insertData = "INSERT INTO order_master (customer_id,name, pflat_num, parea, plandmark, pcity, dflat_num, darea, dlandmark, dcity, package, tiffin_quantity, pickup_date,pickup_time, mobile_num,created_at,created_by) VALUES ('$customID','$name', '$pflatnum', '$parea', '$plandmark', '$pcity','$dflatnum', '$darea', '$dlandmark', '$dcity', '$package', '$quantity', '$datatime','$time', '$mobile','$createdAt','$createdBy')";

    $result = mysqli_query($connect, $insertData);

    if ($result) {
        $_SESSION['status'] = "Ordered Successfully";
        $_SESSION['status_code'] = "success";
        $_SESSION['name'] = $name;
    } else {
        $_SESSION['status'] = "Failed";
        $_SESSION['status_code'] = "error";
        $_SESSION['name'] = $name;
    }
}

mysqli_close($connect);
