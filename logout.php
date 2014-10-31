<?php

  // Change with the other vals
  define('DB_HOST', 'localhost');
  define('DB_NAME', 'Q2DB');
  define('DB_USER','root');
  define('DB_PASSWORD','');

  // Connection
  $con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
  $db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

  session_start();
  $memberID = $_SESSION['memberID'];
  $q = mysql_query("DELETE FROM `sessions` where `memberID`= '$memberID'") or die(mysql_error());

  unset($_SESSION['username']);
  header("Location: index.php");


?>
