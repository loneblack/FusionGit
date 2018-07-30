<?php
session_start();
require_once("mysqlconnect.php");
$assets = $_POST['assets'];
$person = $_POST['person'];

for($i=0; $i<count($assets); $i++){

	$query="SELECT * FROM thesis.assetassignment aa
			JOIN thesis.personresponsible pr 
			ON aa.personresponsible_id = pr.id
			WHERE aa.assetID = {$assets[$i]} AND pr.employeeID = {$person};";
	$result=mysqli_query($dbc,$query);

	
}

?>