<?php	
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	?>

	<h1>
		Archieve
	</h1>


	<!-- <div id="locDiv"></div> -->

	<?php

	$query = "SELECT * FROM archive LEFT JOIN users ON archive.userid = users.username ORDER BY archive.id desc";
	$response = mysqli_query($con,$query);

	if($response){
		while($row = mysqli_fetch_array($response)){
			$row[0];
			$user_id=$row['userid'];
			$date=date("F d, Y",strtotime($row['dateposted']));
			$about=$row['about'];
			$pic=$row['picture'];
			$today=date("F d, Y",strtotime($row['today']));

			?>
			

			<div class="blog-single">
				<div class="title">
					<div class="image"><img src="images/<?php echo $row['profilePic'] ?>"></div>
					<?php echo $row['firstname'] . ' ' . $row['lastname']?>
					<div class="date">
						<?php 
						echo 'Posted '.$date.' / ';
						echo 'Deleted '.$today;

							


						?>
					</div>
				</div>
				<div class="content">
					<?php echo $about; ?><br><br>
					<?php 
						if ($pic==NULL) {
						 	echo '';
						 }
						 else{
						 	?><img src="images/<?php echo $pic; ?>" max width="720"><br><?php
						 }

					?>
				</div>
			</div>
			<?php

		}

	}

?>
