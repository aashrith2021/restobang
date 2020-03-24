<?php
    require 'dbconfig/config.php';
?>
<DOCTYPE html>
    <html>
	 <head>
        <meta charset="utf-8">
        <title>Login page</title>
        <link rel="stylesheet" href="register.css">
    </head>
   <body>
        <form class="box" action="charanlogin.php" method="post">
            <h1>User Login</h1>
            
            <input type="text" name="username" placeholder="Username">
            
            <input type="password" name="password" placeholder="Password">

            <input type="submit" name="login" value="Login">
            <h4>Don't have an account <br></h4>
            
            <a href="register.php"><input type="button" name="" value="Signup"></a>
            
        </form>
        <?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "select * from user,manager where (user.username='$username' and user.upassword='$password') or (manager.managername='$username' and manager.password='$password') ";
				$query_run = mysqli_query($con,$query);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					
					header( "Location: homepage.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
    
</body>


</html>