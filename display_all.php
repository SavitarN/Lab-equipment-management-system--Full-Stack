<?php

 include('includes/connect.php');
 include('functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lab equipment management system</title>
<!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<!-- Font awsome link -->
<link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- css file -->
<link rel="StyleSheet" type="text/css" href="styles/stylee.css">
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <!-- cart -->
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i
                                    class="fa-sharp fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search_data">

                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <!-- <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./">Login</a>
                </li>
            </ul> -->
        </nav>

        <!-- Third child :DGRC -->
        <div class="bg-light">
            <h3 class="text-center">Decode Genomics and Research Centre</h3>
            <p class="text-center">To become the preferred choice for all kinds of pathological diagnostic services in
                Nepal by setting the highest benchmarks in Quality, Expertise and Services.</p>
        </div>

        <!-- fourth child :product haru display-->
        <div class="row">
            <!-- since columns should always sum up to 12 so 10 and 2 -->
            <div class="col-md-10">
                <!-- dispaly all the products -->
                <div class="row">

                    <?php
             get_all_products();
           get_unique_categories();
                 
                ?>

                    <!-- row end -->
                </div>
                <!-- column end -->
            </div>
            <!-- SIDE NAV BAR -->
            <div class="col-md-2 bg-secondary p-0">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4> categories</h4>
                        </a>
                    </li>

                    <?php
                getCategories();
              
                ?>
                </ul>

            </div>
        </div>

        <!-- FOOTER -->
        <?php

  include("./includes/footer.php");

?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>