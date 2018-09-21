<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/clientMenu.php';
	include 'loginChecker/client.php';

	$user_id = $_SESSION['id'];

	$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id WHERE user_id = $user_id and status='Approved' ORDER BY register.id desc";
		
	$result = mysqli_query($con, $query);

	if($result){

		echo  '
		<h1>
			Inbox
		</h1>
		<table class="table">

				<tr>
				<th>Sender</th>
				<th>Subject</th>
				<th>Mountain</th>
				<th>Action</th>
				</tr>';


		while($row = mysqli_fetch_array($result)){
			// echo '<pre>';
			// print_r($row);
			// echo '</pre>';
			$row[0];

			echo '<tr>
				<td align="left">' . 'Admin'.'<br>'. $row['dateConfirmed'] . '</td>
				<td align="left">' . 'Form no. '.$row[0] . '</td>
				<td align="left">' . $row['mountain_name'] . '</td>
				<td align="left">' . '<a class="green-buttons"  href="form.php?id='.$row[0] .'">View</a>'. '</td>
				</tr>';
		}

		echo '</table>';
	}else{
		//no request found
	}
?>