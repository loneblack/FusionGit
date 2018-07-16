<?php
	require_once("mysqlconnect.php");
	
	$name = $_POST['name'];
	$contactNo = $_POST['contactNo'];
	$email = $_POST['email'];
	$contactPerson = $_POST['contactPerson'];
	$address = $_POST['address'];
	
	$sql0 = "SELECT name FROM SUPPLIER WHERE name = '{$name}'";
	$result0 = mysqli_query($dbc, $sql0);
	
	if ($result0->num_rows > 0) {
		$message = "Supplier already exists.";
		echo $message;
    }
	
	if(!isset($message)){
		$sql = "INSERT INTO Supplier (name, contactNo, email, contactPerson, address) VALUES ('{$name}', '{$contactNo}', '{$email}', '{$contactPerson}', '{$address}')";
	
		$result = mysqli_query($dbc, $sql);
	}
	
?>