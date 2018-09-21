<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';



	$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE status='Being Reviewed' ORDER BY register.id desc";

	$result = mysqli_query($con,$query);

	if($result){
		echo '
		<h1>
			Request List
		</h1>
		<table class="table" style="width: 70%;">

				<tr>
				<th>Requested By</th>
				<th>Mountain</th>
				<th>Action</th>

				</tr>';

		while($row = mysqli_fetch_array($result)){
			// echo '<pre>';
			// print_r($row);
			// echo '</pre>';
			$id = $row[0];


				?>
					<tr>
						<td style="font-size: 20px;">
							<b><?php echo ucfirst($row['firstname'])." ". ucfirst($row['middlename'])." ". ucfirst($row['lastname']);?></b>
								<br>
							<div style="font-size: 12px; line-height: 19px;"><?php echo date("F d, Y",strtotime($row['datenow']))?></div>
						</td>
						<td style="font-size: 20px;">
							<b><?php echo $row['mountain_name'];?></b>
						</td>
						<td>
							<a class="blue-buttons" href="view.php?id=<?php echo $id; ?>" style="color: white;"><img src="images/view.png">View</a>
						</td>
					</tr>
				<?php
		}

		echo '</table>';
	}


?>







