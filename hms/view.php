<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';
	date_default_timezone_set("Asia/Hong_Kong");

	$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE register.id = " . $_GET['id'];
	$result = mysqli_query($con,$query);

	if($result){
		while($row = mysqli_fetch_array($result)){
			$req=$row['req'];
			$list = $row['list'];
			$fname=$row['firstname'];
			$mname=$row['middlename'];
			$lname=$row['lastname'];
			$mountain=$row['mountain_name'];
			$date=date("F d, Y",strtotime($row['date']));
			$hikers=$row['hikers'];
			$address=$row['address'];
			$gender=$row['gender'];
			$bday=date("F d, Y",strtotime($row['bday']));
			$pic=$row['profilePic'];
			$contact=$row['contact'];
			$email=$row['email'];
			$status = $row['status'];
			$id = $row[0];
			$slot = $row['slot'];
			$spot_id = $row['setspot_id'];
			$mountain_pic=$row['photo'];
			$mountain_address=$row[21];
			$altitude=$row['altitude'];
			$level=$row['level'];
			$requirements=$row['requirements'];
			$time=date("h i, A",strtotime($row['startTime']));
			$until=date("h i, A",strtotime($row['until']));
			$days=$row['days'];
			$specify=$row['specify'];
			$type=$row['type'];
			$years=$row['years'];
			$guide=$row['tourguide'];
			$gname=$row['guide'];



		}
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
		<h1 style="color: #0d9d9e;border-bottom: 1px solid #d8d8d8;margin-top: 20px;">Review Request</h1>
			<div class="table-responsive">
                <table class="table" width="100%" style="padding: 0px;">
                 	<thead>  
                        <tr>
							<th width="100%" colspan="2" style="font-size: 20px; text-align: center;">Requestor Information</th>
						</tr>
                    </thead>

                    <tbody>
                    	<tr>
                    		<td width="30%"><img src="images/<?php echo $pic; ?>" height="200px" width="250px"></td>
                    		<td width="70%" style="font-size: 22px;">
                    			<span class="label label-info">Requestor Name:</span>
                    			<?php echo ucfirst($fname)." ".ucfirst($mname)." ".ucfirst($lname);?><br>
								<span class="label label-info">Address:</span>
								<?php echo $address; ?><br>
								<span class="label label-info">Birthdate:</span>
								<?php echo $bday; ?><br>
								<span class="label label-info">Gender:</span>
								<?php echo $gender; ?><br>
								<span class="label label-info">Contact Number:</span>
								<?php echo $contact; ?><br>
								<span class="label label-info">Email Address:</span>
								<?php echo $email; ?><br>
								<span class="label label-info">Medical Condition:</span>
								<?php echo $specify; ?><br>
								<span class="label label-info">Type:</span>
								<?php echo $type; ?><br>
								<span class="label label-info">Years Hiked:</span>
								<?php echo $years; ?><br>
				            </td>
                    	</tr>

                    	
                    </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table" width="100%" style="padding: 0px;">
                 	<thead>  
                        <tr>
							<th width="100%" colspan="2" style="font-size: 20px; text-align: center;">Mountain Information</th>
						</tr>
                    </thead>

                    <tbody>
                    	<tr>
                    		<td width="30%"><img src="images/<?php echo $mountain_pic; ?>" height="150px" width="250px"></td>
                    		<td width="70%" style="font-size: 22px;">
								<span class="label label-info">Mountain:</span>
								<?php echo $mountain; ?><br>
								<span class="label label-info">Address:</span>
								<?php echo $mountain_address; ?><br>
								<span class="label label-info">Altitude:</span>
								<?php echo $altitude; ?> Meters<br>
								<span class="label label-info">Difficulty:</span>
								Level <?php echo $level; ?><br>
				            </td>
                    	</tr>

                    	
                    </tbody>
                </table>
            </div>

            <div class="table-responsive">  
                    <table class="tables" width="100%" style="padding: 0px;">
                     	<thead>  
                            <tr>
								<th width="100%" colspan="4" style="font-size: 20px; text-align: center;">Schedule Information</th>
							</tr>
	                    </thead>

	                    <tbody align="center">
	                    	<tr style="font-weight: bold;">
	                    		<td>Mountain</td>
	                    		<td>Picked Date</td>
	                    		<td>Day(s) To Stay</td>
	                    		<td>Time</td>
	                    	</tr>

	                    	<tr>
	                    		<td><?php echo $mountain;?></td>
	                    		<td><?php echo $date;?></td>
	                    		<td><?php echo $days;?></td>
	                    		<td><?php echo $time;?> to <?php echo $until;?></td>
	                    	</tr>
	                    </tbody>
	                </table>
	            </div>

            <div class="table-responsive">
                <table class="tables" width="100%" style="padding: 0px;">
                 	<thead>  
                        <tr>
							<th width="100%" colspan="10" style="font-size: 20px; text-align: center;">Hiker List</th>
						</tr>
                    </thead>

                    <tbody align="center">
               			<tr style="font-weight: bold;">
                    		<td>Full Name</td>
                    		<td>Age</td>
                    		<td>Cellphone No.</td>
                    		<td>Years Hiked</td>
                    		<td>Hiker Level</td>
                    		<td>Medical Condition</td>
                    		<td>Requirements<br>( <?php echo $requirements; ?> )</td>
                    		<td>Action</td>
                    		<td>Status</td>
                    		<td>Remarks</td>
                    	</tr>

                    	<?php  
                         	$query = "SELECT * FROM hikerlist WHERE register_id='$id'";

							$response = mysqli_query($con,$query);

							if($response){
								while($row = mysqli_fetch_array($response)){

								$idHiker=$row['id'];
								$name=$row['name'];
								$age=$row['age'];
								$contact=$row['contact'];
								$year=$row['years'];
								$experience=$row['experience'];
								$req=$row['requirements'];
								$status=$row['status'];
								$medical=$row['medical'];
								$remarks=$row['remarks'];

								?>
									<tr>
										<form method="POST">
										<td><?php echo $name; ?></td>
										<td><?php echo $age;?></td>
										<td><?php echo $contact;?></td>
										<td><?php echo $year;?></td>
										<td><?php echo $experience;?></td>
										<td><?php echo $medical;?></td>
										<td><a href="images/<?php echo $req;?>" target="_blank" class="btn btn-primary btn-sm Add"><?php echo $req;?></a></td>
										<td>
											<a href="yes.php?id=<?php echo $idHiker;?>" class="btn btn-success btn-sm Add">Approve</a>&nbsp<a href="no.php?id=<?php echo $idHiker;?>" class="btn btn-danger btn-sm Add">Disapprove</a>
										</td>
										<td><?php echo $status;?></td>
										<td>
											
											<?php

											if($status=='Approved'){
												echo 'Okay to hike';
											}

											else{
												echo '<div style="width: 11em; word-wrap: break-word;">'.$remarks.'</div>';
											}


											?>

										</td>
									</form>
									</tr>

								<?php

							

								}
							}

		
							?>
                    	
                    </tbody>
                </table>
            </div>

            <?php 
            	if($guide=='Yes'){
            		?>
            		<form method="POST">
            		<input type="hidden" name="id" class="inputFields" value="<?php echo $id;?>" required="">
            		Requesting for a tour guide. 
            		<input type="text" name="guide" class="form-control" style="width:250px;" placeholder="Enter Tour Guide Name Here" pattern="[a-zA-Z][a-zA-Z ]{1,}" required>
            		<input type="submit" name="save" value="Enter" class="btn-primary success"  style="width:250px;" >
            		</form>
            		<?php

            		if (isset($_POST['save'])){
								$guidename=mysqli_real_escape_string($con,$_POST['guide']);
								$id=mysqli_real_escape_string($con,$_POST['id']);


										$insertQuery="UPDATE register SET guide='$guidename' WHERE id='$id'";
								
										mysqli_query($con, $insertQuery);

										echo '<script type="text/javascript">'; 
											echo 'alert("Tour guide sucessfully entered");'; 
											echo 'window.history.go(-1);';
											echo '</script>';


										

								}
								echo '<div style="font-size:18px;font-weight:bold;">Tour guide: '.$gname.'</div>';

							
            	}
            	else{
            		echo '<div style="font-size:18px;font-weight:bold;">Do not want a tour guide.</div>';
            	}
             ?>


            <a href="done.php?id=<?php echo $id; ?>" class="btn btn-primary" style="float: right;">Done</a>
	
	</div>

</body>
</html>







