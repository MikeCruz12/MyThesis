<?php
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';

	?>
	<div id="locDiv">
		<a href="approvedReports.php">Show Approved Schedules</a><br><br>
		<a href="disapprovedReports.php">Show DIsapproved Schedules</a><br><br>
		<a href="mountainReports.php">Show Mountain Reports</a>
	</div>