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
    </head>
    <body onload="message()">
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

        <?php if (isset($_SESSION['message'])) {
            echo '<div id="message"';
            if(isset($_SESSION['ok']) && $_SESSION['ok']>0){
                echo "style='background-color:green'";
            }
            else if($_SESSION['ok']==0) {echo "style='background-color:red'";}
            echo '>' . $_SESSION['message'] . '<div id="xmessage"><img src="menu2.png" id="ximage" onclick="xmessage()"></div>
            </div>';
        } ?>


        <form class="loginform" action="checklogin.php" method="POST">
            <label for="username">Username &nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="username" id="username" class="input">
            <div id="emailerror" class="error"></div>
            <div class="divider3"></div>
            <label for="password">Password &nbsp;&nbsp;&nbsp;</label>
            <input type="password" name="password" id="password" class="input"><br>
            <div class="divider3"></div>
            <div class="divider3"></div>
            <input type="submit" value="Log In" class="formbutton" name="login" id="login">
        </form>
        <div id="noacc">Don't have an account? <a href="signup.php">Sign Up</a></div>

        <?php unset($_SESSION['message']); ?>
        
    </body>
</html>