<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	$query = "SELECT * FROM blog WHERE `id` = " . $_GET['id'];

	$response = mysqli_query($con,$query);
	if($response){
		$row = mysqli_fetch_array($response);
		$id=$row['id'];
		$user_id=$row['user_id'];
		$datenow=$row['datenow'];
		$about=$row['about'];
		$picture=$row['picture'];

	} 

	if (isset($_POST['submit'])){
		$id=mysqli_real_escape_string($con,$_POST['idNumber']);
		$user_id=mysqli_real_escape_string($con,$_POST['user']);
		$about=mysqli_real_escape_string($con,$_POST['about']);
		$date=mysqli_real_escape_string($con,$_POST['date']);
		date_default_timezone_set("Asia/Hong_Kong");
		$today=date("Y-m-d h:i:sa");
		$Filename=mysqli_real_escape_string($con,$_POST['picture']);
		

		$deleteQuery="DELETE FROM blog WHERE id='$id'";

		mysqli_query($con, $deleteQuery);



		echo '<script type="text/javascript">'; 
		echo 'alert("Deleted Successfully");'; 
		echo 'window.location.href = "adminBlog.php";';
		echo '</script>';

			    $insertQuery="INSERT INTO archive(userid,dateposted,about,picture,today) VALUES('$user_id','$date','$about','$Filename','$today')";

		
				mysqli_query($con, $insertQuery);


	}

	if (isset($_POST['no'])){
		header('Location: adminBlog.php');

	}

	

	?>
		</div>


		<div id="delForm">
		<form method="POST" action="adminDelBlog.php">
			<input type="hidden" name="picture" class="inputFields" value="<?php echo $picture;?>" required="">
			<input type="hidden" name="user" class="inputFields" value="<?php echo $user_id;?>" required="">
			<input type="hidden" name="about" class="inputFields" value="<?php echo $about;?>" required="">
			<input type="hidden" name="date" class="inputFields" value="<?php echo $datenow;?>" required="">
			Are you sure you want to this post?<input type="hidden" name="idNumber" class="inputFields" value="<?php echo $id;?>" required=""><br><br>
			<input type="submit" name="submit" value="Yes" class="teal-buttons">
			<input type="submit" name="no" value="Cancel" class="teal-buttons">
			
		</form>

	</div>
	
	



	


