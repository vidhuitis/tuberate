<?php include('constants.php');?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>TUBERATE</title>
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/common.css" rel="stylesheet" type="text/css">
  <link href="css/tuberate.css" rel="stylesheet" type="text/css">
  <link href="css/channel.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
    if(isset($_GET['uid']))
    {
      $uid = $_GET['uid'];
    }

?>
    <!--Header -->
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
    <div class="container w-container">
      <a href="./index.php" class="brand w-nav-brand"><img src="images/tr..png" loading="lazy" alt="" class="image-2"></a>
      <nav role="navigation" class="w-nav-menu">
        <a href="channels.php" class="button nav-link w-button">Channels</a>
        <a href="login.php" class="button nav-link btn-special w-button">Log In</a>
      </nav>
      <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  
    
    <div class="ch-container" style="display: flex;
    flex-wrap: wrap;
    width: 80%;
    margin: 0 100px;
    align-items: flex-start; justify-content: space-between">
        <?php 
            $sql = "SELECT * FROM channels";

            //Execute the Query
            $res=mysqli_query($conn, $sql);
            //Count Rows
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the Values
                    $id = $row['chid'];
                    $title = $row['title'];
                    $image_name = $row['img'];
                
                    ?>

                    <div class="ch-banner" style="display: block; margin: 30px;">
                        <div><img src="./images/<?php echo $image_name;?>" class="ch-cover" ></div>
                        <div class="ch-title"><?php echo $title;?></div>
                        <button type="button" class="button"><a style="color: white; text-decoration: none;" href="./channel-details.php?chid=<?php echo $id; ?>" >View Details</a></button>
                    </div>
            
                 <?php  
                }
            }?>
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
</html>