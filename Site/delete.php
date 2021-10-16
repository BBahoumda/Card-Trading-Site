<?php
$id = $_GET['id'];
include_once("config.php");

$sql = "DELETE FROM products WHERE product_code = $id";

if (mysqli_query($mysqli, $sql)) {
    mysqli_close($mysqli);
    header('Location: admin.php');
    exit;
} else {
    echo "Error deleting record";
}
?>
