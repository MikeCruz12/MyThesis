<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';


	
		
		$query = "SELECT * FROM setspot";

		$response = mysqli_query($con,$query);

		if($response){
			echo '<h1>Added Hiking Destination<a href="addLocation.php" class="green-buttons" style="float: right;">Add Location</a></h1>

			<table class="table">
				<tr>
					<th>Mountain Name</th>
					<th>Actions</th>
				</tr>
			';

			while($row = mysqli_fetch_array($response)){
				$row['mountain_name'];
				$row['slot'];

				

				?>
				<tr>
					<td><?php echo $row['mountain_name'] ?></td>
					<td>
						<a class="blue-buttons" href="viewLoc.php?id=<?php echo $row['id']; ?>"><img src="images/view.png">View</a>
						<a class="yellow-buttons" href="updateLoc.php?id=<?php echo $row['id']; ?>"><img src="images/edit.png">Edit</a>
						<a class="red-buttons" href="deleteLoc.php?id=<?php echo $row['id']; ?>"><img src="images/delete.png">Delete</a>
					</td>
				</tr>

				<!-- <div style="padding: 20px">
				<big><u><?php echo $row['mountain_name']."  Slot[".$row['slot']."]"; ?></u></big>&nbsp<a href="viewLoc.php?id=<?php echo $row['id']; ?>">View</a>&nbsp&nbsp<a href="updateLoc.php?id=<?php echo $row['id']; ?>">Update</a>&nbsp
				<a href="deleteLoc.php?id=<?php echo $row['id']; ?>">Delete</a>
				</div> -->
				<?php

				



			}

			echo '</table>';

		}
		?>
		
		</div>