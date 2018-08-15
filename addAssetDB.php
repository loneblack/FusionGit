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
	$departmentID = $_POST['department'];
	$description = $_POST['description'];
	$brand = $_POST['brand'];
	$itemSpecification = $_POST['itemSpecification'];
	$warrantyY = $_POST['warrantyY'];
	$warrantyM = $_POST['warrantyM'];
	$propertyCode = $_POST['propertyCode'];
	$SerialNumber = $_POST['SerialNumber'];
	$MACAddress = $_POST['MACAddress'];
	$attachments = $_POST['attachments'];
	
	
	
	//insert into assetType
	$assetTypeSQL = "INSERT INTO assettype (`assetClass`, `brand`, `itemSpecification`, `description`) VALUES ('{$assetType}', '{$brand}', '{$itemSpeficiation}', '{$description}');";
	echo $assetTypeSQL."<br>";
	
	$result = mysqli_query($dbc, $assetTypeSQL);
	
	
	//insert into asset
	$getAssetTypeID = "SELECT assetTypeID FROM assettype WHERE assetClass != 13 AND assetClass != 42 ORDER BY assetTypeID DESC LIMIT 1;";
	$result = mysqli_query($dbc, $getAssetTypeID);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$assetTypeID = $row['assetTypeID'];
	
	$assetSQL = "INSERT INTO asset (assetTypeID, supplierID, status, propertyCode, serialNo, macAddress, dateDelivered, unitCost) VALUES ('{$assetTypeID}', '{$supplier}', '2', '{$propertyCode}', '{$SerialNumber}', '{$MACAddress}', '{$dateDelivered}', '{$unitCost}');";

	echo $assetSQL."<br>";
	$result = mysqli_query($dbc, $assetSQL);
	
	
	//insert into assetDocument
	$assetIDSQL = "SELECT assetID FROM asset JOIN assettype ON asset.assetTypeID = assettype.assetTypeID WHERE assettype.assetClass != 13 AND assettype.assetClass != 42 ORDER BY assettype.assetTypeID DESC LIMIT 1;";
	$result = mysqli_query($dbc, $assetIDSQL);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$assetID = $row['assetID'];
	
	
	$assetDocumentSQL = "INSERT INTO assetdocument(assetID, requestID, mrf, salesInvoice, deliveryReceipt, receivingReport, RRtoWH, purchaseOrder) VALUES ('{$assetID}', '{$request}', '{$mrf}', '{$salesInvoice}', '{$deliveryReceipt}', '{$receivingReport}', '{$rrDate}', '{$purchaseOrder}');";
	$result = mysqli_query($dbc, $assetDocumentSQL);
	echo $assetDocumentSQL;
	
?>