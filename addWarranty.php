<?php require_once("mysqlconnect.php");
session_start(); ?>
<html>
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Add Warranty</title>
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

<script src="http://www.designbootstrap.com/track/ga.js" ></script>
<script src="layout/jquery.min.js"></script>
	<script src="layout/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="layout/moment.min.js"></script>
	<script type="text/javascript" src="layout/daterangepicker.min.js"></script>


</head>
	
	<body>						
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
    <!-- MENU SECTION END-->
		<div style="padding-top:20px; padding-bottom: 20px;">
			<div align="center" margin="auto" class="container" style="background-color:#73CD6F; width:350px; padding-bottom:8px; padding-top:10px; border-radius: 25px; border: solid white">
				<div class="input-group">
				<form method="POST" action="addWarrantyDB.php">
					<h2 align="center">Add Warranty</h2>
					<div class="input-group"> <!-- Asset -->
							<b><font size="1" color="#332929">Asset Class *</font></b>
						<br>
						<select name="assetclass" style="border-radius:5px; height:25px; width:153px">
							<option>Select asset class</option>
							<?php
								$query="select * from ref_assetclass ORDER BY name";
								$result=mysqli_query($dbc,$query);
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo "<option value='{$row['assetClassID']}'>{$row['name']}</option>";
								}
							?> 
						</select>
						</div>	<!-- Asset -->
						
						
							
						<div> <!--Date-->
						<b><font size="1" color="#332929">Date Acquired *</font></b>
						<br>
						<input type="date" name="dateAcquired">
						</div>
							<!--Date-->
					
					
							
						<div> <!--Date Needed-->
						<b><font size="1" color="#332929">Date Expired *</font></b>
						<br>
						<input type="date" name="dateExpired">
						</div>
							<!--Date Needed-->
						<br>
						<div> <!-- Supplier -->
						<b><font size="1" color="#332929">Supplier *</font></b>
						<br>
						<input type="text" name="supplier" placeholder="add supplier" required style="border-radius:5px; width:252px">
					</div> <!-- Supplier -->
						<br>
					<button align="center" type="input" class="btn btn-outline-secondary">Submit</button>
					</form>
			</div>
		</div>
	</body>
	
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Add New Floor And Room</h4>
	      </div>
	      <div class="modal-body">
	        

		<form method="POST" action="addFloorAndRoomDB(users).php">
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
			<div>
				<label>Floor and Room</label>
				<input type="text" name="floorRoom" placeholder="floorRoom" required>
			</div>
			<button type="submit">Submit</button>
		</form>


	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	
</html>

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