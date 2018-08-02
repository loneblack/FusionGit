<?php
	require_once("mysqlconnect.php");
	
	$assetID = $_POST['assetID'];
	$dateAcquired = $_POST['dateAcquired'];
	$dateExpired = $_POST['dateExpired'];
	
	
	$sql = "INSERT INTO license (assetID, dateAcquired, dateExpired) VALUES ('{$assetID}', '{$dateAcquired}', '{$dateExpired}')";

	echo $sql;

	$result = mysqli_query($dbc, $sql);

	
?>