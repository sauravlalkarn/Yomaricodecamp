<?php include('hidfiles/allfiles.php'); ?>
<?php if(array_key_exists("login", $_POST)) {
	$get_email = isset($_POST['email']) ? $_POST['email'] : '0';
	$get_password = isset($_POST['password']) ? $_POST['password'] : '';
	$get_userid = '0';
	//echo $get_userid;
	$conn = mysql_connect("localhost", "root", "");
if(!$conn) {
die('Error in connection');
}
mysql_select_db("codecamp");
$takequery = "SELECT sn from user_details WHERE user_email = '$get_email' LIMIT 1";
//echo $takequery;
$query11 = mysql_query($takequery);
while($asdf = mysql_fetch_array($query11)) {
$get_userid =  $asdf['sn'];
}
//echo $get_userid;
$takequery = "SELECT * FROM user_login WHERE userid = '$get_userid' AND password = '$get_password'";
$asdf = mysql_query($takequery);
$countrr = mysql_num_rows($asdf);
if($countrr == '1') {
	session_start();
	session_regenerate_id();
	$cookie_value = time() . "_cookie_". rand();
	setcookie("cookie_data", $cookie_value, time() + (86400 * 30), "/");
	$takequeryy = "INSERT INTO user_current_sessions (userid, session_data) VALUES ('$get_userid', '$cookie_value')";
	//echo $takequeryy;
	mysql_query($takequeryy);
	header('Location: http://localhost/codecamp/home.php');
}
}
	/*$asdff = mysql_query($takequery);
	$countt = mysql_num_rows($asdff);
	if($countt == '1' )
	{
		echo "Login Successful";
	}
	else {
		echo "login error";
	}
	
	
	
	
	
	
	} */
	?>
<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

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
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#contact">Contact  us</a></li>
            <li class="active"><a href="login.php">Login</a></li>
            <li><a href="login.php">Signup</a></li>
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container" style="position:absolute;top:-140px;height:auto;">
      <div class="loginform" style="position:relative;left:30px;">
        <form class="form-signin" role="form" action="login.php" method="post">
          <h2 class="form-signin-heading">Login</h2>
            <input type="email" name ="email" class="form-control" placeholder="Email address" required autofocus><br>
            <input type="password" name ="password" class="form-control" placeholder="Password" required><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="login">Login</button>
        </form>
  </div>
  <?php print_r($_POST); ?>
  <?php if(array_key_exists("create_account", $_POST)) {
	  echo "Working";
	  $get_error = '0';
	  $get_username = isset($_POST['username']) ? $_POST['username'] : '';
	  $get_email = isset($_POST['email']) ? $_POST['email'] : '';
	  $get_password = isset($_POST['password']) ? $_POST['password'] : '';
	  $get_repassword = isset($_POST['repassword']) ? $_POST['repassword'] : '';
	  $get_country = isset($_POST['country']) ? $_POST['country'] : '';
	  $get_agreement = isset($_POST['agreement']) ? $_POST['agreement'] : '';
	  $show_username_message = '';
	  $show_agreement_message = '';
	  $show_email_message = '';
	  $show_password_message = '';
	  $show_repassword_message = '';
	  	$get_userid = '0';
	  if($get_agreement == 'agree'){
		  if(check_new_username($get_username)) {
			  if(check_new_email($get_email)) {
			  if(($get_password == $get_repassword)&& strlen($get_password)> '5') {
				$takequery = "INSERT INTO user_details (user_name, user_email,user_country) VALUES ('$get_username', '$get_email', '$get_country')";
				mysql_query($takequery);
				$takequery11 = "SELECT sn FROM user_details where user_name = '$get_username' LIMIT 1";
				echo $takequery11;
				$acon  = mysql_query($takequery11);
			
				while($ttt = mysql_fetch_array($acon)) {
					$get_userid = $ttt['sn'];
				}
$takequery1 = "INSERT INTO user_login (userid,password) VALUES ('$get_userid' , '$get_password')";
mysql_query($takequery1);
echo '<div class="signupform" style="position:absolute;">account Created Successfully. Now you can login</div>';
			  }
			  else $get_error = 1;
			  }
			  else $get_error = 1;
			  
		  }
		  else {
			$show_username_message = "invalid username.";
		   $get_error = 1;
		  }
		  
	  }
	  else $get_error = 1;
	  if($get_error == '1') {
		  ?>
		  <div class="signupform" style="position:absolute;">
      <form class="form-signin" role="form" action="login.php" method="post">
        <h2 class="form-signin-heading">Signup</h2>
          <input type="text" class="form-control" placeholder="Username"  name = "username" value = "<?php echo $get_username; ?>"  required autofocus><br><?php echo $show_username_message; ?>
          <input type="email" class="form-control" placeholder="Email address" name ="email" value = "<?php echo $get_email; ?>" required autofocus><br><?php echo $show_email_message; ?>
          <input type="password" class="form-control" placeholder="Password" name = "password" value="<?php echo $get_password; ?>" required><br><?php echo $show_password_message; ?>
          <input type="password" class="form-control" placeholder="Confirm Password" name="repassword" value="<?php echo $get_repassword; ?>" required><br><?php echo $show_repassword_message; ?>
          <select class="form-control" name="country" required>
            <option value="">--Select Country</option>
            <option value="India">India</option>
            <option value="Nepal">Nepal</option>
            <option value="US">United States</option>
            <option value="Pakistan">Pakistan</option>
            <option value="UK">United Kingdom</option>
          </select><br>

          <label class="checkbox">
            <input type="checkbox" name="agreement" value="agree" required> I agree to all rules and regulations of this  web portal
          </label>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="create_account" value="create_account">Create New Account</button>
      </form>
  </div>
  <?php
	  }
	  
  }
  else { ?>
  <div class="signupform" style="position:absolute;">
      <form class="form-signin" role="form" action="login.php" method="post">
        <h2 class="form-signin-heading">Signup</h2>
          <input type="text" class="form-control" placeholder="Username"  name = "username"  required autofocus><br>
          <input type="email" class="form-control" placeholder="Email address" name ="email" required autofocus><br>
          <input type="password" class="form-control" placeholder="Password" name = "password" required><br>
          <input type="password" class="form-control" placeholder="Confirm Password" name="repassword" required><br>
          <select class="form-control" name="country" required>
            <option value="">--Select Country</option>
            <option value="India">India</option>
            <option value="Nepal">Nepal</option>
            <option value="US">United States</option>
            <option value="Pakistan">Pakistan</option>
            <option value="UK">United Kingdom</option>
          </select><br>

          <label class="checkbox">
            <input type="checkbox" name="agreement" value="agree" required> I agree to all rules and regulations of this  web portal
          </label>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="create_account" value="create_account">Create New Account</button>
      </form>
  </div>
  <?php
  } ?>

    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
