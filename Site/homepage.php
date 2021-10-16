<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="homepage.css"/>
<style>
body
{
	background: url("Images/off.jpeg");
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
	<h1 align = "center"><font size="12" color = #5F9EA0><b><i>CARD TRADE</i></b></font></h1>
	<h1 align="center" size = "14">
		<?php
			session_start();
			#checks if user is admin
			if ($_SESSION['type'] == 'Admin')
			{
				echo "<a href='admin.php' class='button'>Admin Page</a> <a href='adminorderdetail.php' class='button'>Order Details</a> <a href='userdetail.php' class='button'>User Details</a> <a href='index.php' class='button'>Log Out</a> ";
			}
			else
			{
				echo "<a href='orderdetail.php' class='button'>Order Details</a> <a href='index.php' class='button'>Log Out</a>";
			}
	 ?>
 </h1>
</div>

<div class="box absolute" style="margin-top:30px">
<table width="1400" height="1100" border = "0">


<?php
include_once("config.php");

global $imagequery;
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$results = $mysqli->query("SELECT * FROM products");
$rows = mysqli_num_rows($results) - 1;
$obj = mysqli_fetch_array($results);
$column = 3;
# prints out data from the database
for ($x = $rows; $x > 0; $x = $x-3)
{
	if($rows < $column)
	{
		$column = $rows;
	}
	echo"<tr>";
	for( $i = 0; $i < $column; $i++)
	{
		include("query.php");
	}

	$rows = $rows - $column;
}
?>
</div>

<div class="box2 fixed">
	<h2 align = "center">Your Shopping Cart</h2>
<?php
#Fetch user inputted items and display it
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<form method="post" action="cart_update.php">';

	$total = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$product_name = $cart_itm["product_name"];
		$product_qty = $cart_itm["product_qty"];
		$product_price = $cart_itm["product_price"];
		$product_code = $cart_itm["product_code"];
		echo 'Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" />';
		echo " " .$product_name;
		echo '<input type="checkbox" style="text-align:right" name="remove_code[]" value="'.$product_code.'" /> Remove';
		$subtotal = ($product_price * $product_qty);
		$total = ($total + $subtotal);
		echo "<br>";
	}
	echo '<button type="submit" class="button2">Update</button><a href="view_cart.php" class="button">Checkout</a>';

	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
}?>
</div>

<div class="navbox fixed2">
	<p><a href="homepage.php" class='button'>Main Page</a></p>
	<p><a href="search.html" class='button'>Search</a></p>
</div>


</body>
</html>
