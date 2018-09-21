<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/clientMenu.php';
	include 'loginChecker/client.php';
	date_default_timezone_set("Asia/Hong_Kong");

	$info='';
	$user_id = $_SESSION['id'];
	$registerError="";

	$select = "SELECT *,COUNT(status) as total FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE register.status='Being Reviewed' AND username = '".$_SESSION['username']."'";

		if($result = $con->query($select)){
    		while($row = $result->fetch_assoc()){
    			$total=$row['total'];	
   			}
    	$result->free();
		}

	$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id WHERE user_id = $user_id ORDER BY register.id desc limit 1";
		
	$result = mysqli_query($con, $query);

	if($result){
		while($row = mysqli_fetch_array($result)){
			 	$id=$row[0];
			 	$date=date("F d, Y",strtotime($row['date']));
			 	$mountain=$row['mountain_name'];
			 	$address = $row['address'];
			 	$level=$row['level'];
			 	$altitude=$row['altitude'];
			 	$requirements=$row['requirements'];
			 	$days=$row['days'];
			 	$time=date("h i, A",strtotime($row['startTime']));
			 	$until=date("h i, A",strtotime($row['until']));
			 	$setspot_id=$row['id'];
			 	$noww=$row['date'];

		}
	}

	if($level<=4){
											$info='Beginner For None experienced'; 

										}

										elseif($level<=7){
											$info='Intermediate atleast 1-3 years'; 
										}

										else{
											$info='Professional more than 4 years'; ; 
										}

