<?php
	require_once("mysqlconnect.php");
	
	$Description = $_POST['Description'];
	$date = $_POST['Date'];
	$building = $_POST['buildingID'];
	$floorandroom = $_POST['FloorAndRoomID'];
	$dateneeded = $_POST['dateneeded'];
	
	$sql = "INSERT INTO request () VALUES ('{$AssetClass}', '{$quantity}', '{$brand}', '{$ItemSpecification}', '{$PropertyCode}', '{$SerialNumber}', '{$MACAddress}', '{$status}', '{$ProductKey}', '{$InstallCode}', '{$SInumber}')";

	echo $sql;

	$result = mysqli_query($dbc, $sql);

	
?>