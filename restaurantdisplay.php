<?php
    require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="restaurantdisplaycss2.css">
<title>Restaurant Display</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
	<form action="restaurantdisplay.php" method="post">
	 <div class="login-box"></div>
    <div class="main">
       
        <ul>
            <li class="active"><a href="homepage.php">Home</a></li>
     
            <li><a href="trending.php">Trending</a></li>
            <li><a href="support.php">support</a></li>
              <select name="location">
                    <option value="">LOCATIONS</option>
                    <option value="BELLANDUR">BELLANDUR</option>
                    <option value="HSRLAYOUT">HSRLAYOUT</option>
                    <option value="KORMANGALA">KORMANGALA</option>
                    <option value="MARATHAHALLI">MARATHAHALLI</option>
            </select>
            <select name="offers">
                    <option value="">OFFERS</option>
                    <option value="MAGICPIN">MAGICPIN</option>
                    <option value="ZOMATOGOLD">ZOMATOGOLD</option>
                    <option value="DINEOUT">DINEOUT</option>
                    <option value="EAZYDINER">EAZYDINER</option>
                  </select>
                 <li>  <input type="submit" name="go" value="GO" ></li>
             <li><a href="charanlogin.php">LOGOUT</a></li>

        </ul>
       
    </div>
 <div class="place">
<table cellpadding="40px" align="center" border="3px" style="width: 800px;line-height: 40px" >
<tr>
<th>RestaurantName</th>
<th>Rating</th>
<th>Timings</th>
<th>Location</th>
<th>Offers</th>
</tr>
<?php 
		if(isset($_POST['go']))
			{
				@$checkoffer=$_POST['offers'];
				@$checklocation=$_POST['location'];
				if ($checkoffer == "MAGICPIN") {
				$_SESSION['offers'] = 'MAGICPIN';
						if ($checklocation == "BELLANDUR") {
						$_SESSION['location'] = 'BELLANDUR';
						}
						elseif ($checklocation == "HSRLAYOUT") {
						$_SESSION['location'] = 'HSRLAYOUT'	 ;
						}
						elseif ($checklocation == "DINEOUT") {
						$_SESSION['location'] = 'DINEOUT'	 ;
						}
						elseif ($checklocation == "EAZYDINER") {
						$_SESSION['location'] = 'EAZYDINER'	 ;
						}
				}
				elseif ($checkoffer == "ZOMATOGOLD") {
				$_SESSION['offers'] = 'ZOMATOGOLD'	 ;
						if ($checklocation == "BELLANDUR") {
						$_SESSION['location'] = 'BELLANDUR';
						}
						elseif ($checklocation == "HSRLAYOUT") {
						$_SESSION['location'] = 'HSRLAYOUT'	 ;
						}
						elseif ($checklocation == "KORMANGALA") {
						$_SESSION['location'] = 'KORMANGALA'	 ;
						}
						elseif ($checklocation == "MARATHAHALLI") {
						$_SESSION['location'] = 'MARATHAHALLI'	 ;
						}
				}
				elseif ($checkoffer == "DINEOUT") {
				$_SESSION['offers'] = 'DINEOUT'	 ;
						if ($checklocation == "BELLANDUR") {
						$_SESSION['location'] = 'BELLANDUR';
						}
						elseif ($checklocation == "HSRLAYOUT") {
						$_SESSION['location'] = 'HSRLAYOUT'	 ;
						}
						elseif ($checklocation == "KORMANGALA") {
						$_SESSION['location'] = 'KORMANGALA'	 ;
						}
						elseif ($checklocation == "MARATHAHALLI") {
						$_SESSION['location'] = 'MARATHAHALLI'	 ;
						}
				}
				elseif ($checkoffer == "EAZYDINER") {
				$_SESSION['offers'] = 'EAZYDINER'	 ;
						if ($checklocation == "BELLANDUR") {
						$_SESSION['location'] = 'BELLANDUR';
						}
						elseif ($checklocation == "HSRLAYOUT") {
						$_SESSION['location'] = 'HSRLAYOUT'	 ;
						}
						elseif ($checklocation == "KORMANGALA") {
						$_SESSION['location'] = 'KORMANGALA'	 ;
						}
						elseif ($checklocation == "MARATHAHALLI") {
						$_SESSION['location'] = 'MARATHAHALLI'	 ;
						}
				}
				else{
					if ($checklocation == "BELLANDUR") {
						$_SESSION['location'] = 'BELLANDUR';
						}
						elseif ($checklocation == "HSRLAYOUT") {
						$_SESSION['location'] = 'HSRLAYOUT'	 ;
						}
						elseif ($checklocation == "KORMANGALA") {
						$_SESSION['location'] = 'KORMANGALA'	 ;
						}
						elseif ($checklocation == "MARATHAHALLI") {
						$_SESSION['location'] = 'MARATHAHALLI'	 ;
						}
				}

				



				$offer=$_SESSION['offers'];
				$location=$_SESSION['location'];
				$queryoffer = "SELECT restaurantdetails.restaurantname,restaurantdetails.rating,restaurantdetails.timings,restaurantlocation.location,restaurantoffers.offers FROM restaurantdetails,restaurantlocation,restaurantoffers where restaurantdetails.restaurantname=restaurantlocation.restaurantname and restaurantdetails.restaurantname=restaurantoffers.restaurantname and restaurantlocation.restaurantname=restaurantoffers.restaurantname and (restaurantoffers.offers='$offer' or restaurantlocation.location='$location')" ;

 				$query_runoffer=mysqli_query($con,$queryoffer);
 				if(mysqli_num_rows($query_runoffer)>0)
 				{
 				while ($resoffer = mysqli_fetch_assoc($query_runoffer))
 				{
				echo "<tr><td>" . $resoffer["restaurantname"]. "</td><td>" . $resoffer["rating"] . "</td><td>"
				.$resoffer["timings"]. "</td><td>" . $resoffer["location"]. "</td><td>" . $resoffer["offers"]. "</td></tr>";
				}
				echo "</table>";
				}
				else { echo "0 results"; }
				}
			else
			{
				$query = "SELECT restaurantdetails.restaurantname,restaurantdetails.rating,restaurantdetails.timings,restaurantlocation.location,restaurantoffers.offers FROM restaurantdetails,restaurantlocation,restaurantoffers where restaurantdetails.restaurantname=restaurantlocation.restaurantname and restaurantdetails.restaurantname=restaurantoffers.restaurantname and restaurantlocation.restaurantname=restaurantoffers.restaurantname";

 				$query_run=mysqli_query($con,$query);
 				if(mysqli_num_rows($query_run)>0)
 				{
 					while ($res = mysqli_fetch_assoc($query_run)){
					echo "<tr><td>" . $res["restaurantname"]. "</td><td>" . $res["rating"] . "</td><td>"
					.$res["timings"]. "</td><td>" . $res["location"]. "</td><td>" . $res["offers"]. "</td></tr>";
				}
				echo "</table>";
				}
				else { 
					echo "0 results";
					 }
			}
?>

</form>
</body>
</html>