<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'loginchecker/clientMenu.php';
	include 'loginChecker/client.php';

	$query = "SELECT id FROM blog WHERE `id` = " . $_GET['id'];

	$response = mysqli_query($con,$query);
	if($response){
		$row = mysqli_fetch_array($response);
		$id=$row['id'];
	} 

	if (isset($_POST['submit'])){
		$id=mysqli_real_escape_string($con,$_POST['idNumber']);

		$deleteQuery="DELETE FROM blog WHERE id='$id'";

		mysqli_query($con, $deleteQuery);

		echo '<script type="text/javascript">'; 
		echo 'alert("Deleted Successfully");'; 
		echo 'window.location.href = "blog.php";';
		echo '</script>';

	}

	if (isset($_POST['no'])){
		header('Location: blog.php');

	}

	

	?>
		</div>


		<div id="delForm">
		<form method="POST" action="deleteBlog.php">
			Are you sure you want to this post?<input type="hidden" name="idNumber" class="inputFields" value="<?php echo $id;?>" required=""><br><br>
			<input type="submit" name="submit" value="Yes" class="teal-buttons">
			<input type="submit" name="no" value="Cancel" class="teal-buttons">
			
		</form>

	</div>
	
	



	


