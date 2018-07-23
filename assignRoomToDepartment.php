<?php require_once("mysqlconnect.php");
session_start();
$_SESSION['previousPage']="assignRoomtoDepartment (1).php";?>
<html>
	<head> 
		<title>Assign Room To Department</title>
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
	<?php
	echo"wtf";
	if (isset($_SESSION['submitMessage'])){
		echo "<script>alert({$_SESSION['submitMessage']});</script>";
		unset($_SESSION['submitMessage']);
	}
	
	?>

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
					<li class="active"><a href="home.html">Home</a></li>
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
			<div align="center" margin="auto" class="container" style="background-color:#73CD6F; width:400px; padding-bottom:10px; padding-top:10px; border-radius: 25px; border: solid white">
				<h3 align="center">Assign Room to Department</h2>
				<div class="input-group">	
					<form method="POST" action="assignRoomtoDepartmentDB.php">
						
						<div class="input-group">	<!-- Start Date -->
							<b><font size="1" color="#332929">Start Date *</font></b>
							<br>
							<input type="date" name="startDate" placeholder="Start Date" style="border-radius:5px" required>
						</div>	<!-- Start Date -->
						<br>
						<div class="input-group">	<!-- End Date -->
							<b><font size="1" color="#332929">End Date *</font></b>
							<br>
							<input type="date" name="endDate" placeholder="End Date" style="border-radius:5px" required>
						</div>	<!-- End Date -->
						<br>
						<div class="input-group"> <!-- Building -->
							<b><font size="1" color="#332929">Building *</font></b>
							<br>
							<select class="form-control" name="buildingID" id="buildingID" onChange="getRooms(this.value)"style="border-radius:5px">
								<option value=''>Select Building</option>
								<?php
									$query="select * from building ORDER BY name;";
									$result=mysqli_query($dbc,$query);
									
									while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
									echo "<option value='{$row['BuildingID']}'>{$row['name']}</option>";
									}
								?>
							</select>
						</div>	<!-- Building -->
						<br>
						<div class="input-group">	<!-- Floor and Room-->
							<b><font size="1" color="#332929">Floor & Room *</font></b>
							<br>
							
							<select name="FloorAndRoomID" id ="FloorAndRoomID" class="form-control" style="border-radius:5px;">
								<option value=''>Select</option>
							</select>
							
							<!-- Modal trigger -->
							<button type="button" style="display:inline" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><font size="1">Add New</font></button>
						</div><!-- Floor and Room-->
						
						<div class="input-group">	<!-- Department -->
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
	        <h4 class="modal-title">Modal Header</h4>
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