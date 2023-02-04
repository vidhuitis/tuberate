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

      $sql_review = "SELECT * FROM reviews WHERE chid = $chid";
      $res_review=mysqli_query($conn, $sql_review);
      $count_review = mysqli_num_rows($res_review);
      $count_review++;

  ?>
    <div class="hero wf-section">
        <div class="herocontainer w-container">
            <h1 class="heading" style="margin-bottom: 50px;"><span class="red">Add your </span>review</h1>
            <div>
                <form method="post">
                    <textarea name="review-text" id="review-text" cols="75" rows="7" placeholder="Enter your review here: " style="color: black; font-size: 20px;margin: 15px 0;" required></textarea>
                    <label for="rating" style="color: white; font-size: 20px;margin-top: 20px;">Enter rating(0-5):</label>
                    <input id="rating" name="rating" type="number" min = "0" max="5" style="width: 50px; color: black; margin-bottom: 40px;" value="0" required><br>
                    <input type="submit" name="submit" value="Post" id="postbtn" style="width: 150px; height: 40px; background-color: #ff1616; border:none; border-radius: 100vw; color: white; font-weight: bold; font-size: 20px;">
                </form> 
            </div>
            <?php
                if(isset($_POST['submit'])){
                    $date = date('Y/m/d', time());
                    $review = $_POST['review-text'];
                    $rating = $_POST['rating'];
                    
                    $query = "INSERT INTO reviews SET chid = '$chid', uid = '$uid',created_at = '$date', content = '$review', rating = '$rating'";
                    $res_post = mysqli_query($conn, $query);
                    $rate_sum_query = "UPDATE ratings SET rating_sum = rating_sum + '$rating' WHERE chid  = '$chid'";
                    $res_sum_query = mysqli_query($conn, $rate_sum_query);

                    $get_rate_sum  = "SELECT rating_sum FROM ratings WHERE chid = '$chid'";
                    $res_get_rate_sum = mysqli_query($conn, $get_rate_sum);

                    $row = mysqli_fetch_assoc($res_get_rate_sum);
                    $rate_sum = $row['rating_sum'];

                    $rate_update_query = "UPDATE ratings SET current_rating = '$rate_sum'/'$count_review' WHERE chid  = '$chid'";
                    $res_rate_query = mysqli_query($conn, $rate_update_query);


                    if($res==TRUE && $res_sum_query && $res_rate_query){
                        $_SESSION['add'] = "<div class='success'>Review Added Successfully.</div>";
                        header("location:".SITEURL.'channel-details-in.php?uid='.$uid.'&chid='.$chid);
                    }
                    else{
                        $_SESSION['add'] = "<div class='error'>Failed to Add Review.</div>";
                        header("location:".SITEURL.'channel-details-in.php?uid='.$uid.'&chid='.$chid);
                    }
                }
            ?>
        </div>
    </div>
</body>