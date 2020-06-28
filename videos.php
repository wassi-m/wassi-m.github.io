<?php include "connect.php"; ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>W.A Lyric Videos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="mycss.css">
        <link rel="icon" href="favicon.png">
        <script type="text/javascript" src="javascript.js"> </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                if (localStorage.getItem("my_app_name_here-quote-scroll") != null) {
                     $(window).scrollTop(localStorage.getItem("my_app_name_here-quote-scroll"));
                    }

                $(window).on("scroll", function() {
                    localStorage.setItem("my_app_name_here-quote-scroll", $(window).scrollTop());
            });

        });

        $( "#menu1" ).click(function() {
            $( "#blurall" ).fadeIn( "slow", function() {
                // Animation complete
            });
        });

        $( "#menu2" ).click(function() {
            $( "#blurall" ).fadeOut( "slow", function() {
                // Animation complete
            });
        });
        </script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header" id="myHeader">
            <span id="title1" class="titletext">Lyric</span>
            <img src="favicon.png" class="logo" id= 'logo' draggable="false">
            <span id="title2" class="titletext">Videos</span>
        </div>

        <div id="menubtn" >
            <img src="menu1.png" height="50px" id='menu1' draggable="false" onclick="sidemenuin()">
            <img src="menu2.png" height="50px" id='menu2' draggable="false" onclick="sidemenuout()">
        </div>

        <div id='menu'>
            <?php
                session_start();
                if (!isset($_SESSION['loggedin'])) {
	                echo '<span><a href="login.php" class="links"><img src="icons/user.png" class="icon"> Login</a></span><br>';}
                else {echo '<span><a href="profile.php" class="links"><img src="icons/user.png" class="icon">'.$_SESSION['name'].'</a><a href="logout.php"><img src="icons/logout.png" class="icon" id="logout"/></a></span><br>';}
            ?>
            <img src="icons/divider.png" id="menudivider" width = "90%" draggable="false"/><br>
            <span><a href="index.php" class="links"><img src="icons/home.png" class="icon"> Home</a></span><br>
            <span><a href="videos.php" class="links"><img src="icons/videos.png" class="icon">Videos</a></span><br>
            <span><a href="calculator.php" class="links"><img src="icons/calculator.png" class="icon">Price Calculator</a></span><br>
            <span><a href="request.php" class="links"><img src="icons/buy.png" class="icon">Request Lyric Video</a></span><br>
            <span><a href="contact.php" class="links"><img src="icons/contact.png" class="icon">Contact Us</a></span>

        
        </div>
        <div id='blurall'  onclick="sidemenuout()"></div>

        <div class="leftT" id="ourvids">Our Videos</div>

        <div class="vidbody">
        <?php
            $n = 0 ;
            $query = mysqli_query($connect,"SELECT * FROM `videos` ORDER BY `videos`.`id` DESC");

            while ($row = mysqli_fetch_array($query)) {
                $explodedlink = explode("=", $row['youtubelink']);
                $code= $explodedlink[1];
                echo '
                        <div class="vidcontainer">
                            <a href="?vid='.$code.'">
                            <div class="imgcontainer"><img src="https://img.youtube.com/vi/'.$code.'/mqdefault.jpg" draggable="false" onerror="this.onerror=null; this.src=\'menu2.png\'" width=90%" class="vidimage"></div>
                            <span class="vidtitle">'.$row['title'].'</span>
                            <br>
                            <span class="vidartist">'.$row['artist'].'</span>
                            </a>
                        </div>';}

            

            
        ?> 
        </div>
        <div class="divider2"></div>

        <div class="leftT" id="fanvids">Fan Videos</div>

        <div class="vidbody">
        <?php
            $query = mysqli_query($connect,"SELECT * FROM `fanvideos` ORDER BY `fanvideos`.`id` DESC");

            while ($row1 = mysqli_fetch_array($query)) {
                $explodedlink = explode("=", $row1['youtubelink']);
                $code= $explodedlink[1];
                    echo '
                        <div class="vidcontainer">
                            <a href="?vid='.$code.'">
                            <div class="imgcontainer"><img src="https://img.youtube.com/vi/'.$code.'/mqdefault.jpg" draggable="false" onerror="this.onerror=null; this.src=\'menu2.png\'" width="90%" class="vidimage"></div>
                            <span class="vidtitle">'.$row1['title'].'</span>
                            <br>
                            <span class="vidartist">'.$row1['artist'].'</span>
                            </a>
                        </div>';}

                if (isset($_GET['vid'])){
                    $query = mysqli_query($connect, "SELECT `youtubelink` FROM `videos` WHERE `youtubelink` = 'https://www.youtube.com/watch?v=". $_GET['vid'] ."' UNION SELECT `youtubelink` FROM `fanvideos` WHERE `youtubelink` = 'https://www.youtube.com/watch?v=". $_GET['vid'] ."'");
                    $row= mysqli_fetch_array($query);
                    if (count($row)>0){
                        echo '<a href="videos.php"><div class="blurall"><div class="ytvideo"><iframe src="https://www.youtube.com/embed/' .$_GET['vid'] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                                <img src="menu2.png" class="x"></div></a>' ;}
                                
                        }


            mysqli_close($connect);
        ?> 
        </div>
        <div class="divider"></div>

    </body>
</html>