<?php #error_reporting(0); ?>
<?php
if($obj)
{
	$products_item = '<div class="products">';

$obj = $results->fetch_object();

$products_item = <<<EOT
	<form method="post" action="cart_update.php">
	<img src={$obj->product_img} width = "200" height = "320">
	<div class="product-content"><h3>{$obj->product_name}</h3>
	<div class="product-desc">{$obj->product_desc}</div>
	Price {$currency}{$obj->price}<br>

	<label>
		<span>Quantity:</span>
		<input type="text" size="2" maxlength="3" name="product_qty" value="1" />
	</label>

	<input type="hidden" name="product_code" value="{$obj->product_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div><button type="submit" class="add_to_cart">Add</button></div>
	</div></div>
	</form>
EOT;
	echo"<th>";
	echo $products_item;
	echo"</th>";

	$products_item .= '';
}?>
