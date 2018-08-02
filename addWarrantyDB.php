<?php
	require_once("mysqlconnect.php");
	
	$AssetClass = $_POST['assetclass'];
	$dateAcquired = $_POST['dateAcquired'];
	$dateExpired = $_POST['dateExpired'];
	$supplier = $_POST['supplier'];
	
	
	$sql = "INSERT INTO warranty ( assetID, dateAquired, dateExpired, supplier) VALUES ('{$AssetClass}', '{$dateAcquired}', '{$dateExpired}' , '{$supplier}')";

	echo $sql;

	$result = mysqli_query($dbc, $sql);

	
?>