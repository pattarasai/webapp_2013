<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/demo.css" rel="stylesheet">
    <link href="css/flat-ui.css" rel="stylesheet">
	<link href="css/mycss.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">

	 <script src="jquery-1.10.2.min.js"></script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="header-banner" style="background-color:#3b5598">
        <p>
            <a href="http://designmodo.com/flat/?utm_source=designmodo&amp;utm_medium=TopBannerFlatUI&amp;utm_campaign=TopBannerFlatUI" class="banner-flat-text">Ning's Image</a>
        </p>
    </div>


    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse-01"></button>
                <a href="#" class="brand fui-flat"></a>

                <div class="nav-collapse collapse" id="nav-collapse-01">
                    <ul class="nav">
                  <!-- Menu items go here -->
                    <li class="active"><a href="#fakelink">Register</a></li>
                   

                    </ul>
                    <div style="padding-left:90%; padding-top:0.8%"><button class="btn btn-danger">Logout!</button></div>
                </div>
            </div>
        </div>
    </div>
	<div class="offset3 span6">
	<h3>Register</h3>
	<div class="offset1" style="padding-top:50px">
	<?php
		if(!isset($_POST['username'])){
			$content .= '<form class="dbDemo-student-form" id="dbDemo-add-student-form" action="Register.php" method="post">'."\n";
			$content .= '  <div class="dbDemo-form-element">'."\n";
			$content .= '    <span class="dbDemo-label">Username:</span><p><input class="non-blank" type="text" name="username"/>'."\n";
			$content .= '  </div>'."\n";
			$content .= '  <div class="dbDemo-form-element">'."\n";
			$content .= '    <span class="dbDemo-label">Password:</span><p><input class="non-blank" type="password" name="password"/>'."\n";
			$content .= '  </div>'."\n";
			$content .= '  <div class="dbDemo-form-element">'."\n";
			$content .= '    <span class="dbDemo-label">Confirm Password:</span><p><input class="non-blank" type="password" name="confirm_password"/>'."\n";
			$content .= '  </div>'."\n";
			$content .= '  <div class="dbDemo-form-element">'."\n";
			$content .= '    <input type="submit" value="Register" class="btn btn-primary"/>'."\n";
			$content .= '  </div>'."\n";
			$content .= '</form>'."\n";
			print $content;
		}else{
			$content .= '<h4>Registration is complete.</h4>'."\n";
			$content .= '<div class="span1">'."\n";
			$content .= '<h6>Your username is '.$_POST['username'].'.</h6>'."\n";
			
			$db = mysqli_connect("localhost","chulapor_gr5","asdyui","chulapor_gr5");
			if(mysqli_connect_errno($db)){
				$db = null;
			}if(!isset($db)){
				$content .= 'ERROR: Cannot connect to the database.';
			}else{
				$content .= 'Connect to db success.'."\n";
				$q = 'INSERT INTO User (username,password,user_type) 
				VALUES ("'.$_POST['username'].'",
						"'.$_POST['password'].'",
						0)';
				if(mysqli_query($db,$q)){
					$content .= 'added to db'."\n";
				}
				else{
					$content .= 'Error cannot add to db'."\n";
				}
			}
			$content .='</div>'."\n";
			print $content;
		}
	?>
	</div>
	</div>
	<!-- script -->
	
    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery.stacktable.js"></script>
    <script src="js/application.js"></script>
  </body>
</html>
