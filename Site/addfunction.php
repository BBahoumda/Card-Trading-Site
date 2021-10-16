<?php
session_start();

$db = mysqli_connect('localhost', 'bahoumd1', 'Faith02101', 'bahoumd1_project2');

$productname = "";
$productdesc = "";
$price    = "";
$product_code = "";
$errors   = array();

if (isset($_POST['add_btn'])) {
	add();
}

function add()
{
	global $db, $errors, $productname, $productdesc, $price, $product_code;

	$productname   =  e($_POST['product_name']);
  $productdesc    =  e($_POST['product_desc']);
	$price       =  e($_POST['price']);

	if (empty($productname)) {
		array_push($errors, "Product name is required");
	}
  if (empty($productdesc)) {
		array_push($errors, "Product description is required");
	}
	if (empty($price)) {
		array_push($errors, "Price is required");
	}
	if (count($errors) == 0)
  {
    $product_code = rand(0,99999);
    $query = "INSERT INTO products (product_code, product_name, product_desc, price) VALUES ('$product_code', '$productname', '$productdesc', '$price');";
		mysqli_query($db, $query);

    $logged_in_user_id = mysqli_insert_id($db);

    $_SESSION['user'] = getItemById($logged_in_user_id);

		header('location: admin.php');
	}
}



// return user array from their id
function getItemById($id){
	global $db;
	$query = "SELECT * FROM products WHERE id=" . $id;
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
?>
