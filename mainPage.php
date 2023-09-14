<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="StyleSheet" type="text/css" href="styles/stylee.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Font awsome link -->
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- for the css -->



    <!-- for the fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Gentium+Plus&family=Ms+Madi&family=Oleo+Script&family=Radio+Canada:wght@300&family=Square+Peg&family=Tai+Heritage+Pro:wght@700&family=Water+Brush&family=Zen+Antique&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Gentium+Plus&family=Kdam+Thmor+Pro&family=Ms+Madi&family=Oleo+Script&family=Radio+Canada:wght@300&family=Raleway:wght@200&family=Square+Peg&family=Tai+Heritage+Pro:wght@700&family=Ubuntu:wght@300&family=Water+Brush&family=Zen+Antique&display=swap">


    <!-- <style> -->

    <!-- </style> -->




</head>

<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="./images/logo.jpg" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- yAH DEKHI SURU HUNXA HOME PRODUCTS AND ARU KURA -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="UserJoin.php">Register/Join Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="userLogin.php">Login</a>
                        </li>

                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <div class="container_img">
            <div class="first">
                <div class="image1">
                    <img class="image_edit1" src="images/DGRC1.jpg" alt="image">
                </div>
                <div class="image2">
                    <img class="image_edit2" src="images/DGRC3.jpg" alt="image">
                </div>
                <div class="image3">
                    <!-- <img class="image_edit3" src="images/DGRC3.jpg" alt="image"> -->
                </div>
            </div>
            <!-- second row image ko -->
            <div class="second">
                <div class="image4">
                    <img class="image_edit4" src="images/DGRC2.jpg" alt="image">
                </div>
            </div>
        </div>

        <!-- mid section -->
        <section class="secondmiddle" id="about">

            <div class="par">

                <p class="bigtext">DGRC</p>

                <p class="smallertext">
                    DGRC is a multi-specialty pathology laboratory catering to the fields of Molecular Diagnostics,
                    Histopathology & Cytopathology, Cytogenetic, Immunohistochemistry, Biochemistry, Immunology,
                    Serology and Microbiology all under one roof.

                    DGRC have a highly skilled and globally reputed team of Doctors and laboratory professionals. We
                    believe we are capable of performing substantially all of the diagnostic healthcare tests and
                    services currently prescribed by physicians. At Decode we aim to provide reliable, reproducible
                    reports at an affordable cost and time.
                </p>
            </div>

            <div class="picture">
                <img src="images/DGRC1.jpg" alt="" class="imgPic" height="300px" />
            </div>

        </section>
    </div>


    <!-- footer -->
    <footer>
        <div class="footer" id="contact">
            <h4 class="firstcontent">we would like to be in touch with you</h4>
            <p class="secondcontent">You can connect with us through</p>
            <ul class="social">
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
            </ul>
        </div>

        <div class="mb-2 mb-lg-0">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item adminLogin">
                    <a class="nav-link active adminLoginn" aria-current="page"
                        href="admin_area/adminLogin.php">AdminLogin</a>
                </li>
            </ul>
        </div>
        <div class="copyright">
            <p>copyright &copy;2022 self-help. designed by <span>Nischal</span></p>
        </div>

    </footer>

</body>
<script src="https://kit.fontawesome.com/8195e16528.js" crossorigin="anonymous"></script>