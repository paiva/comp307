<?php
  session_start();
  if(empty($_SESSION['user'])){
    header('Location: index.php');
  }else{
    echo "welcome" .$_SESSION['user'] ."<br/><a href='logout.php'>Logout</a>";
  }
?>
