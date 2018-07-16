<?php require_once("mysqlconnect.php");?>
<html>
	<head> 
		<meta charset="UTF-8">
		Add Floor And Room
	</head>
	
	<form method="POST" action="addFloorAndRoomDB.php">
		<div>
			<label>Floor and Room</label>
			<input type="text" name="floorRoom" placeholder="floorRoom" required>
		</div>
		<div>
			<label>Building</label>
			<select name="buildingID">
				<?php
					$query="select * from building ORDER BY name;";
					$result=mysqli_query($dbc,$query);
					
					while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					echo "<option value='{$row['BuildingID']}'>{$row['name']}</option>";
					}
				?>
			</select>
		</div>
		<button type="submit">Submit</button>
	</form>

</html>