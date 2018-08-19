<?php
	session_start();
	require_once("mysqlconnect.php");
	$header = $_SESSION['previousPage'];

	$serviceType = $_POST['serviceType'];
	$other = $_POST['other'];
	$details = $_POST['details'];
	$dateNeeded = $_POST['dateNeeded'];
	$endDate = $_POST['endDate'];
	$employeeID = 1;
	$UserID = 1;


	if($other == NULL)
	{
		$sql = "INSERT INTO `thesis`.`service` (`serviceType`, `details`, `dateNeed`, `endDate`, `employeeID`, `UserID`, `status`) VALUES ('{$serviceType}', '{$details}', '{$dateNeeded}', '{$endDate}', '{$employeeID}', '{$UserID}', '10');";
	}
	else
	{
		$sql = "INSERT INTO `thesis`.`service` (`serviceType`, `details`, `dateNeed`, `endDate`, `employeeID`, `UserID`, `other`, `status`) VALUES ('{$serviceType}', '{$details}', '{$dateNeeded}', '{$endDate}', '{$employeeID}', '{$UserID}', '{$other}', '10');";
	}

	header('Location: '.$header);

	$result = mysqli_query($dbc, $sql);

	
?>