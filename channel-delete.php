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
      if(isset($_GET['id'])){
        $id = $_GET['id'];
      }
      if(isset($_GET['chid'])){
        $chid = $_GET['chid'];
      }
  ?>
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
    <div class="hero wf-section">
        <div class="herocontainer w-container">
            <h1 class="heading" style="margin-bottom: 50px;"><span class="red">Delete </span>channel</h1>
            <div>
                <form method="post">
                    <h3>You sure you want to delete the channel?</h3>
                    <input type="submit" name="submit" value="Yes" id="postbtn" style="width: 150px; height: 40px; background-color: white; border:none; border-radius: 100vw; color: #ff1616; font-weight: bold; font-size: 20px;">
                    <a href="./channels-admin-in.php?id=<?php echo $id; ?>" class="button nav-link w-button" style="font-weight: bold; color: #ff1616;">No</a>
                </form> 
            </div>
            <?php
                if(isset($_POST['submit'])){
                    $query = "DELETE FROM channels WHERE chid = '$chid'";
                    $res_delete = mysqli_query($conn, $query);

                    if($res_delete==TRUE){
                        $_SESSION['add'] = "<div class='success'>Channel Deleted Successfully.</div>";
                        header("location:".SITEURL.'channels-admin-in.php?id='.$id);
                    }
                    else{
                        $_SESSION['add'] = "<div class='error'>Failed to Delete Channel.</div>";
                        header("location:".SITEURL.'channels-admin-in.php?id='.$id);
                    }
                }
            ?>
        </div>
    </div>