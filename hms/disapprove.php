<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/clientMenu.php';
	include 'loginChecker/client.php';

	$user_id = $_SESSION['id'];

	$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id WHERE user_id = $user_id and status='Disapproved' ORDER BY register.id desc";
		
	$result = mysqli_query($con, $query);

	if($result){

		echo  '
		<h1>
			Disapproved Request List
			<a href="disapprove.php" class="blue-buttons" style="float:right;">Show Disapproved List</a>
			<a href="approve.php" class="blue-buttons" style="float:right;">Show Approved List</a>
		</h1>
		<table class="table">

				<tr>
				<th>Date Registered</th>
				<th>Mountain</th>
				<th>Choosed Date</th>
				<th>Total Hikers</th>
				<th style="width: 180px;">Status</th>
				</tr>';


		while($row = mysqli_fetch_array($result)){
			// echo '<pre>';
			// print_r($row);
			// echo '</pre>';

			if($row['status'] == 'Approved'){
				$row['status'] = 'Approved <a class="green-buttons"  href="form.php?id='.$row[0] .'" target="_blank">Print Form</a>';
			}

			if($row['status'] == 'Disapproved'){
				$row['status'] = 'Disapproved <a class="red-buttons"  href="disapprovedform.php?id='.$row[0] .'" target="_blank">View Reason</a>';
			}

			echo '<tr>
				<td align="left">' . $row['datenow'] . '</td>
				<td align="left">' . $row['mountain_name'] . '</td>
				<td align="left">' . $row['date'] . '</td>
				<td align="left">' . $row['hikers'] . '</td>
				<td align="left">' . $row['status'] . '</td>
				</tr>';
		}

		echo '</table>';
	}else{
		//no request found
	}
?>