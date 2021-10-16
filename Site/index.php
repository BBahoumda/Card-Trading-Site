<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title> Registration Page</title>
	<link rel="stylesheet" type="text/css" href="register.css">
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
		<h2>Login</h2>
	</div>
	<form method="post" action="index.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>E-mail</label>
			<input type="text" name="email" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>

		<p><span><input type="checkbox"></span> Are you a Human?</p>

		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			<a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>
