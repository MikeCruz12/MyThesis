<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'loginchecker/clientMenu.php';
	include 'loginchecker/client.php';

	$query = "SELECT * FROM users WHERE `id` = " . $_GET['id'];

	$response = mysqli_query($con,$query);
	if($response){
		$row = mysqli_fetch_array($response);
		$id=$row['id'];
		$pic=$row['profilePic'];

	}

	if (isset($_POST['submit'])){
			$id=mysqli_real_escape_string($con,$_POST['idNumber']);
			$target = "images/";
			$target = $target . basename( $_FILES['fileToUpload']['name']);
			$Filename=basename( $_FILES['fileToUpload']['name']);

			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
			    $updateQuery="UPDATE users SET profilePic='$Filename' WHERE id='$id'";
		
				mysqli_query($con, $updateQuery);

				echo '<script type="text/javascript">'; 
				echo 'alert("Updated Successfully");';
				echo 'window.history.back();';
				echo '</script>';
			    
			}
			 else {
			    //Gives and error if its not
			    echo "Sorry, there was a problem uploading your file.";
			}
	}


?>

	<div id="locDiv">
		<form method="POST" action="profilePic.php" enctype="multipart/form-data">
			<center><input type="hidden" name="idNumber" class="inputFields" value="<?php echo $id;?>" required="">
			<h1>Edit Profile Picture</h1><br><br>
			<img src="images/<?php echo $pic; ?>" max width="720"><br><br>
			<input type="file" name="fileToUpload" id="fileToUpload" required="" accept="image/x-png,image/gif,image/jpeg" /><br><br>

			<input type="submit" name="submit" value="Set as profile picture" class="teal-buttons"></center>

		</form>

	</div>
