<?php
include('hidfiles/allfiles.php'); ?>
<?php $current_sessionid = isset($_COOKIE['cookie_data']) ? $_COOKIE['cookie_data'] : '';
$get_userid = sessionid_to_userid($current_sessionid);
if($get_userid <= '0') {
	header('Location: http://localhost/codecamp/login.php');
}

$get_username =  userid_to_username($get_userid);
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Expedia-online store for articles</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header"  
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Expedia</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" style="float:right;">
          <ul class="nav navbar-nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#contact">Contact  us</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $get_username; ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">View Profile</a></li>
                <li><a href="create.php">Create Article</a></li>
                <li><a href="#">logout</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Recent</li>
                <li><a href="#">Viewed</a></li>
                <li><a href="#">Created</a></li>

              </ul>
            </li>
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </nav>
