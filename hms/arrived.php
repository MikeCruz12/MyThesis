<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';
	date_default_timezone_set("Asia/Hong_Kong");

	$datenow = date("Y-m-d");
	$timenow= date("H:i:s");

	$query = "SELECT * FROM hikerlist WHERE id = " . $_GET['id'];
	$result = mysqli_query($con,$query);

	if($result){
		while($row = mysqli_fetch_array($result)){
			$id = $row['id'];


		}
	}

	if (isset($_POST['submit'])){
		$id=mysqli_real_escape_string($con,$_POST['id']);

		$update = "UPDATE hikerlist SET hikerArrive='Arrived',arriveTime='$timenow',arriveDate='$datenow' WHERE id='$id'";

		mysqli_query($con, $update);

		echo "<script language=javascript>window.history.go(-2);</script>";
	


	}

?>

<div id="delForm">
		<form method="POST">
			Does this hiker arrive?<input type="hidden" name="id" class="inputFields" value="<?php echo $id;?>" required=""><br><br>
			<input type="submit" name="submit" value="Yes" class="teal-buttons">
			<input class="teal-buttons" action="action" onclick="window.history.go(-1); return false;" type="button" value="cancel" />
			
		</form>

	</div>

