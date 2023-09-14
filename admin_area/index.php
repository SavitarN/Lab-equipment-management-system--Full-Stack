<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- font awsome -->
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/stylee.css">
    <style>
    .admin_image {
        width: 100px;
        object-fit: contain;
    }

    .footer {
        position: absolute;
        bottom: 0;
        height: 79px;
    }

    .row {
        height: 309px;
    }

    .out {
        position: relative;
        left: 1234px;
        bottom: 180px
    }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" class="logo">

                <!-- for welcome guest -->
                <nav class="navbar navbar-expand-lg  ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link"></a>
                        </li>
                    </ul>
                </nav>

            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>


        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <!-- admin name and image -->
                <div class="my-2 p-4">
                    <a href="#"><img src="../images/admin.jpg" class="admin_image"></a>
                    <!-- <p class="text-light text-center">Welcomde <?php echo $_SESSION['admin_username'];?></p> -->
                </div>

                <!-- buttons haru add view delete -->
                <div class="button text-center">
                    <button class="my-3"><a href="insertProductLatest.php"
                            class="nav-link text-light bg-info my-1 p-2 m-3">Insert products</a>
                    </button>

                    <button><a href="" class="nav-link text-light bg-info my-1 p-2  m-3">View Products</a></button>

                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 p-2  m-3">Insert
                            Categories</a></button>

                    <button><a href="../index.php" class="nav-link text-light bg-info my-1 p-2  m-3">View
                            Catagories</a></button>

                    <button><a href="" class="nav-link text-light bg-info my-1 p-2  m-3">All Payments</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
                   if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                   }
                ?>
        </div>


        <!-- last child -->
        <!-- footer -->

        <div class="bg-info p-3 text-center footer">
            <p>All rights reserved Nischal Joshi 2024</p>
        </div>
        <div class="out">
            <button class="btn"><a href=adminLogout.php>Logout</a></button>
        </div>
    </div>
    </div>



    <!-- bootstrap js links -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>

</html>