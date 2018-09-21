<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/clientMenu.php';
	include 'loginchecker/client.php';

	$emailerror="";
	
	$time = strtotime("-18 year", time());
  	$date = date("Y-m-d", $time);
  	$time2 = strtotime("-60 year", time());
  	$date2 = date("Y-m-d", $time2);

	$query = "SELECT * FROM users WHERE `id` = " . $_GET['id'];

	$response = mysqli_query($con,$query);
	if($response){
		$row = mysqli_fetch_array($response);
		$id=$row['id'];
		$firstname=$row['firstname'];
		$middlename=$row['middlename'];
		$lastname=$row['lastname'];
		$gender=$row['gender'];
		$bday=$row['bday'];
		$address=$row['address'];
		$email=$row['email'];
	}

	if (isset($_POST['submit'])){

			$id=mysqli_real_escape_string($con,$_POST['idNumber']);
			$first=mysqli_real_escape_string($con,$_POST['fname']);
			$middle=mysqli_real_escape_string($con,$_POST['mname']);
			$last=mysqli_real_escape_string($con,$_POST['lname']);
			$gender=mysqli_real_escape_string($con,$_POST['gender']);
			$bday=mysqli_real_escape_string($con,$_POST['birthday']);
			$address=mysqli_real_escape_string($con,$_POST['address']);
			$email=mysqli_real_escape_string($con,$_POST['email']);
			$error=false;

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailerror="please enter valid email";
				$error=true;
			}

			if(!$error){
			$updateQuery="UPDATE users SET firstname='$first',middlename='$middle',lastname='$last',gender='$gender',bday='$bday',address='$address', email='$email' WHERE id='$id'";

		
			mysqli_query($con, $updateQuery);

			echo '<script type="text/javascript">'; 
			echo 'alert("Updated Successfully");'; 
			echo 'window.location.href = "profile.php";';
			echo '</script>';
			}
	}
	
	?>

	<div id="updateDiv">
		<form class="form-style" method="POST" action="editProfile.php">
		<h1>Edit Profile</h1>
		<div class="col-50">
			<br><a class="yellow-buttons" href="profilePic.php?id=<?php echo $_SESSION['id']; ?>">Set Profile Picture</a><br><br>
			<input type="hidden" name="idNumber" class="inputFields" value="<?php echo $id;?>" required="">
			<label><b>Firstname</b></label>
			<input type="text" name="fname" pattern="[A-Za-z]+{1,15}" title="Invalid, should only contain letters" class="inputFields" required="" value="<?php echo $firstname; if(isset($_POST['fname'])){ echo $_POST['fname'];}?>"/><br><br>
			<label><b>Middlename</b></label>
			<input type="text" name="mname" pattern="[A-Za-z]+{1,15}" title="Invalid, should only contain letters" class="inputFields" required="" value="<?php echo $middlename; if(isset($_POST['mname'])){ echo $_POST['mname'];}?>"/><br><br>
			<label><b>Lastname</b></label>
			<input type="text" name="lname" pattern="[A-Za-z]+{1,15}" title="Invalid, should only contain letters" class="inputFields" required="" value="<?php echo $lastname; if(isset($_POST['lname'])){ echo $_POST['lname'];}?>"/><br><br>
			<label><b>Gender</b></label>
			<input type="radio" name="gender" value="Boy" required="" <?php echo ($gender == 'Boy') ? 'checked' : '' ?>> Boy
		   	<input type="radio" name="gender" value="Girl" required="" <?php echo ($gender == 'Girl') ? 'checked' : '' ?>> Girl<br><br>
			<label><b>Birthdate</b></label>
			<input type="date" name="birthday" class="inputFields" required="" value="<?php echo $bday;?>" max="<?php echo $date; ?>" min="<?php echo $date2; ?>"><br><br>
			<label><b>Address</b></label>
			<input type="text" name="address" class="inputFields" required="" value="<?php echo $address;?>"><br><br>
			<label><b>Email</b></label>
			<input type="text" name="email" class="inputFields" required="" value="<?php echo $email;?>">&nbsp<?php if($error){
					echo '<div class="error">' . $emailerror .'</div>';
				} ?><br><br>
			<input type="submit" name="submit" value="Update" class="teal-buttons">
			</div>
		</form>
	</div>