<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'Q2DB');
define('DB_USER','root');
define('DB_PASSWORD','');

// Connection
$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

// If request sent, SignIn
if(isset($_POST)){
   $json = file_get_contents('php://input');
   $obj = json_decode($json,TRUE);

   $key = "SELECT sharedkey FROM members WHERE username = $obj->{'username'}";
   $fetch = mysql_query($key) or die('query did not work');
   $result = mysql_fetch_assoc($fetch) or die('did not work..');
   $sharedKey = $result['sharedkey'];
   return $sharedKey
}

?>