<?php require_once("mysqlconnect.php");
session_start();
$_SESSION['previousPage'] = "addAsset.php";?>
<html>
	<head> 
		<meta charset="UTF-8">
		Add Asset 
	</head>
	
	<form method="POST" action="addAssetDB.php">
		<div>
			<label>Asset Class</label>
			<select name="assetclass">
				<?php
					$query="select * from ref_assetclass ORDER BY name";
					$result=mysqli_query($dbc,$query);
					
					while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					echo "<option value='{$row['assetClassID']}'>{$row['name']}</option>";
					}
				?>
			</select>
			<button onclick="window.location.href='addAssetClass.php'">Add new Asset Class</button>
		</div>
		<div>
			<label>Quantity</label>
			<input type="text" name="quantity" placeholder="quantity">
		</div>
		<div>
			<label>Brand</label>
			<select name="brand">
				<?php
					$query="select * from ref_brand ORDER BY name";
					$result=mysqli_query($dbc,$query);
					
					while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					echo "<option value='{$row['brandID']}'>{$row['name']}</option>";
					}
				?>
			</select>
			<button onclick="window.location.href='addBrand.php'">Add new Brand</button>
		</div>
		<div>
			<label>Item Specification</label>
			<input type="text" name="ItemSpecification" placeholder="ItemSpecification" >
		</div>
		<div>
			<label>Property Code</label>
			<input type="text" name="PropertyCode" placeholder="PropertyCode" required>
		</div>
		<div>
			<label>Serial Number</label>
			<input type="text" name="SerialNumber" placeholder="SerialNumber" required>
		</div>
		<div>
			<label>MAC Address</label>
			<input type="text" name="MACAddress" placeholder="MACAddress">
		</div>
		<div>
			<label>Product Key</label>
			<input type="text" name="ProductKey" placeholder="ProductKey">
		</div>
		<div>
			<label>Install Code</label>
			<input type="text" name="InstallCode" placeholder="InstallCode">
		</div>
		<div>
			<label>SI number</label>
			<input type="text" name="SInumber" placeholder="SInumber">
		</div>		
		<button type="submit">Submit</button>
	</form>

</html>