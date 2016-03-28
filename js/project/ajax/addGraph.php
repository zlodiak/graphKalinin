<?php
  header("Content-type: text/html; charset=utf-8");
  error_reporting(0);
  require('connectDB.php');

  $title = $_POST['title'];
  $x_max = $_POST['x_max'];
  $x_min = $_POST['x_min'];
  $x_period = $_POST['x_period'];
  $y_max = $_POST['y_max'];
  $y_min = $_POST['y_min'];
  $y_period = $_POST['y_period'];  

  $connect = mysql_connect($host,$user,$password);
  mysql_query("SET NAMES utf8");
  mysql_select_db($database);

  $sql = 'INSERT INTO `graphs` (`id`, `title`, `x_max`, `x_min`, `x_period`, `y_max`, `y_min`, `y_period`) VALUES ("", "' . $title . '", "' . $x_max . '", "' . $x_min . '", "' . $x_period . '", "' . $y_max . '", "' . $y_min . '", "' . $y_period . '")';
  $result = mysql_query($sql); // or die(mysql_error());

  if($result){ 
    $response = 'success'; 
  }
  else{
    $response = 'error';
  } 

  print(json_encode($response)); 
?>
