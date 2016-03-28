<?php
  header("Content-type: text/html; charset=utf-8");
  error_reporting(0);
  require('connectDB.php');

  $x_coord = $_POST['x_coord'];
  $y_coord = $_POST['y_coord'];
  $description = $_POST['description']; 

  $connect = mysql_connect($host,$user,$password);
  mysql_query("SET NAMES utf8");
  mysql_select_db($database);

  $sql = 'INSERT INTO `dots` (`id`, `x_coord`, `y_coord`, `description`) VALUES ("", "' . $x_coord . '", "' . $y_coord . '", "' . $description . '")';
  $result = mysql_query($sql); // or die(mysql_error());

  if($result){ 
    $response = 'success'; 
  }
  else{
    $response = 'error';
  } 

  print(json_encode($response)); 
?>
