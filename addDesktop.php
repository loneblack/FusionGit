<?php require_once("mysqlconnect.php");
session_start();
$_SESSION['previousPage'] = "addAsset.php";?>
<html>
	<head>
		<title>Add Desktop</title>
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
				<form id="addSoftware"method="POST" action="addSoftwareDB.php">
					<h2 align="center">Add Desktop</h2>
				
					<!-- Property Code -->
					<div> 
						<b><font size="1" color="#332929">Property Code</font></b>
						<br>
						<input type="text" name="propertyCode" placeholder="Property Code" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Property Code -->
					
					<!-- PO No -->
					<div> 
						<b><font size="1" color="#332929">PO Number</font></b>
						<br>
						<input type="text"  name="poNumber" placeholder="PO Number" style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- PO No -->
					
					<!-- Date Delivered -->
					<div> 
						<b><font size="1" color="#332929">Date Delivered *</font></b>
						<br>
						<input type="date" name="dateDelivered" placeholder="Date Delivered" required style="border-radius:5px; width:252px">
					</div>
					<br>					
					<!-- Date Delivered -->
					
					<!-- Computer Component -->
					<div>
						
					</div>
					<!-- Computer Component -->
					
					<!-- Unit Cost -->
					<div> 
						<b><font size="1" color="#332929">Unit Cost</font></b>
						<br>
						<input type="number" min="0" name="unitCost" placeholder="0.00" step="0.01" style="border-radius:5px; width:252px">
					</div>					
					<!-- Unit Cost -->
				</div>
				<hr>
					<h4>Computer Components</h4>
					
					
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