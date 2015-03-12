<?php
	if(empty($_POST['login'])) {
		echo "false";
	}

	elseif(empty($_POST['password'])) {
		echo "false";
	}
	
	elseif(isset($_POST['login']) && isset($_POST['password'])) {
		
		include("connect_to_database.php");

		$username = $_POST['login'];
		$password = $_POST['password'];
		$queryResults = array();

		$statement = $myDb->prepare("SELECT id FROM Accounts WHERE userName = ? AND password = ?;");
		$statement->bind_param('ss', $username, $password);
		if(!$statement->execute()) {
			echo "false";
		}
		
		$statement->bind_result($id);
		$statement->fetch();
		$queryResults['id'] = $id;
		$statement->close();

		if(empty($queryResults['id'])) {
			echo "false";
			return;
		}
		
		else {
			$statement = $myDb->prepare("SELECT summary, description, notes FROM Accounts WHERE userName = ?;");
			$statement->bind_param('s', $username);
			if(!$statement->execute()) {
				echo "fail";
				return;
			}
			
			$statement->bind_result($summary, $description, $notes);
			while($statement->fetch()) {
				$queryResults['summary'] = $summary;
				$queryResults['description'] = $description;
				$queryResults['notes'] = $notes;
			}
			$statement->close();
			echo json_encode($queryResults);
			return;
		}
		
	}
?>
