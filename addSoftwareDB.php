<?php
	require_once("mysqlconnect.php");
	
	$dateDelivered = $_POST['dateDelivered'];
	$mrf = $_POST['mrf'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$propertyCode = $_POST['propertyCode'];
	$numLicense = $_POST['numLicense'];
	$numCDType = $_POST['numCDType'];
	$serialNo = $_POST['serialNo'];
	$department = $_POST['department'];
	$supplier = $_POST['supplier'];
	$totalAmount = $_POST['amount'];
	$salesInvoice = $_POST['salesInvoice'];
	$requestID = $_POST['request'];
	$poNumber = $_POST['poNumber'];
	$contractStart = $_POST['contractStart'];
	$contractEnd = $_POST['contractEnd'];
	$softwareStart = $_POST['softwareStart'];
	$softwareEnd = $_POST['softwareEnd'];
	$rrNumber = $_POST['rrNumber'];
	$dateForwardedToPO = $_POST['dateForwardedToPO'];
	$productKey = $_POST['productKey'];
	$installCode = $_POST['installCode'];
	$attachments = 0;
	$acknowledgementReceipt = 0;
	//id = 42
	
	//insert to assettype - Software
	$sqlAssetType = "INSERT INTO assettype(assetClass, softwareName, description) VALUES ('42', '{$name}', '{$description}');";
	$result = mysqli_query($dbc, $sqlAssetType);
	
	//insert into asset - Software
	$sqlAssetTypeID = "SELECT assetTypeID FROM assettype WHERE assetClass = 42 ORDER BY assetTypeID DESC LIMIT 1;";
	$result = mysqli_query($dbc, $sqlAssetTypeID);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$assetTypeID = $row['assetTypeID'];
	}
	
	$sqlAsset = "INSERT INTO asset (assetTypeID, supplierID, status, propertyCode, serialNo, productKey, installCode, dateDelivered, contractStartDate, contractEndDate, swStartDate, swEndDate) VALUES ({$assetTypeID}, {$supplier}, '1', {$propertyCode}, {$siNo}, {$productKey}, {$installCode}, {$dateDelivered}, {$contractStart}, {$contractEnd}, {$softwareStart}, {$softwareEnd})";
	$result = mysqli_query($dbc, $sqlAsset);
	echo $sqlAsset;
	
	$query = "SELECT * FROM asset
				ORDER BY assetID DESC
				LIMIT 1;";
	$result = mysqli_query($dbc, $query);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$assetID = $row['assetID'];
	}
	
	//insert into assetdocument - Software
	$queryRequest = "SELECT procurementID FROM procurement WHERE requestID = {$requestID};";
	$result = mysqli_query($dbc, $queryRequest);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$procurementID = $row['procurementID'];
	}
	
	$sqlAssetDocument = "INSERT INTO thesis.assetdocument (assetID, requestID, procurementID, mrf, salesInvoice, receivingReport, purchaseOrder) VALUES ('{$assetID}', '{$requestID}', '{$procurementID}', '{$mrf}', '{$siNo}', '{$rrNumber}', '{$poNumber}')";
	$result = mysqli_query($dbc, $sqlAssetDocument);
	
	echo $sqlAssetDocument;
?>