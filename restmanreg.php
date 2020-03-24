<?php
    require 'dbconfig/config.php';
?>
<DOCTYPE html>
    <html>
	 <head>
        <meta charset="utf-8">
        <title>Resgistration page</title>
        <link rel="stylesheet" href="regone1.css">
    </head>
   <body>
        <form class="box" action="restmanreg.php" method="post">
            <h1>Manager Registration</h1>
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="phonenumber" placeholder="Phone Number" required pattern="[0-9]{10}"> 
            <input type="text" name="restname" placeholder="Name of the Restaurant" required>
             <br>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="cpassword" placeholder="Confirm Password" required>
            <br>

            
        <h3>Provide Your Restaurant Working Timings & Rating(Given By BBMP-Health)</h3>
                    <input type="text" name="timings" placeholder="Timings" required>
                    <input type="number" name="rating" placeholder="Rating" required pattern="[1-5]{1}">

            <br>
            <ul>
                <div class="design">
            <select name="offers" required="required">
                    <option value="">OFFERS</option>
                    <option value="MAGICPIN">MAGICPIN</option>
                    <option value="ZOMATOGOLD">ZOMATO GOLD</option>
                    <option value="DINEOUT">DINEOUT</option>
                    <option value="EAZYDINER">EAZYDINER</option>
                  </select>
                  
            
                <select name="location" required="required">
                    <option value="">LOCATIONS</option>
                    <option value="BELLANDUR">BELLANDUR</option>
                    <option value="HSRLAYOUT">HSRLAYOUT</option>
                    <option value="KORMANGALA">KORMANGALA</option>
                    <option value="MARATHAHALLI">MARATHAHALLI</option>
                  </select>
             </div>
        </ul>
            <input type="submit" name="submit_btn" value="Signup"><br><br>
            
            <a href="restmanlog.php"><input type="button" id="back"  name="" value="Back to Login"></a>
           <?php
           
               if(isset($_POST['submit_btn']))
               {
                    //echo '<script type="text/javascript"> alert("signup button clicked")</script>';
                    @$username = $_POST['username'];
                    @$restname = $_POST['restname'];
                    @$phonenumber = $_POST['phonenumber'];
                    @$password = $_POST['password'];
                    @$cpassword = $_POST['cpassword'];
                    @$timings = $_POST['timings'];
                    @$rating = $_POST['rating'];
                    @$checkoffer=$_POST['offers'];
                    @$checklocation=$_POST['location'];
                            if ($checklocation == "BELLANDUR") {
                            $_SESSION['location'] = 'BELLANDUR';
                            }
                            elseif ($checklocation == "HSRLAYOUT") {
                            $_SESSION['location'] = 'HSRLAYOUT'  ;
                            }
                            elseif ($checklocation == "KORMANGALA") {
                            $_SESSION['location'] = 'KORMANGALA'    ;
                            }
                            elseif ($checklocation == "MARATHAHALLI") {
                            $_SESSION['location'] = 'MARATHAHALLI'  ;
                            }
                    if ($checkoffer == "MAGICPIN") {
                    $_SESSION['offers'] = 'MAGICPIN';}
                    elseif ($checkoffer == "ZOMATOGOLD") {
                    $_SESSION['offers'] = 'ZOMATOGOLD'   ;}
                    elseif ($checkoffer == "DINEOUT") {
                    $_SESSION['offers'] = 'DINEOUT'  ;}
                    elseif ($checkoffer == "EAZYDINER") {
                    $_SESSION['offers'] = 'EAZYDINER'  ;
                    }
                

                $offer=$_SESSION['offers'];
                $location=$_SESSION['location'];

                  if($password==$cpassword)
                  {
                    $query="select * from manager WHERE managername='$username'";
                    $query_run=mysqli_query($con,$query);
                    if($query_run)
                    {
                        if(mysqli_num_rows($query_run)>0)
                        {
                            echo '<script type="text/javascript">alert("This Username or Restaurant name Already exists.. Please try another username!")</script>';
                        }
                        else
                        {
                            $query = "insert into manager values('$username','$phonenumber','$password')";
                            $query_run = mysqli_query($con,$query);
                            $queryone = "insert into restaurantdetails values('$restname','$rating','$timings')";
                            $query_runone = mysqli_query($con,$queryone);
                            $querytwo = "insert into restaurantoffers values('$restname','$offer')";
                            $query_runtwo = mysqli_query($con,$querytwo);
                            $querythree = "insert into restaurantlocation values('$restname','$location')";
                            $query_runthree = mysqli_query($con,$querythree);

                            if($query_run)
                            {
                                echo '<script type="text/javascript">alert("Manager Registered.. Welcome")</script>';
                                $_SESSION['username'] = $username;
                                $_SESSION['password'] = $password;
                                
                                header( "Location: homepage.php");
                            }
                            else
                            {
                                echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
                            }
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("DB error")</script>';
                    }
                }
                else
                {
                    echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
                }
                
            }
            else
            {
            }
        ?>
        </form>
    </body>
</body>
</html>