<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/admin.php';


	date_default_timezone_set("Asia/Hong_Kong");
	$id = $_GET['id'];
	$spot_id = $_GET['spot_id'];
	$status = $_GET['status'];
	$spot_id = $_GET['spot_id'];
	$hikers = $_GET['hikers'];
	$slot = $_GET['slot'];

	$dateConfirmed=date("Y-m-d");
	if($status == 'approve'){
		$status = 'Approved';

		//decrease available slot
		$available_slot = $slot - $hikers;
		$updateQuery="UPDATE setspot SET slot='$available_slot' WHERE id='$spot_id'";
		mysqli_query($con, $updateQuery);
	}else if($status == 'disapprove'){
		$status = 'Disapproved';
	}

	$query = "UPDATE register SET status='$status', dateConfirmed='$dateConfirmed' WHERE id = $id";
		
	mysqli_query($con, $query);

	header("location:adminRequestList.php");
?>