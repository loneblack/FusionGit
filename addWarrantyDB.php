<?php
	require_once("mysqlconnect.php");
	
	$assetID = $_POST['assetID'];
	$dateAcquired = $_POST['dateAcquired'];
	$dateExpired = $_POST['dateExpired'];
	$supplierID = $_POST['supplierID'];
	
	
	$sql = "INSERT INTO warranty (assetID, dateAcquired, dateExpired, supplierID) VALUES ('{$assetID}', '{$dateAcquired}', '{$dateExpired}' , '{$supplierID}');";


	$result = mysqli_query($dbc, $sql);

	
?>