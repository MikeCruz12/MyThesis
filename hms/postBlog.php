<?php	
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/clientMenu.php';
	include 'loginchecker/client.php';

	if (isset($_POST['submit'])){

		$user_id = $_SESSION['username'];
		date_default_timezone_set("Asia/Hong_Kong");
		$dateNow=date("Y-m-d h:i:sa");
		$about=mysqli_real_escape_string($con,$_POST['about']);
		$target = "images/";
		$target = $target . basename( $_FILES['fileToUpload']['name']);
		$Filename=basename( $_FILES['fileToUpload']['name']);


			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
			    $insertQuery="INSERT INTO blog(user_id,datenow,about,picture) VALUES('$user_id','$dateNow','$about','$Filename')";
		
				mysqli_query($con, $insertQuery);

				echo '<script type="text/javascript">'; 
				echo 'alert("Posted successfully");'; 
				echo 'window.location.href = "blog.php";';
				echo '</script>';

			    
			}
			 else {
			     $insertQuery="INSERT INTO blog(user_id,dateNow,about) VALUES('$user_id','$dateNow','$about')";
		
				mysqli_query($con, $insertQuery);

				echo '<script type="text/javascript">'; 
				echo 'alert("Posted successfully");'; 
				echo 'window.location.href = "blog.php";';
				echo '</script>';

			}




		}

?>

<div id="locDiv">
	<form class="form-style" method="POST" enctype="multipart/form-data">
			<h1>Post Forum</h1>
			<textarea name="about" class="commentFields" required="" placeholder="Say Something" style="width: 800px"></textarea><br><br>
			<label><b>Picture</b></label>
			<input type="file" name="fileToUpload" id="fileToUpload" accept="image/x-png,image/gif,image/jpeg" /><br><br>

			<input type="submit" name="submit" class="teal-buttons" value="Post">

		</form>
</div>