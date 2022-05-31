<?php

include 'connection.php';
session_start();
if(!isset($_SESSION['admin_mail'])){
    header('location: ../index.php');
}

$id = $_GET['id'];

$selectQuery = "select * from order_master where id = '$id'";

$query = mysqli_query($connect, $selectQuery);

$result = mysqli_fetch_assoc($query);

$selectQuery1 = "select * from rate_card where id = {$result['package']}";
$selectQuery2 = "select * from district where id = {$result['pcity']}";
$selectQuery3 = "select * from area where id = {$result['parea']}";
$selectQuery4 = "select * from district where id = {$result['dcity']}";
$selectQuery5 = "select * from area where id = {$result['darea']}";

$query1 = mysqli_query($connect,$selectQuery1);
$query2 = mysqli_query($connect,$selectQuery2);
$query3 = mysqli_query($connect,$selectQuery3);
$query4 = mysqli_query($connect,$selectQuery4);
$query5 = mysqli_query($connect,$selectQuery5);

$result1 = mysqli_fetch_assoc($query1);
$result2 = mysqli_fetch_assoc($query2);
$result3 = mysqli_fetch_assoc($query3);
$result4 = mysqli_fetch_assoc($query4);
$result5 = mysqli_fetch_assoc($query5);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dabbawala : Order View</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/delivery_boy_view.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>


    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?php echo $result['name']; ?>
                        </h5>
                        <h6>
                            <?php echo $result1['package_name']; ?>
                        </h6>
                        <ul class="mt-5 nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Basic Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Order Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result['id']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result['name']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Package</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result1['package_name']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result['mobile_num']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tiffin Box</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result['tiffin_quantity']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pickup Flat No.</label>
                                </div>
                                <div class="col-md-6">

                                    <p><?php echo $result['pflat_num']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pickup Area</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result3['area']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pickup Landmark</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result['plandmark']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pickup City</label>
                                </div>
                                <div class="col-md-6">

                                    <p><?php echo $result2['district']; ?></p>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Delivery Flat No. / Company Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php echo $result['dflat_num']; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Delivery Area</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result5['area']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Delivery Landmark</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result['dlandmark']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Delivery City</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result4['district']; ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>















    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>