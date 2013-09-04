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
                    <li class="active"><a href="Register.php">Register</a></li>
                    </ul>
                    <div style="padding-left:90%; padding-top:0.8%"><button class="btn btn-success" style="color:white"><a href="login.php">Login</a></button></div>
                </div>
            </div>
        </div>
    </div>
	<?php
	
	?>
	<div class="offset3 span6">
	<h3>Messages</h3>
	<div class="offset1" style="padding-top:50px">
	<?php
		session_start();
		if(!isset($_SESSION['username'])){
			// link to home if user isn't loggedin
				header("Location: login.php");
		}
		else{
			//chat page
			
			$db = mysqli_connect("localhost","chulapor_gr5","asdyui","chulapor_gr5");
			$signedInUser = $_SESSION['username'];
			$talkingWithUser =$_GET['username2'];
			print '<div style="padding-buttom:100px"><h6>You are chatting with :'.$talkingWithUser.'.</h6></div>';
			
			if(!isset($_POST['message'])){
				$_SESSION['talkingWithUser'] = $_GET['username2'];
				$q = "SELECT * FROM `Message` WHERE `username1`='".$signedInUser."'AND `username2`='".$talkingWithUser."'  OR `username2`='".$signedInUser."' AND `username1`='".$talkingWithUser."'  ORDER BY `timestamp` DESC";
				$r = mysqli_query($db,$q);
				$content .= '<form action="ChatPage.php" method="post" style="padding-top:25px">'."\n";
				$content .= '<div class="control-group" style="padding-left:15px">';
				$content .= ' <div class="input-append">';
				$content .= '<input type="text" class="span4" placeholder="Write Something Here." name="message"/>';
				$content .= '<input type="submit" value="Send" class="btn btn-primary"/>';
				$content .= '</div>';
				$content .='</div>';
				$content .= '</form>'."\n";
				 
				while($row = mysqli_fetch_array($r)){
					if($row['username1']==$signedInUser){
						$content .= '<div class="messageSend">'."\n";
						$content .= '<h6 style="color:#3B5998">'.$signedInUser.'</h6>'.$row['message'];
						$content .= '</div>'."\n";
					}
					else if($row['username2']==$signedInUser){
						$content .= '<div class="messageRecieve">'."\n";
						$content .= '<h6 style="color:#3B5998">'.$talkingWithUser.'</h6>'.$row['message'];
						$content .= '</div>'."\n";
					}
				}
				
				print $content;
			}
			else{
				session_start();
				$sender = $_SESSION['username'];
				$reciever= $_SESSION['talkingWithUser'];
				$q = 'INSERT INTO Message (username1,username2,message,timestamp) 
				VALUES ("'.$sender.'",
						"'.$reciever.'",
						"'.$_POST['message'].'",SYSDATE())';
				if(mysqli_query($db,$q)){
					
					header("Location: ChatPage.php?username2=$reciever");
				}
				else{
					$content .= 'Error! cannot send.'."\n";
				}
				print $content;
			}
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
