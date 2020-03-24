<?php
    require 'dbconfig/config.php';
?>
<DOCTYPE html>
    <html>
	 <head>
        <meta charset="utf-8">
        <title>Manager Check</title>
        <link rel="stylesheet" href="register.css">
    </head>
   <body>
        <form class="box" method="post">
            <h1>Manager Check</h1>
            
            <input type="text" name="username" placeholder="Username" required>
            
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
           
            </form>
            
        
        <?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$querycheck = "SELECT managername FROM manager WHERE `managername`='$username' and `password`='$password' ";
				$query_runcheck = mysqli_query($con,$querycheck);
				if($query_runcheck)
				{
					if(mysqli_num_rows($query_runcheck)>0)
					{
					$row = mysqli_fetch_array($query_runcheck,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					
					header( "Location: supportdisplay.php");
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