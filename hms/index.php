<?php 
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';

	if(logged_in()){
		header("location:profile.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>

<link rel="stylesheet" type="text/css" href="css/styles.css?ver=<?php echo strtotime("now"); ?>">
</head>
<body>

		<div id="loginMenu">
			<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="login.php">Log-in</a></li>
			<li><a href="register.php">Sign up</a></li>
			</ul>
		</div>

		<div id="homediv">
			<div class="slider">
				<figure>
					<div class="slide">
						
						<img src="images/S1.jpg " height="400" width="100%">
					</div>

					<div class="slide">
						
						<img src="images/S2.jpg" height="400">
					</div>

					<div class="slide">
						
						<img src="images/S3.jpg" height="400">
					</div>

					<div class="slide">
						
						<img src="images/S4.jpg" height="400">
					</div>

					<div class="slide">		
						<img src="images/S6.jpg" height="400">
					</div>
				</figure>
			</div>
		<BR><br><center><h2>Hiking refers to the activity of going for long walks in the country for pleasure, knowledge and exercises.<br> We can have tremendous benefits if we go hiking and observe the natural beauty of our country.</h2></center>
		</div>

		
		
</body>
</html>


