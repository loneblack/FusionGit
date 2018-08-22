<?php
	session_start();
	require_once("mysqlconnect.php");

	$ticketID = $_SESSION['ticketID'];
	$statusID = $_GET['statusID'];
	date_default_timezone_set("Asia/Singapore");
	$date = date('Y-m-d H:i:s');


    $query1 = "UPDATE `thesis`.`ticket` SET  `status`='{$statusID}', `lastUpdateDate`='{$date}' WHERE `ticketID`='{$ticketID}';";           
    $result1 = mysqli_query($dbc, $query1);


    if($ticketID == 7){
    	//get the assets using the ticket id
    	$query2 ="SELECT * FROM thesis.ticketedasset WHERE tickeID ='{$ticketID}';";
    	$result2 = mysqli_query($dbc, $query2);


		while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
			//update asset status  stocked once ticket is closed
			$query3 = "UPDATE `thesis`.`asset` SET `status`='1' WHERE `assetID`='{$row['assetID']}';";
			$result3 = mysqli_query($dbc, $query3);

			//audit table
			$query4 = "INSERT INTO `thesis`.`assetaudit` (`status`, `UserID`, `date`, `assetID`, `ticketID`) VALUES ('1', '{$userID}', '{$date}', '{$row['assetID']}', '{$ticketID}');";
			$result4 = mysqli_query($dbc, $query4);
		}
    }


     unset($_SESSION['ticketID']);
    $header =  $_SESSION['previousPage'];
	header('Location: '.$header);
?>