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
			$arrival = date('F d, Y', strtotime($date."+" . $days." days"."-1 days"));
			$datenow = date("Y-m-d");
			$arrivedate = date("F d, Y",strtotime($row['arrive']));
			$arrivetime = date("h i, A",strtotime($row['arriveTime']));
			$gdt=date("h i, A",strtotime($row['groupTime']));
			$gdd=date("F d, Y",strtotime($row['groupDate']));

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
	<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>
	<div class="container"  id="print" style="padding-bottom: 20px;margin-top: 10px;">

		<h2 align="center" style="font-size: 50px;"><img src="images/logo.png" width="100" height="60"> HikeNaKo Co.</h2>

		<h1 align="center">Approval Form #<?php echo $id; ?> Report</h1>

		<div class="table-responsive">
                <table class="tables" width="100%" style="padding: 0px;">
                 	<thead>  
                        <tr>
							<th width="100%" colspan="2" style="font-size: 20px; text-align: center;">Requestor</th>
						</tr>
                    </thead>

                    <tbody>
                    	<tr>
                    		<td style="font-size: 20px;">
                    			<span style="font-weight: bold;">Requestor</span>
                    			<?php echo ucfirst($fname)." ".ucfirst($mname)." ".ucfirst($lname);?><br>
								<span style="font-weight: bold;">Address:</span>
								<?php echo $address; ?><br>
								<span style="font-weight: bold;">Gender:</span>
								<?php echo $gender; ?><br>
                    		</td>

                    		<td style="font-size: 20px;">
								<span style="font-weight: bold;">Medical Condition:</span>
								<?php echo $specify; ?><br>
								<span style="font-weight: bold;">Type:</span>
								<?php echo $type; ?><br>
								<span style="font-weight: bold;">Years Hiked:</span>
								<?php echo $years; ?><br>
				            </td>
                    	</tr>
                    </tbody>

                    <thead>  
                        <tr>
							<th width="100%" colspan="2" style="font-size: 20px; text-align: center;">Mountain</th>
						</tr>
                    </thead>

                    <tbody>
                    	<tr>
                    		<td style="font-size: 20px;">
                    			<span style="font-weight: bold;">Mountain: </span>
                    			<?php echo ucfirst($mountain);?><br>
								<span style="font-weight: bold;">Address: </span>
								<?php echo $mountain_address; ?><br>
                    		</td>

                    		<td style="font-size: 20px;">
								<span style="font-weight: bold;">Altitude:</span>
								<?php echo $altitude; ?> Meters<br>
								<span style="font-weight: bold;">Difficulty:</span>
								Level <?php echo $level; ?><br>
				            </td>
                    	</tr>
                    </tbody>

                     <thead>  
                        <tr>
							<th width="100%" colspan="2" style="font-size: 20px; text-align: center;">Schedule</th>
						</tr>
                    </thead>

                    <tbody>
                    	<tr>
                    		<td style="font-size: 20px;">
                    			<span style="font-weight: bold;">Date: </span>
                    			<?php echo $date;?><br>
								<span style="font-weight: bold;">Days: </span>
								<?php echo $days; ?><br>

                    		</td>

                    		<td style="font-size: 20px;">
								<span style="font-weight: bold;"><center>Time</center></span>
								<center>From <?php echo $time; ?> to <?php echo $until; ?></center>
				            </td>
                    	</tr>

                    	<tr>
                    		<td style="font-size: 20px; text-align: center;" colspan="2" >
                    			<span style="font-weight: bold;">Departure: </span>
                    			<?php echo $date.' / '.$time;?><br>
                    			<span style="font-weight: bold;">Arrival: </span>
                    			<?php echo $arrival.' / '.$until;?><br>
                    		</td>
                    	</tr>
                    </tbody>



                </table>
            </div>

             <div class="table-responsive">
                <table class="tables" width="100%" style="padding: 0px;">
                 	<thead>  
                        <tr>
							<th width="100%" colspan="8" style="font-size: 20px; text-align: center;">Present Hiker(s)</th>
						</tr>
                    </thead>

                    <tbody align="center">
               			<tr style="font-weight: bold;">
                    		<td style="font-size: 20px;">Full Name</td>
                    		<td style="font-size: 20px;">Age</td>
                    		<td style="font-size: 20px;">Years Hiked</td>
                    		<td style="font-size: 20px;">Hiker Level</td>
                    		<td style="font-size: 20px;">Came To Base For Attendance</td>
                    		<td style="font-size: 20px;">Arrived To Base</td>
                    	</tr>

                    	<?php  
                         	$query = "SELECT * FROM hikerlist WHERE attendance='Present' AND register_id='$id'";

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
								$at=date("h i, A",strtotime($row['arriveTime']));
								$ad=date("F d, Y",strtotime($row['arriveDate']));

								?>
									<tr>
										<form method="POST">
										<td style="font-size: 20px;"><?php echo $name; ?></td>
										<td style="font-size: 20px;"><?php echo $age;?></td>
										<td style="font-size: 20px;"><?php echo $year;?></td>
										<td style="font-size: 20px;"><?php echo $experience;?></td>
										<td style="font-size: 20px;"><?php echo $dd.' / '. $dt;?></td>
										<td style="font-size: 20px;"><?php echo $ad.' / '. $at;?></td>
									</form>
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
							<th width="100%" colspan="8" style="font-size: 20px; text-align: center;">Absent Hiker(s)</th>
						</tr>
                    </thead>

                    <tbody align="center">
               			<tr style="font-weight: bold;">
                    		<td style="font-size: 20px;">Full Name</td>
                    		<td style="font-size: 20px;">Age</td>
                    		<td style="font-size: 20px;">Years Hiked</td>
                    		<td style="font-size: 20px;">Hiker Level</td>
                    	</tr>

                    	<?php  
                         	$query = "SELECT * FROM hikerlist WHERE attendance='Absent' AND register_id='$id'";

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



								?>
									<tr>
										<form method="POST">
										<td style="font-size: 20px;"><?php echo $name; ?></td>
										<td style="font-size: 20px;"><?php echo $age;?></td>
										<td style="font-size: 20px;"><?php echo $year;?></td>
										<td style="font-size: 20px;"><?php echo $experience;?></td>
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
            		
								echo '<hr><div style="font-size:18px;font-weight:bold;">Tour guide: '.$gname.'</div>';

							
            	}
            	else{
            		echo '<div style="font-size:18px;font-weight:bold;">Tour guide: None</div>';
            	}
             ?>

             <?php
				$select = "SELECT *,COUNT(attendance) as total FROM hikerlist WHERE attendance='Present' AND register_id='$id'";

				$response = mysqli_query($con,$select);

							if($response){
								while($row = mysqli_fetch_array($response)){

								$total=$row['total'];

							

								}
							}

			?>
			
			<div style="text-align:left;font-weight: bold;font-size: 20px; ">Total person hiked: <?php echo $total; ?></div>
			<div style="text-align: center;font-weight: bold;font-size: 20px; ">Group Departure To Base: <?php echo $gdd.', '. $gdt; ?></div>
			<div style="text-align: center;font-weight: bold;font-size: 20px; ">Group Arrived To Base: <?php echo $arrivedate.', '. $arrivetime; ?></div>

			


        
	
	</div>

	
            <div class="container" style="padding-bottom: 10px;" align="center" >
		        <br>
		        <p><button class="btn btn-primary" onclick="printContent('print')">Print Reports</button></p>
		      </div>

</body>
</html>