?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>
           <div class="container" style="padding-bottom: 20px;">  
        		<h1 style="color: #0d9d9e;border-bottom: 1px solid #d8d8d8;margin-top: 20px;">Request</h1>

        		<div class="table-responsive">  
                    <table class="tables" width="100%" style="padding: 0px;">
                     	<thead>  
                            <tr>
								<th width="100%" colspan="5" style="font-size: 20px; text-align: center;">Schedule Information</th>
							</tr>
	                    </thead>

	                    <tbody align="center">
	                    	<tr style="font-weight: bold;">
	                    		<td>Mountain</td>
	                    		<td>Difficulty</td>
	                    		<td>Picked Date</td>
	                    		<td>Day(s) To Stay</td>
	                    		<td>Time</td>
	                    	</tr>

	                    	<tr>
	                    		<td><?php echo $mountain;?></td>
	                    		<td><?php echo $level.'/10 '.$info;?></td>
	                    		<td><?php echo $date;?></td>
	                    		<td><?php echo $days;?></td>
	                    		<td><?php echo $time;?> to <?php echo $until;?></td>
	                    	</tr>
	                    </tbody>
	                </table>
	            </div>


	            <div class="table-responsive">
                    <table class="tables" width="100%" style="padding: 0px;" id="item_table">
                     	<thead>  
                            <tr>
								<th width="100%" colspan="8" style="font-size: 20px; text-align: center;">Hiker List</th>
							</tr>
	                    </thead>

	                    <tbody align="center">
	                    	<tr style="font-weight: bold;">
	                    		<td>Full Name</td>
	                    		<td>Age</td>
	                    		<td>Cellphone No.</td>
	                    		<td>Years Hiked</td>
	                    		<td>Hiker Level</td>
	                    		<td>Medical Condition<br>(Type Physically Fit, If you don't have.)</td>
	                    		<td>Requirements<br>( <?php echo $requirements; ?> )</td>
	                    		<td>Action</td>
	                    	</tr>

	                    	<?php  
                         	$query = "SELECT * FROM hikerlist WHERE register_id='$id'";

							$response = mysqli_query($con,$query);

							if($response){
								while($row = mysqli_fetch_array($response)){

							$delID=$row['id'];
							echo'<tr><td>'.
							$row['name'].'</td><td>'.
							$row['age'].'</td><td>'.
							$row['contact'].'</td><td>'.
							$row['years'].'</td><td>'.
							$row['experience'].'</td><td>'.
							$row['medical'].'</td><td>'.
							$row['requirements'].'</td><td>'.'
							<form method="POST"><input type="submit" name="delete" value="Cancel" class="btn btn-danger"></form>'.'</td>';

								}
							}

							if (isset($_POST['delete'])){

									    $deleteQuery="DELETE  FROM hikerlist WHERE id='$delID'";
								
										mysqli_query($con, $deleteQuery);


										echo '<script type="text/javascript">'; 
										echo 'alert("Deleted Successfully");'; 
										echo 'window.location.href = "requestForm.php";';
										echo '</script>';



								
							}


							

							
							?>

	                    	<tr>
	                    		<form method="POST" enctype="multipart/form-data">
	                    		<input type="hidden" name="id" value="<?php echo $id; ?>" required="">
	                    		<input type="hidden" name="now" value="<?php echo $noww; ?>" required="">
	                    		<td><input type="text" pattern="[a-zA-Z][a-zA-Z ]{1,}" name="name" class="form-control" required=""></td>
	                    		<td><input type="number" name="age" min="18" max="60" class="form-control" required="" style="width: 60px;"></td>
	                    		<td><input type="tel" name="contact" pattern="^(09|\+639)\d{9}$" title="Must be start with 09 or +639 followed by nine digit number" class="form-control" required=""></td>
	                    		<td>
	                    			<select class="form-control" name="years" required="" style="width: 100px;">
		                    			<option value="None">None</option>
		                    			<option value="1 year">1 year</option>
		                    			<option value="2 years">2 years</option>
		                    			<option value="3 years">3 years</option>
		                    			<option value="4 years">4 years</option>
		                    			<option value="5 years">5 years</option>
		                    			<option value="More Than 5 Years">More Than 5 Years</option>
	                    			</select></td>
	                    		<td>
	                    			<select class="form-control" name="experience" required="">
		                    			<option value="Beginner">Beginner</option>
		                    			<option value="Intermediate">Intermediate</option>
		                    			<option value="Professional">Professional</option>
	                    			</select></td>
	                    		<td><input type="text" name="medical" class="form-control" required=""></td>
	                    		<td><input type="file" name="fileToUpload" id="fileToUpload" required="" accept=".pdf" class="form-control"></td>
	                    		<td><input type="submit" name="submit" value= "Add" class="btn btn-success btn-sm Add"></td>
	                    	</form>
	                    	</tr>

	                    	<?php 

	                    	if (isset($_POST['submit'])){
								$id=mysqli_real_escape_string($con,$_POST['id']);
								$name=mysqli_real_escape_string($con,$_POST['name']);
								$age=mysqli_real_escape_string($con,$_POST['age']);
								$contact=mysqli_real_escape_string($con,$_POST['contact']);
								$years=mysqli_real_escape_string($con,$_POST['years']);
								$experience=mysqli_real_escape_string($con,$_POST['experience']);
								$medical=mysqli_real_escape_string($con,$_POST['medical']);
								$target = "images/";
								$target = $target . basename( $_FILES['fileToUpload']['name']);
								$Filename=basename( $_FILES['fileToUpload']['name']);
								$now=mysqli_real_escape_string($con,$_POST['now']);
								$set=$setspot_id;





									if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
									    $insertQuery="INSERT INTO hikerlist(register_id,name,age,contact,years,experience,medical,requirements,sets,now) VALUES('$id','$name','$age','$contact','$years','$experience','$medical','$Filename','$set','$now')";
								
										mysqli_query($con, $insertQuery);


										if(($level<=3)&&($years=='None')&&($experience=='Beginner'or'Intermediate'or'Professional')){
											echo '<script type="text/javascript">'; 
											echo 'alert("Qualified To Your Level");'; 
											echo 'window.location.href = "requestForm.php";';
											echo '</script>';
										}


										if(($level<=5)&&($years=='1 year')&&($experience=='Intermediate'or'Professional')){
											echo '<script type="text/javascript">'; 
											echo 'alert("Qualified To Your Level");'; 
											echo 'window.location.href = "requestForm.php";';
											echo '</script>';

										}

										elseif(($level<=6)&&($years=='2 years')&&($experience=='Intermediate'or'Professional')){
											echo '<script type="text/javascript">'; 
											echo 'alert("Qualified To Your Level");'; 
											echo 'window.location.href = "requestForm.php";';
											echo '</script>';
										}

										elseif(($level<=7)&&($years=='3 years')&&($experience=='Intermediate'or'Professional')){
											echo '<script type="text/javascript">'; 
											echo 'alert("Qualified To Your Level");'; 
											echo 'window.location.href = "requestForm.php";';
											echo '</script>';
										}

										elseif(($level<=8)&&($years=='4 years')&&($experience=='Professional')){
											echo '<script type="text/javascript">'; 
											echo 'alert("Qualified To Your Level");'; 
											echo 'window.location.href = "requestForm.php";';
											echo '</script>';
										}

										elseif(($level<=9)&&($years=='5 years')&&($experience=='Professional')){
											echo '<script type="text/javascript">'; 
											echo 'alert("Qualified To Your Level");'; 
											echo 'window.location.href = "requestForm.php";';
											echo '</script>';
										}

										elseif(($level<=10)&&($years=='More Than 5 Years')&&($experience=='Professional')){
											echo '<script type="text/javascript">'; 
											echo 'alert("Qualified To Your Level");'; 
											echo 'window.location.href = "requestForm.php";';
											echo '</script>';
										}

										else{
											echo '<script type="text/javascript">'; 
											echo 'alert("Warning! This Mountain Might Be Out Of Your Level");'; 
											echo 'window.location.href = "requestForm.php";';
											echo '</script>';
										}


								}
							}

							

	                    	?>
	                    
	                    </tbody>
	                </table>
	            </div>

	            <form method="POST" action="requestForm.php">
	            	<div style="font-size: 18px; font-weight: bold;">Would you like to get a tour guide on your trip? <input type="radio" name="guide" value="Yes" required="">Yes &nbsp
	            	<input type="radio" name="guide" value="No" required=""> No</div>

	            	<br><br>
	     
	            	<input type="submit" name="save" class="btn btn-primary" value="Send Request">
	            	<input type="hidden" name="status" value="Being Reviewed">

	            </form>

	            <?php

	            	if (isset($_POST['save'])){
	            		$status=mysqli_real_escape_string($con,$_POST['status']);
	            		$guide=mysqli_real_escape_string($con,$_POST['guide']);
	            		$error=false;

	            		if($total>=1) {

	            			$error=true;

	            			echo '<script type="text/javascript">'; 
							echo 'alert("You still have pending request. Cancel it to be able to register a new request.");'; 
							echo 'window.location.href = "requestForm.php";';
							echo '</script>';
							
							
						}

						if(!$error){

		            		$insert = "UPDATE register SET status='$status', tourguide='$guide' WHERE id='$id'";

		            		mysqli_query($con, $insert);


							echo '<script type="text/javascript">'; 
							echo 'alert("Send Successfully");'; 
							echo 'window.location.href = "requestList.php";';
							echo '</script>';

						}


	            	}

	            ?>
	        </div>
	    </body>
	    </html>

