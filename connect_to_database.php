<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include('userInfo.php');
	$myDb = new mysqli($myHost, $myUsername, $myPassword, $myDatabase);

	if(!$myDb || $myDb->connect_errno) {
		echo "Connection to " . $myHost . " failed. Error Number: " . $myDb->connect_errno . ". Error Message: " . $myDb->connect_error;
	}
	
	else {
		echo "Connection to database established.";
	}
?>