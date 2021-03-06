<?php
  session_start();
  if (empty($_SESSION['username'])){
    header("Location: index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>McGill WebServer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"><span style="font-family: 'Exo';font-weight: bold;"><span style="color:#D00000">McGill</span> WebServer</span></a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Welcome <?php echo $_SESSION['username']; ?>
              - <a href="logout.php" class="navbar-link">Logout</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Status</li>
              <li class="active"><a href="#">Home</a></li>
              <li class="nav-header">Websites</li>
              <li><a href="http//www.mcgillcs.com">McGill CS</a></li>
              <li><a href="http://www.mcgilldevs.com">McGill Devs</a></li>
              <li><a href="http://www.cs.mcgill.ca">SOCS</a></li>
              <li><a href="http://csus.cs.mcgill.ca">CSUS</a></li>
              <li><a href="http://www.hackmcgill.com">HackMcGill</a></li>
              <li><a href="http://www.mchacks.io">McHacks</a></li>
            </ul>
          </div>
        </div>

        <div class="span9">

          <div class="row-fluid" style="margin-top:45px;">
            <div class="span4">
              <h2>McGill CS</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><?php ini_set("default_socket_timeout","05");
                       set_time_limit(5);
                       $f=fopen("http://www.mcgillcs.com","r");
                       $r=fread($f,1000);
                       fclose($f);
                       if(strlen($r)>1) {
                       echo("<span class='btn btn-success'>Active</span>");}
                       else {
                       echo("<span class='btn btn-danger'>Down</span>");}?>
                       <a class="btn" href="http//www.mcgillcs.com">View details &raquo;</a></p>
            </div>

            <div class="span4">
              <h2>McGill Devs</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><?php ini_set("default_socket_timeout","05");
                       set_time_limit(5);
                       $f=fopen("http://www.mcgilldevs.com","r");
                       $r=fread($f,1000);
                       fclose($f);
                       if(strlen($r)>1) {
                       echo("<span class='btn btn-success'>Active</span>");}
                       else {
                       echo("<span class='btn btn-danger'>Down</span>");}?><a class="btn" href="http://www.mcgilldevs.com">View details &raquo;</a></p>
            </div>

            <div class="span4">
              <h2>SOCS</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><?php ini_set("default_socket_timeout","05");
                       set_time_limit(5);
                       $f=fopen("http://www.cs.mcgill.ca","r");
                       $r=fread($f,1000);
                       fclose($f);
                       if(strlen($r)>1) {
                       echo("<span class='btn btn-success'>Active</span>");}
                       else {
                       echo("<span class='btn btn-danger'>Down</span>");}?><a class="btn" href="http://www.cs.mcgill.ca">View details &raquo;</a></p>
            </div>
          </div>

          <div class="row-fluid">

            <div class="span4">
              <h2>CSUS</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><?php ini_set("default_socket_timeout","05");
                       set_time_limit(5);
                       $f=fopen("http://csus.cs.mcgill.ca","r");
                       $r=fread($f,1000);
                       fclose($f);
                       if(strlen($r)>1) {
                       echo("<span class='btn btn-success'>Active</span>");}
                       else {
                       echo("<span class='btn btn-danger'>Down</span>");}?><a class="btn" href="http://csus.cs.mcgill.ca">View details &raquo;</a></p>
            </div>

            <div class="span4">
              <h2>HackMcGill</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><?php ini_set("default_socket_timeout","05");
                       set_time_limit(5);
                       $f=fopen("http://www.hackmcgill.com","r");
                       $r=fread($f,1000);
                       fclose($f);
                       if(strlen($r)>1) {
                       echo("<span class='btn btn-success'>Active</span>");}
                       else {
                       echo("<span class='btn btn-danger'>Down</span>");}?><a class="btn" href="http://www.hackmcgill.com">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>McHacks</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><?php ini_set("default_socket_timeout","05");
                       set_time_limit(5);
                       $f=fopen("http://www.mchacks.io","r");
                       $r=fread($f,1000);
                       fclose($f);
                       if(strlen($r)>1) {
                       echo("<span class='btn btn-success'>Active</span>");}
                       else {
                       echo("<span class='btn btn-danger'>Down</span>");}?><a class="btn" href="http://www.mchacks.io">View details &raquo;</a></p>
            </div>
          </div>
        </div>
      </div>

      <hr>

      <footer align="center">
        <p>&copy; <span style="color:#D00000">McGill</span> WebServer 2014</p>
      </footer>

    </div>
    <script src="js/jquery.js"></script>

  </body>
</html>
