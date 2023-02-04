<?php include('constants.php')?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>USER</title>
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/common.css" rel="stylesheet" type="text/css">
  <link href="css/tuberate.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php
    if(isset($_GET['uid'])){
      $uid = $_GET['uid'];
    }
  ?>
  
  <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
    <div class="container w-container">
      <a href="./main.php?uid=<?php echo $uid; ?>" class="brand w-nav-brand"><img src="images/tr..png" loading="lazy" alt="" class="image-2"></a>
      <nav role="navigation" class="w-nav-menu">
        <a href="./channels-in.php?uid=<?php echo $uid; ?>" class="button nav-link w-button">Channels</a>
        <a href="./user.php?uid=<?php echo $uid; ?>" class="button nav-link w-button">My Profile</a>
        <a href="logout.php" class="button nav-link btn-special w-button">Log Out</a>
      </nav>
      <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>

  <?php
    $sql = "SELECT * FROM users WHERE uid = $uid";
    $sql_num = "SELECT COUNT(*) FROM reviews WHERE uid = $uid";
    $sql_review = "SELECT * FROM reviews WHERE uid = $uid";

    $res=mysqli_query($conn, $sql);
    $res_num = mysqli_query($conn,$sql_num);
    $res_review=mysqli_query($conn, $sql_review);

    $count = mysqli_num_rows($res);
    $count_num = mysqli_num_rows($res_num);
    $count_review = mysqli_num_rows($res_review);

    if($count > 0){
      while($row = mysqli_fetch_assoc($res)){
        $username = $row['uname'];
      }
    }

    if($count_num > 0){
      while($row = mysqli_fetch_assoc($res_num)){
        $nreviews = $row['COUNT(*)'];
      }
    }
  ?>
  

  <div class="section wf-section">
    <div class="titlecontain-channel">
      <div class="channelheading">
        <h2 class="heading-3"><?php echo $username ?></h2>
      </div>
      <div class="subtitlecontain-channel">
        <div>Number of reviews posted: <?php echo $nreviews?></div>
      </div>
    </div>
    
    <div class="aboutcontain-channel">
      <div class="about">
        <div class="my-reviews">
        <?php 
                    if($count_review > 0){ ?>
                      <div>
                          <h3 style="text-align: left;">My Reviews</h3>
                          <?php 
                            while($row=mysqli_fetch_assoc($res_review)){
                              $content = $row['content'];
                              $date_posted = $row['created_at'];
                              $chid = $row['chid'];
                              $rid = $row['rid'];

                              $getchannel = "SELECT title FROM channels WHERE chid = $chid";
                              $res_getchannel=mysqli_query($conn, $getchannel);
                              $row_channel = mysqli_fetch_assoc($res_getchannel);

                              $channel = $row_channel['title'];

                          ?>
                          <div id="review-card" style="width: 700px;display: flex; flex-direction:column; justify-content: center; align-items:center; margin: 20px 0; border-radius: 10px; background-color:gray; padding: 20px;">
                            <p class="paragraph-3" style="font-size: 24px; margin-right: 20px;"><?php echo $content ?></p>
                            <p class="paragraph-3" style="font-size: 16px;">Date Posted: <?php echo $date_posted ?></p>
                            <p class="paragraph-3" style="font-size: 16px;">Channel reviewed: <?php echo $channel ?></p>
                            <a href="./review-delete.php?rid=<?php echo $rid; ?>&uid=<?php echo $uid?>" class="button nav-link btn-special w-button">Delete Review</a>
                          </div>
                          
                          <?php } ?>
                          
                          
                      </div>
                  <?php  }
                    else{  ?>
                      <div class="review wf-section">
                        <h4>No Reviews Yet!</h4>  
                      </div>
        <?php  } ?>
        </div>
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
</html>