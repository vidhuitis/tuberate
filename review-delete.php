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
      if(isset($_GET['rid'])){
        $rid = $_GET['rid'];
      }
      if(isset($_GET['uid'])){
        $uid = $_GET['uid'];
      }
  ?>
    <div class="hero wf-section">
        <div class="herocontainer w-container">
            <h1 class="heading" style="margin-bottom: 50px;"><span class="red">Delete </span>Review</h1>
            <div>
                <form method="post">
                    <h3>You sure you want to delete the review?</h3>
                    <input type="submit" name="submit" value="Yes" id="postbtn" style="width: 150px; height: 40px; background-color: white; border:none; border-radius: 100vw; color: #ff1616; font-weight: bold; font-size: 20px;">
                    <a href="./user.php?uid=<?php echo $uid; ?>" class="button nav-link w-button" style="font-weight: bold; color: #ff1616;">No</a>
                </form> 
            </div>
            <?php
                if(isset($_POST['submit'])){
                    $query = "DELETE FROM reviews WHERE rid = '$rid'";
                    $res_delete = mysqli_query($conn, $query);

                    if($res_delete==TRUE){
                        $_SESSION['add'] = "<div class='success'>Review Deleted Successfully.</div>";
                        header("location:".SITEURL.'user.php?uid='.$uid);
                    }
                    else{
                        $_SESSION['add'] = "<div class='error'>Failed to Delete Review.</div>";
                        header("location:".SITEURL.'user.php?uid='.$uid);
                    }
                }
            ?>
        </div>
    </div>