<?php
	require_once("mysqlconnect.php");
	
	$name = $_POST['name'];
	$idNumber = $_POST['idNumber'];
	$officeID = $_POST['officeID'];
	$departmentID = $_POST['departmentID'];
	$orgName = $_POST['orgName'];
	$email = $_POST['email'];
	$contactNo = $_POST['contactNo'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$details = $_POST['details'];
	$laptop = $_POST['laptop'];
	$extension = $_POST['extension'];
	$projector = $_POST['projector'];
	$vga = $_POST['vga'];
	$number = $_POST['number'];
	$unit = $_POST['unit'];
	
	$Affiliation = $_POST['Affiliation'];
	
	if ($Affiliation == 1){
		$sql = "INSERT INTO `thesis`.`borrow` (`Name`, `IDNum`, `email`, `contactNum`, `startDate`, `endDate`, `purpose`, `unit`, `laptop`, `vga`, `extension`, `numUnits`, `officeID`, `statusID`) VALUES ('{$name}', '{$idNumber}', '{$email}', '{$contactNo}', '{$startDate}', '{$endDate}', '{$details}', '{$unit}', '{$laptop}', '{$vga}', '{$extension}', '{$number}', '{$officeID}','10');";
	}
	if ($Affiliation == 2){
		$sql = "INSERT INTO `thesis`.`borrow` (`Name`, `IDNum`, `email`, `contactNum`, `startDate`, `endDate`, `purpose`, `unit`, `laptop`, `vga`, `extension`, `numUnits`, `DepartmentID`, `statusID`) VALUES ('{$name}', '{$idNumber}', '{$email}', '{$contactNo}', '{$startDate}', '{$endDate}', '{$details}', '{$unit}', '{$laptop}', '{$vga}', '{$extension}', '{$number}', '{$officeID}', '{$departmentID}', '10');";
	}
	if ($Affiliation == 3){
		$sql = "INSERT INTO `thesis`.`borrow` (`Name`, `IDNum`, `Organization`, `email`, `contactNum`, `startDate`, `endDate`, `purpose`, `unit`, `laptop`, `vga`, `extension`, `numUnits`, `statusID`) VALUES ('{$name}', '{$idNumber}', '{$orgName}', '{$email}', '{$contactNo}', '{$startDate}', '{$endDate}', '{$details}', '{$unit}', '{$laptop}', '{$vga}', '{$extension}', '{$number}', '10');";
	}

	

	echo $sql;

	//$result = mysqli_query($dbc, $sql);

	
?>