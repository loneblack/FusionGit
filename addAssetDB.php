<?php
	require_once("mysqlconnect.php");
	
	$AssetClass = $_POST['assetclass'];
	$quantity = $_POST['quantity'];
	$brand = $_POST['brand'];
	$ItemSpecification = $_POST['ItemSpecification'];
	$PropertyCode = $_POST['PropertyCode'];
	$SerialNumber = $_POST['SerialNumber'];
	$MACAddress = $_POST['MACAddress'];
	$status = '2';// for stocked status
	$ProductKey = $_POST['ProductKey'];
	$InstallCode = $_POST['InstallCode'];
	$SInumber = $_POST['SInumber'];
	
	
	$sql = "INSERT INTO asset (AssetClass, quantity, brand, ItemSpecification, PropertyCode, SerialNo, MACAddress, status, ProductKey, InstallCode, SIno) VALUES ('{$AssetClass}', '{$quantity}', '{$brand}', '{$ItemSpecification}', '{$PropertyCode}', '{$SerialNumber}', '{$MACAddress}', '{$status}', '{$ProductKey}', '{$InstallCode}', '{$SInumber}')";

	echo $sql;

	$result = mysqli_query($dbc, $sql);

	
?>