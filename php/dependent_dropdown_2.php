<?php


include 'connection.php';

if ($_POST['type'] == "") {
    $query = "select * from district where isActive = '1'";
    $result = mysqli_query($connect, $query);

    $str = "";

    while ($row = mysqli_fetch_assoc($result)) {
        $str .= "<option value='{$row['id']}'>{$row['district']}</option>";
    }
}
else if($_POST['type'] == "stateData"){
    $query = "select * from area where district_id = {$_POST['id']} && isActive = '1'";
    $result = mysqli_query($connect, $query);

    $str = "";

    while ($row = mysqli_fetch_assoc($result)) {
        $str .= "<option value='{$row['id']}'>{$row['area']}</option>";
    }
}



echo $str;
