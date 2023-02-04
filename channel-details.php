<?php include('constants.php')?>
<html>
<head>
  <meta charset="utf-8">
  <title>Channel</title>
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/common.css" rel="stylesheet" type="text/css">
  <link href="css/tuberate.css" rel="stylesheet" type="text/css">
  <link href="css/channel.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php
      if(isset($_GET['uid'])){
        $uid = $_GET['uid'];
      }
      if(isset($_GET['chid'])){
        $chid = $_GET['chid'];
      }
  ?>
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
  
  <div class="section wf-section">
    <?php 
            $sql = "SELECT * FROM channels WHERE chid = $chid";
            $sql_review = "SELECT * FROM reviews WHERE chid = $chid";
            $sql_user = 'SELECT * FROM users WHERE uid = $uid';
            $sql_rating = "SELECT current_rating FROM ratings WHERE chid = '$chid'";

            //Execute the Query
            $res=mysqli_query($conn, $sql);
            $res_review=mysqli_query($conn, $sql_review);
            $res_user = mysqli_query($conn,$sql_user);
            $res_rating = mysqli_query($conn,$sql_rating);
            $rate_row = mysqli_fetch_assoc($res_rating);
            $rate_value = $rate_row['current_rating'];
          
            //Count Rows
            $count = mysqli_num_rows($res);
            $count_review = mysqli_num_rows($res_review);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the Values
                    $id = $row['chid'];
                    $title = $row['title'];
                    $description = $row['description']; 
                    $genre = $row['genre'];
                    $created_at = $row['created_at'];
                    $url = $row['url'];
                    $image_name = $row['img'];
                    $subs = $row['subs_count'];
                    $rate = $row['rating'];
                    $owner = $row['owner'];

                
    ?>
                  <div class="titlecontain-channel">
                    <div class="channelheading">
                      <h2 class="heading-3"><?php echo $title?></h2>
                    </div>
                    <div class="subtitlecontain-channel">
                      <div>Genre: <?php echo $genre?> </div>
                      <div class="dot"></div>
                      <div>Created On: <?php echo $created_at?></div>
                    </div>
                    <div class="subtitlecontain-channel">
                      <div>Owner: <?php echo $owner?></div>
                    </div>
                  </div>

                  <div class="content" style="width: 1000px;">
                    <div class="imagecontain-channel" style="background-color: rgba(0,0,0,0);">
                      <img src="./images/<?php echo $image_name;?>" alt="" style = "height: 400px;">
                    </div>
                    <div class="play-contain is--big">
                        <a href="<?php echo $url?>" class="play is--big w-inline-block" target="blank"><img src="images/Play-Button-Circled.png" loading="lazy" alt="" class="playicon is--big"></a>
                      </div>
                  </div>


                  <div class="aboutcontain-channel">
                    <div class="about">
                      <p class="paragraph-2"> <?php echo $description?> </p>
                      <div class="datanumbers">
                        <div class="data">
                          <div class="text-block-2"><?php echo $subs?></div>
                          <div>SUBSCRIBERS</div>
                        </div>
                      </div>
                      <div class="datanumbers">
                        <div class="data">
                          <div class="text-block-2"><?php echo round($rate_value,2)?><span><img src="./images/icons8-star-50.png"></span></div>
                          <div>RATING</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php 
                    if($count_review > 0){ ?>
                      <div>
                          <h3 style="text-align: left;">Reviews</h3>
                          <?php 
                            while($row=mysqli_fetch_assoc($res_review)){
                              $content = $row['content'];
                              $date_posted = $row['created_at'];
                            
                          ?>
                          <div id="review-card" style="width: 700px;display: flex; justify-content: center; align-items:center; margin: 20px 0; border-radius: 10px; background-color:gray; padding: 20px;">
                            <p class="paragraph-3" style="font-size: 24px; margin-right: 20px;"><?php echo $content ?></p>
                            <p class="paragraph-3" style="font-size: 16px;">Date Posted: <?php echo $date_posted ?></p>
                          </div>
                          <?php } ?>
                          
                          
                      </div>
                  <?php  }
                    else{  ?>
                      <div class="review wf-section">
                        <h4>No Reviews Yet!</h4>  
                      </div>
                  <?php  }   
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