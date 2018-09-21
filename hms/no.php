<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	$query = "SELECT * FROM hikerlist WHERE id = " . $_GET['id'];
	$result = mysqli_query($con,$query);

	if($result){
		while($row = mysqli_fetch_array($result)){
			$id = $row['id'];

		}
	}

	if (isset($_POST['submit'])){
		$id=mysqli_real_escape_string($con,$_POST['id']);
		$remarks=mysqli_real_escape_string($con,$_POST['remarks']);

		$update = "UPDATE hikerlist SET status='Disapproved', remarks='$remarks' WHERE id='$id'";

		mysqli_query($con, $update);

		echo "<script language=javascript>window.history.go(-2);</script>";
	


	}

?>

      <head>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  

      </head>  

<div class="container">
<div id="delForm">
		<form method="POST">
			
			<p style="font-size: 18px;">Disapproved?</p><input type="hidden" name="id" class="inputFields" value="<?php echo $id;?>" required="">
			<div class="form-group">
			  <label for="sel1">Select Remarks:</label>
			  <select class="form-control" id="sel1" name="remarks">
			    <option value="Poor Health Condition">Poor Health Condition</option>
			    <option value="Bad Weather">Bad Weather</option>
			    <option value="Problem In Requirements">Problem In Requirements</option>
			    
			  </select>
			</div>
			<input type="submit" name="submit" value="Yes" class="teal-buttons">
			<input class="teal-buttons" action="action" onclick="window.history.go(-1); return false;" type="button" value="cancel" />
			
		</form>

	</div>
	</div>