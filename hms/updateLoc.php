<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	$query = "SELECT * FROM setspot WHERE `id` = " . $_GET['id'];
	$response = mysqli_query($con,$query);

	if($response){
		$row = mysqli_fetch_array($response);
			$id=$row['id'];
			$name=$row['mountain_name'];
			$address=$row['address'];
			$level=$row['level'];
			$altitude=$row['altitude'];
			$req=$row['requirements'];
			$desc=$row['description'];
			$slot=$row['slot'];
			$map=$row['map'];
			$equipment=$row['equipment'];
			$direction=$row['direction'];

	}

	if (isset($_POST['submit'])){
			$id=mysqli_real_escape_string($con,$_POST['idNumber']);
			$mountain=mysqli_real_escape_string($con,$_POST['mountain']);
			$address=mysqli_real_escape_string($con,$_POST['address']);
			$level=mysqli_real_escape_string($con,$_POST['level']);
			$altitude=mysqli_real_escape_string($con,$_POST['altitude']);
			$requirements=mysqli_real_escape_string($con,$_POST['requirements']);
			$description=mysqli_real_escape_string($con,$_POST['description']);
			$map=mysqli_real_escape_string($con,$_POST['map']);
			$equipment=mysqli_real_escape_string($con,$_POST['equipment']);
			$direction=mysqli_real_escape_string($con,$_POST['direction']);

			
			    $updateQuery="UPDATE setspot SET mountain_name='$mountain',address='$address',level='$level',altitude='$altitude',requirements='$requirements',description='$description',map='$map', equipment='$equipment', direction='$direction' WHERE id='$id'";
		
				mysqli_query($con, $updateQuery);

				echo '<script type="text/javascript">'; 
				echo 'alert("Location Updated Successfully");';
				echo 'window.location.href = "addedLocation.php";'; 
				echo '</script>';
			
	}


?>

	<div id="locDiv">
		<form class="form-style" method="POST" action="updateLoc.php" enctype="multipart/form-data">
		<h1>Update <?php echo $name;?></h1>
		<div class="col-50">
			<input type="hidden" name="idNumber" class="inputFields" value="<?php echo $id;?>" required="">
			<label><b>*Mountain Name:</b></label>
			<input type="text" name="mountain" class="inputFields" required="" value="<?php echo $name;?>"><br><br>
			
			<label><b>*Trail Difficulty: </b></label>
			<select name="level" required="">
				<option value="<?php echo $level;?>"><?php echo $level;?></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select><br><br><br>
			<label><b>*Sample Picture:</b>&nbsp<a class="blue-buttons" href="picLoc.php?id=<?php echo $row['id']; ?>">Update Mountain Photo</a></label><br>
			<label><b>*Description:</b></label>
			<textarea name="description" class="commentFields" required=""><?php echo $desc;?></textarea><br><br>
			<label><b>Equipment(s) Needed<span class="text-red">*</span></b></label>
			<textarea name="equipment" class="commentFields" required=""><?php echo $equipment;?></textarea><br><br>
			<label><b>Google Maps Embedded<span class="text-red">*</span></b></label>
			<textarea name="map" class="commentFields" required="" ><?php echo $map;?></textarea><br><br>
			<input type="submit" name="submit" value="Update" class="teal-buttons">
			</div>
			<div class="col-50">
			<label><b>*Address:</b></label>
			<input type="text" name="address" class="inputFields" required="" value="<?php echo $address;?>"><br><br>
			<label><b>*Altitude(in meters): </b></label>
			<input type="number" step="0.01" name="altitude" class="inputFields" required="" value="<?php echo $altitude;?>" ><br><br>
			<label><b>How To Get There<span class="text-red">*</span></b></label>
			<textarea name="direction" class="commentFields" required="" style="height: 128px;"><?php echo $direction;?></textarea><br><br>
			<label><b>*Requirements Needed:</b></label>
			<textarea name="requirements" class="commentFields" required="" ><?php echo $req;?></textarea><br><br>

			<div id="instruction">
				<p>Embedding Maps Instruction:</p>
				<ol>
					<li>Go to <a href="https://www.google.com.ph/maps?source=tldsi&hl=en" target="_blank">Google Map</a></li>
					<li>Search Mountain and press Enter</li>
					<li>Click Share</li>
					<li>Go to Embed map tab</li>
					<li>Copy text</li>
					<li>and paste it to "Google Maps Embedded" field</li>
				</ol>
			</div>

			</div>

		</form>

	</div>
