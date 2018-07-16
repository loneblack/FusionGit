<?php
	session_start();
	require_once("mysqlconnect.php");
	
	$name = $_POST['name'];

	$sql0 = "SELECT name FROM ref_brand WHERE name LIKE'{$name}'";
	$result0 = mysqli_query($dbc, $sql0);
	
	if ($result0->num_rows > 0) {
		$message = "Brand already exists. ";
		echo $message;
    }
	
	if(!isset($message)){
		$sql = "INSERT INTO `thesis`.`ref_brand` (`name`) VALUES ('{$name}');";
		$result = mysqli_query($dbc, $sql);
		$header =  $_SESSION['previousPage'];
		header('Location: '.$header);
	}
	
?>