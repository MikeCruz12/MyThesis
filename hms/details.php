<?php 
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';
	date_default_timezone_set("Asia/Hong_Kong");

	$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE setspot_id=" . $_GET['id'];
						$result = mysqli_query($con,$query);

						if($result){
							while($row = mysqli_fetch_array($result)){
								$mountain=$row['mountain_name'];
								$mountain_address=$row[21];
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
	<div class="container" style="padding-bottom: 20px;margin-top: 10px;">

		<h1 style="font-size: 20px;">Hiker Group At <?php echo $mountain.', '.$mountain_address; ?></h1>

             <div class="table-responsive">
                <table class="tables" width="100%">
                	
                 	<thead> 
                 		<tr>
                 			<th style="text-align: center;">Group ID</th>
	                 		<th style="text-align: center;">Requestor</th>
	                 		<th style="text-align: center;">Departure To Base</th>
	                 		<th style="text-align: center;">Schedule Time</th>
	                 		<th style="text-align: center;">Expected Arrival Date</th>
	                 		<th style="text-align: center;">Status</th>
	                 		<th style="text-align: center;">Action</th>
	                 	</tr>
                    </thead>

                    <tbody align="center">
                    	<?php  

                		$today = date("Y-m-d");

                		$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE done='done' AND arriveStatus='' AND setspot_id=" . $_GET['id'];
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
								$id = $row[0];
								$spot_id = $row['setspot_id'];
								$mountain_address=$row[17];
								$time=date("h i, A",strtotime($row['startTime']));
								$until=date("h i, A",strtotime($row['until']));
								$days=$row['days'];
								$arrival = date('F d, Y', strtotime($date."+" . $days." days"."-1 days"));
								$datenow = date("F d, Y");
								$gdt=date("h i, A",strtotime($row['groupTime']));
								$gdd=date("F d, Y",strtotime($row['groupDate']));
								$a=date("F d, Y H:i:s",strtotime($arrival.$row['until']));
								$b=date("F d, Y H:i:s");

								?>
								<tr>
									<td><?php echo $id; ?></td>
									<td><?php echo ucfirst($row['firstname'])." ". ucfirst($row['middlename'])." ". ucfirst($row['lastname']); ?></td>
									<td><?php echo $gdd.' / '.$gdt; ?></td>
									<td><?php echo 'From '.$time.' To '.$until; ?></td>
									<td><?php echo $arrival; ?></td>
									<td>
										<?php
											if($b > $a){
												echo 'late';
											}
											else{
												echo 'on going';
											}
										?>
										
									</td>
									<td><a class="btn btn-primary" href="detailsForm.php?id=<?php echo $id; ?>" style="color: white;">View</a></td>
								</tr>

								<?php

							}
						}
                	?>

                    	
                    </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <table class="tables" width="100%" style="padding: 0px;">
                 	<thead>  
                        <tr>
							<th width="100%" colspan="8" style="font-size: 20px; text-align: center;">List Of All Present Hiker</th>
						</tr>
                    </thead>

                    <tbody align="center">
               			<tr style="font-weight: bold;">
                    		<td style="font-size: 20px;">Group ID</td>
                    		<td style="font-size: 20px;">Name</td>
                    		<td style="font-size: 20px;">Age</td>
                    		<td style="font-size: 20px;">Contact</td>
                    		<td style="font-size: 20px;">Years Hiked</td>
                    		<td style="font-size: 20px;">Hiker Level</td>
                    		<td style="font-size: 20px;">Came To Base For Attendance</td>
                    	</tr>

                    	<?php  
                         	$query = "SELECT * FROM hikerlist WHERE attendance='Present' AND finish='' AND hikerArrive='' AND sets=" . $_GET['id'];

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
								$status=$row['attendance'];
								$dt=date("h i, A",strtotime($row['departureTime']));
								$dd=date("F d, Y",strtotime($row['departureDate']));



								?>
									<tr>
										<form method="POST">
										<td style="font-size: 20px;"><?php echo $id;?></td>
										<td style="font-size: 20px;"><?php echo $name; ?></td>
										<td style="font-size: 20px;"><?php echo $age;?></td>
										<td style="font-size: 20px;"><?php echo $contact;?></td>
										<td style="font-size: 20px;"><?php echo $year;?></td>
										<td style="font-size: 20px;"><?php echo $experience;?></td>
										<td style="font-size: 20px;"><?php echo $dd.' / '.$dt;?></td>
									</form>
									</tr>

								<?php

							

								}
							}

		
							?>
                    	
                    </tbody>
                </table>
            </div>

			
	</div>

</body>
</html>