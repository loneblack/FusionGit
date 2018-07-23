<?php
	session_start();
	require_once("mysqlconnect.php");
	
	$floorRoom = $_POST['floorRoom'];
	$buildingID = $_POST['buildingID'];
	$header =  $_SESSION['previousPage'];

	$sql0 = "SELECT floorRoom FROM floorandroom WHERE floorRoom LIKE'{$floorRoom}' AND BuildingID LIKE '{$buildingID}';";
	$result0 = mysqli_query($dbc, $sql0);
	
	if ($result0->num_rows > 0) {
		$message = "Room already exists.";

		$_SESSION['submitMessage'] = $message;
		header('Location: '.$header);
    }
	
	if(!isset($message)){
		$sql = "INSERT INTO `thesis`.`floorandroom` (`BuildingID`, `floorRoom`) VALUES ('{$buildingID}', '{$floorRoom}');";
		$result = mysqli_query($dbc, $sql);

		header('Location: '.$header);
	}
	
?>