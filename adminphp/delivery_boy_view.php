<?php

include 'connection.php';
session_start();

if(!isset($_SESSION['admin_mail'])){
    header('location: ../index.php');
}

$id = $_GET['id'];

$selectQuery = "select * from delivery_master where id = '$id'";

$query = mysqli_query($connect, $selectQuery);

$result = mysqli_fetch_assoc($query);

$selectQuery1 = "select * from qualification where id = {$result['qualification']}";
$selectQuery2 = "select * from district where id = {$result['city']}";
$selectQuery3 = "select * from area where id = {$result['area']}";

$query1 = mysqli_query($connect,$selectQuery1);
$query2 = mysqli_query($connect,$selectQuery2);
$query3 = mysqli_query($connect,$selectQuery3);

$result1 = mysqli_fetch_assoc($query1);
$result2 = mysqli_fetch_assoc($query2);
$result3 = mysqli_fetch_assoc($query3);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dabbawala : Delivery Boys View</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/delivery_boy_view.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>


    <div class="container emp-profile">
        <form method="post">
            <div class="row">

                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="<?php echo $result['passport_image']; ?>" alt="" />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?php echo $result['dname']; ?>
                        </h5>
                        <h6>
                            <?php echo $result1['course']; ?>
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
                                    <label>Boy Id</label>
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
                                    <p><?php echo $result['dname']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result['email']; ?></p>
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
                                    <label>Profession</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result1['course']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result['gender']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date of Birth</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result['dateofbirth']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Flat No. / House No.</label>
                                </div>
                                <div class="col-md-6">

                                    <p><?php echo $result['flat_num']; ?></p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Area</label>
                                </div>
                                <div class="col-md-6">

                                    <p><?php echo $result3['area']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>City</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php echo $result2['district']; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date of Joining</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $result['created_at']; ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <?php
                    if($result['active_inactive'] == 1){
                        echo '<a class="btn btn-success ml-5 px-3 py-2 e shadow" href="active_inactive.php?id='.$result['id'].'&active_inactive=0">Active</a>';
                    }
                    else{
                        echo '<a class="btn btn-danger ml-5 px-3 py-2 e shadow" href="active_inactive.php?id='.$result['id'].'&active_inactive=1">In - Active</a>';
                    }
                ?>
            </div>
        </form>
    </div>















    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>