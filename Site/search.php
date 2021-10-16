

<html>
<head>
	<link rel="stylesheet" href="homepage.css"/>
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

    
    
    
    
<head>
  <title>Card Trade</title>
</head>
<body>
<h1>Inventory CheckBox</h1>
<?php
  // create short variable names
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  if (!$searchtype || !$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  if (!get_magic_quotes_gpc()){
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }

  @ $db = new mysqli('localhost', 'bahoumd1', 'Faith02101', 'bahoumd1_project2');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

  $query = "select * from products where ".$searchtype." like '%".$searchterm."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Products Currently Available: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Name: ";
     echo htmlspecialchars(stripslashes($row['product_name']));
     echo "</strong><br />Description: ";
     echo stripslashes($row['product_desc']);
     echo "<br />Product ID: ";
     echo stripslashes($row['id']);
     echo "<br />Price: ";
     echo stripslashes($row['price']);
     echo "</p>";
  }

  $result->free();
  $db->close();

?>
</body>
</html>
