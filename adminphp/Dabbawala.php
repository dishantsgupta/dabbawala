<?php

session_start();
if (!isset($_SESSION['admin_mail'])) {
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
    <link rel="stylesheet" href="../css/Dabbawala.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dabbawala : Dabbawala List</title>
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
                        <span class="nav-item">City/District</span>
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
            <a href="Registration.php" style="padding: 0px; text-align:right;margin-left:75%; color:red;font-weight:bold">+ Add New Dabbawala</a>
            <section class="attendance">
                <div class="attendance-list">
                    <div class="heading">
                        <h1>registrated dabbawala</h1>
                        <input type="text" name="" placeholder="Search by dabbawala name" id="search-box" onkeyup="searchFunction()">
                    </div>
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include 'connection.php';

                            $selectQuery = "select * from delivery_master order by ids desc";

                            $query = mysqli_query($connect, $selectQuery);

                            $increment = 0;

                            while ($result = mysqli_fetch_assoc($query)) {
                                $increment++;
                            ?>

                                <tr>
                                    <td><?php echo $increment; ?></td>
                                    <td><?php echo $result['dname']; ?></td>
                                    <td><?php echo $result['mobile_num']; ?></td>
                                    <td><?php echo $result['age']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td><img style="width:50px; height: 50px; border-radius:100%;" src="<?php echo $result['passport_image'] ?>" height="100px" alt=""></td>

                                    <td style="padding: 12px 10px;display: inline-block;justify-content: center;"><a class='view-button' href="delivery_boy_view.php?id=<?php echo $result['ids']; ?>"><i style="margin-left: 1px;" class="uil uil-eye"></i></a></td>

                                    <td style="padding: 12px 10px;display: inline-block;justify-content: center;"><a onclick="return confirm('Are you really want to delete this dabbawala..........')" class='view-button' href="delivery_boy_deletion.php?id=<?php echo $result['ids']; ?>"><i style="margin-left: 1px;" class="uil uil-trash-alt"></i></a></td>

                                    <td style="padding: 12px 10px;display: inline-block;justify-content: center;"><a class='edit-button' href="Re_registration.php?id=<?php echo $result['ids']; ?>"><i style="margin-left: 1px;" class="uil uil-edit-alt"></i></a></td>
                                </tr>

                            <?php
                            }

                            mysqli_close($connect);

                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
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
        window.onscroll = () => {
            menu.classList.remove("fa-times");
            navbar.classList.remove("active");
        }
        document.querySelector("#search-icon").onclick = () => {
            document.querySelector("#search-form").classList.toggle("active");
        }
        document.querySelector("#close").onclick = () => {
            document.querySelector("#search-form").classList.remove("active");
        }
    </script>
    <script>
        const searchFunction = () => {
            let filter = document.getElementById("search-box").value.toUpperCase();
            let table = document.getElementById("table");
            let tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td")[1];

                if (td) {
                    let textValue = td.textContent || td.innerHTML;
                    if (textValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>