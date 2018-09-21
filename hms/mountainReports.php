<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	

	$query="SELECT *,  COUNT(*) as total FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id GROUP By mountain_name ORDER BY total desc";
			$result=mysqli_query($con,$query);

			if($result){
				echo '<table align="left"
						cellspacing="5" cellpadding="8">
						<tr>
						<td align="left"><b>Mountain</b></td>
						<td align="left"><b>Total Registered</b></td>
						</tr>';
				while($row = mysqli_fetch_array($result)){
					echo '<tr>
						<td align="left">' . $row['mountain_name'] . '</td>
						<td align="left">' . $row['total'] . '</td>
						</tr>';

				}
				echo '</table>';
			}

	?>