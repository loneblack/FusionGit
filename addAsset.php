<?php require_once("mysqlconnect.php");
session_start();
$_SESSION['previousPage'] = "addAsset.php";?>
<html>
	<head>
		<title>Add Asset</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="resource/dlsulogo.png" />
		<script src="layout/jquery.min.js"></script>
		<link rel="stylesheet" href="layout/bootstrap.min.css">
		<script src="layout/bootstrap.min.js"></script>
		
		<style>
		/* Remove the navbar's default margin-bottom and rounded borders */ 
		.navbar {
		  margin-bottom: 0;
		  border-radius: 0;
		}

		/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
		.row.content {height: 450px}

		/* Set gray background color and 100% height */
		.sidenav {
		  padding-top: 20px;
		  background-color: #f1f1f1;
		  height: 100%;
		}

		/* Set black background color, white text and some padding */
		footer {
		  background-color: #555;
		  color: white;
		  padding: 15px;
		}

		/* On small screens, set height to 'auto' for sidenav and grid */
		@media screen and (max-width: 767px) {
		  .sidenav {
			height: auto;
			padding: 15px;
		  }
		  .row.content {height:auto;} 
		}
		
		.{
			font-size: 16px;
			color:#332929;
		}
		
		</style>
	</head>
	
	<body>						
		<body background="resource/green.jpg" style="background-attachment:fixed; background-repeat:no-repeat;">	
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
			<div class="navbar-header" style="padding-top:6px">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="img-fluid" href="home.html"><img align="middle" src="resource/logo.png"></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Projects</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php"><span></span>Login</a></li>
					<li><a href="signup.php"><span></span>Register</a></li>
				</ul>
			</div>
		  </div>
		</nav>
	
		<div style="padding-top:20px; padding-bottom: 20px;">
			<div align="center" margin="auto" class="container" style="background-color:#73CD6F; width:350px; padding-bottom:8px; padding-top:10px; border-radius: 25px; border: solid white">
				<div class="input-group">
				<form method="POST" action="addAssetDB.php">
					<h2 align="center">Add Asset</h2>
					
					<!-- MRF -->
					<div> 
						<b><font size="1" color="#332929">MRF</font></b>
						<br>
						<input type="text" name="mrf" placeholder="MRF" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- MRF -->
					
					<!-- Date Delivered -->
					<div> 
						<b><font size="1" color="#332929">Date Delivered *</font></b>
						<br>
						<input type="date" name="dateDelivered" placeholder="Date Delivered" required style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Date Delivered -->
					
					<!-- Purchase Order -->
					<div> 
						<b><font size="1" color="#332929">Purchase Order</font></b>
						<br>
						<input type="text" name="purchaseOrder" placeholder="Purchase Order"  style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Purchase Order -->
					
					<!-- Sales Invoice -->
					<div> 
						<b><font size="1" color="#332929">Sales Invoice</font></b>
						<br>
						<input type="text" name="salesInvoice" placeholder="Sales Invoice" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Sales Invoice -->
					
					<!-- Delivery Receipt -->
					<div> 
						<b><font size="1" color="#332929">Delivery Receipt</font></b>
						<br>
						<input type="text" name="deliveryReceipt" placeholder="Delivery Receipt" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Delivery Receipt -->
					
					<!-- Receiving Report -->
					<div> 
						<b><font size="1" color="#332929">Receiving Report</font></b>
						<br>
						<input type="text" name="receivingReport" placeholder="Receiving Report"  style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Receiving Report -->
					
					<!-- RR Date to WH -->
					<div> 
						<b><font size="1" color="#332929">RR Date to WH</font></b>
						<br>
						<input type="date" name="rrDate" placeholder="RR Date to WH" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- RR Date to WH -->
					
					<!-- Unit Cost -->
					<div> 
						<b><font size="1" color="#332929">Unit Cost *</font></b>
						<br>
						<input type="number" min="0" step="0.01" name="unitCost" placeholder="0.00" required style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Unit Cost -->
					
					<!-- Supplier -->
					<div> 
						<b><font size="1" color="#332929">Supplier * f</font></b>
						<br>
						<select style="border-radius:5px; width:252px" required>
							<option value="">Select Supplier</option>
								<?php
									$query="select * from supplier ORDER BY name";
									$result=mysqli_query($dbc,$query);
									
									while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
									echo "<option value='{$row['supplierID']}'>{$row['name']}</option>";
									}
								?>
						</select>
					</div>
					<br>					
					<!-- Supplier -->
					
					<!-- Asset Class -->
					<div> 
						<b><font size="1" color="#332929">Asset Type *</font></b>
						<br>
						<select name="assetclass" onchange="getAssetType(this.value)" style="border-radius:5px; height:25px; width:153px">
							<option value="0">Select asset type</option>
							<?php
								$query="select * from ref_assetclass WHERE assetClassID != 13 && assetClassID != 42 ORDER BY name;";
								$result=mysqli_query($dbc,$query);
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo "<option value='{$row['assetClassID']}'>{$row['name']}</option>";
								}
							?> 
						</select>
						
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><font size="1">Add new Class</font></button>

						<!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
						
							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">Add new Asset Class</h4>
							</div>
							<div class="modal-body"> 
								<meta charset="UTF-8">
								
								<form method="POST" action="addAssetClassDB.php">
									<div>
										<label>New Asset Class</label>
										<input type="text" onkeydown="btnCheck();" id="newAssetClass" name="newAssetClass" placeholder="New Asset Class" required>
									</div>
								</form>
							</div>
							<div class="modal-footer">
							  <button type="button" onShow="disableBtn();" onMouseOver="btnCheck();" id="acModalSubmit" class="btn btn-default" data-dismiss="modal">Submit</button>
							</div>
						  </div>
						  
						</div>
					  </div>
						
					</div>
					<!--Asset Class-->
					
					<div> <!-- Quantity -->
						<b><font size="1" color="#332929">Quantity *</font></b>
						<br>
						<input type="number" name="quantity" placeholder="0" min="0" style="border-radius:5px; width:252px; height:25px">
					</div>
					<br>
					
					<!-- Brand -->
					<div>
						<b><font size="1" color="#332929">Brand *</font></b>
						<br>
						<select name="brand" style="border-radius:5px; height:25px; width:150px">
							<option>Select brand</option>
							<?php
								$query="select * from ref_brand ORDER BY name";
								$result=mysqli_query($dbc,$query);
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo "<option value='{$row['brandID']}'>{$row['name']}</option>";
								}
							?>
						</select>
	
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal1"><font size="1">Add new Brand</font></button>

						<!-- Modal -->
						<div class="modal fade" id="myModal1" role="dialog">
							<div class="modal-dialog">
						
							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">Add new Brand</h4>
							</div>
							<div class="modal-body">
								<form method="POST" action="addBrandDB.php">
									<div>
										<label>Name</label>
										<input type="text" onkeydown="btnCheck1();" id="newBrand" placeholder="Name" required>
									</div>
									
								</form>
							</div>
							<div class="modal-footer">
							  <button type="submit" onShow="disableBtn1();" onMouseOver="btnCheck1();" id="brandSubmit" class="btn btn-default" data-dismiss="modal">Submit</button>
							</div>
						  </div>
						  
						</div>
					  </div>
					
					</div> 
					<!-- Brand -->
					
					<br>
					
					<!-- Item Specification -->
					<div> 
						<b><font size="1" color="#332929">Item Specification</font></b>
						<br>
						<textarea class=""name="itemSpecification" rows="3" style="width:255px; border-radius:5px"cols="35"></textarea>
					</div>
					<br>					
					<!-- Item Specification -->
					
					<!-- Warranty -->
					<div> 
						<b><font size="1" color="#332929">Warranty (years)</font></b>
						<br>
						<input type="number" min="0" name="warranty" placeholder="Warranty" step="0.1" style="border-radius:5px; width:252px">
					</div> 
					<!-- Warranty -->
					
					<br>
					<div> <!-- Property Code -->
						<b><font size="1" color="#332929">Property Code *</font></b>
						<br>
						<input type="text" name="PropertyCode" placeholder="Property Code" required style="border-radius:5px; width:252px">
					</div> <!-- Property Code -->
					<br>
					<div> <!-- Serial Number --> 
						<b><font size="1" color="#332929">Serial Number *</font></b>
						<br>
						<input type="text" name="SerialNumber" placeholder="SerialNumber" required style="border-radius:5px; width:252px">
					</div> <!-- Serial Number -->
					<br>
					<div> <!-- MAC Address -->
						<b><font size="1" color="#332929">MAC Address</font></b>
						<br>
						<input type="text" name="MACAddress" placeholder="MAC Address" style="border-radius:5px; width:252px">
					</div> <!-- MAC Address -->
					<br>
					<div> <!-- Product Key -->
						<b><font size="1" color="#332929">Product Key</font></b>
						<br>
						<input type="text" name="ProductKey" placeholder="Product Key" style="border-radius:5px; width:252px">
					</div> <!-- Product Key -->
					<br>
					<div> <!-- Install Code -->
						<b><font size="1" color="#332929">Install Code</font></b>
						<br>
						<input type="text" name="InstallCode" placeholder="Install Code" style="border-radius:5px; width:252px">
					</div> <!-- Install Code -->
					<br>
				</div>
					<button align="center" type="input" class="btn btn-outline-secondary">Submit</button>
					</form>
			</div>
		</div>
	</body>
	
		<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	
</html>

<script>
function btnCheck() {
	var txt = document.getElementById('newAssetClass').value;
	
	if (txt.length == 0) {
		document.getElementById('acModalSubmit').disabled = true;
	}
	else {
		document.getElementById('acModalSubmit').disabled = false;
	}
}

function disableBtn(){
	document.getElementById('acModalSubmit').disabled=true;
}

function btnCheck1(){
	var txt = document.getElementById('newBrand').value;
	
	if (txt.length == 0) {
		document.getElementById('brandSubmit').disabled = true;
	}
	else {
		document.getElementById('brandSubmit').disabled = false;
	}
}

function disableBtn1(){
	document.getElementById('brandSubmit').disabled=true;
}

function getAssetType(val){
    $.ajax({
        type:"POST",
        url:"getAssetType.php",
        data: 'assetType='+val,
        success: function(data){
            $("#FloorAndRoomID").html(data);
       				 }
    		});
	}
</script>