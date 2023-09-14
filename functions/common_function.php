<?php
include('./includes/connect.php');


//getting products(only limited to 5//

 function getProducts(){
    global $con;
    //condition to check if category is set or not//
    if(!isset($_GET['category'])){



    $select_query="Select * from `products` order by rand() limit 0,4";
    $result_query=mysqli_query($con,$select_query);
    // $row=mysqli_fetch_assoc($result_query);

    while($row=mysqli_fetch_assoc($result_query)){
       $product_id=$row['product_id'];
       $product_name=$row['product_name'];
       $product_rate=$row['product_rate'];
       $product_description=$row['product_description'];
       $product_keyword=$row['product_keyword'];
       $product_quantity=$row['product_quantity'];
       $product_image=$row['product_image'];
       $product_status=$row['product_status'];
       
       echo"
       <div class='col-md-4 mb-2'>
       <div class='card'>
           <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_name' height='400px'>
           <div class='card-body'>
               <h5 class='card-title'>$product_name</h5>
               <p class='card-text'>$product_description</p>
               <p class='card-text'> $product_rate</p>
               <p class='card-text'>$product_status</p>
             <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
               <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
           </div>
       </div> 
       </div>
       ";
    }
 }
 }

         //getting all the products//

         function get_all_products(){
            global $con;
            //condition to check if category is set or not//
            if(!isset($_GET['category'])){
        
        
        
            $select_query="Select * from `products` order by rand()";
            $result_query=mysqli_query($con,$select_query);
            // $row=mysqli_fetch_assoc($result_query);
        
            while($row=mysqli_fetch_assoc($result_query)){
               $product_id=$row['product_id'];
               $product_name=$row['product_name'];
               $product_rate=$row['product_rate'];
               $product_description=$row['product_description'];
               $product_keyword=$row['product_keyword'];
               $product_quantity=$row['product_quantity'];
               $product_image=$row['product_image'];
               $product_status=$row['product_status'];
               
               echo"
               <div class='col-md-4 mb-2'>
               <div class='card'>
                   <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_name' height='400px'>
                   <div class='card-body'>
                       <h5 class='card-title'>$product_name</h5>
                       <p class='card-text'>$product_description</p>
                       <p class='card-text'>$product_status</p>
                      
                           <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                   </div>
               </div> 
               </div>
               ";
            }
         }

         }

       //getting unique categories//
       //if euta kunai particular category select vako xa vane//
       function get_unique_categories(){
        global $con;
        //condition to check if category is set or not//
        if(isset($_GET['category'])){
    
           $category_name=$_GET['category'];
    
        $select_query="Select * from `products` where product_category='$category_name'";
        $result_query=mysqli_query($con,$select_query);
        
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No Stock for this category</h2>";
        }
    
        while($row=mysqli_fetch_assoc($result_query)){
           $product_id=$row['product_id'];
           $product_name=$row['product_name'];
           $product_rate=$row['product_rate'];
           $product_description=$row['product_description'];
           $product_keyword=$row['product_keyword'];
           $product_quantity=$row['product_quantity'];
           $product_image=$row['product_image'];
           $product_status=$row['product_status'];
           
           echo"
           <div class='col-md-4 mb-2'>
           <div class='card'>
               <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_name'>
               <div class='card-body'>
                   <h5 class='card-title'>$product_name</h5>
                   <p class='card-text'>$product_description</p>
                   <p class='card-text'>$product_status</p>
                   <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
               </div>
           </div> 
           </div>
           ";
        }
    }
     }
    
 //displaying categories//
