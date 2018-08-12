<?php
	
	require_once("mysqlconnect.php");
	
	$assetID = $_POST['assetID'];
	$dateAcquired = $_POST['dateAcquired'];
	$dateExpired = $_POST['dateExpired'];
	$message = "License successfully added ";
	
	
	$sql = "INSERT INTO license (assetID, dateAcquired, dateExpired) VALUES ('{$assetID}', '{$dateAcquired}', '{$dateExpired}');";

	$result = mysqli_query($dbc, $sql);
	echo "License successfully added ";
	
	header("Location: addLicense.php"); 
	


	
?>