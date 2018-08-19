<?php require_once("mysqlconnect.php");?>
<html>
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Add Asset</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="layout/AssetsCssBootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="layout/AssetsCssFont-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="layout/AssetsCssStyle.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script src="layout/jquery.min.js"></script>
	<script src="layout/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="layout/moment.min.js"></script>
	<script type="text/javascript" src="layout/daterangepicker.min.js"></script>


</head>
	
	<body background="resource/green.jpg">						
		<header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>info@yourdomain.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+90-897-678-44
					&nbsp;&nbsp;
					<strong>Logout </strong>
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="resource/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">



                    </ul>
                </div>
            </div>
        </div>
    </div>
	<!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                           <li><a class="menu-top-active" href="employees-home.php">Dashboard</a></li>
                            <li><a href="#">Adding</a>
								<ul>
								<li> <a href="addAsset.php">Add Asset</a> </li>
								<li> <a href="addDesktop.php">Add Desktop</a> </li>
								<li> <a href="addEmployee.php">Add Employee</a> </li>
								<li> <a href="addLicense.php">Add License</a> </li>
								<li> <a href="addSoftware.php">Add Software</a> </li>
								<li> <a href="addWarranty.php">Add Warranty</a> </li>
								</ul>
							</li>
							<li><a href="#">Assigning</a>
								<ul>
								<li> <a href="assignRoomToDepartment.php">Assign Room</a> </li>
								<li> <a href="assignAssetToPerson.php">Assign Asset</a> </li>
								</ul>
							</li>
                            <li><a href="#">Data Tables</a>
								<ul>
								<li> <a href="assetTesting.php">Asset Testing Table</a> </li>
								</ul>
							</li>
                            <li><a href="#">Forms</a></li>
                             <li><a href="login.html">Login Page</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
		<div style="padding-top:20px; padding-bottom: 20px;">
			<div align="center" margin="auto" class="container" style="background-color:#73CD6F; width:350px; padding-bottom:8px; padding-top:10px; border-radius: 25px; border: solid white">
				<div class="input-group">
				<form method="POST" action="addAssetDB.php">
					<h2 align="center">Add Asset</h2>
					
					<div> <!-- MRF -->
						<b><font size="1" color="#332929">MRF</font></b>
						<br>
						<input type="text" name="mrf" placeholder="MRF" style="border-radius:5px; width:252px; height:25px">
					</div> <!-- MRF -->
					<br>
					
					<div> <!-- Date Delivered -->
						<b><font size="1" color="#332929">Date Delivered</font></b>
						<br>
						<input type="date" name="dateDelivered"  style="border-radius:5px; width:252px; height:25px">
					</div> <!-- Date Delivered -->
					<br>
					
					<div> <!-- Purchase Order -->
						<b><font size="1" color="#332929">Purchase Order</font></b>
						<br>
						<input type="text" name="purchaseOrder" placeholder="Purchase Order" style="border-radius:5px; width:252px; height:25px">
					</div> <!-- Purchase Order -->
					<br>
					
					<div> <!-- SI Number -->
						<b><font size="1" color="#332929">Sales Invoice</font></b>
						<br>
						<input type="text" name="salesInvoice" placeholder="Sales Invoice" style="border-radius:5px; width:252px">
					</div> <!-- SI Number -->
					<br>
					
					<div> <!-- Delivery Receipt -->
						<b><font size="1" color="#332929">Delivery Receipt</font></b>
						<br>
						<input type="text" name="deliveryReceipt" placeholder="Delivery Receipt" style="border-radius:5px; width:252px">
					</div> <!-- Delivery Receipt -->
					<br>
					
					<div> <!-- Receiving Report -->
						<b><font size="1" color="#332929">Receiving Report</font></b>
						<br>
						<input type="text" name="receivingReport" placeholder="Receiving Report" style="border-radius:5px; width:252px">
					</div> <!-- Receiving Report -->
					<br>
					
					<div> <!-- RR date to WH -->
						<b><font size="1" color="#332929">RR date to WH</font></b>
						<br>
						<input type="date" name="rrDateToWH" style="border-radius:5px; width:252px; height:25px">
					</div> <!-- RR date to WH -->
					<br>
					
					<div> <!-- Asset type-->
						<b><font size="1" color="#332929">Asset Type *</font></b>
						<br>
						<select name="assetType" style="border-radius:5px; height:25px; width:153px">
							<option>Select asset type</option>
							<?php
								$query="select * from ref_assetclass WHERE name != 'Desktop' AND name != 'Software' ORDER BY name";
								$result=mysqli_query($dbc,$query);
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo "<option value='{$row['assetClassID']}'>{$row['name']}</option>";
								}
							?> 
						</select>
						
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><font size="1">Add new Type</font></button>
					</div> <!-- Asset Type -->
					<br>
					
					<div> <!-- Unit Cost-->
						<b><font size="1" color="#332929">Unit Cost</font></b>
						<br>
						<input type="number" min="0.00" name="unitCost" placeholder="0.00" step="0.01" style="border-radius:5px; width:252px; height:25px">
					</div> <!-- Unit Cost -->
					<br>
					
					<div> <!-- Supplier -->
						<b><font size="1" color="#332929">Supplier</font></b>
						<br>
						<select name="supplier" style="border-radius:5px; width:252px">
							<option value="">Select supplier</option>
							<?php
								$query="select * from supplier ORDER BY name;";
								$result=mysqli_query($dbc,$query);
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo "<option value='{$row['supplierID']}'>{$row['name']}</option>";
								}
							?>
						</select>
					</div> <!-- Supplier -->
					<br>
					
					<div> <!-- Requested -->
						<b><font size="1" color="#332929">Request</font></b>
						<br>
						<select name="request" style="border-radius:5px; width:252px">
							<option value="">Select request</option>
							<?php
								$query="select * from request ORDER BY requestID;";
								$result=mysqli_query($dbc,$query);
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo "<option value='{$row['requestID']}'>{$row['description']}</option>";
								}
							?>
						</select>
					</div> <!-- Requested -->
					<br>
					
					<div> <!-- Department -->
						<b><font size="1" color="#332929">Department</font></b>
						<br>
						<select name="department" id="department" style="border-radius:5px; width:252px">
							<option value="0">Select department</option>
							<?php
								$query="select * from department ORDER BY name;";
								$result=mysqli_query($dbc,$query);
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo "<option value='{$row['DepartmentID']}'>{$row['name']}</option>";
								}
							?>
						</select>
					</div> <!-- Department -->
					<br>
					
					<!-- Description -->
					<div> 
						<b><font size="1" color="#332929">Description</font></b>
						<br>
						<textarea name="description" id="description" rows="3" style="width:255px; border-radius:5px"cols="35"></textarea>
					</div>
					<!-- Description -->
					<br>

					<div> <!-- Brand -->
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
					</div>
					 <!-- Brand -->
					 <br>
					  
					<!-- Specs -->
					<div> 
						<b><font size="1" color="#332929">Item Specification</font></b>
						<br>
						<textarea name="itemSpecification" id="itemSpecification" rows="3" style="width:255px; border-radius:5px"cols="35"></textarea>
					</div>
					<!-- specs -->
					<br>
					
					<!-- Warranty -->
					<div> 
						<b><font size="1" color="#332929">Warranty</font></b>
						<br>
						<font size="1">Years</font><input type="number" min="0" name="warrantyY" placeholder="0"  style="border-radius:5px; height:25px; width:93px">
						<font size="1">Months</font><input type="number" min="0" max="11" name="warrantyM" placeholder="0"  style="border-radius:5px; height:25px; width:93px">
					</div>
					<!-- Warranty -->
					<br>					
					
					<!-- Property Code -->
					<div> 
						<b><font size="1" color="#332929">Property Code</font></b>
						<br>
						<input type="text" name="propertyCode" placeholder="Property Code" style="border-radius:5px; width:252px">
					</div>
					<!-- Property Code -->
					<br>					
					
					<div> <!-- Serial Number --> 
						<b><font size="1" color="#332929">Serial Number *</font></b>
						<br>
						<input type="text" name="SerialNumber" placeholder="SerialNumber"  style="border-radius:5px; width:252px">
					</div> <!-- Serial Number -->
					<br>
					
					<div> <!-- MAC Address -->
						<b><font size="1" color="#332929">MAC Address</font></b>
						<br>
						<input type="text" name="MACAddress" placeholder="MAC Address" style="border-radius:5px; width:252px">
					</div> <!-- MAC Address -->
					<br>
					
					<!-- Attachments -->
					<div> 
						<b><font size="1" color="#332929">Attachments</font></b>
						<br>
							<input type="file" name="attachments" accept="image/*">
					</div>
					<br>					
					<!-- Attachments -->
					
						<button align="center" class="btn btn-outline-dark">Submit</button>
				</form>
				</div>
			</div>
		</div>
	</body>
	

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
				<input type="text" onkeydown="btnCheck1();" id="newBrand" placeholder="Name" >
			</div>
			
		</form>
	</div>
	<div class="modal-footer">
	  <button type="submit" onShow="disableBtn1();" onMouseOver="btnCheck1();" id="brandSubmit" class="btn btn-default" data-dismiss="modal">Submit</button>
	</div>
	</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title">Add new Asset Type</h4>
	</div>
	<div class="modal-body"> 
		<meta charset="UTF-8">
		
		<form method="POST" action="addAssetClassDB.php">
			<div>
				<label>New Asset Type</label>
				<input type="text" onkeydown="btnCheck();" id="newAssetClass" name="newAssetClass" placeholder="New Asset Class" >
			</div>
		</form>
	</div>
	<div class="modal-footer">
	  <button type="button" onShow="disableBtn();" onMouseOver="btnCheck();" id="acModalSubmit" class="btn btn-default" data-dismiss="modal">Submit</button>
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
</script>