function getCategories(){
    global $con;
    $select_categories="select * from `categories`";
    $result_categories=mysqli_query($con,$select_categories);

    while($row_data=mysqli_fetch_assoc($result_categories)){
        $category_title=$row_data['category_name'];
        $category_id=$row_data['category_id'];
        echo" <li class='nav-item'>
        <a href='index.php?category=$category_title' class='nav-link text-light'>$category_title</a>
    </li>";
    } 
}

      //searching products//

    function search_product(){
        //21//
    global $con;
    if(isset($_GET['search_data_product']))
    { 
     $search_data_value=$_GET['search_data'];
   $search_query="select * from `products` where product_keyword like '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    // $row=mysqli_fetch_assoc($result_qury);
 
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>Sorry No Products found </h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
       $product_id=$row['product_id'];
       $product_name=$row['product_name'];
       $product_rate=$row['product_rate'];
       $product_description=$row['product_description'];
       $product_keyword=$row['product_keyword'];
       $product_quantity=$row['product_quantity'];
       $product_image=$row['product_image'];
       $product_status=$row['product_status'];
       
       echo"
       <div class='col-md-4 mb-2'>
       <div class='card'>
           <img src='./admin_area/product_images/$product_image' class='card-img-top alt'='$product_name'>
           <div class='card-body'>
               <h5 class='card-title'>$product_name</h5>
               <p class='card-text'>$product_description</p>
               <p class='card-text'>$product_status</p>
                   <a href='#' class='btn btn-info'>Add to cart</a>
                   <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
           </div>
       </div> 
       </div>
       ";
    }
 }
 } 
    
    //   view detail function//
    function view_details(){
        global $con;
        //condition to check if category is set or not//

        if(isset($_GET['product_id'])){

        
        if(!isset($_GET['category'])){
    
            $product_id=$_GET['product_id'];
    
        $select_query="Select * from `products` where product_id=$product_id";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
           $product_id=$row['product_id'];
           $product_name=$row['product_name'];
           $product_rate=$row['product_rate'];
           $product_description=$row['product_description'];
           $product_quantity=$row['product_quantity'];
           $product_image=$row['product_image'];
           $product_image2=$row['product_image2'];
           $product_image3=$row['product_image3'];
           $product_status=$row['product_status'];
           
           echo"
           <div class='col-md-4 mb-2'>
           <div class='card'>
               <img src='./admin_area/product_images/$product_image' class='card-img-top alt'='$product_name'>
               <div class='card-body'>
                   <h5 class='card-title'>$product_name</h5>
                   <p class='card-text'>$product_description</p>
                   <p class='card-text'>$product_status</p>
                   <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                   <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
               </div>
           </div> 
           </div>
           
           <div class='col-md-8'>
           <!-- realted images -->

           <div class='row'>
               <div class='col-md-12'>
                   <h4 class='text-center text-info mb-5'>Related Products</h4>
               </div>
               <div class='col-md-6'>
                   <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_name'>

               </div>
               <div class='col-md-6'>
                   <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_name'>

               </div>
           </div>
       </div>
           ";
        }
     }
    }
    }

    // get ip address funciton//
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    } 
    
    //cart function//
    /*each and every user will have unique ip addresses now using their ip address wee will fetch the */ 
    function cart(){
        if(isset($_GET['add_to_cart'])){
            global $con;
           $get_ip = getIPAddress();  //result is ip address//
           $get_product_id=$_GET['add_to_cart'];//we get the product id//
           $select_query="select * from `cart_details` where ip_address=   '$get_ip' and product_id= $get_product_id";
           $result_query=mysqli_query($con,$select_query);
           $num_of_rows=mysqli_num_rows($result_query);
           if($num_of_rows>0){
               echo "<script>alert('Item Already Present Inside Cart')</script>";
               echo "<script>window.open('index.php','_self')</script>";
           }else{
            $insert_query="insert into `cart_details`(product_id,ip_address,quantity) values($get_product_id,'$get_ip',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('Item added to Cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
           }


        }

    }

    //funtion to get cart item number//
    function cart_item(){
        if(isset($_GET['add_to_cart'])){
            global $con;
           $get_ip = getIPAddress();  //result is ip address//
         
           $select_query="select * from `cart_details` where ip_address='$get_ip'";
           $result_query=mysqli_query($con,$select_query);
           $count_cart_items=mysqli_num_rows($result_query);
        }
         else{
            global $con;
            $get_ip = getIPAddress();  //result is ip address//
            $select_query="select * from `cart_details` where ip_address='$get_ip'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
           }
           echo  $count_cart_items;


        }


        //total price function//
        function total_cart_price(){
            global $con;
            $get_ip = getIPAddress();
            $total=0;
            //based on ip address data will be fetched//
            $cart_query="select * from `cart_details` where ip_address= '$get_ip'";
            $result=mysqli_query($con,$cart_query);
            while($row=mysqli_fetch_array($result)){
                $product_id=$row['product_id'];//accessing all same ids with same ip//
                $select_products="select * from `products` where product_id= '$product_id'";
                $result_products=mysqli_query($con,$select_products);   
                 while($row_product_price=mysqli_fetch_array($result_products)){
                 $product_price=array($row_product_price['product_rate']);
                 $product_values=array_sum($product_price);
                 $total+= $product_values;
                 }
            }
            echo $total;

        } 

?>