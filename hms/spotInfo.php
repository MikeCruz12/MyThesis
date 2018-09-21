<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/clientMenu.php';
	include 'loginchecker/client.php';

	$info='';

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
			$slot=$row['slot'];
			$map=$row['map'];
			$equipment=$row['equipment'];
			$direction=$row['direction'];

		}

	}



										if($level<=4){
											$info='Beginner'; 

										}

										elseif($level<=7){
											$info='Intermediate'; 
										}

										else{
											$info='Professional'; ; 
										}


	


	?>
	<div class="caption-image" style="background-image: url('images/<?php echo $pic; ?>')">
		<h2>
			<?php echo $name; ?>
			<span><?php echo $address; ?></span>
		</h2>
	</div>

	<div class="mountain-section">
	<center><H1>Google Map</H1></center>
	<?php echo $map; ?>


	<center><br><a class="blue-buttons" href="registerSched.php?id=<?php echo $_GET['id'] ?>">Register</a></center><br>
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
			<b>Trail Difficulty: </b><?php echo $level.'/10 '.$info; ?><br/>
			<b>Altitude: </b><?php echo $altitude; ?> meters <br/>
		</p>

		<h3>Equipment</h3>
		<p style="background-color: #cbec39;">
			<?php echo $equipment; ?>
		</p>

		<h3>Requirements</h3>
		<p>
			<?php echo $req; ?>
		</p>

	</div>