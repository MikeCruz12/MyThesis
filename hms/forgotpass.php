<?php
	include 'connect.php';
	include 'function.php';
	include 'header.php';

	if(logged_in()){
		header("location:profile.php");
		exit();
	}

	$error="";

	if (isset($_POST['submit'])){
	$question=mysqli_real_escape_string($con,$_POST['question']);
	$answer=mysqli_real_escape_string($con,$_POST['answer']);
	$username=mysqli_real_escape_string($con,$_POST['username']);

	$query="SELECT * FROM users WHERE username='$username' AND question='$question' AND answer='$answer'";
	$response=mysqli_query($con, $query);
			
			if($response){
				while($row = mysqli_fetch_array($response)){
				 $password=$row['password'];
				 $id=$row['id'];
			}
				
		}

		$error= $password;

		
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
			<center><b>Forgot Password</b></center><br>
			<label>Username</label> <input type="text" name="username" required="" class="inputFields"><br>
			<label>Secret Question</label> <select name="question" required="" class="inputFields">
				<option value=""></option>
				<option value="In what year was your father born?">In what year was your father born?</option>
				<option value="What is your favorite?">What is your favorite?</option>
				<option value="What is the first name of the person you first kissed?">What is the first name of the person you first kissed?</option>
				<option value="What is the last name of the teacher who gave you your first failing grade?">What is the last name of the teacher who gave you your first failing grade?</option>
				<option value="What was the name of your elementary / primary school?">What was the name of your elementary / primary school?</option>
			</select><br>
			<label>Answer</label> <input type="text" name="answer" required="" class="inputFields"><br><br>
			<input type="submit" name="submit" class="theButtons" value="Submit"><br><br>
		


		</form>
		<?php
				if($error){
					?>
						<form method="POST">
							<a class="yellow-buttons" href="newpass.php?id=<?php echo $id; ?>" style="color: white;text-decoration: none;">Click To Input New Password</a>
						</form>
					<?php

					if (isset($_POST['done'])){
						$id=mysqli_real_escape_string($con,$_POST['idNumber']);
						$password=mysqli_real_escape_string($con,$_POST['password']);

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

