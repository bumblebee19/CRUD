<?php

//action.php

include('database_connection.php');

if (isset($_POST["action"])) {
	if ($_POST["action"] == "insert") {
		$query = "
		INSERT INTO tbl_sample (first_name, last_name, status, role) VALUES ('" . $_POST["first_name"] . "', '" . $_POST["last_name"] . "', '" . $_POST["status"] . "', '" . $_POST["role"] . "')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
	}
	if ($_POST["action"] == "fetch_single") {
		$query = "
		SELECT * FROM tbl_sample WHERE id = '" . $_POST["id"] . "'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$output['first_name'] = $row['first_name'];
			$output['last_name'] = $row['last_name'];
			$output['status'] = $row['status'];
			$output['role'] = $row['role'];
		}
		echo json_encode($output);
	}
	if ($_POST["action"] == "update") {
		$query = "
		UPDATE tbl_sample 
		SET first_name = '" . $_POST["first_name"] . "', 
		last_name = '" . $_POST["last_name"] . "',
		status = '" . $_POST['status'] . "', 
		role = '" . $_POST["role"] . "'  
		WHERE id = '" . $_POST["hidden_id"] . "'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
	}

	if ($_POST["action"] == "change_status") {
		$query = "
		UPDATE tbl_sample SET status = " . $_POST['status'] . " 
		WHERE id = " . $_POST["id"];
		$statement = $connect->prepare($query);
		$statement->execute();
	}

	if ($_POST["action"] == "delete") {
		$query = "DELETE FROM tbl_sample WHERE id = '" . $_POST["id"] . "'";
		$statement = $connect->prepare($query);
		$statement->execute();
	}
}
