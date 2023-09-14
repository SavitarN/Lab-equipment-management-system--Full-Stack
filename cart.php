<?php
session_start();
 include('includes/connect.php');
 include('functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cart Details</title>
<!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<!-- Font awsome link -->
<link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- css file -->
<link rel="StyleSheet" type="text/css" href="styles/stylee.css">
<style>
.cart-img {
    width: 80px;
    height: 80px;
    object-fit: contain;
}
</style>
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
                            <a class="nav-link" href="cart.php"><i
                                    class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
        <?php
                 //calling cart function//
                 cart();
        ?>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">Welcome <?php echo $_SESSION['customer_username'];?></a> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userLogout.php">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Third child :DGRC -->
        <div class="bg-light">
            <h3 class="text-center">Decode Genomics and Research Centre</h3>
            <p class="text-center">To become the preferred choice for all kinds of pathological diagnostic services in
                Nepal by setting the highest benchmarks in Quality, Expertise and Services.</p>
        </div>

        <!-- fourth child :cart table-->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">


                        <!-- php code to display dyanamic data -->
                        <!-- FUNCITON OF TOTAL CART PRICE -->
                        <!-- we are fetching data based on specific id only -->
                        <?php
        
            $get_ip = getIPAddress();
            $total=0;
            //based on ip address data will be fetched//
            $cart_query="select * from `cart_details` where ip_address= '$get_ip'";
            $result=mysqli_query($con,$cart_query);
            $result_count=mysqli_num_rows($result);
            if($result_count>0){//check garne edi cart khali xa ki xaena vanera//
              echo "
              <thead>
              <tr>
                  <th>Product Title</th>
                  <th>Product Image</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                  <th>Remove</th>
                  <th colspan='2'>Operations</th>
              </tr>
          </thead>
          <tbody>
              ";
            
            while($row=mysqli_fetch_array($result)){
                $product_id=$row['product_id'];//accessing all same ids with same ip//
                $select_products="select * from `products` where product_id= '$product_id'";
                $result_products=mysqli_query($con,$select_products);   
                 while($row_product_price=mysqli_fetch_array($result_products)){
                 $product_price=array($row_product_price['product_rate']);
                //  fetching individual product price//
                 $price_table=$row_product_price['product_rate'];
                $product_name=$row_product_price['product_name']; 
                $product_image=$row_product_price['product_image'];
               
                 $product_values=array_sum($product_price);
                 $total+= $product_values;
             

                    ?>
                        <tr>
                            <td><?php echo $product_name ?></td>
                            <td><img src="./admin_area/product_images/<?php echo $product_image?>" class="cart-img">
                            </td>
                            <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                            <?php
                                  $get_ip = getIPAddress();
                                  if(isset($_POST['update_cart'])){
                                  $quantities=$_POST['qty'];
                                  $update_cart="update `cart_details` set quantity=$quantities where ip_address=  '$get_ip'";
                                $result_quantity=mysqli_query($con,$update_cart);
                                $total=$total* $quantities;
                                    } 

                            ?>

                            <td><?php echo $price_table?>/-</td>
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                            <td>

                                <input type="submit" value="Update Cart" class="bg-info px-3 py-2 mx-3 border-0"
                                    name="update_cart">

                                <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 mx-3 border-0"
                                    name="remove_cart">

                            </td>

                        </tr>
                        <?php
                 }
                 }
            }
            else{
                echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
            }
                        ?>
                        </tbody>
                    </table>

                    <div class="d-flex mb-4">

                        <?php   
            $get_ip = getIPAddress();
            //based on ip address data will be fetched//
            $cart_query="select * from `cart_details` where ip_address= '$get_ip'";
            $result=mysqli_query($con,$cart_query);
            $result_count=mysqli_num_rows($result);
            if($result_count>0){
                echo "<h4 class='px-3'>SubTotal:<strong class='text-info'>$total</strong></h4>
                <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3 border-0'
                name='continue_shopping'>
                <button class='bg-secondary p-3 py-2 border-0'><a href='checkout.php'>Check Out</a></button>'";
            }else{
              echo"  <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3 border-0'
                name='continue_shopping'>";
            }
            if(isset($_POST['continue_shopping'])){
                echo "<script>window.open('index.php','_self')</script>";
            }
                    ?>


                    </div>

            </div>
        </div>
        </form>

        <!-- function to remove item -->
        <?php
      function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
            //accessing the product id as removeitem array contains the product id as a value//
           foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="delete from `cart_details` where product_id= $remove_id";
            $run_delete=mysqli_query($con, $delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
           }
        }
      }
      echo $remove_item=remove_cart_item();

              ?>

        <!-- FOOTER -->
        <!-- <?php
      include("./includes/footer.php");
?> -->

    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>