<?php
	

	function username_exists($username, $con){
		$result = mysqli_query($con, "SELECT id FROM users WHERE username='$username'");

		if(mysqli_num_rows($result)==1){
			return true;
		}

		else{
			return false;
		}


	}

	function adminUsername_exists($username, $con){
		$result = mysqli_query($con, "SELECT id FROM admin WHERE username='$username'");

		if(mysqli_num_rows($result)==1){
			return true;
		}

		else{
			return false;
		}

	}


	function password_exists($password, $con){
		$result = mysqli_query($con, "SELECT id FROM users WHERE password='$password'");

		if(mysqli_num_rows($result)==1){
			return true;
		}

		else{
			return false;
		}


	}


	function logged_in(){
		if (isset($_SESSION['username'])){
			return true;
		}

		else{
			return false;
		}
	}


	

?>