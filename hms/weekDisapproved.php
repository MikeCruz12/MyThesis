<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';



	$queryApprove="SELECT COUNT(status) as total_approve FROM register WHERE status='Disapproved' AND YEARWEEK(`dateConfirmed`, 1) = YEARWEEK(CURDATE(), 1)";
		$total_approved = mysqli_query($con,$queryApprove);

		if($total_approved){
			while($row = mysqli_fetch_array($total_approved)){
				$approve_count=$row['total_approve'];
			}
		}


		?>

		<h1>
			This Week Disapproved Registration (<?php echo $approve_count;?>)
			<a class="blue-buttons" href="disapprovedName.php">Disapproved Schedules by Mountain</a>
			<a class="blue-buttons" href="todayDisapproved.php">Today</a> 
			<a class="blue-buttons" href="weekDisapproved.php">This Week</a> 
			<a class="blue-buttons" href="monthDisapproved.php">This Month</a> 
			<a class="blue-buttons" href="disapprovedReports.php">Overall</a> 
		</h1>
			<?php
				$queryApprove_show="SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE status='Disapproved' AND YEARWEEK(`dateConfirmed`, 1) = YEARWEEK(CURDATE(), 1) ORDER BY datenow desc";
				$result_approve=mysqli_query($con,$queryApprove_show);

				if($result_approve){
					echo '<table class="table">

						<tr>
						<th>Hiker</th>
						<th>Date Requested</th>
						<th>Scheduled In Mountain</th>
						<th>Date Disapproved</th>
						</tr>';
					while($row = mysqli_fetch_array($result_approve)){
						echo '<tr>
						<td align="left">' . $row['firstname'] . ' '.$row['middlename'].' ' . $row['lastname'] . '</td>
						<td align="left">' . $row['datenow'] . '</td>
						<td align="left">' . $row['mountain_name'] . '</td>
						<td align="left">' . $row['dateConfirmed'] . '</td>
						</tr>';

					}
					echo '</table>';
				}

?>