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
  <h1 align = "center"><font size="12" color = "#5F9EA0"><b><i>Card Trade</i></b></font></h1>
</div>

<div class="header">
	<h2>Your Cart</h2>
</div>
<div align = "center">
<form method="post" action="cart_update.php">
<table width = "600" border = "1">
  <thead>
    <tr>
      <th>Quantity</th>
      <th>Name</th>
      <th>Price</th>
      <th>Sub-Total</th>
      <th>Remove</th>
    </tr>
  </thead>
  <body>
 	<?php
  session_start();
  include_once("config.php");

  $total = 0;
	if(isset($_SESSION["cart_products"]))
    {

		foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			$product_name = $cart_itm["product_name"];
			$product_qty = $cart_itm["product_qty"];
			$product_price = $cart_itm["product_price"];
			$product_code = $cart_itm["product_code"];
			$subtotal = ($product_price * $product_qty);

			echo '<td align = "center"><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
			echo '<td align = "center">'.$product_name.'</td>';
			echo '<td align = "center">'.$currency.$product_price.'</td>';
			echo '<td align = "center">'.$currency.sprintf("%01.2f", $subtotal).'</td>';
			echo '<td align = "center"><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
			$total = ($total + $subtotal);
        }
		}
    ?>
    <tr align = "center">
			<td colspan="5">
				<span style="text-align: right;">Amount Total : <?php echo "$".sprintf("%01.2f", $total);?></span>
				<div class="input-group">
			    <label>Card Number</label>
			    <input type="text" name="cardnumber">
			  </div>
				<label for="exp">Expiration Date:</label>
				  <select name="expmon" id="expmon">
				    <option>01</option>
				    <option>02</option>
				    <option>03</option>
				    <option>04</option>
						<option>06</option>
				    <option>07</option>
				    <option>08</option>
				    <option>09</option>
						<option>10</option>
				    <option>11</option>
				    <option>12</option>
				  </select>
					/
					<select name="expyear" id="expyear">
				    <option>21</option>
				    <option>22</option>
				    <option>23</option>
				    <option>24</option>
						<option>25</option>
						<option>26</option>

				  </select>
				<div class="input-group">
					<label>First Name</label>
					<input type="text" name="firstname">
				</div>
			  <div class="input-group">
			    <label>Last Name</label>
			    <input type="text" name="lastname">
			  </div>
				<div class="input-group">
					<label>Address</label>
					<input type="text" name="address">
				</div>
				<div class="input-group">
					<label>Country</label>
					<input type="text" name="country">
				</div>
				<div class="input-group">
					<label>Phone Number</label>
					<input type="text" name="number">
				</div>
			</td>
		</tr>
    <tr align = "center"><td colspan="3"><a href="homepage.php" class="button2">Add More Items</a><button class="button2" type="submit">Update</button></td>
			<td colspan ="2"><a href="order.php" class="button">Order Now</a>
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
