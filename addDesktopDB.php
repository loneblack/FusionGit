<?php
	require_once("mysqlconnect.php");
	echo "yes";
	$propertyCode = $_POST['propertyCode'];
	$poNumber = $_POST['poNumber'];
	$dateDelivered = $_POST['dateDelivered'];
	$unitCost = $_POST['unitCost'];
	$assetType = 13;
	
	//insert to assetType
	$assetTypeSQL = "INSERT INTO assetType(assetClass) VALUES ('13');";
	$result = mysqli_query($dbc, $assetTypeSQL);
	
	//insert into asset
	$assetTypeIDSQL = "SELECT assetTypeID FROM assettype WHERE assetClass = 13 ORDER BY assetTypeID DESC LIMIT 1;";
	$result = mysqli_query($dbc, $assetTypeIDSQL);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$assetTypeID = $row['assetTypeID'];
	echo $assetTypeIDSQL."<br>";
		

	$assetSQL = "INSERT INTO asset (assetTypeID, status, propertyCode, dateDelivered, unitCost) VALUES ('{$assetTypeID}', '1', '{$propertyCode}', '{$dateDelivered}', '{$unitCost}');";
	echo $assetSQL."<br>";
	//$result = mysqli_query($dbc, $assetSQL);
	
		  if (!mysqli_query($dbc,$assetSQL))
		  {
		  echo("Error description: " . mysqli_error($dbc));
		  }
	
	
	//insert to assetDocument
	$assetIDSQL = "SELECT assetID FROM asset JOIN assettype ON asset.assetTypeID = assettype.assetTypeID WHERE assettype.assetClass = 13 ORDER BY assettype.assetTypeID DESC LIMIT 1;";
	$result = mysqli_query($dbc, $assetIDSQL);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$assetID = $row['assetID'];
	
	$assetDocumentSQL = "INSERT INTO assetDocument(assetID, purchaseOrder) VALUES ('{$assetID}', '{$poNumber}');";
	$result = mysqli_query($dbc, $assetDocumentSQL);
	echo $assetDocumentSQL;
?>