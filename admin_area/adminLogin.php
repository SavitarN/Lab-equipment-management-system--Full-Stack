<?php
 session_start();
?>
<?php
$errusername=$errpass=$errcpass='';
$flag=true;
$login=false;
   if(isset($_POST['login'])){
   $username=$_POST['username'];
   $password=$_POST['pass'];
   $cpass=$_POST['cpass'];
   if(empty(trim($username))){
    $errusername="field password is empty"; 
    $flag=false;
    }
    else{
        $username=test_input($username);
    }
   if(empty(trim($password))){
    $errpass="field password is empty"; 
    $flag=false;
    }
    else{
        $password=test_input($password);
    }
    if(empty(trim($cpass))){
        $errcpass="field is empty";
        $flag=false;
    }
    else{
        $cpass=test_input($cpass);
    }
   
        if($flag&&$password==$cpass){
          
                    $conn=mysqli_connect('localhost','root','','lem') or die("connection failed");
                    $sql="SELECT * FROM admin where admin_username='$username'";
                    $result=mysqli_query($conn,$sql);
                   $num=mysqli_num_rows($result);
                    
                   if($num==1){

                   
                    while($row=mysqli_fetch_assoc($result)){
                 if(password_verify($password, $row['admin_password'])){
                    $login=true;
                    $_SESSION['admin_username']=$username;

                    header("location:index.php");
                   
                 }
                 
                    } 
                } 
            }     
        


        else{
            echo"<script>alert('login Vaena Admin')</script>";
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
        height: 280px;
        width: 400px;
        margin: 151px auto;
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
        margin: 13px auto;
        border-radius: 9px;
    }

    .fonts {
        margin: 1px 29px;

        font-family: 'Ubuntu Mono', monospace;
    }

    .button {
        height: 34px;
        width: 91px;
        margin: 10px 52px;
        padding: 5px;

        border-radius: 6px;
        background: skyblue;
        color: black;
        font-family: 'Caveat', cursive;

    }

    .button:hover {
        color: black;
    }

    .errormsg {
        color: blue;
    }
    </style>
</head>

<body>
    <div class="contactform">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <P class="fonts">username</P> <span class="errormsg"><?php echo $errusername;?></span>
            <input class="first" type="text" name="username">


            <P class="fonts">Password</P> <span class="errormsg"><?php echo $errpass;?></span>
            <input class="first" type="password" name="pass">


            <P class="fonts">confirm password</P> <span class="errormsg"><?php echo $errcpass;?></span>
            <input class="first" type="password" name="cpass">



            <span>
                <input class="button" type="submit" value="Login" name="login">
            </span>

        </form>

    </div>

</body>

</html>