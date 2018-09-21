<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/clientMenu.php';
	include 'loginChecker/client.php';
	date_default_timezone_set("Asia/Hong_Kong");

	$query = "SELECT * FROM setspot WHERE `id` = " . $_GET['id'];
	$response = mysqli_query($con,$query);

	if($response){
		while($row = mysqli_fetch_array($response)){
			$name=$row['mountain_name'];
			$address=$row['address'];
			$slot=$row['slot'];

		}

	}

	if (isset($_POST['submit'])){
		$id = $_POST['id'];
		$dateNow=date("Y-m-d h:i:sa");
		$user_id = $_SESSION['id'];
		$date = $_POST['date'];
		$days = $_POST['days'];
		$time = $_POST['time'];
		$until = $_POST['until'];
		

			$query = "INSERT INTO register(setspot_id, datenow, user_id, date,days,startTime,until) VALUES('$id','$dateNow', '$user_id', '$date','$days','$time','$until')";

			mysqli_query($con, $query);

			header("location:registerSched.php?success=1&id=" . $id);
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
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-6">
		<div id="locInfo">
		<h1><b>Register to <?php echo $name; ?><br>
		<?php echo $address; ?></b><br></h1>

		<?php
			if(isset($_GET['success'])){
				echo '<script type="text/javascript">'; 
				echo 'alert("You Registerd Successfully");'; 
				echo 'window.location.href = "requestForm.php";';
				echo '</script>';
			}
		?>
		<form method="POST" action="registerSched.php" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			<input type="hidden" name="slot" value="<?php echo $slot; ?>">
			<br>

	
				<label><b>On what date you would like to hike?</b></label> <input type="date" name="date" class="form-control" min="<?php echo date('Y-m-d', strtotime("+1 days")); ?>" required="">



				<label><b>How many day(s)?</b></label> <input type="number" name="days" class="form-control" max="7" min="1" required="">

				<div class="form-group">
				  <label for="sel1">Start Time?</label>
				  <select class="form-control" id="sel1" name="time" required="">
				  	<option value=""></option>
				  	<option value="00:00:00">12:00 AM</option>
				    <option value="01:00:00">1:00 AM</option>
				    <option value="02:00:00">2:00 AM</option>
				    <option value="03:00:00">3:00 AM</option>
				    <option value="04:00:00">4:00 AM</option>
				    <option value="05:00:00">5:00 AM</option>
				    <option value="06:00:00">6:00 AM</option>
				    <option value="07:00:00">7:00 AM</option>
				    <option value="08:00:00">8:00 AM</option>
				    <option value="09:00:00">9:00 AM</option>
				    <option value="10:00:00">10:00 AM</option>
				    <option value="11:00:00">11:00 AM</option>
				    <option value="12:00:00">12:00 PM</option>
				    <option value="13:00:00">1:00 PM</option>
				    <option value="14:00:00">2:00 PM</option>
				    <option value="15:00:00">3:00 PM</option>
				    <option value="16:00:00">4:00 PM</option>
				    <option value="17:00:00">5:00 PM</option>
				    <option value="18:00:00">6:00 PM</option>
				    <option value="19:00:00">7:00 PM</option>
				    <option value="20:00:00">8:00 PM</option>
				    <option value="21:00:00">9:00 PM</option>
				    <option value="22:00:00">10:00 PM</option>
				    <option value="23:00:00">11:00 PM</option>
				    
				    
				  </select>
				</div>
				<div class="form-group">
				  <label for="sel1">Until What Time?</label>
				  <select class="form-control" id="sel1" name="until" required="">
				  	<option value=""></option>
				  	<option value="00:00:00">12:00 AM</option>
				    <option value="01:00:00">1:00 AM</option>
				    <option value="02:00:00">2:00 AM</option>
				    <option value="03:00:00">3:00 AM</option>
				    <option value="04:00:00">4:00 AM</option>
				    <option value="05:00:00">5:00 AM</option>
				    <option value="06:00:00">6:00 AM</option>
				    <option value="07:00:00">7:00 AM</option>
				    <option value="08:00:00">8:00 AM</option>
				    <option value="09:00:00">9:00 AM</option>
				    <option value="10:00:00">10:00 AM</option>
				    <option value="11:00:00">11:00 AM</option>
				    <option value="12:00:00">12:00 PM</option>
				    <option value="13:00:00">1:00 PM</option>
				    <option value="14:00:00">2:00 PM</option>
				    <option value="15:00:00">3:00 PM</option>
				    <option value="16:00:00">4:00 PM</option>
				    <option value="17:00:00">5:00 PM</option>
				    <option value="18:00:00">6:00 PM</option>
				    <option value="19:00:00">7:00 PM</option>
				    <option value="20:00:00">8:00 PM</option>
				    <option value="21:00:00">9:00 PM</option>
				    <option value="22:00:00">10:00 PM</option>
				    <option value="23:00:00">11:00 PM</option>
				    
				    
				  </select>
				</div>
<br>

			<input type="submit" name="submit" value="Request" class="teal-buttons">
			</div>

		</form>
	</div>
	</div>
</div>
</div>


</body>
</html>