<?php
session_start();

$db = mysqli_connect('localhost', 'bahoumd1', 'Faith02101', 'bahoumd1_project2');

$firstname = "";
$lastname = "";
$email    = "";
$errors   = array();
$id = "";

if (isset($_POST['register_bton'])) {
	register();
}

function register()
{
	global $db, $errors, $firstname, $lastname, $email;

	$firstname   =  e($_POST['firstname']);
  $lastname    =  e($_POST['lastname']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	if (empty($firstname)) {
		array_push($errors, "First name is required");
	}
  if (empty($lastname)) {
		array_push($errors, "Last name is required");
	}
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password_1)) {
		array_push($errors, "Password is required");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	$password_1 = md5($password_1);
	
	if (count($errors) == 0)
  {
    $query = "INSERT INTO logininfo (email, password, firstname, lastname, type) VALUES ('$email', '$password_1', '$firstname', '$lastname', 'Admin')";
		mysqli_query($db, $query);

		$logged_in_user_id = mysqli_insert_id($db);

		$_SESSION['user'] = getUserById($logged_in_user_id);
		header('location: homepage.php');
	}
}



// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM logininfo WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
?>
