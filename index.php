<?php

 $html = '
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>McGill WebServer</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">

      <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
      <script type="text/javascript" src="js/login.js"></script>
      <link href="css/bootstrap.css" rel="stylesheet">
      <style type="text/css">
        body {
          padding-top: 40px;
          padding-bottom: 40px;
          background-image: url("http://p1.pichost.me/i/17/1397422.jpg");
          background-size: cover;
          z-index: 0;
        }
      </style>
      <link href="css/bootstrap-responsive.css" rel="stylesheet">

      <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
      <!--[if lt IE 9]>
        <script src="../assets/js/html5shiv.js"></script>
      <![endif]-->

    </head>

    <body>
    <div class="container">
      <div class="head"><span style="color:#D00000">McGill</span> WebServer</div>
      <form class="form-signin" action="" method="POST">
        <input type="text" class="input-block-level" placeholder="username" name="username" id="username">
        <input type="password" class="input-block-level" placeholder="password" name="password" id="password">
        <button class="btn btn-large btn-primary" type="submit" name="login" id="login">Login</button>
      </form>
      <div id="errDiv"></div>
    </div>
    </body>
  </html>';

  echo $html;

?>
