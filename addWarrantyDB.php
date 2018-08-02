<?php
	require_once("mysqlconnect.php");
	
	$assetID = $_POST['assetID'];
	$dateAcquired = $_POST['dateAcquired'];
	$dateExpired = $_POST['dateExpired'];
	$supplierID = $_POST['supplierID'];
	
	
	$sql = "INSERT INTO warranty ( assetID, dateAquired, dateExpired, supplier) VALUES ('{$assetID}', '{$dateAcquired}', '{$dateExpired}' , '{$supplierID}')";

	echo $sql;

	$result = mysqli_query($dbc, $sql);

	
?>