<?php
  header("Content-type: text/html; charset=utf-8");
  error_reporting(0);
  require('connectDB.php');

  $connect = mysql_connect($host,$user,$password);
  mysql_query("SET NAMES utf8");
  mysql_select_db($database);

  $sql = 'SELECT * FROM `graphs` WHERE `id` = ' . $_POST["graph_id"];
  $result = mysql_query($sql); // or die(mysql_error());
  $response = array();

  if($result){ 
    while($row = mysql_fetch_array($result)) {
      $response["id"] = $row["id"];
      $response["title"] = $row["title"];
      $response["y_max"] = $row["y_max"];
      $response["y_min"] = $row["y_min"];
      $response["y_period"] = $row["y_period"];
      $response["x_max"] = $row["x_max"];
      $response["x_min"] = $row["x_min"];
      $response["x_period"] = $row["x_period"];
    };
  }
  else{
    $response = 'error';
  } 

  print(json_encode($response, JSON_UNESCAPED_UNICODE)); 
?>
