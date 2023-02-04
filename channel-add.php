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
    <?php
      if(isset($_GET['id'])){
        $id = $_GET['id'];
      }
    ?>
    <!--Header-->
            
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

    <h2 class="heading-3" style="text-align: center; margin: 20px">Add channel!</h2>


    <!--Content Of Signup Page-->
    <div class="container w-container">
        <div class="addchannelform" style="color:white; font-size: 18px;">
                <form name="addchannelform" method="post">
                    <label for="title" style="display: inline;">Channel name: </label>
                    <input type="text" id="title" name="title" class="data-inp" style="width: 250px;
  height: 50px;
  border-radius: 100vw;color: black;" required >
                    <br>
                    <br>
                    <label for="genre" style="display: inline;">Genre: </label>
                    <input type="text" id="genre" name="genre" class="data-inp" style="width: 250px;
  height: 50px;
  border-radius: 100vw;color: black;" required >
                    <br>
                    <br>
                    <label for="description" style="display: inline;">Description: </label>
                    <textarea name="description" id="description" cols="80" rows="10" style="color: black; font-size: 20px;margin: 15px 0;" required></textarea>
                    <br>
                    <br>
                    <label for="created-at" style="display: inline;">Created Date(YYYY-MM-DD): </label>
                    <input type="text" id="created-at" name="created-at" class="data-inp" style="width: 250px;
  height: 50px;
  border-radius: 100vw;color: black;" required >
                    <br>
                    <br>
                    <label for="img" style="display: inline;">Image file name: </label>
                    <input type="text" id="img" name="img" class="data-inp" style="width: 250px;
  height: 50px;
  border-radius: 100vw;color: black;" value="" autocomplete="off" required >
                    <br>
                    <br>
                    <label for="url" style="display: inline;">Youtube URL: </label>
                    <input type="text" id="url" name="url" class="data-inp" style="width: 250px;
  height: 50px;
  border-radius: 100vw;color: black;" required >
                    <br>
                    <br>
                    <label for="subs-count" style="display: inline;">Subscribers Count: </label>
                    <input type="text" id="subs-count" name="subs-count" class="data-inp" style="width: 250px;
  height: 50px;
  border-radius: 100vw;color: black;" required >
                    <br>
                    <br>
                    <label for="owner" style="display: inline;">Owner name: </label>
                    <input type="text" id="owner" name="owner" class="data-inp" style="width: 250px;
  height: 50px;
  border-radius: 100vw;color: black;" required >
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Add Channel" id="addchannel" style="width: 150px; height: 40px; background-color: #ff1616; border:none; border-radius: 100vw; color: white; display: block; font-weight: bold;">
                </form>   
            </div>
    </div>
<?php 
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $genre = $_POST['genre']; 
        $created_at = $_POST['created-at'];
        $description = $_POST['description']; 
        $img = $_POST['img']; 
        $url = $_POST['url']; 
        $subs_count = $_POST['subs-count']; 
        $owner = $_POST['owner']; 

        $sql = "INSERT INTO channels SET 
        title='$title',
        description='$description',
        genre='$genre',
        created_at='$created_at',
        img='$img',
        url='$url',
        subs_count='$subs_count',
        owner='$owner',
        random = 0 ";

        $res = mysqli_query($conn, $sql);
        ?>
        <script type="text/javascript">
            window.location = "http://localhost/tuberate/channels-admin-in.php?id=<?php echo $id?>";
        </script>
        <?php
        
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