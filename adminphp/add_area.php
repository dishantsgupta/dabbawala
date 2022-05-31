<?php

include 'connection.php';


session_start();
if (!isset($_SESSION['admin_mail'])) {
    header('location: ../index.php');
}
$id = $_SESSION['admin_mail'];

$sql1 = "select * from blank";
$query1 = mysqli_query($connect, $sql1);

if (isset($_POST['show'])) {
    $id = $_POST['area'];
    $sql3 = "select * from area where district_id = '$id' && isActive = '1'";
    $query1 = mysqli_query($connect, $sql3);
}

if (isset($_POST['add'])) {
    $id = $_POST['areas'];
    $name = $_POST['areaName'];
    $sql4 = "insert into area(area,district_id,isActive) values('$name', '$id','1')";
    try {
        $query4 = mysqli_query($connect, $sql4);
    } catch (Exception) {
        echo "Something went wrong";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add_fields.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dabbawala : Add Fields</title>
</head>

<body>
    <div class="container">
        <nav id="navclick">
            <ul>
                <li><a href="#" class="logo">
                        <img src="../images/logo.png" alt="logo">
                        <span class="nav_item"></span>
                    </a></li>
                <li><a class="icon" href="Dashboard.php"><i class="fas fa-menorah"></i>
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
                <li><a class="icon active" href="add_area.php"><i style="font-size: 25px;" class="fas uil uil-map-marker-plus"></i>
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
            <div class="main-top">
                <h1>Add / Update fields</h1>
            </div>
            <div class="users">

                <div style="background: #f3f3f3;" class="card">

                    <h4>Add / Update Areas</h4>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <select style="width: 20%; height: 40px; border-radius: 10px; border:1px solid black;" name="area">
                            <option value="">Select your city / district</option>
                            <?php
                            $sql2 = "select * from district where isActive = 1";
                            $query2 = mysqli_query($connect, $sql2);
                            while ($result2 = mysqli_fetch_assoc($query2)) {
                            ?>
                                <option value="<?php echo $result2['id']; ?>"><?php echo $result2['district']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input type="submit" name="show" class="btn" value="Show">
                    </form>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <small style="color: #a50808;font-weight: bold;">**Please first select the district / city then type the area name</small><br>
                        <select style="width: 20%; height: 40px; border-radius: 10px; border:1px solid black;" name="areas">
                            <option value="">Select your city / district</option>
                            <?php
                            $sql2 = "select * from district where isActive = 1";
                            $query2 = mysqli_query($connect, $sql2);
                            while ($result2 = mysqli_fetch_assoc($query2)) {
                            ?>
                                <option value="<?php echo $result2['id']; ?>"><?php echo $result2['district']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input type="text" name="areaName" placeholder="Enter here area name">
                        <input type="submit" name="add" class="btn" value="Add">
                    </form>

                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>District S.No.</th>
                                <th>District / City</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $increment = 0;
                            while ($result3 = mysqli_fetch_assoc($query1)) {
                                $increment++;


                            ?>
                                <tr>
                                    <td><?php echo $increment ?></td>
                                    <td><?php echo $result3['area']; ?></td>


                                    <td style="padding: 12px 10px;display: inline-block;justify-content: center;"><a style="padding: 0px;width: 0px;" href="area_update.php?id=<?php echo $result3['id']; ?>"><i style="padding: 3px 7px; background: green;font-size: 23px;color:#fff;" class="uil uil-edit-alt"></i></a></td>

                                    <td style="padding: 12px 10px;display: inline-block;justify-content: center;"><a onclick="return confirm('Are you really want to delete this area.......')" style="padding: 0px; width: 0px;" href="area_delete.php?id=<?php echo $result3['id']; ?>"><i style="padding: 3px 7px; background: red;font-size: 23px;color:#fff;" class="uil uil-trash-alt"></i></a></td>
                                    
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>

                    </table>

                </div>

            </div>




        </section>
    </div>



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


</body>

</html>