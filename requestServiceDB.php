<?php
	require_once("mysqlconnect.php");
	
	$serviceType = $_POST['serviceType'];
	$other = $_POST['other'];
	$details = $_POST['details'];
	$dateNeeded = $_POST['dateNeeded'];
	$endDate = $_POST['endDate'];
	
	$sql = "INSERT INTO `thesis`.`service` (`serviceType`, `details`, `dateNeed`, `endDate`, `RequestorID`, `UserID`) VALUES ('{$serviceType}', '{$details}', '{$dateNeeded}', '{$endDate}', '1', '1');";

	echo $sql;

	//$result = mysqli_query($dbc, $sql);

	
?>