<?php

	include 'connect.php';
	include 'function.php';

	if(logged_in()){
		header("location:profile.php");
		exit();
	}

	$emailerror="";
	$passmatcherror="";
	$userexisterror="";
	$passexisterror="";
	$time = strtotime("-18 year", time());
  	$date = date("Y-m-d", $time);
  	$time2 = strtotime("-60 year", time());
  	$date2 = date("Y-m-d", $time2);
	
	if (isset($_POST['submit'])){

		$first=mysqli_real_escape_string($con,$_POST['fname']);
		$middle=mysqli_real_escape_string($con,$_POST['mname']);
		$last=mysqli_real_escape_string($con,$_POST['lname']);
		$gender=mysqli_real_escape_string($con,$_POST['gender']);
		$bday=mysqli_real_escape_string($con,$_POST['birthday']);
		$contact=mysqli_real_escape_string($con,$_POST['contact']);
		$address=mysqli_real_escape_string($con,$_POST['address']);
		$username=mysqli_real_escape_string($con,$_POST['uname']);
		$password=mysqli_real_escape_string($con,$_POST['pass']);
		$conpassword=mysqli_real_escape_string($con,$_POST['conpass']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$Filename=mysqli_real_escape_string($con,$_POST['fileToUpload']);
		$question=mysqli_real_escape_string($con,$_POST['question']);
		$answer=mysqli_real_escape_string($con,$_POST['answer']);
		$years=mysqli_real_escape_string($con,$_POST['years']);
		$level=mysqli_real_escape_string($con,$_POST['level']);
		$specify=mysqli_real_escape_string($con,$_POST['condition']);

		$error=false;

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailerror="please enter valid email";
			$error=true;
		}


		if($password!==$conpassword){
			$passmatcherror="Not matched";
			$error=true;
		}

		if (username_exists($username,$con)) {
			$userexisterror ="Already exists";
			$error=true;
		}

		if(password_exists(md5($password),$con)){
			$passexisterror="Already exist";
			$error=true;
		}


		if(!$error){


			$insertQuery="INSERT INTO users(firstname,middlename,lastname,gender,bday,contact,address,username,password,confirmpsw,email,profilePic,question,answer,specify,type,years) VALUES('$first','$middle','$last','$gender','$bday','$contact','$address','$username','$password','$conpassword','$email','$Filename','$question','$answer','$specify','$level','$years')";
		
			mysqli_query($con, $insertQuery);

			echo '<script type="text/javascript">'; 
			echo 'alert("Registered successfully");'; 
			echo 'window.location.href = "login.php";';
			echo '</script>';


		}


	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign up page</title>

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
<body>

	<div id="regwrapper" class="container">

		

		<div id="regformdiv"> 

		<form method="POST" action="register.php">
			<center><h3>Sign up Account</h3></center>
			<h2 style="font-size: 20px;">Personal Info</h2><hr>
			<div class="row">
				<div class="col-sm-4 col-md-4 col-lg-4">
					<input type="hidden" name="fileToUpload" value="profilepic.jpg">
					First Name <input type="text" name="fname" pattern="[a-zA-Z][a-zA-Z ]{1,}" title="Invalid, should only contain letters" class="form-control" required="" value="<?php if(isset($_POST['fname'])){ echo $_POST['fname'];}?>"/>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4">
					Middle Name <input type="text" name="mname" pattern="[a-zA-Z][a-zA-Z ]{1,}" title="Invalid, should only contain letters" class="form-control" required="" value="<?php if(isset($_POST['mname'])){ echo $_POST['mname'];}?>"/>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4">
					Last Name <input type="text" name="lname" pattern="[a-zA-Z][a-zA-Z ]{1,}" title="Invalid, should only contain letters" class="form-control" required="" value="<?php if(isset($_POST['lname'])){ echo $_POST['lname'];}?>"/>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6">
					Birthdate <input type="date" name="birthday" class="form-control" max="<?php echo $date; ?>" min="<?php echo $date2; ?>" required="" value="<?php if(isset($_POST['birthday'])){ echo $_POST['birthday'];}?>"/>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					<br>
					Gender <input type="radio" name="gender" value="Boy" required <?php if(isset($_POST['gender'])){ echo ($_POST['gender'] == 'Boy') ? 'checked' : ''; } ?> > Boy
				   <input type="radio" name="gender" value="Girl" required <?php if(isset($_POST['gender'])){ echo ($_POST['gender'] == 'Girl') ? 'checked' : ''; } ?> > Girl
				</div>
			</div>

<br>

			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					Address <input style="width: 100%;" type="text" class="form-control" name="address" required="" value="<?php if(isset($_POST['address'])){ echo $_POST['address'];}?>"/>
				</div>
			</div>
<br>

			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6">
					Email <input type="text" name="email" required="" class="form-control" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>"/>&nbsp<?php echo $emailerror; ?>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					Mobile Number <input type="text" name="contact" pattern="^(09|\+639)\d{9}$" title="Must be start with 09 or +639 followed by nine digit number" required="" class="form-control" value="<?php if(isset($_POST['contact'])){ echo $_POST['contact'];}?>"/>
				</div>
			</div>
			<h2 style="font-size: 20px;">Hiking Info</h2><hr>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					How long have you been hiking? <select class="form-control" name="years" required="">
						<option value=""> </option>
						<option value="No ecperience">No experience</option>
						<option value="1-3 years">1-3 years</option>
						<option value="4-6 years">4-6 years</option>
						<option value="6-9 years">6-9 years</option>
					</select><br>

					What type of hiker are you? <select class="form-control" name="level" required="">
						<option value=""> </option>
						<option value="Beginner">Beginner</option>
						<option value="Intermediate">Intermediate</option>
						<option value="Professional">Professional</option>
					</select><br>
					Any medical condition? (Please specify, if yes) <input type="text" name="condition" required="" class="form-control" placeholder="Type None, if you don't have any medical condition"><br>
				</div>
			</div>

<h2 style="font-size: 20px;">Account</h2><hr>


			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					Username <input style="width: 100%;" type="text" name="uname" class="form-control" pattern=".{8,}" title="At least 8 or more characters" required="" value="<?php if(isset($_POST['uname'])){ echo $_POST['uname'];}?>"/>&nbsp<?php echo $userexisterror; ?>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6">
					Password<br> <input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" required="" value="<?php if(isset($_POST['pass'])){ echo $_POST['pass'];}?>"/>&nbsp<?php echo $passexisterror; ?>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					Confirm Password <input type="password" name="conpass" class="form-control" required="" value="<?php if(isset($_POST['conpass'])){ echo $_POST['conpass'];}?>"/>&nbsp<?php echo $passmatcherror; ?>
				</div>
			</div>
			<br>


			<p style="font-size: 14px;"><b>Note:</b> Please remember your secret question and answer for forgot password purpose.</p><hr>
			Secret Question <select name="question" required="" class="form-control">
				<option value=""></option>
				<option value="In what year was your father born?">In what year was your father born?</option>
				<option value="What is your favorite?">What is your favorite?</option>
				<option value="What is the first name of the person you first kissed?">What is the first name of the person you first kissed?</option>
				<option value="What is the last name of the teacher who gave you your first failing grade?">What is the last name of the teacher who gave you your first failing grade?</option>
				<option value="What was the name of your elementary / primary school?">What was the name of your elementary / primary school?</option>
			</select><br>
			Answer <input type="text" name="answer" required="" class="form-control"><br><br>
			
			<input type="submit" class="teal-buttons" name="submit"><br><br>

		</form>
		</div>

	</div>

</body>
</html>



