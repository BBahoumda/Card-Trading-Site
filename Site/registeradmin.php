<?php include('adminfunction.php') ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="register.css">
	<title>ePharmacy Registration Page</title>
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
<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="registeradmin.php">
  <?php echo display_error(); ?>
  <div class="input-group">
    <label>Email</label>
    <input type="email" name="email" value="<?php echo $email; ?>">
  </div>
	<div class="input-group">
		<label>First Name</label>
		<input type="text" name="firstname" value="<?php echo $firstname; ?>">
	</div>
  <div class="input-group">
    <label>Last Name</label>
    <input type="text" name="lastname">
  </div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_bton">Register</button>
	</div>
</form>
</body>
</html>
