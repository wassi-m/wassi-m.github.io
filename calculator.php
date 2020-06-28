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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="javascript.js"> </script>
        <script type="text/javascript">
            $(document).ready(function () {

                if (localStorage.getItem("my_app_name_here-quote-scroll") != null) {
                     $(window).scrollTop(localStorage.getItem("my_app_name_here-quote-scroll"));
                    }

                $(window).on("scroll", function() {
                    localStorage.setItem("my_app_name_here-quote-scroll", $(window).scrollTop());
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
                else {echo '<span><a href="profile.php" class="links"><img src="icons/user.png" class="icon">'.$_SESSION['name'].'</a> <a href="logout.php"><img src="icons/logout.png" class="icon" id="logout"/></a> </span><br>';}
            ?>
            <img src="icons/divider.png" id="menudivider" width = "90%" draggable="false"/><br>
            <span><a href="index.php" class="links"><img src="icons/home.png" class="icon"> Home</a></span><br>
            <span><a href="videos.php" class="links"><img src="icons/videos.png" class="icon">Videos</a></span><br>
            <span><a href="calculator.php" class="links"><img src="icons/calculator.png" class="icon">Price Calculator</a></span><br>
            <span><a href="request.php" class="links"><img src="icons/buy.png" class="icon">Request Lyric Video</a></span><br>
            <span><a href="contact.php" class="links"><img src="icons/contact.png" class="icon">Contact Us</a></span>

        
        </div>
        <div id='blurall'  onclick="sidemenuout()"></div>

        <div style="text-align: center; font-size: 220%; margin-bottom: 0.5%;"> <strong>Calculate</strong> the price of your <strong>Lyric Video</strong></div>
        <div style="text-align: center; font-size: 110%;">this tool estimates the price of our lyric videos according to the length of your track</div>
        <div style="text-align: center; font-size: 90%;"><strong>(Please note that the final price will be sent by e-mail, after you <a href="request.php">request a lyric video</a>.)</strong></div>
        <br><br>
        <div class="form">
            <form method="POST" class="calculatorform">
                <div style="text-align: center; font-size: 150%; margin-bottom: 5%;"><strong>Song length:</strong></div>
                <input type="number" name="minute" min="0" max="59" value="0" class="input">
                <label for="minute"><strong> minutes &nbsp;</strong></label>
                <input type="number" name="second" min="0" max="59" value="0" class="input">
                <label for="second"><strong> seconds </strong></label>
                <br><br>
                <input type="submit" value="Calculate" class="formbutton"/>

                <div class="result">
                <?php 
                    if (isset($_POST["minute"]) && isset($_POST["second"]))
                    echo "The price is <br> <span id='price'> USD$ " . round(($_POST["minute"] + ($_POST["second"]/60))*25, 2) ."</span>"; 
                
                ?>
                </div>                
            </form>
        </div>

        <div class="divider"></div>
        
    </body>
</html>
