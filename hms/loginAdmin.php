<?php

	include 'connect.php';
	include 'function.php';
	include 'header.php';

	if(logged_in()){
		header("location:clientList.php");
		exit();
	}

	$error="";
	
	if (isset($_POST['submit'])){

		$username=mysqli_real_escape_string($con,$_POST['uname']);
		$password=mysqli_real_escape_string($con,$_POST['pass']);




		if(adminUsername_exists($username, $con)){
			$result= mysqli_query($con, "SELECT password FROM admin WHERE username='$username'");
			$retrievepassword= mysqli_fetch_assoc($result);

			if($password!==$retrievepassword['password']){
				$error = " Maybe username or password is incorrect";
			}

			else{
				$_SESSION['username']=$username;

				if($retrievepassword['gender'] != null){
					$_SESSION['usertype']= 'client';
				}else{
					$_SESSION['usertype']= 'admin';
				}
				
				header("location:dashboard.php");
			}

		}

		else{
			$error = " Maybe username or password is incorrect";
		}



	}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

<link rel="stylesheet" type="text/css" href="css/styles.css?ver=<?php echo strtotime("now"); ?>">
<style type="text/css">


	body { 
  background: url('images/login-bg.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}


</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
</head>
<body >

<div class="container" align="center" >
	<div class="row">
		<div class="col-sm-3 col-md-3 col-lg-3">
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div id="loginwrapper">

		<div id="formdiv"> 

		<form method="POST" action="loginAdmin.php">
			<center><b>Login Admin</b></center><br>
			<?php
				if($error){
					echo '<div class="error">' . $error .'</div>';
				}
			?>
			<label>Username</label>
			<input type="text" name="uname" class="inputFields" required autofocus><br><br>
			<label>Password</label>
			<input type="password" name="pass" class="inputFields" required=""><br><br>
			<input type="submit" name="submit" class="theButtons" value="Login"><br><br>

			

		</form>
		</div>

	</div>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3">
		</div>
	</div>
</div>

	

</body>
</html>