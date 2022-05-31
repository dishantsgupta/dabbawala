<?php

session_start();
header('location: Dabbawala.php');

if (isset($_POST['submit'])) {
    include 'connection.php';

    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $date = $_POST['date'];
    $gridRadios = $_POST['gridRadios'];
    $flatnum = $_POST['flatnum'];
    $area = $_POST['area'];
    $city = $_POST['city'];
    $degree = $_POST['degree'];
    date_default_timezone_set("Asia/Kolkata");
    $createdAt = date("Y-m-d h:i:s");
    

    $image = $_FILES['image'];

    $image_filename = $image['name'];
    $image_fileerror = $image['error'];
    $image_filetmp = $image['tmp_name'];

    $imageexplode = explode('.', $image_filename);
    $imagecheck = strtolower(end($imageexplode));

    $image_extension = ['png', 'jpg', 'jpeg'];


    $selectQuery = "select * from delivery_master where email = '$email' && dateofbirth = '$date'";

    $adminQuery = "select admin_email from admin_master";

    $query = mysqli_query($connect, $selectQuery);
    $query1 = mysqli_query($connect, $adminQuery);

    $result = mysqli_fetch_assoc($query);
    $result1 = mysqli_fetch_assoc($query1);

    $createdBy = $result1['admin_email'];

    $num = mysqli_num_rows($query);

    if ($num == 1) {
?>
        <script>
            alert("Duplicate Data");
        </script>
<?php
    } else {

        if (in_array($imagecheck, $image_extension)) {

            $path = "../images/upload/".$image_filename;

            move_uploaded_file($image_filetmp, $path);

            $insertQuery = "insert into delivery_master(dname,age,email,mobile_num,flat_num,dateofbirth,gender,area,city,qualification,passport_image,created_at,created_by,active_inactive) values ('$name','$age','$email','$mobile','$flatnum','$date','$gridRadios','$area','$city','$degree','$path','$createdAt','$createdBy',1);";
            $num1 = mysqli_query($connect, $insertQuery);

            if($num1){
                $_SESSION['status'] = "Registered Successfully";
                $_SESSION['status_code'] = "success";
                $_SESSION['name'] = $name;
            }
            else{
                $_SESSION['status'] = "Not Registered";
                $_SESSION['status_code'] = "error";
                $_SESSION['name'] = $name;
            }
        }
    }

    mysqli_close($connect);
}

?>