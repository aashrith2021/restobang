<?php
session_start();

    require 'dbconfig/config.php';
?>
<DOCTYPE html>
    <html>
	 <head>
        <meta charset="utf-8">
        <title>home page</title>
        <link rel="stylesheet" href="homepagecss1.css">
    </head>
    <body>
<header>
    <div class="login-box"></div>
    <div class="main">
       
        <ul>
            <li class="active"><a href="#">Home</a></li>
     
            <li><a href="trending.php">Trending</a></li>
            <li><a href="support.php">support</a></li>
             <li><a href="charanlogin.php">LOGOUT</a></li>
        </ul>
       
    </div>
    
    <div class="tittle">
        <h1>RESTOBANG</h1>
    </div>
    <div class="button">

        <a href="restaurantdisplay.php" class="btn"><input id="btn" type="submit" name="explore" value="Explore"></a>
        <br><br><br><br><br><br><br>
            <a href="supportlogin.php">To Know Your Restaurant Queries Click Here</a>

    </div>
    </header>
     

    </body>
   
</html>