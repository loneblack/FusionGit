<?php
	require_once("mysqlconnect.php");
	session_start();

	$_SESSION['previousPage'];
	$officeName = $_POST['officeName'];

	
	$sql0 = "SELECT Name FROM Offices WHERE Name LIKE'{$officeName}';";
	$result0 = mysqli_query($dbc, $sql0);
	
	if ($result0->num_rows > 0) {
		$message = "Office $officeName already exists.";

		$_SESSION['submitMessage'] = $message;
		header('Location: '.$header);
    }

	if(!isset($message)){
		$sql = "INSERT INTO `thesis`.`Offices` (`Name`) VALUES ('{$officeName}');";
		$result = mysqli_query($dbc, $sql);


		$message = "Office successfully added!";
		$_SESSION['submitMessage'] = $message;

		header('Location: '.$header);
	}
	
?>