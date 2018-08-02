<?php
	require_once("mysqlconnect.php");
	
	$AssetClass = $_POST['assetclass'];
	$dateAcquired = $_POST['dateAcquired'];
	$dateExpired = $_POST['dateExpired'];
	
	
	$sql = "INSERT INTO license ( assetID, dateAquired, dateExpired) VALUES ('{$AssetClass}', '{$dateAcquired}', '{$dateExpired}')";

	echo $sql;

	$result = mysqli_query($dbc, $sql);

	
?>