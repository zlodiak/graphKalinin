<?php
  header("Content-type: text/html; charset=utf-8");
  error_reporting(0);
  require('connectDB.php');

  $connect = mysql_connect($host,$user,$password);
  mysql_query("SET NAMES utf8");
  mysql_select_db($database);

  $sql = 'SELECT `id`, `title` FROM `graphs`';
  $result = mysql_query($sql); // or die(mysql_error());
  $response = array();

  if($result){ 
    while($row = mysql_fetch_array($result)) {
      $unit = array();
      $unit[] = $row["id"];
      $unit[] = $row["title"];
      $response[] = $unit;
    };
  }
  else{
    $response = 'error';
  } 

  print(json_encode($response, JSON_UNESCAPED_UNICODE)); 
?>
