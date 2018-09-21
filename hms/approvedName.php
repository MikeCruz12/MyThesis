<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	
	?>
		<h1>
			Select Mountain Name
			<a class="blue-buttons" href="approvedName.php">Approved Schedules by Mountain</a> 
			<a class="blue-buttons" href="todayApproved.php">Today</a> 
			<a class="blue-buttons" href="weekApproved.php">This Week</a> 
			<a class="blue-buttons" href="monthApproved.php">This Month</a> 
			<a class="blue-buttons" href="approvedReports.php">Overall</a> 
		</h1>
	<?php

		$query = "SELECT * FROM setspot";

		$response = mysqli_query($con,$query);

		if($response){

			while($row = mysqli_fetch_array($response)){
				$row['id'];
				$row['mountain_name'];
				?><center><br><a href="approvedNameReports.php?setspotId=<?php echo $row['id']; ?>" class="green-buttons"><?php echo $row['mountain_name'];?></a><br><br></center><?php
			}
		}

?>

	