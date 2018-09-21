<?php

if (isset($_SESSION['username']) && isset($_SESSION['usertype'])){
	$usertype = $_SESSION['usertype'];

	if($usertype == 'client'){
		header("location:logout.php");
		exit();
	}
}
else{
	header("location:logout.php");
	exit();
}

?>