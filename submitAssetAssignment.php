<?php
//require_once("mysqlconnect.php");
//$assets = $_POST['assets'];
$person = $_POST['person'];


echo $person;
//for(i=0; i<count($assets); i++){
//	echo $assets[i];
//}

/*
if($buildingID!='')
{
	echo "<option value=''>Select a Room</option>";
$query="SELECT * FROM thesis.floorandroom where BuildingID ='{$buildingID}';";
$result=mysqli_query($dbc,$query);

	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		echo "<option value='{$row['FloorAndRoomID']}'>{$row['floorRoom']}</option>";
	}
}*/

?>