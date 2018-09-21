<?php

	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';


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
		$address=mysqli_real_escape_string($con,$_POST['address']);
		$username=mysqli_real_escape_string($con,$_POST['uname']);
		$password=mysqli_real_escape_string($con,$_POST['pass']);
		$conpassword=mysqli_real_escape_string($con,$_POST['conpass']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$Filename=mysqli_real_escape_string($con,$_POST['fileToUpload']);
		$question=mysqli_real_escape_string($con,$_POST['question']);
		$answer=mysqli_real_escape_string($con,$_POST['answer']);
		$error=false;

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailerror="please enter valid email";
			$error=true;
		}


		if($password!==$conpassword){
			$passmatcherror="Password not matched";
			$error=true;
		}

		if (username_exists($username,$con)) {
			$userexisterror ="Username already exists";
			$error=true;
		}

		if(password_exists(md5($password),$con)){
			$passexisterror="Password already exist";
			$error=true;
		}


		if(!$error){

			$insertQuery="INSERT INTO users(firstname,middlename,lastname,gender,bday,address,username,password,confirmpsw,email,profilePic,question,answer) VALUES('$first','$middle','$last','$gender','$bday','$address','$username','$password','$conpassword','$email','$Filename','$question','$answer')";
		
		
			mysqli_query($con, $insertQuery);

			echo '<script type="text/javascript">'; 
			echo 'alert("Client Added Successfully");'; 
			echo 'window.location.href = "clientList.php";';
			echo '</script>';


		}


	}

?>

		<div id="updateDiv">

		<form class="form-style" method="POST" action="insert.php">
			<h1>Add Client</h1>
			<div class="col-50">
			<input type="hidden" name="fileToUpload" value="profilepic.jpg">
			<label><b>First Name</b></label> <input type="text" name="fname" pattern="[A-Za-z]+{1,15}" title="Invalid, should only contain letters" class="inputFields" required="" value="<?php echo $_POST['fname'];?>"/><br><br>
			<label><b>Middle Name</b></label> <input type="text" name="mname" pattern="[A-Za-z]+{1,15}" title="Invalid, should only contain letters" class="inputFields" required="" value="<?php if(isset($_POST['mname'])){ echo $_POST['mname'];}?>"/><br><br>
			<label><b>Last Name</b></label> <input type="text" name="lname" pattern="[A-Za-z]+{1,15}" title="Invalid, should only contain letters" class="inputFields" required="" value="<?php if(isset($_POST['lname'])){ echo $_POST['lname'];}?>"/><br><br>
			<label><b>Gender</b></label> <input type="radio" name="gender" value="Male" required <?php echo ($_POST['gender'] == 'Male') ? 'checked' : '' ?> > Male
				   <input type="radio" name="gender" value="Female" required <?php echo ($_POST['gender'] == 'Female') ? 'checked' : ''?> > Female<br><br>
			<label><b>Birthdate</b></label> <input type="date" name="birthday" class="inputFields" max="<?php echo $date; ?>" min="<?php echo $date2; ?>" required="" value="<?php if(isset($_POST['birthday'])){ echo $_POST['birthday'];}?>"/><br><br>
			<label><b>Address</b></label> <input type="text" name="address" required="" value="<?php if(isset($_POST['address'])){ echo $_POST['address'];}?>"/><br><br>
			<label><b>Username</b></label> <input type="text" name="uname" class="inputFields" required="" pattern=".{8,}" title="At least 8 or more characters" value="<?php if(isset($_POST['uname'])){ echo $_POST['uname'];}?>"/>&nbsp<?php if($error){ echo '<div class="error">' . $userexisterror.'</div>'; }?>
			<label><b>Password</b></label> <input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="inputFields" required="" value="<?php if(isset($_POST['pass'])){ echo $_POST['pass'];}?>"/><br><br><?php if($error){ echo '<div class="error">' . $passexisterror.'</div>'; } ?>
			<label><b>Confirm Password</b></label> <input type="password" name="conpass" class="inputFields" required="" value="<?php if(isset($_POST['conpass'])){ echo $_POST['conpass'];}?>"/><br><br><?php if($error){ echo '<div class="error">' . $passmatcherror.'</div>'; } ?>
			<label><b>Email</b></label> <input type="text" name="email" required="" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>"/><br><br><?php if($error){ echo '<div class="error">' . $emailerror.'</div>'; } else { echo ""; }?>
			Secret Question <select name="question" required="">
				<option value="What is your pet’s name?">What is your pet’s name?</option>
				<option value="In what year was your father born?">In what year was your father born?</option>
				<option value="What is your favorite?">What is your favorite?</option>
				<option value="What is the first name of the person you first kissed?">What is the first name of the person you first kissed?</option>
				<option value="What is the last name of the teacher who gave you your first failing grade?">What is the last name of the teacher who gave you your first failing grade?</option>
				<option value="What was the name of your elementary / primary school?">What was the name of your elementary / primary school?</option>
			</select><br><br>
			Answer <input type="text" name="answer" required=""><br><br>
			
			<input type="submit" name="submit" class="teal-buttons"><br><br>
			</div>

		</form>
		</div>

	</div>




