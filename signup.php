<?php include('constants.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/common.css" rel="stylesheet" type="text/css">
    <link href="css/tuberate.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!--Header-->
            
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
        <div class="container w-container">
            <a href="#" class="brand w-nav-brand"><img src="images/tr..png" loading="lazy" alt="" class="image-2"></a>
            <nav role="navigation" class="w-nav-menu">
                <a href="channels.php" class="button nav-link w-button">Channels</a>
                <a href="signup.php" class="button nav-link btn-special w-button">Sign Up</a>
            </nav>
            <div class="w-nav-button">
                <div class="w-icon-nav-menu"></div>
            </div>
        </div>
    </div>

    <h2 class="heading-3" style="text-align: center; margin: 20px">Sign Up</h2>


    <!--Content Of Signup Page-->
    <div class="container w-container">
        <div class="formsignup">
            <div class="signupform">
                <form name="signupform" method="post">
                    <input type="text" placeholder="Enter your name" id="namein" name="name" class="data-inp" style="width: 250px;
  height: 50px;
  border-radius: 100vw;" required>
                    <br>
                    <br>
                    <input type="password" placeholder="Enter your password" id="passwdin" name="password" class="data-inp" style="width: 250px;
  height: 50px;
  border-radius: 100vw;" required>
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Sign Up" id="signup" style="width: 150px; height: 40px; background-color: #ff1616; border:none; border-radius: 100vw; color: white;">
                </form>   
            </div>
        </div>
    </div>
<?php 
    

    if(isset($_POST['submit']))
    {
    
        $name = $_POST['name'];
        $password = $_POST['password']; 


        $sql = "INSERT INTO users SET 
            uname='$name',
            upwd='$password',
            no_of_reviews = 0
        ";
 
        
        $res = mysqli_query($conn, $sql);

        
        if($res==TRUE)
        {

            $_SESSION['add'] = "<div class='success'>User Added Successfully.</div>";
        
            header("location:".SITEURL.'login.php');
        }
        else
        {
            
            $_SESSION['add'] = "<div class='error'>Failed to Add User.</div>";
            header("location:".SITEURL.'signup.php');
        }

    }
    
?>



    <!--Footer-->
    <section class="footer-light wf-section">
        <div class="container-2">
        <div class="footer-wrapper-two">
            <a href="#" class="footer-brand w-inline-block">
            <h1 class="footerheading"><span class="red">Tube</span>rate.</h1>
            </a>
        </div>
        <div class="footer-divider-two"></div>
        <div class="footer-bottom">
            <div class="footer-copyright">© 2022 Tuberate. All rights reserved</div>
        </div>
        </div>
    </section>

</body>
</html>