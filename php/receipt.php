<?php

include 'connection.php';
session_start();
$id = $_GET['id'];
if (isset($_SESSION['email']) or isset($_SESSION['admin_mail'])) {

    $selectQuery = "select * from order_master where customer_id = '$id' order by id desc";
    $query = mysqli_query($connect, $selectQuery);
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dabbawala : Customer Receipt</title>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600&family=Send+Flowers&family=Titillium+Web:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    </head>

    <body>

        <div class="text-left ml-2 position-fixed"><a href="home_page.php" class="btn btn-info border shadow"><i class="uil uil-arrow-left"></i> Back</a></div>

        <div class="container">



            <?php

            while ($result = mysqli_fetch_assoc($query)) {

                 

                $address2 = "select district from district where id = {$result['dcity']}";
                $address3 = "select package_name from rate_card where id = {$result['package']}";
                $address4 = "select area from area where id = {$result['darea']}";
                $address5 = "select time from timing where id = {$result['pickup_time']}";
                $address6 = "select * from delivery_master where ids = {$result['assignDabbawala']}";


                $query2 = mysqli_query($connect, $address2);
                $query3 = mysqli_query($connect, $address3);
                $query4 = mysqli_query($connect, $address4);
                $query5 = mysqli_query($connect, $address5);

                $result2 = mysqli_fetch_assoc($query2);
                $result3 = mysqli_fetch_assoc($query3);
                $result4 = mysqli_fetch_assoc($query4);
                $result5 = mysqli_fetch_assoc($query5);
               
                if($result['assignDabbawala'] == 0){
                    $result6['dname'] = "Wait For Approvel";
                    $result6['mobile_num'] = "Wait For Approvel"  ;
                    $result6['passport_image'] = "../images/upload/786.gif" ;
                }
                else{
                    $query6 = mysqli_query($connect, $address6);
                    $result6 = mysqli_fetch_assoc($query6);
                }
            ?>


                <div class="box my-3 inbox px-4 py-3 receipt">
                    <h3 style="font-family: 'Send Flowers', cursive; font-weight:bold" class="text-center label text-success">Dabbawala</h3>
                    <h5 style="font-family: 'Titillium Web', sans-serif;" class="pb-3 label text-danger border-bottom border-dark">Your Order</h5>


                    <div class="media box py-3">
                        <div class="media-body col-lg-4 content-1">
                            <h6 class="mt-0">Name</h6>
                            <h6 class="mt-0">Delivery Address</h6>
                            <h6 class="mt-0">Dabba Pickup Date & Time</h6>
                            <h6 class="mt-0">Mobile Number</h6>
                            <h6 class="mt-0">Order Date</h6>
                            <h6 class="mt-0">Package</h6>
                            <h6 class="mt-0">Payment Mode</h6>
                            <h6 class="mt-0">Assigned Dabbawala</h6>
                            <h6 class="mt-0">Dabbawala Mobile</h6>
                            <h6 class="mt-0">Dabbawala Picture</h6>

                        </div>
                        <div class="media-body col-lg-8 content-2">
                            <h6 class="mt-0">: &nbsp;&nbsp; <?php echo $result['name']; ?></h6>
                            <h6 class="mt-0">: &nbsp;&nbsp; <?php echo $result['dflat_num'] . ", " . $result2['district'] . ", " . $result['dlandmark'] . ", " . $result4['area']; ?></h6>
                            <h6 class="mt-0">: &nbsp;&nbsp; <?php echo $result['pickup_date'] . ", " . $result5['time']; ?></h6>
                            <h6 class="mt-0">: &nbsp;&nbsp; <?php echo $result['mobile_num']; ?></h6>
                            <h6 class="mt-0">: &nbsp;&nbsp; <?php echo $result['created_at']; ?></h6>
                            <h6 class="mt-0">: &nbsp;&nbsp; <?php echo $result3['package_name']; ?></h6>
                            <h6 class="mt-0">: &nbsp;&nbsp; Cash</h6>
                            <h6 class="mt-0">: &nbsp;&nbsp; <?php echo $result6['dname']; ?></h6>
                            <h6 class="mt-0">: &nbsp;&nbsp; <?php echo $result6['mobile_num']; ?></h6>
                            <h6 class="mt-0">: &nbsp;&nbsp; <img style="border: 1px solid black;" src="<?php echo $result6['passport_image'] ?>" height="100px" alt=""></h6>
                        </div>
                    </div>
                    <?php

                    $datetime = $result['created_at'];

                    $timestamp = strtotime($datetime);

                    $time = $timestamp + (3600);

                    $datetime = date('Y-m-d H:i:s', $time);

                    if (date('Y-m-d H:i:s') < $datetime) {
                    ?>
                        <div class="mb-3 text-right">
                            <a onclick="return confirm('Are you really want to cancel this order..........')" href="order_delete.php?id=<?php echo $result['id']; ?>&user_id=<?php echo $id; ?>" class="btn btn-danger border shadow ">Cancel Order</a>
                        </div>
                    <?php
                    } else {
                    }
                    ?>




                    <h5 style="font-family: 'Caveat', cursive;" class="pt-3 text-center label text-danger border-top border-dark">Thank's For Supporting Dabbawala</h5>

                </div>
            <?php
            }


            ?>
        </div>



















        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>

    </html>


<?php } else {
    header('location: login.php');
}





?>