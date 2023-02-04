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
    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
    }

?>
    <!--Header -->
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
        <div class="container w-container">
            <a href="./admin.php?id=<?php echo $id; ?>" class="brand w-nav-brand"><img src="images/tr..png" loading="lazy" alt="" class="image-2"></a>
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
                    $chid = $row['chid'];
                    $title = $row['title'];
                    $image_name = $row['img'];
                
                    ?>

                    <div class="ch-banner" style="display: block; margin: 30px;">
                        <div><img src="./images/<?php echo $image_name;?>" class="ch-cover" ></div>
                        <div class="ch-title"><?php echo $title;?></div>
                        <button type="button" class="button"><a style="color: white; text-decoration: none;" href="./channel-details-in.php?chid=<?php echo $chid; ?>&uid=<?php echo $uid?>" >View Details</a></button>
                        <button type="button" class="button" style="background-color: orange;"><a style="color: black; text-decoration: none; background-color: orange;" href="./channel-delete.php?chid=<?php echo $chid; ?>&id=<?php echo $id?>" >Delete Channel</a></button>
                    </div>
            
                 <?php  
                }
            }?>
    </div>       

    <div class="review wf-section" style="text-align: center;">
        <a href="./channel-add.php?id=<?php echo $id; ?>" class="button nav-link btn-special w-button">Add a channel</a>
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