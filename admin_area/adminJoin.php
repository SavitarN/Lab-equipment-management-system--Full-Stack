<?php
$errUsername=$errpass=$errCpass='';
$Username=$password=$Cpassword='';
$flag=true;
if(isset($_POST['signin'])){
    $Username=$_POST['Username'];
    $password=$_POST['pass'];
    $Cpassword=$_POST['Cpass'];
  

    if(empty(trim($Username))){
    $errUsername="field username is empty"; 
    $flag=false;
    }
    else{
        if(!preg_match("/^[a-zA-Z]+$/",$Username)){
            $errusername="username should only contain character";
            $falg=false;
        }
        $Username=test_input($Username);
    }
    if(empty(trim($password))){
        $errpass="field password is empty"; 
        $flag=false;
        }
        else{
            if(strlen($password)<=8){
                $flag=false; 
                $errpass="Atleast 8 digits"; 
               
            }
            elseif(!preg_match("#[0-9]+#",$password)){
                
                $flag=false; 
                $errpass="Atleast one digit is necessary";  
               
            }
            elseif(!preg_match("#[a-z]+#",$password)){
                $flag=false; 
                $errpass="Atleast one lowerCase necessary";  
            }
            elseif(!preg_match("#[A-Z]+#",$password)){
                $flag=false; 
                $errpass="Atleast one UpperCase necessary";  
            }
            $password=test_input($password);
        }
        if(empty(trim($Cpassword))){
            $errCpass="field Confirm Password is empty"; 
            $flag=false;
            }
            else{
                $Cpassword=test_input($Cpassword);
            }

                if($flag &&$password==$Cpassword){
                    $hash=password_hash($password,PASSWORD_DEFAULT);
                    $conn=mysqli_connect('localhost','root','','lem');
                    $sql="INSERT INTO admin(admin_username,admin_password)VALUES('$Username','$hash')";
                    $result=mysqli_query($conn,$sql);
                }
                elseif($password!==$Cpassword){
                    echo"<script>alert('Both Password Field should match')</script>";
                }

            }
            function test_input($data){
                $data=stripslashes($data);//removes backslasehs//
                $data=htmlspecialchars($data);//prevents sql injection //
                return $data;
            }

         
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Gentium+Plus&family=Kdam+Thmor+Pro&family=Ms+Madi&family=Oleo+Script&family=Radio+Canada:wght@300&family=Raleway:wght@200&family=Square+Peg&family=Tai+Heritage+Pro:wght@700&family=Ubuntu+Mono&family=Ubuntu:wght@300&family=Water+Brush&family=Zen+Antique&display=swap"
        rel="stylesheet">

    <!-- imported css -->
    <link rel="StyleSheet" type="text/css" href="../styles/stylee.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Gentium+Plus&family=Kdam+Thmor+Pro&family=Ms+Madi&family=Oleo+Script&family=Radio+Canada:wght@300&family=Raleway:wght@200&family=Square+Peg&family=Tai+Heritage+Pro:wght@700&family=Ubuntu+Mono&family=Ubuntu:wght@300&family=Water+Brush&family=Zen+Antique&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Font awsome link -->
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        /* background: url(images/backgroundyoga.jpg); */
        height: 600px;
        background-size: cover;

    }

    .contactform {
        position: relative;
        height: 614px;
        width: 400px;
        margin: 9px auto;
        padding: 24px 40px;
        border: 1px solid black;
        background-color: lightblue;
        border-radius: 12px;


    }

    .first {
        display: flex;
        justify-content: center;
        height: 28px;
        width: 342px;
        margin: 3px auto;
        border-radius: 9px;
    }

    .second {
        display: flex;
        justify-content: center;
        width: 1o;
        width: 342px;
        margin: 3px auto;

        border-radius: 9px;
    }

    .fonts {
        margin: 1px 29px;

        font-family: 'Ubuntu Mono', monospace;
    }

    .mainlogo {
        margin: 9px 23px;
        font-family: 'Caveat', cursive;
    }

    .button {
        height: 34px;
        width: 109px;
        margin: 10px 38px;
        padding: 5px;
        border-radius: 6px;
        background: skyblue;
        color: black;
        font-family: 'Caveat', cursive;

    }

    .button:hover {
        background-color: chocolate;
    }

    .foot {
        display: flex;
        justify-content: center;
    }

    .login {
        padding: 18px 4px;
    }

    .login a {
        list-style: none;
        text-decoration: none;
        color: green;
    }

    .login a:hover {
        color: black;
    }

    .error {
        color: red;
    }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" class="logo">
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
        </nav>
    </div>


    <div class="contactform">

        <h2 class="mainlogo">Join DGRC</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <P class="fonts">User Name</P><span class="error"><?php echo $errUsername;?></span>
            <input class="first" type="text" name="Username">

            <P class="fonts">Password</P><span class="error"><?php echo $errpass;?></span>
            <input class="first" type="password" name="pass">

            <P class="fonts">Confirm Password</P><span class="error"><?php echo $errCpass;?></span>
            <input class="first" type="password" name="Cpass">

            <span class="foot">
                <input class="button" type="submit" value="Create Account" name="signin">
                <span>
                    <p class="login">Have an account? <a href="login.php">Login</a></p>

                </span>
            </span>


        </form>

    </div>

    <?php
 include("../includes/footer.php");

?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>