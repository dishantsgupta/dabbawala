<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dabbawala : Admin Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js">
    <link rel="stylesheet" href="../css/indexs.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">


</head>

<body>

   
    <div class="container">

        <div class="forms">

            <div class="form signup">
                <div class="logo-title">
                    <span class="title">Admin Registration</span>
                    <a href="Dashboard.php"><i class="uil uil-estate"></i></a>
                </div>

                <form action="adminregis.php" method="POST" onsubmit="return regis()">
                    @csrf
                    <div class="input-field">
                        <input type="text" placeholder="Enter your fullname" id="name"
                            name="name" autocomplete="off" title="Enter your fullname">
                        <i class="uil uil-user"></i>
                    </div>
                    <small id="nameSmall" style="visibility: hidden; color:red; font-weight:bold">
                    </small>

                    <div class="input-field" style="margin-top: 6%;">
                        <input type="number" placeholder="Enter your mobile number"
                            id="mobile" name="mobile" autocomplete="off" title="Enter your mobile number">
                        <i class="uil uil-mobile-android"></i>
                    </div>
                    <small id="mobileSmall" style="visibility: hidden; color:red; font-weight:bold">
                    </small>

                    <div class="input-field" style="margin-top: 6%;">
                        <input type="text"  placeholder="Enter your email" id="email"
                            name="email" autocomplete="off" title="Enter your email">
                        <i class="uil uil-envelope-alt"></i>
                    </div>
                    <small id="emailSmall" style="visibility: hidden; color:red; font-weight:bold">
                    </small>

                    <div class="input-field" style="margin-top: 6%;">
                        <input type="password" placeholder="Create your password" name="pass" class="pass" id="pass"
                            autocomplete="off" title="Create your password">
                        <i class="uil uil-lock-alt icon"></i>
                        
                    </div>
                    <small id="passSmall" style="visibility: hidden; color:red; font-weight:bold">
                    </small>

                    <div class="input-field" style="margin-top: 6%;">
                        <input type="password" class="password" id="password" name="password" autocomplete="off"
                            title="Re-confirm your password" placeholder="Re-confirm your password">
                        <i class="uil uil-lock-alt icon"></i>
                        <i class="uil uil-eye-slash showhide"></i>
                    </div>
                    <small id="passwordSmall" style="visibility: hidden; color:red; font-weight:bold">
                    </small>

                    <div class="checkbox-text" style="margin-top: 6%;">
                        <div class="checkbox-content">
                            <input required type="checkbox" id="logcheck">
                            <label for="logcheck" class="text">Agree with Terms and condition</label>
                        </div>

                    </div>

                    <div class="input-field button">
                        <input type="submit" name="submit" value="Register Now">

                    </div>

                </form>

            </div>

        </div>

    </div>





    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function regis() {
            var names = document.getElementById('name').value;
            var mobiles = document.getElementById('mobile').value;
            var emails = document.getElementById('email').value;
            var passs = document.getElementById('pass').value;
            var passwords = document.getElementById('password').value;



            if (names == "") {
                document.getElementById("name").style.borderBottomColor = "red";
                document.getElementById("nameSmall").style.visibility = "visible";
                document.getElementById("nameSmall").innerHTML = "**Please enter the name field";
                return false;
            }
            if (names.length < 3 || names.length > 50) {
                document.getElementById("name").style.borderBottomColor = "red";
                document.getElementById("nameSmall").style.visibility = "visible";
                document.getElementById("nameSmall").innerHTML = "**Name length must be between 3 to 50";
                return false;
            }
            if (!isNaN(names)) {
                document.getElementById("name").style.borderBottomColor = "red";
                document.getElementById("nameSmall").style.visibility = "visible";
                document.getElementById("nameSmall").innerHTML = "**Only characters are allowed";
                return false;
            }



            if (mobiles == "") {
                document.getElementById("mobile").style.borderBottomColor = "red";
                document.getElementById("mobileSmall").style.visibility = "visible";
                document.getElementById("mobileSmall").innerHTML = "**Please enter the mobile number";
                return false;
            }
            if (mobiles.length != 10) {
                document.getElementById("mobile").style.borderBottomColor = "red";
                document.getElementById("mobileSmall").style.visibility = "visible";
                document.getElementById("mobileSmall").innerHTML = "**Mobile number must be 10-digits only";
                return false;
            }






            if (emails == "") {
                document.getElementById("email").style.borderBottomColor = "red";
                document.getElementById("emailSmall").style.visibility = "visible";
                document.getElementById("emailSmall").innerHTML = "**Please enter the email address";
                return false;
            }
            if (emails.indexOf("@") <= 4) {
                document.getElementById("email").style.borderBottomColor = "red";
                document.getElementById("emailSmall").style.visibility = "visible";
                document.getElementById("emailSmall").innerHTML = "**@ position is invalid";
                return false;
            }
            if ((emails.charAt(emails.length - 4) != ".") && (emails.charAt(emails.length - 3) != ".")) {
                document.getElementById("email").style.borderBottomColor = "red";
                document.getElementById("emailSmall").style.visibility = "visible";
                document.getElementById("emailSmall").innerHTML = "** . position is invalid";
                return false;
            }






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
