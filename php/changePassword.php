<?php

include 'connection.php';
if(!isset($_GET['id'])){
    header('location: login.php');
}
$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dabbawala : Reset Your Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js">
    <link rel="stylesheet" href="../css/changePass.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">

        <div class="forms">

            <div class="form login">
                <div class="logo-title">
                    <span class="title">Reset Your Password</span>
                </div>

                <form action="password_update.php?id=<?php echo $id ?>" method="POST" onsubmit="return regis()">

                    <div class="input-field">
                        <input type="password" id="pass" autocomplete="off" name="password" title="Enter your password" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock-alt icon"></i>
                        <i class="uil uil-eye-slash showhide"></i>
                        <small id="passSmall" style="visibility: hidden; color:red; font-weight:bold">error</small>
                    </div>

                    <div class="input-field">
                        <input type="password" id="password" autocomplete="off" name="cnfpassword" title="Re-enter your password" class="cnfpassword" placeholder="Re-enter your password" required>
                        <i class="uil uil-lock-alt icon"></i>
                        <small id="passwordSmall" style="visibility: hidden; color:red; font-weight:bold">error</small>
                    </div>



                    <div class="input-field button">
                        <input type="submit" name="adminSubmit" value="Reset password">
                    </div>
                </form>
            </div>
        </div>
    </div>







    <script>
        const container = document.querySelector(".container");
        const pwshow = document.querySelectorAll(".showhide");
        const pwfield = document.querySelectorAll(".password");

        pwshow.forEach(eyeicon => {
            eyeicon.addEventListener("click", () => {
                pwfield.forEach(pwfield => {
                    if (pwfield.type === "password") {
                        pwfield.type = "text";
                        pwshow.forEach(icon => {
                            icon.classList.replace("uil-eye-slash", "uil-eye");
                        })
                    } else {
                        pwfield.type = "password";
                        pwshow.forEach(icon => {
                            icon.classList.replace("uil-eye", "uil-eye-slash");
                        })
                    }
                });
            });
        });
    </script>
    <script>
        function regis() {
            var passs = document.getElementById('pass').value;
            var passwords = document.getElementById('password').value;

            if (passs == "") {
                document.getElementById("pass").style.borderBottomColor = "red";
                document.getElementById("passSmall").style.visibility = "visible";
                document.getElementById("passSmall").innerHTML = "**Please enter the password";
                return false;
            }
            if (passs.length < 8 || passs.length > 12) {
                document.getElementById("pass").style.borderBottomColor = "red";
                document.getElementById("passSmall").style.visibility = "visible";
                document.getElementById("passSmall").innerHTML = "**Password length must be between 8 to 12";
                return false;
            }








            if (passwords == "") {
                document.getElementById("password").style.borderBottomColor = "red";
                document.getElementById("passwordSmall").style.visibility = "visible";
                document.getElementById("passwordSmall").innerHTML = "**Please re-enter the password";
                return false;
            }
            if (passwords.length < 8 || passwords.length > 12) {
                document.getElementById("password").style.borderBottomColor = "red";
                document.getElementById("passwordSmall").style.visibility = "visible";
                document.getElementById("passwordSmall").innerHTML = "**Password length must be between 8 to 12";
                return false;
            }
            if (passs != passwords) {
                document.getElementById("password").style.borderBottomColor = "red";
                document.getElementById("passwordSmall").style.visibility = "visible";
                document.getElementById("passwordSmall").innerHTML = "**Password are not matching";
                return false;
            }
        }
    </script>
</body>

</html>