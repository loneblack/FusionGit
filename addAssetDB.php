<?php
	require_once("mysqlconnect.php");
	$mrf = $_POST['mrf'];
	$dateDelivered = $_POST['dateDelivered'];
	$purchaseOrder = $_POST['purchaseOrder'];
	$salesInvoice = $_POST['salesInvoice'];
	$deliveryReceipt = $_POST['deliveryReceipt'];
	$receivingReport = $_POST['receivingReport'];
	$rrDate = $_POST['rrDateToWH'];
	$assetType = $_POST['assetType'];
	$unitCost = $_POST['unitCost'];
	$supplier = $_POST['supplier'];
	$request = $_POST['request'];
	$department = $_POST['department'];
	$user = $_POST['user'];
	$description = $_POST['description'];
	$brand = $_POST['brand'];
	$itemSpecification = $_POST['itemSpecification'];
	$warrantyY = $_POST['warrantyY'];
	$warrantyM = $_POST['warrantyM'];
	$propertyCode = $_POST['propertyCode'];
	$SerialNumber = $_POST['SerialNumber'];
	$MACAddress = $_POST['MACAddress'];
	$attachments = $_POST['attachments'];
	
	$getAssetTypeID = "SELECT assetTypeID FROM `assettype` WHERE assetClass != 13 AND assetClass != 42 ORDER BY assetTypeID DESC LIMIT 1;";
	$assetTypeID = mysqli_query($dbc, $getAssetTypeID);
	
	//insert into assetType
	$assetTypeSQL = "INSERT INTO assetType(assetTypeID, assetClass, brand, itemSpecification, description) VALUES ('{$assetTypeID}', '{$assetType}', '{$brand}', '{$itemSpecification}', '{$description}');";
	$result = mysqli_query($dbc, $assetTypeSQL);
	echo $assetTypeSQL;
	
	//insert into asset
	/*$sql = "INSERT INTO asset (assetTypeID, supplierID, status, propertyCode, serialNo, macAddress, dateDelivered, unitCost) VALUES ('{$assetType}', '{$supplier}', '2',  '{$}', '{$}', '{$}', '{$}', '{$}');";

	echo $sql;

	$result = mysqli_query($dbc, $sql);
	*/
	
?>