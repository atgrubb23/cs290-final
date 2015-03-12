<?php
	if(isset($_POST['username'])) {
		include('connect_to_database.php');

		$username = $_POST['username'];
		
		if(isset($_POST['summaryContent'])) {	
			$content = $_POST['summaryContent'];
			$statement = $myDb->prepare("UPDATE Accounts SET summary = ? WHERE userName = ?;");
			$statement->bind_param('ss', $content, $username);
			
			if(!$statement->execute()) {
				echo "Fail";
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
		
		elseif(isset($_POST['descriptionContent'])) {
			$content = $_POST['descriptionContent'];
			$statement = $myDb->prepare("UPDATE Accounts SET description = ? WHERE userName = ?;");
			$statement->bind_param('ss', $content, $username);
			
			if(!$statement->execute()) {
				echo "Fail";
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
		
		elseif(isset($_POST['notesContent'])) {
			$content = $_POST['notesContent'];
			$statement = $myDb->prepare("UPDATE Accounts SET notes = ? WHERE userName = ?;");
			$statement->bind_param('ss', $content, $username);
			
			if(!$statement->execute()) {
				echo "Fail";
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
	}

	else {
		echo "Not set.";
	}
?>