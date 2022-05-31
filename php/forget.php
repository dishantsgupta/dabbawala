<?php

include 'connection.php';

if (isset($_POST['sendEmail'])) {

    $email = mysqli_real_escape_string($connect,$_POST['emailSend']);


    $query = "select * from customer_master where email = '$email' ";

    $num = mysqli_query($connect, $query);

    $result = mysqli_fetch_assoc($num);

    $subject = "Reset Your Password";
    $body = "Dear, " . $result['name'] ." http://localhost/dabbawala/user/php/changePassword.php?id={$result['id']}";
    $headers = "From: dabbawala46@gmail.com";

    if (mail($email, $subject, $body, $headers)) {
        header('location: login.php');
    }
    else{
    }

}
?>