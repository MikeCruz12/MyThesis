<?php

	session_start();
	
	$con = mysqli_connect("localhost","root","","registration");

	if(mysqli_connect_errno()){

		echo "error connecting database".mysqli_connect_errno();

	}


?>