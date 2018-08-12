<?php
	session_start();
	require_once("mysqlconnect.php");
	
	$department = $_POST['department'];
	$name = $_POST['name'];
	$position = $_POST['position'];
	$contactNumber = $_POST['contactNumber'];
	$email = $_POST['email'];

	$sql0 = "SELECT name FROM employee WHERE name LIKE'{$name}' OR email LIKE '{$email}'";
	$result0 = mysqli_query($dbc, $sql0);
	
	if ($result0->num_rows > 0 ) {
		$message = "Employee already exists. ";
		echo $message;
    }

	if ($department=='') {
		$message = "please select a deprtment";
		echo $message;
    }

	if(!isset($message)){
		$sql = "INSERT INTO `thesis`.`employee` (`DepartmentID`, `name`, `position`, `contactNo`, `email`)
				VALUES ('{$department}', '{$name}', '{$position}', '{$contactNumber}', '{email}');";
				echo $sql;
		$result = mysqli_query($dbc, $sql);
		//$header =  $_SESSION['previousPage'];
		//header('Location: '.$header);
	}
	
	echo $sql;
	
?>