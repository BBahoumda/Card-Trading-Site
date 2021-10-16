<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="homepage.css"/>
	<link rel="stylesheet" href="register.css">
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
  <h1 align = "center"><font size="12" color = "#5F9EA0"><b><i>Thank you for your purchase</i></b></font></h1>
</div>

<div class="header">
	<h2>Order Details</h2>
</div>
<div align = "center">
<form method="post" action="cart_update.php">
<table width = "600" border = "1">
  <thead>
    <tr>
      <th>Quantity</th>
      <th>Name</th>
      <th>Sub-Total</th>
    </tr>
  </thead>
  <body>
 	<?php
  include_once("config.php");
	$db = mysqli_connect('localhost', 'bahoumd1', 'Faith02101', 'bahoumd1_project2');


	$orderid = "";
  $total = 0;
	if(isset($_SESSION["cart_products"]))
    {

			$orderid = rand(100000, 999999);

			foreach ($_SESSION["cart_products"] as $cart_itm)
	        {
						$product_name = $cart_itm["product_name"];
						$product_qty = $cart_itm["product_qty"];
						$product_price = $cart_itm["product_price"];
						$product_code = $cart_itm["product_code"];
						$subtotal = ($product_price * $product_qty);

						echo '<td align = "center">'.$product_qty.'</td>';
						echo '<td align = "center">'.$product_name.'</td>';
						echo '<td align = "center">'.$currency.sprintf("%01.2f", $subtotal).'</td>';
			            echo '</tr>';
						$total = ($total + $subtotal);

						$query = "INSERT INTO orderdetail (userid, orderid, productname, quantity, price, status) VALUES ('1', '$orderid', '$product_name', '$product_qty', '$product_price', 'Processing');";
						mysqli_query($db, $query);
	        }
		}
    ?>
    <tr align = "center"><td colspan="3"><span style="text-align: right;">Amount Total : <?php echo "$".sprintf("%01.2f", $total);?></span></td></tr>
			<td colspan ="3"  align = "center"><a href="homepage.php" class="button">Shop More</a>
		</tr>
  </body>
</table>
<input type="hidden" name="return_url" value="<?php
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>
</body>
</html>
