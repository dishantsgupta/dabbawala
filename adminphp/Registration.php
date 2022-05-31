<?php

session_start();
if(!isset($_SESSION['admin_mail'])){
    header('location: ../index.php');
}
$id = $_SESSION['admin_mail'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Registration.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dabbawala : Dabbawala Registration</title>
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
                <li><a class="icon active" href="Dabbawala.php"><i class="fas uil uil-list-ol-alt"></i>
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

        <section class="order">
            <form action="delivery_boy.php" method="POST" enctype="multipart/form-data">
                <h1 style="color: rgb(21, 241, 105);text-align:center;margin-bottom:20px">Dabbawala registration form
                </h1>
                <div class="inputBox">
                    <div class="input">
                        <span>your name</span>
                        <input id="name" name="name" type="text" placeholder="Enter your name">
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                    <div class="input">
                        <span>your mobile number</span>
                        <input id="mobile" name="mobile" type="number" placeholder="Enter your mobile number">
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                    <div class="input">
                        <span>your email address</span>
                        <input id="email" name="email" type="text" placeholder="Enter your email address">
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                    <div class="input">
                        <span>your date of birth</span>
                        <input id="inputDate" name="date" type="date">
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                </div>
                <div class="inputBox">
                    <div class="inputBox drop-down">
                        <div class="input">
                            <span>gender</span>
                            <select class="gender" style="width: 395px;" name="gridRadios">
                                <option value="">Select your gender</option>
                                <option value=" Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="input">
                        <span>Age</span>
                        <input name="age" placeholder="Enter your age" type="number">
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                </div>
                <div class="inputBox drop-down">
                    <div class="input">
                        <span>Flat No. / House No. / Building</span>
                        <input id="flatnum" name="flatnum" type="text" placeholder="Enter your flat No. / house No. / building">
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                    <div class="input">
                        <span>Town / City</span>
                        <select required name="city" id="district">
                            <option value="">Select your city</option>
                        </select>
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                    <div class="input">
                        <span>Area / Street / Sector</span>
                        <select required name="area" id="area">
                            <option value="">Select your area</option>
                        </select>
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                    <div class="input">
                        <span>Qualification</span>
                        <select title="Choose Your Higher Degree" id="inputState" name="degree" class="form-control">
                            <option selected>Select Your Qualification</option>
                            <?php
                            include 'connection.php';
                            $sql = "select * from qualification";
                            $query = mysqli_query($connect, $sql);
                            while ($result = mysqli_fetch_assoc($query)) {
                            ?>
                                <option value="<?php echo $result['id'] ?>"><?php echo $result['course'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                </div>
                <div class="inputBox">
                    <div class="input infile">
                        <span>Upload your image</span>
                        <input style="color: #fff;" type="file" name="image" class="file">
                    </div>
                    <div class="input-submit">
                        <input type="submit" name="submit" value="Register" class="btn">
                    </div>
                </div>


            </form>
        </section>
    </div>
    <script>
        let btn = document.querySelector(".navclicks");
        let icon = btn.querySelector(".uil-arrow-right");

        btn.onclick = function(){
            if(icon.classList.contains("uil-arrow-right")){
                icon.classList.replace("uil-arrow-right","uil-arrow-left");
            }
            else{
                icon.classList.replace("uil-arrow-left","uil-arrow-right");
            }
        }
    </script>
    <script>
        $(document).ready(function(){
            $('.navclicks').click(function(){
                $('#navclick').toggleClass('incre');
                $('.logo').toggleClass('imgincre');
                $('.navclicks i').toggleClass('iconincre');
            });
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script>
        $(document).ready(function() {
            function loadData(type, district_id) {
                $.ajax({
                    url: "../../user/php/dependent_dropdown.php",
                    type: "POST",
                    data: {
                        type: type,
                        id: district_id
                    },
                    success: function(data) {
                        if (type == "stateData") {
                            $("#area").html(data);
                        } else {
                            $("#district").append(data);
                        }
                    }
                });
            }
            loadData();

            $("#district").on("change", function() {
                var country = $("#district").val();

                loadData("stateData", country);
            });
        });
    </script>
    <script>
        var date = new Date();
        var todayDate = date.getDate();
        var month = date.getMonth() + 1;
        if (todayDate < 10) {
            todayDate = "0" + todayDate;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var year = date.getUTCFullYear() - 17;
        var maxDate = year + "-" + month + "-" + todayDate;
        document.getElementById("inputDate").setAttribute('max', maxDate);
    </script>
    
</body>

</html>