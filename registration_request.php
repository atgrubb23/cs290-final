<?php
	if(empty($_POST['username'])) {
		echo "false";
		return;
	}

	elseif(empty($_POST['password'])) {
		echo "false";
		return;
	}

	elseif(isset($_POST['username']) && isset($_POST['password'])) {
		include('connect_to_database.php');

		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$statement = $myDb->prepare("INSERT INTO Accounts (userName, password, email) VALUES (?, ?, ?);");
		$statement->bind_param('sss', $username, $password, $email);
		if(!$statement->execute()) {
			echo "false";
		}
		else {
			echo "true";
		}
		$statement->close();
	}
?>