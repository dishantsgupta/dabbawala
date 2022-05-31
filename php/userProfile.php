<?php
session_start();
include 'connection.php';
if (isset($_SESSION['email']) or isset($_SESSION['admin_mail'])) {
    if (isset($_SESSION['email'])) $email = $_SESSION['email'];
    if (isset($_SESSION['admin_mail'])) $email = $_SESSION['admin_mail'];
    $q = "select * from customer_master where email = '$email'";
    $result = mysqli_query($connect, $q);
    $num = mysqli_fetch_assoc($result);
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dabbawala : User Profile</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js">
        <link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/userProfile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>

        <section class="order" id="order">

            <div>
                <div style="display: flex;">
                    <div>
                        <a href="home_page.php" class="btnback"><i class="fa-solid fa-angles-left"></i>&nbsp;&nbsp;Back</a>
                    </div>
                    <div style="margin: 10px auto; margin-left:610px">
                        <img src="../images/userprofile.png" height="90px" alt="">
                    </div>
                </div>
                <h1 class="heading">Your Profile</h1>
            </div>

            <form action="update.php" method="POST">

                <div class="inputBox">
                    <div class="input">
                        <span>your name</span>
                        <input id="name" name="name" value="<?php echo $num['name'] ?>" type="text" placeholder="Enter your name">
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                    <div class="input">
                        <span>your mobile number</span>
                        <input id="mobile" name="mobile" value="<?php echo $num['mobile_num'] ?>" type="number" placeholder="Enter your mobile number">
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                    <div class="input">
                        <span>your mobile number</span>
                        <input id="mobile" name="altmobile" value="<?php echo $num['alt_mobile_num'] ?>" type="number" placeholder="Enter your alternate mobile number">
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                </div>
                <div class="inputBox">
                    <div class="inputBox drop-down">
                        <div class="input">
                            <span>gender</span>
                            <select name="gender"">
                            <option selected>Select your gender</option>
                            <option value=" Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="input">
                        <span>Age</span>
                        <input name="age" value="<?php echo $num['age'] ?>" type="number">
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                </div>
                <div class="inputBox">

                </div>
                <div class="inputBox drop-down">
                    <div class="input">
                        <span>Flat No. / House No. / Building</span>
                        <input id="flatnum" name="flatnum" value="<?php echo $num['flat_num'] ?>" type="text" placeholder="Enter your flat No. / house No. / building">
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
                        <span>Landmark</span>
                        <input id="landmark" name="landmark" type="text" value="<?php echo $num['landmark'] ?>" placeholder="Enter your landmark">
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>

                    <div class="input">
                        <span>Area / Street / Sector</span>
                        <select required name="area" id="area">
                            <option value="">Select your area</option>
                        </select>
                        <small id="nameSmall" style="color: red; font-weight:bold; font-size:15px; visibility:hidden">error</small>
                    </div>
                </div>
                <input type="submit" name="order" value="Update" class="btn">

            </form>

        </section>





        <script>
            $(document).ready(function() {
                function loadData(type, district_id) {
                    $.ajax({
                        url: "dependent_dropdown.php",
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




    </body>

    </html>

<?php
} else {
    header('location: login.php');
}

?>