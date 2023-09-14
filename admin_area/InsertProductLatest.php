<?php

  include('../includes/connect.php');

  if(isset($_POST['insert_product'])){
    $product_name=$_POST['product_name'];
    $product_rate=$_POST['product_rate'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_quantity=$_POST['product_quantity'];
    $product_category=$_POST['product_category'];
    // for image///
    $product_image=$_FILES['product_image']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    $product_status=$_POST['product_status'];
    //accessing image temporary name//
    $temp_image=$_FILES['product_image']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //condition empty checking//
   if( $product_name==''or $product_rate=='' or$product_description=='' or $product_quantity=='' or $temp_image==''){
      echo"<script>alert('please fill all the avilable fields')</script>";
      exit();
   }
   else{
    move_uploaded_file( $temp_image,"./product_images/$product_image");
    move_uploaded_file( $temp_image2,"./product_images/$product_image2");
    move_uploaded_file( $temp_image3,"./product_images/$product_image3");

       //insert query//
       $insert_products="insert into `products`(product_name,product_rate,product_description,product_keyword,product_quantity,product_category,product_image,product_image2,product_image3,product_status) values('$product_name','$product_rate','$product_description','$product_keywords',
       $product_quantity,'$product_category','$product_image','$product_image2','$product_image3','$product_status')";

       $result_query=mysqli_query($con,$insert_products);
       if($result_query){
        echo"<script>alert('succesfully added')</script>";
       }
   }
//    if($product_quantity>1){
//     echo "<script>alert('Product Quantity should be more than 1')</script>"
//    }

  }
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- font awsome -->
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../style.css">

    <style>
    .container {
        border: 2px solid black;
        border-radius: 2px;
        background-color: skyblue;
        width: 750px;
    }

    .admin {
        height: 50px;
        width: 100px;
        position: relative;
        left: 309px;

    }

    */
    </style>
</head>

<body class="bg-light">

    <div class="admin">
        <p>
            <!-- <h4>Welcome <?php echo $_SESSION['admin_username'];?></h4> -->
        </p>
    </div>
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>

        <!-- Forms -->

        <form action="" method="post" enctype="multipart/form-data">
            <!-- name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_name" class="form-label">Equipment Name</label>

                <input type="text" name="product_name" id="Product_name" class="form_control" size="38"
                    placeholder="Enter the Equipment Name" autocomplete="off" required="required">
            </div>
            <!-- rate -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_rate" class="form-label">Equipment Rate</label>

                <input type="text" name="product_rate" id="Product_rate" class="form_control" size="38"
                    placeholder="Enter the Equipment rate" autocomplete="off" required="required">
            </div>
            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>

                <textarea id="description" name="product_description" id="product_description" class="form_control"
                    placeholder="Enter the Equipment Description" autocomplete="off" required="required" cols="38"
                    rows="1"></textarea>
                <!-- 
                <input type="text" name="product_description" id="description" class="form_control" size="40"
                    placeholder="Enter the Equipment Description" autocomplete="off" required="required"> -->
            </div>
            <!-- product keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>

                <input type="text" name="product_keywords" id="product_keywords" class="form_control"
                    placeholder="Enter the product keywords" autocomplete="off" required="required" size="38">
            </div>
            <!-- quantity -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_quantity" class="form-label">Product Quantity</label>

                <input type="text" name="product_quantity" id="product_quantitiy" class="form_control"
                    placeholder="Enter the product quantity" autocomplete="off" required="required" size="38">
            </div>

            <!-- category -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                $select_query="select * from `categories`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc( $result_query)){
                    $category_name=$row['category_name'];
                    $category_id=$row['category_id'];

                    echo "<option value='$category_name'> $category_name</option>";

                }

?>
            </div>

            <!-- img 1 -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Product Image</label>

                <input type="file" name="product_image" id="product_image" class="form_control" required="required">
            </div>
            <!-- img 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>

                <input type="file" name="product_image2" id="product_image2" class="form_control" required="required">
            </div>

            <!-- img 3 -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>

                <input type="file" name="product_image3" id="product_image3" class="form_control" required="required">
            </div>


            <!-- product keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_status" class="form-label">Product status</label>

                <input type="text" name="product_status" id="product_status" class="form_control"
                    placeholder="Enter the product status" autocomplete="off" required="required" size="38">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>