<?php
	session_start();
	require_once("mysqlconnect.php");

	$ticketID = $_SESSION['ticketID'];
	$statusID = $_GET['statusID'];
	date_default_timezone_set("Asia/Singapore");
	$date = date('Y-m-d H:i:s');


    $query1 = "UPDATE `thesis`.`ticket` SET  `status`='{$statusID}', `lastUpdateDate`='{$date}' WHERE `ticketID`='{$ticketID}';";           
    $result1 = mysqli_query($dbc, $query1);
     unset($_SESSION['ticketID']);
    $header =  $_SESSION['previousPage'];
	header('Location: '.$header);
?>