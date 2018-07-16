<?php require_once("mysqlconnect.php");?>
<html>
	<head> 
		<meta charset="UTF-8">
		Assign Room to Department
	</head>
	
	<form method="POST" action="assignRoomtoDepartmentDB.php">
		<div>
			<label>Start Date</label>
			<input type="date" name="startDate" placeholder="Start Date" required>
		</div>
		<div>
			<label>End Date</label>
			<input type="date" name="endDate" placeholder="End Date" required>
		</div>
		<div>
			<label>Building</label>
			<select name="buildingID" id="buildingID" onChange="getRooms(this.value)">
				<option value=''>Select a Building</option>
				<?php
					$query="select * from building ORDER BY name;";
					$result=mysqli_query($dbc,$query);
					
					while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					echo "<option value='{$row['BuildingID']}'>{$row['name']}</option>";
					}
				?>
			</select>
		</div>
		<div>
			<label>Floor and Room</label>
			<select name="FloorAndRoomID" id = "FloorAndRoomID">
				<option value=''>Select a Room</option>
			</select>
		</div>
		<button onclick="window.location.href='addFloorAndRoom.php'">Add new Room</button>
		<div>
			<label>Department</label>
			<select name="DepartmentID">
				<?php
					$query="select * from department ORDER BY name;";
					$result=mysqli_query($dbc,$query);
					
					while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					echo "<option value='{$row['DepartmentID']}'>{$row['name']}</option>";
					}
				?>
			</select>
		</div>
		<button type="submit">Submit</button>
	</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script>
	function getRooms(val){
    $.ajax({
        type:"POST",
        url:"getRooms.php",
        data: 'buildingID='+val,
        success: function(data){
            $("#FloorAndRoomID").html(data);
       				 }
    		});
	}
	</script>

</html>