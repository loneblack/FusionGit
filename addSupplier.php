<html>
	<head> 
		<meta charset="UTF-8">
		Add Supplier 
	</head>
	
	<form method="POST" action="addSupplierDB.php">
		<div>
			<label>Name</label>
			<input type="text" name="name" placeholder="Name" required>
		</div>
		<div>
			<label>Contact No</label>
			<input type="text" name="contactNo" placeholder="Contact No.">
		</div>
		<div>
			<label>Email</label>
			<input type="text" name="email" placeholder="Email">
		</div>
		<div>
			<label>Contact Person</label>
			<input type="text" name="contactPerson" placeholder="Contact Person" >
		</div>
		<div>
			<label>Address</label>
			<input type="text" name="address" placeholder="Address" required>
		</div>
		
		<button type="submit">Submit</button>
	</form>

</html>