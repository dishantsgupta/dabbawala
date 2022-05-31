<?php

include 'php/connection.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dabbawala Ordering & Menu Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/home_page.css">
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


    <!-- Header section start -->

    <header>

        <img src="images/logo.png" width="130px" height="70px" alt="Logo is not loaded" class="logo">

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#order">order</a>
            <a href="#about">about</a>
            <a href="#review">review</a>
        </nav>

        <div class="ico">
            <a href="php/login.php" class="btn">Login / Register</a>
        </div>
    </header>

    <!-- Header section end  -->





    <!-- home section start  -->

    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper wrapper">

                <div class="swiper-slide slide">

                    <div class="content">

                        <span>Delivered Lunch box</span>
                        <h3>Ghar ka khana</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde sed quam veritatis odio
                            laboriosam eius consectetur deserunt. Ipsa, ex ratione!</p>
                        <a href="#order" class="btn">order now</a>

                    </div>
                    <div class="image">
                        <img src="images/food1.png" width="550px" height="570px" alt="Images is not loaded">
                    </div>

                </div>
                <div class="swiper-slide slide">

                    <div class="content">

                        <span>touch with company's</span>
                        <h3>Our client</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde sed quam veritatis odio
                            laboriosam eius consectetur deserunt. Ipsa, ex ratione!</p>
                        <a href="#order" class="btn">order now</a>

                    </div>
                    <div class="image">
                        <img src="images/food2.png" width="590px" height="550px" alt="Images is not loaded">
                    </div>

                </div>
                <div class="swiper-slide slide">

                    <div class="content">

                        <p>Since 1890, Dressed in white outfit and traditional Gandhi Cap, Mumbai Army of 5,000 Dabbawalas fulfilling the hunger of almost 200,000 Mumbaikar with home-cooked food that is lug between home and office daily. For more than a century our team have been part of this grime-ridden metropolis-of-dreams.</p>
                        <p>
                            About 125 years back, a Parsi banker wanted to have home cooked food in office and gave this responsibility to the first ever Dabbawala. Many people liked the idea and the demand for Dabba delivery soared. It was all informal and individual effort in the beginning, but visionary Mahadeo Havaji Bachche saw the opportunity and started the lunch delivery service in its present team-delivery format with 100 Dabbawalas.
                        </p>
                        <p>
                            As the city grew, the demand for Dabba delivery grew too. The coding system created by our forefather is still prominent in 21st century. Initially it was simple colour coding but now since Mumbai is widely spread metro with 3 local train routes, our coding has also evolved into alpha numeric characters.
                        </p>
                        <a href="#order" class="btn">order now</a>

                    </div>
                    <div class="image">
                        <img class="book" src="images/food3.jpg" width="150px" height="500px" alt="Images is not loaded">
                    </div>

                </div>

            </div>
            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- home section end  -->





    <!-- steps section start  -->

    <section class="main-steps">

        <h1 style="padding-top: 2rem;" class="heading">
            how dabbawalla works
        </h1>

        <div class="steps">

            <div class="box">
                <img src="images/step1.png" alt="">
                <h3>Choose your food</h3>
            </div>

            <div class="box">
                <img src="images/step3.png" alt="">
                <h3>choose your pickup point</h3>
            </div>

            <div class="box">
                <img src="images/step4.png" alt="">
                <h3>take your food</h3>
            </div>

            <div class="box">
                <img src="images/step5.png" alt="">
                <h3>finally, enjoy your food</h3>
            </div>

        </div>

    </section>

    <!-- steps section end  -->






    <!-- rate list start  -->

    <section class="price">

        <?php
            $sql1 = "select * from rate_card";
            $query1 = mysqli_query($connect,$sql1);

            while($result = mysqli_fetch_assoc($query1)){
        ?>

        <div class="cards">
            <div  class="card<?php echo $result['id']; ?>">
                <div class="title">
                    <h2><?php echo $result['card_name']; ?></h2>
                    <h5><?php echo $result['package_name']; ?></h5>
                    <p>Lorem ipsum dolor sit amet anksr consectetur adipisicing elit.</p>
                </div>
                <div class="rate">
                    <h1><i class="uil uil-rupee-sign"></i><span><?php echo $result['package_price']; ?><small>/day</small></span></h1>
                </div>
                <div class="info">
                    <ul>
                        <li><i class="uil uil-check-circle"></i>&nbsp; Take your tiffin at your door</li>
                        <li><i class="uil uil-check-circle"></i> &nbsp;Drop your tiffin at your door</li>
                    </ul>
                </div>
            </div>
        </div>

        <?php
            }
        ?>

    </section>

    <!-- rate list end  -->









    <!-- about section start  -->

    <section class="about" id="about">

        <h3 class="sub-heading">about us</h3>
        <h1 class="heading">why choose us</h1>

        <div class="row">

            <div class="image">
                <img src="images/about.jpg" alt="">
            </div>

            <div class="content">
                <h3>best food in the country</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur tempora voluptatem quaerat ratione,
                    tempore delectus nemo quia ex assumenda nesciunt neque velit architecto hic dolorum adipisci.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur tempora voluptatem quaerat ratione,
                    tempore delectus.</p>
                <div class="icons-container">
                    <div class="icons">
                        <i class="fas fa-shipping-fast"></i>
                        <span>free delivery</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-dollar-sign"></i>
                        <span>easy payment</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-headset"></i>
                        <span>24X7 services</span>
                    </div>
                </div>
                <a href="#" class="btn">read more</a>
            </div>

        </div>

    </section>

    <!-- about section end  -->













    <!-- review section start  -->

    <section class="review" id="review">

        <h3 class="sub-heading">customer's review</h3>
        <h1 class="heading">what they say</h1>

        <div class="swiper review-slider">

            <div class="swiper-wrapper wrapper">

                <div class="swiper-slide slide">
                    <div class="user">
                        <i class="fas fa-quote-right"></i>
                        <img src="images/review2.jpg" alt="">
                        <div class="user-info">
                            <h3>Mr. shivam kaushik</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt reiciendis provident
                        consequuntur. Corporis expedita atque dolorem nostrum! Explicabo alias maxime earum minima ab,
                        aliquid non voluptate atque. Numquam, ipsa iste.</p>
                </div>
                <div class="swiper-slide slide">
                    <div class="user">
                        <i class="fas fa-quote-right"></i>
                        <img src="images/review1.jpg" alt="">
                        <div class="user-info">
                            <h3>Mr. Shubhi gupta</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt reiciendis provident
                        consequuntur. Corporis expedita atque dolorem nostrum! Explicabo alias maxime earum minima ab,
                        aliquid non voluptate atque. Numquam, ipsa iste.</p>
                </div>
                <div class="swiper-slide slide">
                    <div class="user">
                        <i class="fas fa-quote-right"></i>
                        <img src="images/review3.jpg" alt="">
                        <div class="user-info">
                            <h3>Mr. Anudish jain</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt reiciendis provident
                        consequuntur. Corporis expedita atque dolorem nostrum! Explicabo alias maxime earum minima ab,
                        aliquid non voluptate atque. Numquam, ipsa iste.</p>
                </div>

            </div>

        </div>

    </section>

    <!-- review section end  -->








    <!-- footer section start  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3><i class="uil uil-globe"></i>&nbsp;locations</h3>
                <a href="#">india</a>
                <a href="#">USA</a>
                <a href="#">china</a>
                <a href="#">germany</a>
                <a href="#">france</a>
            </div>

            <div class="box">
                <h3><i class="uil uil-link-h"></i>&nbsp;quick links</h3>
                <a href="#home">home</a>
                <a href="#order">order</a>
                <a href="#about">about</a>
                <a href="#review">review</a>
            </div>

            <div class="box">
                <h3><i class="uil uil-calling"></i>&nbsp;contact info</h3>
                <a href="#">+91 8765446321</a>
                <a href="#">+123-456-789</a>
                <a href="#">dabbawala@gmail.com</a>
                <a href="#">mumbai, india - 400104</a>
            </div>

            <div class="box">
                <h3><i class="uil uil-telegram-alt"></i>&nbsp;follow us </h3>
                <a href="#">facebook</a>
                <a href="#">twitter</a>
                <a href="#">instagram</a>
                <a href="#">linkedin</a>
            </div>

        </div>

        <div class="credit">By continuing past this page, you agree to our Terms of Service, Cookie Policy, Privacy Policy and Content Policies. All trademarks are properties of their respective owners. 2022 © DabbaWala™ Ltd. All rights reserved.</div>

    </section>

    <!-- footer section end  -->
















































    <script src="js/home_page.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            function loadData(type, district_id) {
                $.ajax({
                    url: "php/dependent_dropdown.php",
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
        $(document).ready(function() {
            function loadData(type, district_id) {
                $.ajax({
                    url: "php/dependent_dropdown_2.php",
                    type: "POST",
                    data: {
                        type: type,
                        id: district_id
                    },
                    success: function(data) {
                        if (type == "stateData") {
                            $("#delivery_area").html(data);
                        } else {
                            $("#delivery_district").append(data);
                        }
                    }
                });
            }
            loadData();

            $("#delivery_district").on("change", function() {
                var country = $("#delivery_district").val();

                loadData("stateData", country);
            });
        });
    </script>
    <script>
        var date = new Date();
        var todayDate = date.getDate() + 7;
        var month = date.getMonth() + 1;
        if (todayDate < 10) {
            todayDate = "0" + todayDate;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var year = date.getUTCFullYear();
        var maxDate = year + "-" + month + "-" + todayDate;
        document.getElementById("inputDates").setAttribute('max', maxDate);
    </script>
    <script>
        var dateMin = new Date();
        var todayDateMin = dateMin.getDate() + 1;
        var monthMin = dateMin.getMonth() + 1;
        if (todayDateMin < 10) {
            todayDateMin = "0" + todayDateMin;
        }
        if (monthMin < 10) {
            monthMin = "0" + monthMin;
        }
        var yearMin = dateMin.getUTCFullYear();
        var maxDateMin = yearMin + "-" + monthMin + "-" + todayDateMin;
        document.getElementById("inputDates").setAttribute('min', maxDateMin);
    </script>
    <script>
        var swiper = new Swiper(".home-slider", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            loop: true
        });
    </script>
    <script>
        var swiper = new Swiper(".review-slider", {
            spaceBetween: 20,
            centeredSlides: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            loop: true,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
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
</body>

</html>