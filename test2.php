<?php
 include("assets/bin/con_db.php");
  global $db;
  $db->debug=1;
  error_reporting(E_ALL);
ini_set('display_errors', 1);


echo "<pre>";
 $list = getallheaders();
 print_r($list);

  
?>