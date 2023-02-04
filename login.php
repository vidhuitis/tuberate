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
            <a href="index.php" class="brand w-nav-brand"><img src="images/tr..png" loading="lazy" alt="" class="image-2"></a>
            <nav role="navigation" class="w-nav-menu">
                <a href="channels.php" class="button nav-link w-button">Channels</a>
                <a href="login.php" class="button nav-link btn-special w-button">Log In</a>
                <a href="signup.php" class="button nav-link btn-special w-button">Sign Up</a>
            </nav>
            <div class="w-nav-button">
                <div class="w-icon-nav-menu"></div>
            </div>
        </div>
    </div>
<?php 
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
     <!--body-->
     <h2 class="heading-3" style="text-align: center; margin: 20px">Login</h2>

     <div class="container w-container">
        <form action="" method="post">
            <input type="text" id="namelp" name="username" required placeholder="USERNAME">
            <input type="password" id="passlp" name="password" required placeholder="PASSWORD">
            <br><br>
            <input type="submit" name="submit" value="LOGIN" id="loginbtn" style="width: 150px; height: 40px; background-color: #ff1616; border:none; border-radius: 100vw; color: white;">
            <a href="signup.php" id="tosignup" class="button btn-special w-button">New User? Signup</a>
        </form>
    </div>
    <?php 

   
    if(isset($_POST['submit']))
    {
    
        $username = mysqli_real_escape_string($conn, $_POST['username']);       
        $password = mysqli_real_escape_string($conn, $_POST['password']);       
        $sql = "SELECT * FROM users WHERE  uname='$username' AND upwd='$password'";
        $res = mysqli_query($conn, $sql);     
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $row = mysqli_fetch_assoc($res);
            $uid=$row['uid'];
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it
            header('location:'.SITEURL.'main.php?uid='.$uid);
        }
        else
        {

            $_SESSION['no-login-message'] = "<div class='error'>Username or Password did not match.</div>";
            header('location:'.SITEURL.'login.php?');
        }


    }

?>

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