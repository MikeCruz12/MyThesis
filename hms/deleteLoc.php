<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	$query = "SELECT * FROM setspot WHERE `id` = " . $_GET['id'];

	$response = mysqli_query($con,$query);
	if($response){
		$row = mysqli_fetch_array($response);
		$id=$row['id'];
		$name=$row['mountain_name'];
	} 
	
	if (isset($_POST['submit'])){
		$id=mysqli_real_escape_string($con,$_POST['idNumber']);

		$deleteQuery="DELETE FROM setspot WHERE id='$id'";

		mysqli_query($con, $deleteQuery);

		echo '<script type="text/javascript">'; 
		echo 'alert("Deleted Successfully");'; 
		echo 'window.location.href = "addedLocation.php";';
		echo '</script>';

	}

	if (isset($_POST['no'])){
		header('Location: addedLocation.php');

	}

	

	?>
		</div>


		<div id="delForm">
		<form method="POST" action="deleteLoc.php">
			Are you sure you want to delete <?php echo $name;?>?<input type="hidden" name="idNumber" class="inputFields" value="<?php echo $id;?>" required=""><br><br>
			<input type="submit" name="submit" value="delete" class="teal-buttons">
			<input type="submit" name="no" value="Cancel" class="teal-buttons">
			
		</form>

	</div>



	


