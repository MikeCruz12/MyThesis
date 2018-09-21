<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	
		$query = "SELECT * FROM setspot WHERE `id` = " . $_GET['id'];
	$response = mysqli_query($con,$query);

	if($response){
		while($row = mysqli_fetch_array($response)){
			$name=$row['mountain_name'];
			$address=$row['address'];
			$level=$row['level'];
			$altitude=$row['altitude'];
			$req=$row['requirements'];
			$pic=$row['photo'];
			$desc=$row['description'];
			$map=$row['map'];
			$equipment=$row['equipment'];
			$direction=$row['direction'];


		}

	}


	


	?>
	<div class="caption-image" style="background-image: url('images/<?php echo $pic; ?>')">
		<h2>
			<?php echo $name; ?>
			<span><?php echo $address; ?></span>
		</h2>
	</div>
		<!-- <CENTER><img src="" width="1020" height="500"></CENTER><br> -->
	<!-- <div id="locInfo"> -->
		<!-- <center><b><?php echo $name; ?><br>
		<?php echo $address; ?></b><br><br> -->
		<!-- Trail Difficulty: <?php echo $level; ?>/10<br>
		Altitude: <?php echo $altitude; ?> meters<br><br>
		</center>



		<br><label><b>Requirements:</b></label>
		<?php echo $req; ?><br><BR>
		<br><label><b>About:</b></label><br>
		<BIG><?php echo $desc; ?></BIG> -->

	<!-- </div> -->

	<div class="mountain-section">
	<center><H1>Google Map</H1></center>
	<?php echo $map; ?><br><br>
		<h3>About</h3>
		<p>
			<?php echo $desc; ?>
		</p>

		<h3>How To Get There</h3>
		<p>
			<?php echo $direction; ?>
		</p>

		<h3>Details</h3>
		<p>
			<b>Trail Difficulty: </b><?php echo $level; ?>/10 <br/>
			<b>Altitude: </b><?php echo $altitude; ?> meters
		</p>

		<h3>Equipments</h3>
		<p style="background-color: #cbec39">
			<?php echo $equipment; ?>
		</p>

		<h3>Requirements</h3>
		<p>
			<?php echo $req; ?>
		</p>

	</div>