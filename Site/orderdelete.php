<?php
if (isset($_GET['orderid']))
{
  $id = $_GET['orderid'];
  include_once("config.php");

  $sql = "DELETE FROM orderdetail WHERE orderid = $id";

  if (mysqli_query($mysqli, $sql)) {
      mysqli_close($mysqli);
      header('Location: adminorderdetail.php');
      exit;
  } else {
      echo "Error deleting record";
  }
}
?>
