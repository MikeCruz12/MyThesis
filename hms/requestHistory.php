<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';



	$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE status='Approved' OR status='Disapproved' ORDER BY register.id desc";

	$result = mysqli_query($con,$query);

	if($result){
		echo '
		<h1>
			Request History
		</h1>
		<table class="table">

				<tr>
				<th>Requestor</th>
				<th>Date Requested</th>
				<th>Mountain</th>
				<th>Scheduled Date</th>
				<th>Number of Days</th>
				<th>Total Hikers</th>
				<th>Requirements</th>
				<th style="width: 200px;">Status</th>
				</tr>';

		while($row = mysqli_fetch_array($result)){
			// echo '<pre>';
			// print_r($row);
			// echo '</pre>';

			$status = $row['status'];
			$req= $row['req'];
			$id = $row[0];
			$slot = $row['slot'];
			$hikers = $row['hikers'];
			$spot_id = $row['setspot_id'];

			if($status == 'Being Reviewed'){
				if($slot >= $hikers){
					$row['status'] = '<a class="green-buttons" href="adminRequestStatus.php?spot_id='.$spot_id.'&hikers='.$hikers.'&slot='.$slot.'&status=approve&id='.$id.'">Approve</a> ';
				}else{
					$row['status'] = 'No Slot Available. ';
				}

				$row['status'] .= '<a class="red-buttons" href="adminRequestStatus.php?status=disapprove&id='.$id.'">Disapprove</a>';
			}

			if($status == 'Approved'){
				$row['status'] = '<span class="text-green">' . $row['status'] . '</span>';
			}

			if($status == 'Disapproved'){
				$row['status'] = '<span class="text-red">' . $row['status'] . '</span>';
			}

			echo '<tr>
				<td>' . $row['firstname'] . ' ' . $row['lastname'] . '</td>
				<td>' . $row['datenow'] . '</td>
				<td>' . $row['mountain_name'] . '</td>
				<td>' . $row['date'] . '</td>
				<td>' . $row['days'] . '</td>
				<td>' . $row['hikers'] . '</td>
				<td>' . "<a class='blue-links' href='images/$req'>" .$row['req'] . "</a>" .'</td>
				<td>' . $row['status'] . '</td>
				</tr>';
		}

		echo '</table>';
	}else{
		//no request found
	}


?>





