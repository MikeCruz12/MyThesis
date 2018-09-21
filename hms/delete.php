<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	$query = "SELECT id FROM users WHERE `id` = " . $_GET['id'];

	$response = mysqli_query($con,$query);
	if($response){
		$row = mysqli_fetch_array($response);
		$id=$row['id'];
	} 
	
	if (isset($_POST['submit'])){
		$id=mysqli_real_escape_string($con,$_POST['idNumber']);

		$deleteQuery="DELETE FROM users WHERE id='$id'";

		mysqli_query($con, $deleteQuery);

		echo '<script type="text/javascript">'; 
		echo 'alert("Deleted Successfully");'; 
		echo 'window.location.href = "clientList.php";';
		echo '</script>';

	}

	if (isset($_POST['no'])){
		header('Location: clientList.php');

	}

	

	?>
		</div>


		<div id="delForm">
		<form method="POST" action="delete.php">
			Are you sure to delete Client ID no. <?php echo $id;?>?<input type="hidden" name="idNumber" class="inputFields" value="<?php echo $id;?>" required=""><br><br>
			<input type="submit" name="submit" value="Yes" class="teal-buttons">
			<input type="submit" name="no" value="Cancel" class="teal-buttons">
			
		</form>

	</div>



	


