<?php

    require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="supportcss1.css">
<title>Support Display</title>
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
	 <div class="main">
       
        <ul>
            <li class="active"><a href="homepage.php">Home</a></li>
     
            <li><a href="trending.php">Trending</a></li>
            <li><a href="support.php">support</a></li>
         <li>   <select name="offers">
                    <option value="">OFFERS</option>
                    <option value="MAGICPIN">MAGICPIN</option>
                    <option value="ZOMATOGOLD">ZOMATOGOLD</option>
                    <option value="DINEOUT">DINEOUT</option>
                    <option value="EAZYDINER">DINEOUT</option>
                  </select></li>
            
          <li>  <select name="location">
                    <option value="">LOCATIONS</option>
                    <option value="BELLANDUR">BELLANDUR</option>
                    <option value="HSRLAYOUT">HSRLAYOUT</option>
                    <option value="KORMANGALA">KORMANGALA</option>
                    <option value="MARATHAHALLI">MARATHAHALLI</option>
            </select>
                   <input type="submit" name="go" value="GO" ></li>
             <li><a href="charanlogin.php">LOGOUT</a></li>

        </ul>
       
    </div>
    <div class="place">
<table align="center" border="1px" style="width: 800px;line-height: 40px">
<tr>
<th>RestaurantName</th>
<th>Query</th>
</tr>
<?php
$query = "SELECT restaurantname,query FROM supportinfo";
 $query_run=mysqli_query($con,$query);
 	if(mysqli_num_rows($query_run)>0)
 		{
 			while ($res = mysqli_fetch_assoc($query_run))
 			{
			echo "<tr><td>" . $res["restaurantname"]."</td><td>"
. $res["query"]. "</td></tr>";
			}
		echo "</table>";
		}
	else { echo "0 results"; }
?>
</table>
</div>
</body>
</html>