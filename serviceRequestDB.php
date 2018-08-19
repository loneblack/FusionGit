<?php
	session_start();
	require_once("mysqlconnect.php");

	$userID = '1';

	$summary = $_POST['summary'];
	$description = $_POST['description'];
	$due_date = $_POST['due_date'];
	$duetime = $_POST['duetime'];
	$priority = $_POST['priority'];
	$assigned_to = $_POST['assigned_to'];

	$duetime  = $duetime.":00";

	date_default_timezone_set("Asia/Singapore");
	$date = date('Y-m-d H:i:s');


	// ------------- Insertion to Ticket --------------------------//
	# Insert to ticket table
	if($assigned_to == 0)//if there is no assigned person
	{
		$query = "INSERT INTO `thesis`.`ticket` (`status`, `creatorUserID`, `lastUpdateDate`, `dateCreated`, `dueDate`, `priority`, `summary`, `description`) VALUES ('1', '{$userID}', '{$date}', '{$date}', '{$due_date} {$duetime}', '{$priority}', '{$summary}', '{$description}');";

		if (!mysqli_query($dbc,$query))
		  {
		  echo("Error description: " . mysqli_error($dbc));
		  }
	}
	else//there is an assigned person
	{
		$query = "INSERT INTO `thesis`.`ticket` (`status`, `assigneeUserID`, `creatorUserID`, `lastUpdateDate`, `dateCreated`, `dueDate`, `priority`, `summary`, `description`) VALUES ('2', '{$assigned_to}', '{$userID}', '{$date}', '{$date}', '{$due_date} {$duetime}', '{$priority}', '{$summary}', '{$description}');";

		if (!mysqli_query($dbc,$query))
		  {
		  echo("Error description: " . mysqli_error($dbc));
		  }
	}
	
	// ------------- Insertion to Ticketed Asset --------------------------//

	# get the recently inserted ticket id from the code above 
	$query1 = "SELECT * FROM `thesis`.`service` ORDER BY id DESC LIMIT 1;";
	$result1 = mysqli_query($dbc, $query1);

	while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
		$serviceID = $row['id'];
	}

	//$query6 = "UPDATE `thesis`.`service` SET `status`='13' WHERE `id`='{$serviceID}';";
	//$result6 = mysqli_query($dbc, $query6);
?>