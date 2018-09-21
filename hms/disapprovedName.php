<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	
	?>
		<h1>
			Select Mountain Name
			<a class="blue-buttons" href="disapprovedName.php">Disapproved Schedules by Mountain</a>
			<a class="blue-buttons" href="todayDisapproved.php">Today</a> 
			<a class="blue-buttons" href="weekDisapproved.php">This Week</a> 
			<a class="blue-buttons" href="monthDisapproved.php">This Month</a> 
			<a class="blue-buttons" href="disapprovedReports.php">Overall</a> 
		</h1>
	<?php

		$query = "SELECT * FROM setspot";

		$response = mysqli_query($con,$query);

		if($response){

			while($row = mysqli_fetch_array($response)){
				$row['id'];
				$row['mountain_name'];
				?><center><br><a href="disapprovedNameReports.php?setspotId=<?php echo $row['id']; ?>" class="green-buttons"><?php echo $row['mountain_name'];?></a><br><br></center><?php
			}
		}

?>

	