<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE register.id = " . $_GET['id'];
	$result = mysqli_query($con,$query);

	if($result){
		while($row = mysqli_fetch_array($result)){
			$status = $row['status'];
			$id = $row[0];
			$slot = $row['slot'];
			$spot_id = $row['setspot_id'];

		}
	}

	if (isset($_POST['submit'])){
		$id=mysqli_real_escape_string($con,$_POST['idNumber']);
		date_default_timezone_set("Asia/Hong_Kong");
		$dateNow=date("Y-m-d h:i:sa");
		$reason=mysqli_real_escape_string($con,$_POST['reason']);

		$query="UPDATE register SET status='Disapproved', dateConfirmed='$dateNow', reason='$reason' WHERE id='$id'";

		mysqli_query($con, $query);

		echo '<script type="text/javascript">'; 
		echo 'window.location.href = "adminRequestList.php";';
		echo '</script>';

	}
		


?>
<form method="POST" action="reason.php">
<div style="margin: 10px;" align="center">
	<h2 style="color: #1cb2b3;">Reason for Disapproving</h2>
	<input type="hidden" name="idNumber" value="<?php echo $id;?>">
	<textarea name="reason" class="commentFields" required="" style="width: 500px; height: 200px;"></textarea><br><br>
	<a href="view.php?id=<?php echo $id; ?>" class="green-buttons">Cancel</a>
	<input type="submit" name="submit" class="red-buttons" value="Disappove" style="color: white; border: none; border-radius: 3px;">
</div>
</form>







