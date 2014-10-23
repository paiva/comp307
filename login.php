<?php

  session_start();
  if(isset($_GET['username'])){
    $user = $_GET['username'];
    $_SESSION['user'] = $user;
    header('Location: page.php');

  }

?>
