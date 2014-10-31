<?php

// Change with the other vals
define('DB_HOST', 'localhost');
define('DB_NAME', 'Q2DB');
define('DB_USER','root');
define('DB_PASSWORD','');

// Connection
$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

// decryptPassword function
function decryptPassword($username,$encoded_password){

  $decoded_password = "";
  $key = "SELECT sharedkey FROM members WHERE username = '$username'";
  $fetch = mysql_query($key) or die('query did not work');
  $result = mysql_fetch_assoc($fetch) or die('did not work..');
  $sharedKey = $result['sharedkey'];

  // Decryption
  for ($i=0;$i<strlen($encoded_password);$i++) {
    $c = ord($encoded_password[$i]);
    if($c >= 65 && $c <=  90) { //uppercase bound
        $c = ($c - 65 - $sharedKey) % 26 + 65;
    }
    else if($c >= 97 && $c <= 122) { //lowercase bound
        $c = ($c - 97 - $sharedKey) % 26 + 97; //reset back to 'a'
    }
    $decoded_password[$i] = chr($c);
  }
  return implode($decoded_password);
};

// SignIn function
function SignIn($username,$password){

  if(!empty($username))
  {
    //$query = mysql_query("SELECT *  FROM members where username = $username and password = $password") or die(mysql_error());
    $query = "SELECT *  FROM members where username = '$username'";
    $fetch = mysql_query($query) or die('query did not work');
    $result = mysql_fetch_assoc($fetch) or die('did not work..');

    if(!empty($result['username']) AND !empty($result['password']))
    {
      if ($username == $result['username'] && $password == $result['password'])
      {

        $uniqid = uniqid();
        session_start();
        $_SESSION['username'] = $result['username'];
        $_SESSION['memberID'] = $result['memberID'];
        $memberID = $result['memberID'];

        $q = mysql_query("INSERT INTO `sessions` (`memberID`, `sessionID`)
                VALUES ('$memberID','$uniqid')") or die(mysql_error());

        header('Location: page.php');
      }
    }
    else{
      exit;
    }
  }
};

// If request sent, Decrypt, SignIn, Record Session
if(isset($_POST)){

  $json = file_get_contents('php://input');
  $obj = json_decode($json);
  $username = $obj->{'username'};
  $encoded_password = $obj->{'password'};
  $decoded_password = decryptPassword($username,$encoded_password);

  $var = SignIn($username,$decoded_password);
  echo $var;

}

?>
