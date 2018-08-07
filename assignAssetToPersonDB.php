<?php
session_start();
require_once("mysqlconnect.php");
$assets = $_POST['assets'];
$person = $_POST['person'];
$UserID = 1;

date_default_timezone_set("Asia/Singapore");
$date = date('Y-m-d');
$dateTime = date('Y-m-d H:i:s');

for($i=0; $i<count($assets); $i++)
{

	$query1="SELECT * FROM `thesis`.`asset` WHERE assetID = {$assets[$i]};";
	$result1=mysqli_query($dbc,$query1);

	while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) // Get asset status and check if assigned or not
	{
		$status = $row['status'];

	}
	
	if($status == 1)//if asset is stocked
	{
		//insert to asset assignment
		$query2 = "INSERT INTO `thesis`.`assetassignment` (`assetID`, `startDate`, `personresponsibleID`, `statusID`) VALUES ('{$assets[$i]}', '{$date}', '{$person}', '11');";
		$result2=mysqli_query($dbc,$query2);

		// get recently inserted asset assignment
		$query3 = "SELECT * FROM thesis.assetassignment ORDER BY AssetAssignmentID DESC LIMIT 1;";
		$result3=mysqli_query($dbc,$query3);

		while ($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)) // get asset assignment ID
		{
			$assignment1 = $row['AssetAssignmentID'];

		}
		//set asset status to assigned
		$query4 = "UPDATE `thesis`.`asset` SET `status`='2' WHERE `assetID`='{$assets[$i]}';";
		$result4=mysqli_query($dbc,$query4);

		//audit for asset assignment
		$query5 = "INSERT INTO `thesis`.`assetaudit` (`status`, `UserID`, `date`, `assetID`, `assetAssignmentID`) VALUES ('2', '{$UserID}', '{$dateTime}', '{$assets[$i]}', '{$assignment1}');";
		$result5=mysqli_query($dbc,$query5);
	}
	else // If asset is already assigned
	{
		// ---------------- Setting Current Assignnment to finished------------------------- //
		// fetch assignment id of current assignment
		$query2 = "SELECT * FROM thesis.assetassignment
					WHERE assetID = {$assets[$i]} AND statusID = 11;";
		$result2=mysqli_query($dbc,$query2);

		while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) // get asset assignment ID
		{
			$assignment2 = $row['AssetAssignmentID'];

		}
		//Set current assignemnt to finished
		$query3 = "UPDATE `thesis`.`assetassignment` SET `statusID`='12' WHERE `AssetAssignmentID`='{$assignment2}';";
		$result3=mysqli_query($dbc,$query3);

		//audit for finished assignment
		$query4 = "INSERT INTO `thesis`.`assetaudit` (`status`, `UserID`, `date`, `assetID`, `assetAssignmentID`) VALUES ('1', '{$UserID}', '{$dateTime}', '{$assets[$i]}', '{$assignment2}');";
		$result4=mysqli_query($dbc,$query4);

		// -------------------- Assigning new Asset ------------------------- //
		//insert to asset assignment
		$query5 = "INSERT INTO `thesis`.`assetassignment` (`assetID`, `startDate`, `personresponsibleID`, `statusID`) VALUES ('{$assets[$i]}', '{$date}', '{$person}', '11');";
		$result5=mysqli_query($dbc,$query5);

		// get recently inserted asset assignment
		$query6 = "SELECT * FROM thesis.assetassignment ORDER BY AssetAssignmentID DESC LIMIT 1;";
		$result6=mysqli_query($dbc,$query6);

		while ($row = mysqli_fetch_array($result6, MYSQLI_ASSOC)) // get asset assignment ID
		{
			$assignment3 = $row['AssetAssignmentID'];

		}
		//audit for asset assignment
		$query7 = "INSERT INTO `thesis`.`assetaudit` (`status`, `UserID`, `date`, `assetID`, `assetAssignmentID`) VALUES ('2', '{$UserID}', '{$dateTime}', '{$assets[$i]}', '{$assignment3}');";
		$result7=mysqli_query($dbc,$query7);
	}
	$_SESSION['submitMessage'] = "Form Submitted";
	
}
?>