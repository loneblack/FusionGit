<?php
	session_start();
	require_once("mysqlconnect.php");
	
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$buildingID = $_POST['buildingID'];
	$FloorAndRoomID = $_POST['FloorAndRoomID'];
	$DepartmentID = $_POST['DepartmentID'];
	
	$sql =" INSERT INTO `thesis`.`departmentownsroom` (`startDate`, `endDate`, `BuildingID`, `FloorAndRoomID`, `DepartmentID`)
			VALUES ('{$startDate}', '{$endDate}', '{$buildingID}', '{$FloorAndRoomID}', '{$DepartmentID}');";
	$result = mysqli_query($dbc, $sql);
	$header =  $_SESSION['previousPage'];
	$_SESSION['submitMessage'] = "form submitted";
	header('Location: '.$header);
	
?>