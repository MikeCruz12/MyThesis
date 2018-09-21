<?php

if (isset($_SESSION['username']) && isset($_SESSION['usertype'])){
	$usertype = $_SESSION['usertype'];

	if($usertype == 'admin'){
		header("location:logoutAdmin.php");
		exit();
	}
}
else{
	header("location:logoutAdmin.php");
	exit();
}

?>