<?php
	include 'connect.php';
	include 'function.php';
	include 'header.php';

	if(logged_in()){
		header("location:profile.php");
		exit();
	}


	$query = "SELECT * FROM users WHERE id = " . $_GET['id'];
	$result = mysqli_query($con,$query);

	if($result){
		while($row = mysqli_fetch_array($result)){
			$id=$row['id'];
		}
	}




?>

<!DOCTYPE html>
<html>
<head>
	<head>
	<title>Login page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

<link rel="stylesheet" type="text/css" href="css/styles.css?ver=<?php echo strtotime("now"); ?>">
<style type="text/css">
	body{
		background-image: url('images/login-bg.jpg');
	    background-size: cover;
	    background-repeat: no-repeat;
	    background-position: top;
	}

</style>
</head>
<body>


	<div id="loginwrapper">

		<div id="formdiv"> 

		<form method="POST">
				
							<input type="hidden" name="idNumber" class="inputFields" value="<?php echo $id;?>" required="">
							<label>New Password</label>
							<input type="password" name="password" required="" class="inputFields" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br><br>
							<label>Confirm New Password</label>
							<input type="password" name="conpass" class="inputFields" required=""><br><br>
							<input type="submit" name="done" class="btn btn-primary" value="Done"><br><br>

							<?php
			echo $error;
		?>


		</form>

					<?php



					if (isset($_POST['done'])){
						$id=mysqli_real_escape_string($con,$_POST['idNumber']);
						$password=mysqli_real_escape_string($con,$_POST['password']);
						$conpass=mysqli_real_escape_string($con,$_POST['conpass']);

						if($password!==$conpass){
							echo '<script type="text/javascript">'; 
							echo 'alert("Password Not Matched");'; 
							echo '</script>';
						}

						else if(password_exists($password,$con)){
							echo '<script type="text/javascript">'; 
							echo 'alert("Password Already Exist");'; 
							echo '</script>';
						}

						else{

							$updateQuery="UPDATE users SET password='$password' WHERE id='$id'";

			
							mysqli_query($con, $updateQuery);

							echo '<script type="text/javascript">'; 
							echo 'alert("Password Successfully Change");'; 
							echo 'window.location.href = "login.php";';
							echo '</script>';
						}
					}
				
			?>
		</div>


	</div>

</body>
</html>

<?php 
	include 'footer.php';
?>

