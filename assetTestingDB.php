<?php
	session_start();
	$userID = '1';
	//$userID = $_SESSION['userID'];
	require_once("mysqlconnect.php");
	
	$assets = $_POST['assets'];
	$FloorAndRoomID = $_POST['FloorAndRoomID'];
	$building = $_POST['building'];
	$officeID = 
	$_POST['officeID'];
	$testingID;
	$message = "Success ";
	
	$sql1 = "INSERT INTO `thesis`.`assettesting` (`statusID`, `PersonRequestedID`, `FloorAndRoomID`, `officeID`) VALUES ('10', '{$userID}', '{$FloorAndRoomID}', '{$officeID}');";
	echo $sql1;
	$result1 = mysqli_query($dbc, $sql1);
/*
	$sql2 = "SELECT * FROM `thesis`.`assettesting` ORDER BY testingID DESC LIMIT 1;";
	$result2 = mysqli_query($dbc, $sql2);
	while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC))
	{
		$testingID = $row['testingID'];

	}								
									
	echo $sql1;					
	echo $sql2;
	for($i = 0; $i<count($assets);$i++)
	{
		$sql3 = "INSERT INTO `thesis`.`assettesting_details` (`assettesting_testingID`, `asset_assetID`) VALUES ('{$testingID}', '{$assets[$i]}');";
		$result3 = mysqli_query($dbc, $sql3);

		$sql4 = "UPDATE `thesis`.`asset` SET `status`='9' WHERE `assetID`='{$assets[$i]}';";
		$result4 = mysqli_query($dbc, $sql4);
	}
	$_SESSION['submitMessage']  = $message;*/
?>