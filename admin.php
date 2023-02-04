<?php include('constants.php')?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>ADMIN</title>
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/common.css" rel="stylesheet" type="text/css">
  <link href="css/tuberate.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
        if(isset($_GET['id'])){
        $id = $_GET['id'];
        }
    ?>
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
        <div class="container w-container">
        <a href="./main.php?uid=<?php echo $uid; ?>" class="brand w-nav-brand"><img src="images/tr..png" loading="lazy" alt="" class="image-2"></a>
        <nav role="navigation" class="w-nav-menu">
            <a href="./channels-admin-in.php?id=<?php echo $id; ?>" class="button nav-link w-button">Channels</a>
            <a href="./admin.php?id=<?php echo $id; ?>" class="button nav-link w-button">Admin Profile</a>
            <a href="./adminlogout.php" class="button nav-link btn-special w-button">Log Out</a>
        </nav>
        <div class="w-nav-button">
            <div class="w-icon-nav-menu"></div>
        </div>
        </div>
    </div>



  <?php
    $sql = "SELECT * FROM adminlogin WHERE id = '$id'";
    
    $res=mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count > 0){
      while($row = mysqli_fetch_assoc($res)){
        $username = $row['username'];
      }
    }

  ?>
  

  <div class="section wf-section">
    <div class="titlecontain-channel">
      <div class="channelheading">
        <h2 class="heading-3"><?php echo $username ?></h2>
      </div>
      <div class="subtitlecontain-channel">
        Go to channels page to delete channels.
      </div>
    </div>
  </div>

    


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