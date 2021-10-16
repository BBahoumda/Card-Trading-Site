<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="homepage.css"/>
<style>
body
{
	background: url("Images/off.png");
	height: 100%;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}
</style>

</head>
<body>

<div id = "header">
	<h1 align = "center"><font size="12" color = #5F9EA0><b><i>Admin Page</i></b></font></h1>
	<h1 align="center" size = "14">
		<?php
			session_start();

			echo "<a href='registeradmin.php' class='button'>Add admin</a> ";
			echo "<a href='add.php' class='button'>Add new item</a> <a href='adminorderdetail.php' class='button'>Order Details</a> <a href='userdetail.php' class='button'>User Details</a> <a href='index.php' class='button'>Log Out</a>";
	 ?>
 </h1>
</div>

<div class="box absolute" style="margin-top:30px">
<form action="" method="post">
<table width="1400" border = "1">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Description</th>
  <th>Price</th>
  <th>Remove</th>
</tr>

<?php
include_once("config.php");

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$results = $mysqli->query("SELECT * FROM products");

$obj = $results->fetch_object();

while($obj = mysqli_fetch_assoc($results))
{

  echo "</tr><th>".$obj['product_code'].
  "</th><th>".$obj['product_name'].
  "</th><th>".$obj['product_desc'].
  "</th><th>$".$obj['price'];
  echo "<th><a href='delete.php?id=".$obj['product_code']."'>Delete</a></th>";
}
echo "</tr>";
?>
</table>
</form>
<div class="navbox fixed2">
	<p><a href="homepage.php">Main Page</a></p>
	<p><a href="search.html">Search</a></p>
</div>
</body>
</html>
