<?php

include 'connection.php';


session_start();

if (!isset($_SESSION['admin_mail'])) {
    header('location: ../index.php');
}
$id = $_SESSION['admin_mail'];

// if(isset($_POST['ajax']) && isset($_POST['id'])){

// }



$query1 = "select ids from delivery_master";
$query2 = "select * from order_master order by id desc";
$query3 = "select id from customer_master";
$query4 = "select * from delivery_master where active_inactive = 1";

$result1 = mysqli_query($connect, $query1);
$result2 = mysqli_query($connect, $query2);
$result3 = mysqli_query($connect, $query3);
$result4 = mysqli_query($connect, $query4);

$numOfDabbawala = mysqli_num_rows($result1);
$numOfOrders = mysqli_num_rows($result2);
$numOfCustomer = mysqli_num_rows($result3);
$numOfAvailDabba = mysqli_num_rows($result4);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Dashboard.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dabbawala : Admin Panel</title>
</head>

<body>
    <div class="container">
        <nav id="navclick">
            <ul>
                <li><a href="#" class="logo">
                        <img src="../images/logo.png" alt="logo">
                        <span class="nav_item"></span>
                    </a></li>
                <li><a class="icon active" href="Dashboard.php"><i class="fas fa-menorah"></i>
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                <li><a class="icon" href="Order.php"><i class="fas uil uil-list-ol"></i>
                        <span class="nav-item">Orders</span>
                    </a></li>
                <li><a class="icon" href="Dabbawala.php"><i class="fas uil uil-list-ol-alt"></i>
                        <span class="nav-item">Dabbawalas</span>
                    </a></li>
                <li><a class="icon" href="Customer.php"><i class="fas fa-user-cog"></i>
                        <span class="nav-item">Customer</span>
                    </a></li>
                <li><a class="icon" href="add_fields.php"><i style="font-size: 25px;" class="fas uil uil-create-dashboard"></i>
                        <span class="nav-item">District</span>
                    </a></li>
                <li><a class="icon" href="add_area.php"><i style="font-size: 25px;" class="fas uil uil-map-marker-plus"></i>
                        <span class="nav-item">Area</span>
                    </a></li>
                <li><a class="icon" href="add_rate_card.php"><i style="font-size: 25px;" class="fas uil uil-book-medical"></i>
                        <span class="nav-item">Package</span>
                    </a></li>
                <li><a class="icon" href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
                <li><a class="logout navclicks"><i onclick="myFunction(this)" style="font-size: 1.8rem; margin-bottom: 15px;" class="fas uil uil-arrow-right"></i></a></li>
            </ul>

        </nav>




        <section class="main">
            <div class="main-top" style="display: flex; justify-content:space-between;">
                <h1>Dashboard</h1>
                <div style="margin-top: 0; display:flex;justify-content:space-around;">

                    <a href="../php/home_page.php" style="text-decoration: none; border:1px solid black; border-radius:15px 0 0 15px;padding:7px 10px ;width:70px; background: #f3f3f3;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;font-weight:bold">Home</a>

                    <a href="adminRegister.php" style="text-decoration: none; border:1px solid black; border-radius:0px 15px 15px 0;padding:7px 10px; width:100px; background: #f3f3f3;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;font-weight:bold">Register</a>

                </div>
            </div>
            <div class="users">
                <div style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(171,102,255,1) 0%, rgba(116,182,247,1) 90% );" class="card">
                    <i class="uil uil-pizza-slice"></i>
                    <h4>
                        <?php echo $numOfOrders ?>
                    </h4>
                    <p>Total Order's</p>
                </div>
                <div style="background-image: radial-gradient( circle 597px at 93% 9.8%,  rgba(255,61,89,1) 1.7%, rgba(252,251,44,1) 97% );" class="card">
                    <i class="uil uil-shopping-cart-alt"></i>
                    <h4>
                        <?php echo $numOfDabbawala ?>
                    </h4>
                    <p>Total Dabbawala's</p>
                </div>
                <div style="background-image: radial-gradient( circle 935px at 3.1% 5.8%,  rgba(182,255,139,1) 0%, rgba(8,88,127,1) 100.2% );" class="card">
                    <i class="uil uil-user-location"></i>
                    <h4>
                        <?php echo $numOfAvailDabba ?>
                    </h4>
                    <p>Available Dabbawala's</p>

                </div>
                <div style="background-image: radial-gradient( circle 448px at 88.2% 27%,  rgba(247,132,189,1) 73.4%, rgba(187,187,187,1) 100.2% );" class="card">
                    <i class="uil uil-house-user"></i>
                    <h4>
                        <?php echo $numOfCustomer ?>
                    </h4>
                    <p>Total Client's</p>
                </div>
            </div>


            <form id="approve-form">
                <section class="main">
                    <div id="idcustomer">
                        

                    </div>
                </section>
                <i class="fas fa-times" id="closeapprove"></i>
            </form>




            <section class="attendance">
                <div class="attendance-list">
                    <div class="heading">
                        <h1>alloted dabbawala</h1>
                        <input type="text" name="" placeholder="Search by dabbawala name" id="search-box" onkeyup="searchFunction()">
                    </div>
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Client Name</th>
                                <th>Alotted Dabbawala</th>
                                <th>Delivery Address</th>
                                <th>Pickup Date & Time</th>
                                <th>Approved</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($fetchData = mysqli_fetch_assoc($result2)) {

                                $sql1 = "select * from area where id = {$fetchData['darea']}";
                                $sql2 = "select * from district where id = {$fetchData['dcity']}";
                                $sql3 = "select * from timing where id = {$fetchData['pickup_time']}";

                                $sqlQuery1 = mysqli_query($connect, $sql1);
                                $sqlQuery2 = mysqli_query($connect, $sql2);
                                $sqlQuery3 = mysqli_query($connect, $sql3);

                                $result6 = mysqli_fetch_assoc($sqlQuery1);
                                $result7 = mysqli_fetch_assoc($sqlQuery2);
                                $result8 = mysqli_fetch_assoc($sqlQuery3);

                            ?>
                                <tr>
                                    <td>
                                        <?php echo $fetchData['name'] ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if ($fetchData['assignDabbawala'] == 0) {
                                                echo " ";
                                            } else {
                                                $sql4 = "select * from delivery_master where ids = {$fetchData['assignDabbawala']}";
                                                $sqlQuery4 = mysqli_query($connect, $sql4);
                                                $result9 = mysqli_fetch_assoc($sqlQuery4);
                                                echo $result9['dname'];
                                            }
                                         ?>
                                    </td>
                                    <td>
                                        <?php echo $fetchData['dflat_num'] . ", " . $result6['area'] . ", " . $fetchData['dlandmark'] . ", " . $result7['district'] ?>
                                    </td>
                                    <td>
                                        <?php echo $result8['time'] . ", " . $fetchData['pickup_date'] ?>
                                    </td>

                                    <?php
                                    if ($fetchData['approved'] == 0) {
                                    ?>
                                        <td style="display:flex;justify-content: center;"><i style="background: red; color:#fff; width:50px; border-radius: 15px; font-size:1.5rem; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;" id="approve" onclick="clickme(<?php echo $fetchData['id'] ?>)" class="uil uil-check-circle"></i></td>
                                    <?php
                                    } else {
                                    ?>
                                        <td style="display:flex;justify-content: center;"><a href="approved.php?id=<?php echo $fetchData['id']; ?>&assign=0 &approved=0" style="background: green; color:#fff; width:50px; border-radius: 15px; font-size:1.5rem; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"><i class="uil uil-check-circle"></i></a></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </div>


    <script>
        document.querySelector("#approve").clickme = ($result) => {

            document.querySelector("#approve-form").classList.toggle("active");
            var id = $result;

            $.ajax({
                url: 'dabbawalachoice.php',
                data: 'id=' + id,
                success: function(data) {
                    $("#idcustomer").html(data);
                }
            });

        }
        document.querySelector("#closeapprove").onclick = () => {
            document.querySelector("#approve-form").classList.remove("active");
        }
    </script>

    
    <script>
        let btn = document.querySelector(".navclicks");
        let icon = btn.querySelector(".uil-arrow-right");

        btn.onclick = function() {
            if (icon.classList.contains("uil-arrow-right")) {
                icon.classList.replace("uil-arrow-right", "uil-arrow-left");
            } else {
                icon.classList.replace("uil-arrow-left", "uil-arrow-right");
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.navclicks').click(function() {
                $('#navclick').toggleClass('incre');
                $('.logo').toggleClass('imgincre');
                $('.navclicks i').toggleClass('iconincre');
            });
        });
    </script>



    <script>
        const searchFunction = () => {
            let filter = document.getElementById("search-box").value.toUpperCase();
            let table = document.getElementById("table");
            let tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td")[0];

                if (td) {
                    let textValue = td.textContent || td.innerHTML;
                    if (textValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            };
        };
    </script>
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>

        <script>
            Swal.fire(
                '<?php echo $_SESSION['status']; ?>',
                '<?php echo $_SESSION['name']; ?>',
                '<?php echo $_SESSION['status_code']; ?>'
            )
        </script>
    <?php
        unset($_SESSION['status']);
    }
    ?>
</body>

</html>