<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';



		if (isset($_POST['submit'])){

		$mountain=mysqli_real_escape_string($con,$_POST['mountain']);
		$address=mysqli_real_escape_string($con,$_POST['address']);
		$level=mysqli_real_escape_string($con,$_POST['level']);
		$altitude=mysqli_real_escape_string($con,$_POST['altitude']);
		$requirements=mysqli_real_escape_string($con,$_POST['requirements']);
		$description=mysqli_real_escape_string($con,$_POST['description']);
		$target = "images/";
		$target = $target . basename( $_FILES['fileToUpload']['name']);
		$Filename=basename( $_FILES['fileToUpload']['name']);
		//$Description=mysqli_real_escape_string($con,$_POST['description']);
		$slot=mysqli_real_escape_string($con,$_POST['slot']);
		$map=mysqli_real_escape_string($con,$_POST['map']);
		$equipment=mysqli_real_escape_string($con,$_POST['equipment']);
		$direction=mysqli_real_escape_string($con,$_POST['direction']);



			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
			    $insertQuery="INSERT INTO setspot(mountain_name,address,level,altitude,requirements,photo,description,slot,map,equipment,direction) VALUES('$mountain','$address','$level','$altitude','$requirements','$Filename','$description','$slot','$map','$equipment','$direction')";
		
				mysqli_query($con, $insertQuery);

				echo '<script type="text/javascript">'; 
				echo 'alert("Added Successfully");';
				echo 'window.location.href = "addedLocation.php";'; 
				echo '</script>';
			    
			}
			 else {
			    //Gives and error if its not
			    echo "Sorry, there was a problem uploading your file.";
			}




		}
	?>
	<h1>
		Add Location
	</h1>
	<div id="locDiv">
		<form class="form-style" method="POST" action="addLocation.php" enctype="multipart/form-data">

			<p style="font-size:14px; background-color: #1cb2b3; color: white; padding: 8px;"><b>Note:</b> Seperate Equipments and Requiremets Needed using "-" then ","<br> Example: -Compass, -Knife, -First aid kit, -etc...</p><br>

			<div class="col-50">
				<label><b>Mountain Name<span class="text-red">*</span></b></label>
				<input type="text" name="mountain" class="inputFields" required autofocus><br><br>

				<label><b>Trail Difficulty<span class="text-red">*</span></b></label>
				<select name="level" required="">
					<option value="">Select Difficulty</option>
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
				</select><br><br>

				<label><b>Sample Picture<span class="text-red">*</span></b></label>
				<input type="file" name="fileToUpload" id="fileToUpload" required="" accept="image/x-png,image/gif,image/jpeg" /><br><br>

				<label><b>Description<span class="text-red">*</span></b></label>
				<textarea name="description" class="commentFields" required=""></textarea><br><br>

				<label><b>Equipment(s) Needed<span class="text-red">*</span></b></label>
				<textarea name="equipment" class="commentFields" required=""></textarea><br><br>

				<label><b>Google Maps Embedded<span class="text-red">*</span></b></label>
				<textarea name="map" class="commentFields" required="" ></textarea><br><br>

				<input type="submit" name="submit" class="teal-buttons">
			</div>
			<div class="col-50">
				<label><b>Address<span class="text-red">*</span></b></label>
				<input type="text" name="address" class="inputFields" required=""><br><br>

				<label><b>Altitude(in meters)<span class="text-red">*</span> </b></label>
				<input type="number" step="0.01" name="altitude" class="inputFields" required=""><br><br>

				<label><b>Number of Slot<span class="text-red">*</span></b></label>
				<input type="number" name="slot" class="inputFields" required="" min="1"><br><br>

				<label><b>How To Get There<span class="text-red">*</span></b></label>
				<textarea name="direction" class="commentFields" required=""></textarea><br><br>

				<label><b>Requirement(s) Needed<span class="text-red">*</span></b></label>
				<textarea name="requirements" class="commentFields" required="" ></textarea><br><br>

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

	<?php

?>


