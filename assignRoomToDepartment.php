<?php require_once("mysqlconnect.php");
session_start();
$_SESSION['previousPage']="assignRoomtoDepartment.php";?>
<html>
	<head> 
		<title>Assign Room To Department</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="resource/dlsulogo.png" />
		<script src="layout/jquery.min.js"></script>
		<link rel="stylesheet" href="layout/bootstrap.min.css">
		<script src="layout/bootstrap.min.js"></script>
		<link href="layout/AssetsCssStyle.css" rel="stylesheet" />
		
	</head>
	<?php
	if (isset($_SESSION['submitMessage'])){
		
		
	
	
	?>
		<!-- Modal -->
	<div id="submitModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	      </div>
	      <div class="modal-body">
	      		<?php echo $_SESSION['submitMessage']; ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
	      </div>
	    </div>

	  </div>
	</div><?php 
	echo "<script> $('#submitModal').modal('show') </script>";
		unset($_SESSION['submitMessage']);

		} ?>

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
                           <<li><a class="menu-top-active" href="employees-home.php">Dashboard</a></li>
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
			<div align="center" margin="auto" class="container" style="background-color:#73CD6F; width:400px; padding-bottom:10px; padding-top:10px; border-radius: 25px; border: solid white">
				<h3 align="center">Assign Room to Department</h2>
				<div class="input-group">	
					<form method="POST" action="assignRoomtoDepartmentDB.php">
						
						<div class="input-group">	<!-- Start Date -->
							<b><font size="1" color="#332929">Start Date *</font></b>
							<br>
							<input type="date" name="startDate" class="form-control" placeholder="Start Date" style="border-radius:5px; width: 360px;" required>
						</div>	<!-- Start Date -->
						<br>
						<div class="input-group">	<!-- End Date -->
							<b><font size="1" color="#332929">End Date *</font></b>
							<br>
							<input type="date" name="endDate" class="form-control"  placeholder="End Date" style="border-radius:5px; width: 360px;" required>
						</div>	<!-- End Date -->
						<br>
						<div class="input-group"> <!-- Building -->
							<b><font size="1" color="#332929">Building *</font></b>
							<br>
							<select class="form-control" name="buildingID" id="buildingID" onChange="getRooms(this.value)"style="border-radius:5px">
								<option value=''>Select</option>
								<?php
									$query="select * from building ORDER BY name;";
									$result=mysqli_query($dbc,$query);
									
									while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
									echo "<option value='{$row['BuildingID']}'>{$row['name']}</option>";
									}
								?>
							</select>
						</div>	<!-- Building -->
						
						<div class="input-group;" style="white-space: nowrap; padding-top: 10px";>	<!-- Floor and Room-->
							<b><font size="1" color="#332929">Floor & Room *</font></b>
							<br>
							
							<select name="FloorAndRoomID" id ="FloorAndRoomID" class="form-control" style="border-radius:5px; width: 280px;">
								<option value=''>Select</option>
							</select>
							
							<!-- Modal trigger -->
							<button type="button" style="display:inline" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><font size="1">Add New</font></button>
						</div><!-- Floor and Room-->
						<br>
						<div class="input-group" style="width: 360px">	<!-- Department -->
							<b><font size="1" color="#332929">Department *</font></b>
							<br>
							<select name="DepartmentID" class="form-control" style="border-radius:5px;">
								<option>Select</option>
								<?php
									$query="select * from department ORDER BY name;";
									$result=mysqli_query($dbc,$query);
									
									while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
									echo "<option value='{$row['DepartmentID']}'>{$row['name']}</option>";
									}
								?>
							</select>
						</div>	<!-- Department -->
						<br>
					</div>
						<button align="center" class="btn btn-outline-secondary" type="submit">Submit</button>
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
	        

		<form method="POST" action="addFloorAndRoomDB.php">
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


	<script src="layout/jquery.min.js"></script>
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
		var txt = document.getElementById('newFloorRoom').value;
		var dropdown = document.getElementById('buildingIDOnModal').value;
		alert(dropdown);
		alert(txt);
		if (txt.length == 0 || dropdown == '') {
			document.getElementById('newFloorRoomModalSubmit').disabled = true;
		}
		else {
			document.getElementById('newFloorRoomModalSubmit').disabled = false;
		}
	}

	function disableSubmitBtn(){
		document.getElementById('newFloorRoomModalSubmit').disabled=true;
	}
	</script>

</html>