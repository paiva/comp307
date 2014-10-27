<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'Q2DB');
define('DB_USER','root');
define('DB_PASSWORD','');

$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function SignIn($json_input_data){

  session_start();   //starting the session for user profile page
  $obj = json_decode($json_input_data);

  if(!empty($obj->{'username'}))   //checking the 'username' name which is from Sign-In.html, is it empty or have some text
  {
    $query = mysql_query("SELECT *  FROM members where username = $obj->{'username'} AND password = $obj->{'password'}") or die(mysql_error());
    $row = mysql_fetch_array($query) or die(mysql_error());

    if(!empty($row['username']) AND !empty($row['password']))
    {
      $_SESSION['username'] = $row['password'];
      echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
      header('Location: page.php');

    }
    else
    {
      echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
      exit;
    }
  }
};

if(isset($_POST)){
   var_dump(file_get_contents('php://input'));
   SignIn(json_decode(file_get_contents('php://input'),TRUE));
}
?>
