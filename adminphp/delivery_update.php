<?php

include 'connection.php';
session_start();
header('location: Dabbawala.php');

$id = $_SESSION['id'];


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $gridRadios = $_POST['gridRadios'];
    $age = $_POST['age'];
    $flatnum = $_POST['flatnum'];
    $area = $_POST['area'];
    $city = $_POST['city'];
    $degree = $_POST['degree'];
    date_default_timezone_set("Asia/Kolkata");
    $updatedAt = date("Y-m-d h:i:s");

    $image = $_FILES['image'];

    $image_filename = $image['name'];
    $image_fileerror = $image['error'];
    $image_filetmp = $image['tmp_name'];

    $imageexplode = explode('.', $image_filename);
    $imagecheck = strtolower(end($imageexplode));

    $image_extension = ['png', 'jpg', 'jpeg'];

    $adminQuery = "select admin_email from admin_master";
    $query = mysqli_query($connect, $adminQuery);
    $result = mysqli_fetch_assoc($query);

    $updatedBy = $result['admin_email'];

    if (in_array($imagecheck, $image_extension)) {

        $path = "../images/upload/" . $image_filename;

        move_uploaded_file($image_filetmp, $path);

        $q = "update delivery_master set dname = '$name', mobile_num = '$mobile', email = '$email', dateofbirth = '$date', gender = '$gridRadios', age = '$age' , flat_num = '$flatnum', area = '$area', city = '$city', qualification = '$degree' , updated_at = '$updatedAt', updated_by = '$updatedBy' , passport_image = '$path' where id = '$id'";

        $result = mysqli_query($connect, $q);

        if ($result) {
            $_SESSION['status'] = "Update Successfully";
            $_SESSION['status_code'] = "success";
            $_SESSION['name'] = $name;
        } else {
            $_SESSION['status'] = "Not Update";
            $_SESSION['status_code'] = "error";
            $_SESSION['name'] = $name;
        }
    }
}

