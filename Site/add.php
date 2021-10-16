<?php include('addfunction.php') ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="register.css">
	<title>Add</title>
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
<div class="header">
	<h2>Add</h2>
</div>
<form method="post" action="add.php">
  <?php echo display_error(); ?>
  <div class="input-group">
    <label>Product Name</label>
    <input type="text" name="product_name">
  </div>
  <div class="input-group">
    <label>Price</label>
    <input type="number" name = "price" min="0.01" step="0.01"/>
  </div>
  <div class="input-group">
    <label>Product Description</label>
    <select name="product_desc" id="product_desc" >
      <option value=""></option>
      <option value="Search">Search</option>
    </select>
  </div>
	<div class="input-group">
		<button type="submit" class="btn" name="add_btn">Add</button>
	</div>
</form>
</body>
</html>
