<?php
    require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>support page</title>

        <link rel="stylesheet" href="style.css">
        <body>
            <form action="support.php" method="post">
            </div>
            <ul>
                <li class="active"><a href="homepage.php">HOME</a></li>
         
                <li><a href="aashtop.html">Trending</a></li>
               
                <li><a href="charanlogin.php">LOGOUT</a></li>
                
            </ul>
            
        </div>
            <div class="support-sheet" action="support.php" method="post">
                
                <div class="textbox">
                    <h1>We are here to help you :)</h1>
                    <h2>Enter The Name Of Restaurant</h2>
                    <input type="text" placeholder="Name of the Restaurant" required="required" style="height: 20px;" name="rname" value="">
                </div>
                <div class="textbox">
                        <form action="support.php">   
                            <h2>Please Enter Your Query Here</h1>              
                          <textarea id="subject" name="subject" placeholder="Enter your Query and click on submit" style="height:200px" required="required"></textarea>                     
                        </form>
                      </div>
                      
                <input class="btn"  type="submit" name="submit" value="SUBMIT">

                <?php
            if(isset($_POST['submit']))
            {
                @$rname=$_POST['rname'];
                @$subject=$_POST['subject'];
                 $query="select * from restaurantdetails WHERE restaurantname='$rname'";
                    $query_run=mysqli_query($con,$query);
                    if($query_run)
                    {
                        if(mysqli_num_rows($query_run)>0)
                        {
                            $query = "insert into supportinfo values('$rname','$subject')";
                            $query_run = mysqli_query($con,$query);
                            if($query_run)
                            {
                                echo '<script type="text/javascript">alert("Thank You..
                                        Your query has been submitted.
                                        Someone from our team will contact you shortly")</script>';
                                $_SESSION['rname'] = $rname;
                                $_SESSION['subject'] = $subject;
                                header( "Location: support.php");
                            }
                            else
                            {
                                echo '<p class="bg-danger msg-block">Query submission Unsuccessful due to server error. Please try later</p>';
                            }
                        }
                        else
                        {
                             echo '<script type="text/javascript">alert("Sorry we dont serve this restaurant")</script>';
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("DB error")</script>';
                    }
            }
            else
            {

            }
        ?>
            </form>
            </div>
            
        </body>
    </head>
</html>