<?php require_once("mysqlconnect.php");
session_start();
$_SESSION['previousPage'] = "addAsset.php";?>
<html>
	<head>
		<title>Add Software</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="resource/dlsulogo.png" />
		<script src="layout/jquery.min.js"></script>
		<link rel="stylesheet" href="layout/bootstrap.min.css">
		<script src="layout/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
		<script type="text/javascript" src="layout/moment.min.js"></script>
		<link rel="stylesheet" type="text/css" href="layout/daterangepicker.css" />
		<script type="text/javascript" src="layout/daterangepicker.min.js"></script>
		 <link href="layout/AssetsCssBootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="layout/AssetsCssFont-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="layout/AssetsCssStyle.css" rel="stylesheet" />
		
	</head>
							
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
                           <li><a class="menu-top-active" href="employees-home.html">Dashboard</a></li>
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
	<body background="resource/green.jpg" style="background-attachment:fixed; background-repeat:no-repeat;">
		<div style="padding-top:20px; padding-bottom: 20px;">
			<div align="center" margin="auto" class="container" style="background-color:#73CD6F; width:350px; padding-bottom:8px; padding-top:10px; border-radius: 25px; border: solid white">
				<div class="input-group">
				<form id="addSoftware"method="POST" action="addSoftwareDB.php">
					<h2 align="center">Add Software</h2>
					
					<!-- Date Delivered -->
					<div> 
						<b><font size="1" color="#332929">Date Delivered *</font></b>
						<br>
						<input type="date" name="dateDelivered" placeholder="Date Delivered" required style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Date Delivered -->
					
					<!-- MRF -->
					<div> 
						<b><font size="1" color="#332929">MRF</font></b>
						<br>
						<input type="text" name="mrf" placeholder="MRF" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- MRF -->
					
					<!-- Name -->
					<div> 
						<b><font size="1" color="#332929">Name</font></b>
						<br>
						<input type="text" name="name" placeholder="Name" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Name -->
					
					<!-- Description -->
					<div> 
						<b><font size="1" color="#332929">Description</font></b>
						<br>
						<textarea class=""name="description" rows="3" style="width:255px; border-radius:5px"cols="35"></textarea>
					</div>
					<br>					
					<!-- Description -->
					
					<!-- Property Code -->
					<div> 
						<b><font size="1" color="#332929">Property Code</font></b>
						<br>
						<input type="text" name="propertyCode" placeholder="Property Code" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Property Code -->
					
					<!-- No. of License -->
					<div> 
						<b><font size="1" color="#332929">No. of License</font></b>
						<br>
						<input type="number" min="0" name="numLicense" placeholder="1" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- No. of License -->
					
					<!-- No. of CD/Type -->
					<div> 
						<b><font size="1" color="#332929">No. of CD/Type</font></b>
						<br>
						<input type="number" min="0" name="numCDType" placeholder="1" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- No. of CD/Type -->
					
					<!-- SerialNo -->
					<div> 
						<b><font size="1" color="#332929">Serial No </font></b>
						<br>
						<input type="text" name="SerialNo" placeholder="Serial No" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- SerialNo -->
					
					<!-- Department -->
					<div> 
						<b><font size="1" color="#332929">Department </font></b>
						<br>
						<select name="department" style="border-radius:5px; height:25px; width:253px">
							<option>Select department</option>
							<?php
								$query="select * from department ORDER BY name";
								$result=mysqli_query($dbc,$query);
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo "<option value='{$row['brandID']}'>{$row['name']}</option>";
								}
							?>
						</select>
					</div>
					<br>					
					<!-- Department -->
					
					<!-- SerialNo -->
					<div> 
						<b><font size="1" color="#332929">Serial No </font></b>
						<br>
						<input type="text" name="SerialNo" placeholder="Serial No" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- SerialNo -->
					
					<!-- Supplier -->
					<div>
						<b><font size="1" color="#332929">Supplier </font></b>
						<br>
						<select name="supplier" style="border-radius:5px; height:25px; width:253px">
							<option>Select Supplier</option>
							<?php
								$query="select * from supplier ORDER BY name";
								$result=mysqli_query($dbc,$query);
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo "<option value='{$row['brandID']}'>{$row['name']}</option>";
								}
							?>
						</select>
					</div>
					<br>
					<!-- Supplier -->
					
					<!-- Amount -->
					<div> 
						<b><font size="1" color="#332929">Amount</font></b>
						<br>
						<input type="number" min="0" name="amount" placeholder="0.00" step="0.01" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Amount -->
					
					<!-- SI No -->
					<div> 
						<b><font size="1" color="#332929">SI Number</font></b>
						<br>
						<input type="text"  name="siNumber" placeholder="SI Number" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- SI No -->
					
					<!-- PO No -->
					<div> 
						<b><font size="1" color="#332929">PO Number</font></b>
						<br>
						<input type="text"  name="poNumber" placeholder="PO Number" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- PO No -->
					
					<!-- Contract Duration -->
					<div> 
						<b><font size="1" color="#332929">Contract Duration</font></b>
						<br>
						<input type="text"  name="contractDuration" style="border-radius:5px; width:252px" />
					</div>
					<br>					
					<!-- Contract Duration -->
					
					<!-- Software Start & End -->
					<div> 
						<b><font size="1" color="#332929">Software Start & End Dates</font></b>
						<br>
						<input type="text"  name="softwareStartEnd" style="border-radius:5px; width:252px" />
					</div>
					<br>					
					<!-- Software Start & End -->
					
					<!-- RR No. -->
					<div> 
						<b><font size="1" color="#332929">RR No.</font></b>
						<br>
						<input type="text"  name="rrNumber" placeholder="RR Number" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- PR No. -->
					
					<!-- Date Forwarded -->
					<div> 
						<b><font size="1" color="#332929">Date Forwarded to PO</font></b>
						<br>
						<input type="date" name="dateDelivered" placeholder="Date Forwarded" required style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Date Forwarded -->
					
					<!-- Product Key -->
					<div>
						<b><font size="1" color="#332929">Product Key</font></b>
						<br>
						<input type="text" name="productKey" placeholder="Product Key" style="border-radius:5px; width:252px">
					</div>
					<br>
					<!-- Product Key -->
					
					<!-- Install Code -->
					<div>
						<b><font size="1" color="#332929">Install Code</font></b>
						<br>
						<input type="text" name="installCode" placeholder="Install Code" style="border-radius:5px; width:252px">
					</div>
					<br>
					<!-- Install Code -->
					
					<!-- Attachments -->
					<div> 
						<b><font size="1" color="#332929">Attachments</font></b>
						<br>
							<input type="file" name="attachments" accept="image/*">
					</div>
					<br>					
					<!-- Attachments -->
					
					<!-- Acknowledgement Receipt -->
					<div> 
						<b><font size="1" color="#332929">Acknowledgement Receipt</font></b>
						<br>
							<input type="file" name="ar" accept="image/*">
					</div>
					<br>					
					<!-- Acknowledgement Receipt -->
					
					
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
	
$(function() {
  $('input[name="contractDuration"]').daterangepicker({
    timePicker: false,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'M/DD/YYYY'
    }
  });
});

$(function() {
  $('input[name="softwareStartEnd"]').daterangepicker({
    timePicker: false,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'M/DD/YYYY'
    }
  });
});
</script>