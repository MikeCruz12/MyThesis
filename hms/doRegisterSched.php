<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginChecker/client.php';
	date_default_timezone_set("Asia/Hong_Kong");

	$query = "SELECT *,COUNT(status) as total FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE register.status='Being Reviewed' AND username = '".$_SESSION['username']."'";

		if($result = $con->query($query)){
    		while($row = $result->fetch_assoc()){
    			$total=$row['total'];		
   			}
    	$result->free();
		}

	$id = $_POST['id'];
	$slot = $_POST['slot'];
	$dateNow=date("Y-m-d h:i:sa");
	$user_id = $_SESSION['id'];
	$date = $_POST['date'];
	$days = $_POST['days'];
	$hikers = $_POST['hikers'];
	$target = "images/";
	$target = $target . basename( $_FILES['fileToUpload']['name']);
	$Filename=basename( $_FILES['fileToUpload']['name']);
	$tar = "images/";
	$tar = $tar . basename( $_FILES['list']['name']);
	$File=basename( $_FILES['list']['name']);
	$status = 'Being Reviewed'; //default

	if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)&&move_uploaded_file($_FILES['list']['tmp_name'], $tar)){
		//decrease available slot
		// $available_slot = $slot - $hikers;
		// $updateQuery="UPDATE setspot SET slot='$available_slot' WHERE id='$id'";
		// mysqli_query($con, $updateQuery);

		$query = "INSERT INTO register(setspot_id, datenow, user_id, date, days, hikers,req, list, status) VALUES('$id','$dateNow', '$user_id', '$date', '$days', '$hikers','$Filename', '$File', '$status')";

		mysqli_query($con, $query);

		header("location:registerSched.php?success=1&id=" . $id);
	}

	if($total==2) {
		echo "asdasdasdasd";
	}

	

	



?>