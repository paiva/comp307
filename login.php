<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'Q2DB');
define('DB_USER','root');
define('DB_PASSWORD','');

// Connection
$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

// SignIn function
function SignIn($json){

  session_start();
  $obj = json_decode($json,TRUE);

  if(!empty($username))
  {
    $query = mysql_query("SELECT *  FROM members where username = $obj->{'username'} AND password = $obj->{'password'}") or die(mysql_error());
    $row = mysql_fetch_array($query) or die(mysql_error());

    if(!empty($row['username']) AND !empty($row['password']))
    {
      $_SESSION['username'] = $row['password'];
      echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
      header('Location: page.php'); // Redirect to page.php

    }
    else
    {
      echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
      exit;
    }
  }
};

// If request sent, SignIn
if(isset($_POST)){
   $json = file_get_contents('php://input');
   SignIn($json);
}

?>
