<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';
	$error="";

	if(isset($_POST['savepass'])){
		$password=$_POST['pass'];
		$conpass=$_POST['conpass'];

		if($password!==$conpass){
			$error="Password not match";
		}
		else if(password_exists($password,$con)){
			$error="password is already exist";
		}
		else{
			$username = $_SESSION['username'];
			
			if(mysqli_query($con,"UPDATE admin SET password='$password' WHERE username='$username'")){
				
				echo '<script type="text/javascript">'; 
				echo 'alert("Password Changed Successfully");'; 
				echo 'window.location.href = "clientList.php";';
				echo '</script>';
			}
		}

	}
		

	?>
	
	<div id="loginwrapper2">
		<div id="formdiv"> 
			<form class="form-style" method="POST" action="adminchangepassword.php">
				<h1>Change Password</h1>
				<label><b>Password</b></label> <input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="inputFields" required="" value="<?php if(isset($_POST['pass'])){ echo $_POST['pass'];}?>"/><br>
				<label><b>Confirm New Password</b></label> <input type="password" name="conpass" class="inputFields" required=""><br><br>
				<input type="submit" name="savepass" value="Change" class="teal-buttons"><br><br>
		<?php
			echo $error;
		?>
	
			</form>
		</div>
	</div>



