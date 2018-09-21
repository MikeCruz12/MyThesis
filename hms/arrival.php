<?php 
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';
	date_default_timezone_set("Asia/Hong_Kong");


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

		<h1 style="font-size: 20px;">Pending Arrival</h1>

             <div class="table-responsive">
                <table class="tables" width="100%">
                	
                 	<thead> 
                 		<tr>
	                 		<th style="text-align: center;">Requestor</th>
	                 		<th style="text-align: center;">Mountain</th>
	                 		<th style="text-align: center;">Expected Arrival Date & Time</th>
	                 		<th style="text-align: center;">Status</th>
	                 		<th style="text-align: center;">Action</th>
	                 	</tr>
                    </thead>

                    <tbody align="center">
                    	<?php  

                		$today = date("Y-m-d");

                		$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE register.status='Approved'";
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
								$mountain_address=$row[12];
								$time=date("h i, A",strtotime($row['startTime']));
								$until=date("h i, A",strtotime($row['until']));
								$days=$row['days'];
								$arrival = date('F d, Y', strtotime($date."+" . $days." days"."-1 days"));
								$datenow = date("Y-m-d");

							}
						}

						$query = "SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE register.status='Approved' AND done='done' AND arriveStatus=''";
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
								$datenow = date("Y-m-d");
								$a=date("F d, Y H:i:s",strtotime($arrival.$row['until']));
								$b=date("F d, Y H:i:s");

								?>
								<tr>
									<td><?php echo ucfirst($row['firstname'])." ". ucfirst($row['middlename'])." ". ucfirst($row['lastname']); ?></td>
									<td><?php echo $mountain.', '.$mountain_address; ?></td>
									<td><?php echo $arrival. ', '.$until; ?></td>
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
									<td><a class="btn btn-primary" href="arrivalForm.php?id=<?php echo $id; ?>" style="color: white;">View</a></td>
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