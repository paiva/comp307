<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'Q2DB');
define('DB_USER','root');
define('DB_PASSWORD','');

// Connection
$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

// SignIn function
function SignIn($username){

  session_start();

  if(!empty($username))
  {
    $query = mysql_query("SELECT *  FROM members where username = $username") or die(mysql_error());
    $row = mysql_fetch_array($query) or die(mysql_error());

    if(!empty($row['username']) AND !empty($row['password']))
    {
      $_SESSION['username'] = $row['password'];
      // Redirect to page.php
      header('Location: http://localhost/307/A2/page.php');

    }
    else{
      exit;
    }
  }
};

// If request sent, SignIn
if(isset($_POST)){
   $json = file_get_contents('php://input');
   $obj = json_decode($json);
   $username = $obj->{'username'};
   SignIn($username);
}

?>
