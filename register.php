<?php
    require 'dbconfig/config.php';
?>
<DOCTYPE html>
    <html>
	 <head>
        <meta charset="utf-8">
        <title>Resgistration page</title>
        <link rel="stylesheet" href="regusercss1.css">
    </head>
   <body>
        <form class="box" action="register.php" method="post">
            <h1>User Registration</h1>
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="text" name="phonenumber" placeholder="Phone number" pattern="[0-9]{10}" required>
                        <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required><br>
            
            <input type="password" name="cpassword" placeholder="Confirm Password" required>

            <br>
            <a href="homepage.php"><input type="submit" name="submit_btn" value="Signup"></a>
            <br>
            <br>
            <a href="charanlogin.php"><input type="button" id="back"  name="" value="Back to Login"></a>
            <?php
               if(isset($_POST['submit_btn']))
               {
                    //echo '<script type="text/javascript"> alert("signup button clicked")</script>';
                    @$username = $_POST['username'];
                    @$phonenumber = $_POST['phonenumber'];
                    @$email = $_POST['email'];
                    @$password = $_POST['password'];
                    @$cpassword = $_POST['cpassword'];
                  if($password==$cpassword)
                  {
                    $query="select * from user WHERE username='$username'";
                    $query_run=mysqli_query($con,$query);
                    if($query_run)
                    {
                        if(mysqli_num_rows($query_run)>0)
                        {
                            echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
                        }
                        else
                        {
                            $query = "insert into user values('$username','$phonenumber','$email','$password')";
                            $query_run = mysqli_query($con,$query);
                            if($query_run)
                            {
                                echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
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