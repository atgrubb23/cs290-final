<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	if(isset($_POST['username']) && isset($_POST['password'])) {
		include("connect_to_database.php");

		$username = $_POST['username'];
		$password = $_POST['password'];

		$statement = $myDb->prepare("SELECT id FROM Accounts WHERE username = ? AND password = ?;");
		$statement->bind_param('ss', $username, $password);
		if(!$statement->execute()) {
			echo "Failed to execute.";
		}

		$statement->bind_result($id);
		$statement->fetch();
		$userId = $id;
		$statement->close();

		if(empty($userId)) {
			echo "Login failed. Username/password does not exist";
		}

		else {
			echo "Login success!";

			//do stuff
		}
	}
	
?>
