<?php
session_start();
require_once("mysqlconnect.php");
$userID = '1';
$assets = $_POST['assets'];
$FloorAndRoomID = $_POST['FloorAndRoomID'];
$building = $_POST['building'];
$officeID = $_POST['officeID'];
$remarks = $_POST['remarks'];
$rpsmsrf = $_POST['rpsmsrf'];
date_default_timezone_set("Asia/Singapore");
$date = date('Y-m-d H:i:s');
$testingID;
//Insert to asset testing
$query1="INSERT INTO `thesis`.`assettesting` (`statusID`, `PersonRequestedID`, `FloorAndRoomID`, `officeID`, `remarks`, `rpsmsrf`)
									VALUES ('15', '{$userID}', '{$FloorAndRoomID}', '{$officeID}', '{$remarks}', '{$rpsmsrf}');";
$_SESSION['submitMessage'] = $query1;
$result1=mysqli_query($dbc,$query1);
//get testing id inserted from above code
$query2 = "SELECT * FROM `thesis`.`assettesting` ORDER BY testingID DESC LIMIT 1;";
$result2 = mysqli_query($dbc, $query2);
	while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC))
	{
		$testingID = $row['testingID'];
	}
for($i = 0; $i<count($assets);$i++)
	{
		//insert assets to asset testing details
		$query3 = "INSERT INTO `thesis`.`assettesting_details` (`assettesting_testingID`, `asset_assetID`) VALUES ('{$testingID}', '{$assets[$i]}');";
		$result3 = mysqli_query($dbc, $query3);
		//Change asset status to for testing
		$query4 = "UPDATE `thesis`.`asset` SET `status`='15' WHERE `assetID`='{$assets[$i]}';";
		$result4 = mysqli_query($dbc, $query4);
		//Insert to Audit table
		$query5 = "INSERT INTO `thesis`.`assetaudit` (`status`, `UserID`, `date`, `assetID`) VALUES ('15', '{$userID}', '{$date}', '{$assets[$i]}');";
		$result5 = mysqli_query($dbc, $query5);
	}
$_SESSION['submitMessage']  = "Form Submitted";
?>