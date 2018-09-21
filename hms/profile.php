<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/clientMenu.php';
	include 'loginchecker/client.php';

	?>
	
	



	<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" type="text/css" href="css/styles.css?ver=<?php echo strtotime("now"); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
</head>
<body >

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div id="profilecontent">
	

	<?php 

	$query = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
		if($result = $con->query($query)){
			echo '
		<h1>
			My Profile
		</h1>';

    		while($row = $result->fetch_assoc()){
    			$_SESSION['id'];
    			$pic=$row['profilePic'];
    			?><div id="pic" style="float: left; padding: 10px;"><img src="images/<?php echo $pic; ?>" height="250px" width="350px"></div><br><a class="btn btn-info" href="editProfile.php?id=<?php echo $_SESSION['id']; ?>">Edit Profile</a>&nbsp<a href="changepassword.php" class="btn btn-warning">Change Password</a><br><?php

    			echo "<b>Name: </b>". ucfirst($row['firstname'])." ". ucfirst($row['middlename'])." ". ucfirst($row['lastname']);
        		echo "<br /><b>Gender:</b> ".$row['gender']; 
       		 	echo "<br /><b>Birthday:</b> ".date("F d, Y",strtotime($row['bday']));
       		 	echo "<br /><b>Mobile Number:</b> ".$row['contact'];
       		 	echo "<br /><b>Address:</b> ".$row['address'];
       		 	echo "<br /><b>Email:</b> ".$row['email'];
   			}
    	$result->free();
		}
		else
		{
    		echo "No results found";
		}
	?>


		</div>
		
		
	</div>
		</div>
	</div>
</div>

	

</body>
</html>
