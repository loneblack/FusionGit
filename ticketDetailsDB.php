<?php
	session_start();
	require_once("mysqlconnect.php");

	$ticketID = $_SESSION['ticketID'];
	$assigned_to = $_GET['assigned_to'];
	$date = $_GET['date'];
	$priority = $_GET['priority'];
	$statusID = $_GET['statusID'];


    $query1 = "UPDATE `thesis`.`ticket` SET `assigneeUserID`='{$assigned_to}', `dueDate`='{$date}', `priority`='{$priority}', `status`='{$statusID}' WHERE `ticketID`='{$ticketID}';";           
    $result1 = mysqli_query($dbc, $query1);
     unset($_SESSION['ticketID']);
    $header =  $_SESSION['previousPage'];
	header('Location: '.$header);
?>