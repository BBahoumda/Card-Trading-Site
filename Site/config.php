<?php
$currency = "$";
$db_username = 'bahoumd1';
$db_password = 'Faith02101';
$db_name = 'bahoumd1_project2';
$db_host = 'localhost';


$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errnor .') '. $mysqli->connect_error);
}
?>
