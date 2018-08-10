<?php
	session_start();
	require_once("mysqlconnect.php");

	$userID = '1';

	$summary = $_POST['summary'];
	$description = $_POST['description'];
	$due_date = $_POST['due_date'];
	$duetime = $_POST['duetime'];
	$priority = $_POST['priority'];
	$testingID = $_POST['testingID'];
	$assigned_to = $_POST['assigned_to'];

	$duetime  = $duetime.":00";

	date_default_timezone_set("Asia/Singapore");
	$date = date('Y-m-d H:i:s');

	$ticketID;
	$assetArray = array();

	// ------------- Insertion to Ticket --------------------------//
	# Insert to ticket table
	if($assigned_to == 0)//if there is no assigned person
	{
		$query = "INSERT INTO `thesis`.`ticket` (`status`, `creatorUserID`, `lastUpdateDate`, `dateCreated`, `dueDate`, `priority`, `summary`, `description`, `testingID`) VALUES ('1', '{$userID}', '{$date}', '{$date}', '{$due_date} {$duetime}', '{$priority}', '{$summary}', '{$description}', '{$testingID}');";

		if (!mysqli_query($dbc,$query))
		  {
		  echo("Error description: " . mysqli_error($dbc));
		  }
	}
	else//there is an assigned person
	{
		$query = "INSERT INTO `thesis`.`ticket` (`status`, `assigneeUserID`, `creatorUserID`, `lastUpdateDate`, `dateCreated`, `dueDate`, `priority`, `summary`, `description`, `testingID`) VALUES ('2', '{$assigned_to}', '{$userID}', '{$date}', '{$date}', '{$due_date} {$duetime}', '{$priority}', '{$summary}', '{$description}', '{$testingID}');";

		if (!mysqli_query($dbc,$query))
		  {
		  echo("Error description: " . mysqli_error($dbc));
		  }
	}
	
	// ------------- Insertion to Ticketed Asset --------------------------//

	# get the recently inserted ticket id from the code above 
	$query1 = "SELECT * FROM `thesis`.`ticket` ORDER BY ticketID DESC LIMIT 1;";
	$result1 = mysqli_query($dbc, $query1);

	while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
		$ticketID = $row['ticketID'];
	}

	#store the asset ID from the asset testing details to an array
	$query2 = "SELECT * FROM `thesis`.`assettesting_details` WHERE assettesting_testingID = '{$testingID}';";
	$result2 = mysqli_query($dbc, $query2);

	while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
		array_push($assetArray, $row['asset_assetID']);
	}

	#insert the ids to ticketed asset
	for ($i=0; $i <count($assetArray) ; $i++) { 
		$query3 = "INSERT INTO `thesis`.`ticketedasset` (`ticketID`, `assetID`) VALUES ('{$testingID}', '{$assetArray[$i]}');";
		$result3 = mysqli_query($dbc, $query3);

		//Change asset status to pending
		$query4 = "UPDATE `thesis`.`asset` SET `status`='10' WHERE `assetID`='{$assetArray[$i]}';";
		$result4 = mysqli_query($dbc, $query4);

		//Insert to Audit table
		$query5 = "INSERT INTO `thesis`.`assetaudit` (`status`, `UserID`, `date`, `assetID`, `ticketID`) VALUES ('10', '{$userID}', '{$date}', '{$assetArray[$i]}', '$ticketID');";
		$result5 = mysqli_query($dbc, $query5);
	}

	$query6 = "UPDATE `thesis`.`assettesting` SET `statusID`='13' WHERE `testingID`='{$testingID}';";
	$result6 = mysqli_query($dbc, $query6);
?>