<?php require_once("mysqlconnect.php");?>
<html>
	<head> 
		<meta charset="UTF-8">
		Add Employee
	</head>
	
	<form method="POST" action="addEmployeeDB.php">
		<div>
			<label>Department</label>
			<select name="department">
			<option value=''>Select a Department</option>
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
			<label>Name</label>
			<input type="text" name="name" placeholder="name" required>
		</div>
		<div>
			<label>Position</label>
			<input type="text" name="position" placeholder="position" required>
		</div>
		<div>
			<label>Contact Number</label>
			<input type="text" name="contactNumber" placeholder="Contact Number" required>
		</div>
		<div>
			<label>Email</label>
			<input type="email" name="email" placeholder="email" required>
		</div>
		<button type="submit">Submit</button>
	</form>
</html>