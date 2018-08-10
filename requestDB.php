<?php
	session_start();
	require_once("mysqlconnect.php");
	
	$Description = $_POST["description"];
	$date = $_POST["date"];
	$building = $_POST["buildingID"];
	$floorandroom = $_POST["FloorAndRoomID"];
	$dateneeded = $_POST["dateneeded"];
	
	$sql = "INSERT INTO `thesis`.`request` (`description`, `date` , `FloorAndRoomID` , `BuildingID` , `dateNeeded`) VALUES ('{$Description}', '{$date}' , '{$building}' , '{$floorandroom}' , '{$dateneeded}');";
		$result = mysqli_query($dbc, $sql);


		$message = "Request successful!";
		$_SESSION['submitMessage'] = $message;
		
		echo $result;

	$result = mysqli_query($dbc, $sql);

	
?>