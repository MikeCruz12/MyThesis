<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/clientMenu.php';
	include 'loginchecker/client.php';

	
		?>
		<h1>Available Hiking Destination</h1>
		<!-- <div id="scheduleDiv">  -->
		<?php 
		$query = "SELECT * FROM setspot ORDER BY id DESC";

		$response = mysqli_query($con,$query);

		if($response){
			// echo "";

			while($row = mysqli_fetch_array($response)){
				//$row['mountain_name'];
				$pic=$row['photo'];
				$slot=$row['slot'];

				?>

				<div class="col-50">
				<div class="mountain-single">
					<div class="image" style="background-image: url('images/<?php echo $pic; ?>')"></div>
					<div class="description">
						<h4>
							<?php echo $row['mountain_name'] ?>
							<span><?php echo $row['address'] ?></span>
						</h4>
						<p>
							<?php echo $row['description'] ?>
						</p>
						<div class="button-container">
						<a class="blue-buttons" href="spotInfo.php?id=<?php echo $row['id']; ?>"><img src="images/view.png">View</a>
						<a class="blue-buttons" href="registerSched.php?id=<?php echo $row['id']; ?>">Register</a>
						</div>
					</div>
				</div>
				</div>
				<!-- <CENTER><img src="images/<?php echo $pic; ?>" width="450" height="250">
				<br><a href="spotInfo.php?id=<?php echo $row['id']; ?>"><?php echo $row['mountain_name']; ?></a>&nbsp Slot[<?php echo $slot; ?>]</center><br><br> -->

				<?php


				



			}

		}
		?>
		
		<!-- </div> -->