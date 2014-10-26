<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'Q2DB');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function SignIn()
{
  session_start();   //starting the session for user profile page
  if(!empty($_POST['username']))   //checking the 'username' name which is from Sign-In.html, is it empty or have some text
  {
  	$query = mysql_query("SELECT *  FROM members where username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysql_error());
  	$row = mysql_fetch_array($query) or die(mysql_error());

    if(!empty($row['username']) AND !empty($row['password']))
  	{
  		$_SESSION['username'] = $row['password'];
  		echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
      echo json_encode('row');
      // header('Location: page.php');

  	}
  	else
  	{
  		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
  	  echo json_encode(null);
      exit;
    }
  }
}

if(isset($_POST['submit']))
{
	SignIn();
}

?>
