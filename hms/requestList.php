
<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/clientMenu.php';
	include 'loginChecker/client.php';

	$user_id = $_SESSION['id'];

	$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id WHERE user_id = $user_id AND status='Being Reviewed' ORDER BY register.id desc";
		
	$result = mysqli_query($con, $query);

	if($result){

		echo  '
		<h1>
			Pending Request
		</h1>
		<table class="table">

				<tr>
				<th>Date Registered</th>
				<th>Mountain</th>
				<th>Choosed Date</th>
				<th style="width: 180px;">Status</th>
				</tr>';


		while($row = mysqli_fetch_array($result)){
			// echo '<pre>';
			// print_r($row);
			// echo '</pre>';
			$row[0];

			if($row['status'] == 'Approved'){
				$row['status'] = 'Approved <a class="green-buttons"  href="form.php?id='.$row[0] .'" target="_blank">Print Form</a>';
			}

			if($row['status'] == 'Disapproved'){
				$row['status'] = 'Disapproved <a class="red-buttons"  href="disapprovedform.php?id='.$row[0] .'" target="_blank">View Reason</a>';
			}

			echo '<tr>
				<td align="left">' . date("F d, Y",strtotime($row['datenow'])) . '</td>
				<td align="left">' . $row['mountain_name'] . '</td>
				<td align="left">' . date("F d, Y",strtotime($row['date'])) . '</td>
				<td align="left">' . 'Being Reviewed <a class="red-buttons" href="cancel.php?id='.$row[0].'" style="color: white;">Cancel</a>' . '</td>';
				echo '</tr>';
		}


		echo '</table>';
	}else{
		//no request found
	}
?>