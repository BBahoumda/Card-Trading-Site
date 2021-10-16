<?php
session_start();

$db = mysqli_connect('localhost', 'bahoumd1', 'Faith02101', 'bahoumd1_project2');

if (isset($_POST['update_btn'])) {
	update();
}

function update(){
	global $db, $errors;

  $id = $_POST['orderid'];
	$status = $_POST['status'];

	if (count($errors) == 0)
  {
    $query = "UPDATE orderdetail SET status = '$status' WHERE orderid = $id;";
		mysqli_query($db, $query);

    $logged_in_user_id = mysqli_insert_id($db);

		header('location: adminorderdetail.php');
	}
}
?>
