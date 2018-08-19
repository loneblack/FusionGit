<?php
	require_once("mysqlconnect.php");
	session_start();
	$_SESSION['previousPage'] = "assetTesting.php"; 
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Refurbish Asset</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
			<link href="layout/AssetsCssBootstrap.css" rel="stylesheet" />
		    <!-- FONT AWESOME ICONS  -->
		    <link href="layout/AssetsCssFont-awesome.css" rel="stylesheet" />
		    <!-- CUSTOM STYLE  -->
		    <link href="layout/AssetsCssStyle.css" rel="stylesheet" />
			<link rel="icon" type="image/png" href="resource/dlsulogo.png" />

			<script src="layout/jquery.min.js"></script>
			<script src="layout/bootstrap.min.js"></script>
			
	</head>
<!-- NAVBAR START-->
	<!-- HEADER START-->
	<header>
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">
	                <strong>Logout </strong>
	            </div>
	        </div>
	    </div>
	</header>     
	<!-- HEADER END-->
    <!-- LOGO HEADER START-->
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
    <!-- NAVBAR CONTENT START-->
     <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                           <ul id="menu-top" class="nav navbar-nav navbar-right">
                           <<li><a class="menu-top-active" href="employees-home.html">Dashboard</a></li>
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
    <!-- NAVBAR CONTENT END-->
<!-- NAVBAR END-->

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

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Select Building and Room</h4>
	      </div>
	      <div class="modal-body">
	        

		<form>
			<div class="input-group"><!-- Remarks -->
				<b><font size="1" color="#332929">RPSM/SRF Number</font></b>
				<br>
				<input type ="number" id = "rpsmsrf" name ="rpsmsrf" style="width: 550px;" min=0;></textarea>
			</div>	<!-- Remarks -->

			<!-- Office -->
			<div class="input-group;" style="padding-top: 10px";>
				<b><font size="1" color="#332929">Office *</font></b>
				<br>
				
				<select name="officeID" id ="officeID" style="border-radius:5px; width: 480px; height: 35px;">
					<option value=''>Select</option>
					<?php
						$query="select * from Offices ORDER BY name;";
						$result=mysqli_query($dbc,$query);
						
						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
						echo "<option value='{$row['officeID']}'>{$row['Name']}</option>";
						}
					?>
				</select>
				
				<!-- Modal trigger -->
				<button type="button" style="display:inline" class="btn btn-secondary" data-toggle="modal" style="border-radius:5px" data-target="#addOfficeModal"><font size="1">Add New</font></button>
			</div>
			<!-- Office -->

			<div class="input-group"> <!-- Building -->
				<b><font size="1" color="#332929">Building *</font></b>
				<br>
				<select class="form-control" name="building" id="building" onChange="getRooms(this.value)"style="border-radius:5px; width: 550px;">
					<option value=''>Select</option>
					<?php
						$query="select * from building ORDER BY name;";
						$result=mysqli_query($dbc,$query);
						
						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
						echo "<option value='{$row['BuildingID']}'>{$row['name']}</option>";
						}
					?>
				</select>
			</div>
			<!-- Building -->

			<!-- Floor and Room-->
			<div class="input-group;" style="padding-top: 10px";>
				<b><font size="1" color="#332929">Floor & Room *</font></b>
				<br>
				
				<select name="FloorAndRoomID" id ="FloorAndRoomID" style="border-radius:5px; width: 480px; height: 35px;">
					<option value=''>Select</option>
				</select>
				
				<!-- Modal trigger -->
				<button type="button" style="display:inline" class="btn btn-secondary" data-toggle="modal" data-target="#addFloorRoomModal"><font size="1">Add New</font></button>
			</div>
			<!-- Floor and Room-->
			<br>
			<div class="input-group"><!-- Remarks -->
				<b><font size="1" color="#332929">Remarks *</font></b>
				<br>
				<textarea type ="text" id = "remarks" name ="remarks" style="width: 550px; height: 200px"></textarea>
			</div>	<!-- Remarks -->

	      </div>
	      <div class="modal-footer">
			<button onClick="submitAssetTesting()" class="btn btn-secondary" type="submit">Submit</button>
		</form>
	      </div>
	    </div>

	  </div>
	</div>
	<!-- /.Modal -->
	
	<!-- Add OfficeModal -->
	<div id="addOfficeModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Add Office</h4>
	      </div>
	      <div class="modal-body">
	        

		<form>
			<!-- Office -->
			<div class="input-group;" style="padding-top: 10px";>	
				<b><font size="1" color="#332929">Office Name *</font></b>
				<br>
				<input class = "input-group" id = "officeName" name ="officeName" required style="border-radius: 5px">
			</div>
			<!-- Office -->
			<br>
	      </div>
	      <div class="modal-footer">
			<button onClick="addOfficeDB()" class="btn btn-secondary" type="submit">Submit</button>
		</form>
	      </div>
	    </div>

	  </div>
	</div>
	<!-- /.Add Office Modal -->

	<!-- Modal -->
	<div id="addFloorRoomModal" class="modal fade" role="dialog">
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
				<select name = "buildingID">
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
				<input type="text"  name = "floorRoom" placeholder="floorRoom" required>
			</div>


	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-default">Submit</button>
	      </div>
		</form>
	    </div>

	  </div>
	</div>
	<!-- /.Modal -->

	<body background="resource/green.jpg" style="background-attachment:fixed; background-repeat:no-repeat;">
		<div>	<!-- Navbar -->
			
		</div>	<!--Navbar -->

		<div style="padding-top:10px"> <!-- Tables and stuff-->
			<div align="center" margin="auto" style=" background-color:#73CD6F; padding-top:10px; padding-bottom:10px; padding-left:5px; padding-right:5px; border-radius:25px; border: solid white">
				<!-- Main content -->
				<section class="content">
					<div class="row">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<!-- /.col -->
					<div class="col-sm-12">
					  <div class="box box-primary">
						<div class="box-header">
						  <h3 class="box-title" style="">Refurbishing</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <table id="example2" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th></th>
							  <th>Property Code</th>
							  <th>Serial Number</th>
							  
							  <th>Brand</th>
							  <th>Asset Type</th>
							  <th>Item Specification</th>
							</tr>
							</thead>
							<tbody>
								<?php
									$query = "SELECT assetID, a.assetTypeID, propertyCode, serialNo, itemSpecification, (b.name)as 'brand',(ac.name) as 'assetclass' FROM thesis.asset a
												join assettype at on a.assetTypeID = at.assetTypeID
												join ref_brand b on at.brand = b.brandId 
												join ref_assetclass ac on at.assetClass = ac.assetClassID
												where a.status = 1;";
																
									$result = mysqli_query($dbc, $query);
									
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
									{
										echo "<tr>
												<td><div style='text-align: center;'><input type='checkbox' class='checkbox' name='assets[]' value='{$row['assetID']}' style='width: 2rem; height: 2rem;'></div></td>
												<td>{$row['propertyCode']}</td>
												<td>{$row['serialNo']}</td>
												<td>{$row['brand']}</td>
												<td>{$row['assetclass']}</td>
												<td>{$row['itemSpecification']}</td>
											  </tr>";
									}
								?>
							</tbody>
						
						  </table>
						</div>
						<!-- /.box-body -->
					  </div>
					  <!-- /.box -->
					</div>
					
					<!-- /.col -->
					<div class="col-sm-12">
						<button type="button" style="border-radius:5px"class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Select</button>
					  <!-- Trigger the modal with a button -->

					</div>
					</form>
				 	</div>
				  <!-- /.row -->
				</section>
				<!-- /.content -->
				
			</div>
		</div>
		  <!-- Tables and stuff -->

<script src="layout/jquery.min.js"></script>
<!-- DataTables -->
<script src="layout/jquery.dataTables.min.js"></script>
<script src="layout/dataTables.bootstrap.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="layout/icheck.min.js"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true, //
      'searching'   : true, //
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true  //
    })
	
	//iCheck for checkbox
    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue'
    })
  })
var assets = new Array();
var FloorAndRoomID;
var building;
var officeID;
var remarks;
var officeName;
var rpsmsrf;

function getData(ele) {

 $("input[name='assets[]']:checked").map(function(){
    assets.push( $(this).val());
})

$('#FloorAndRoomID').map(function(){
    FloorAndRoomID = ($(this).val());
})
  $('#building').map(function(){
    building = ($(this).val());
})
  $('#officeID').map(function(){
    officeID = ($(this).val());
})
  $('#remarks').map(function(){
    remarks = ($(this).val());
})
  $('#officeName').map(function(){
    officeName = ($(this).val());
})
   $('#rpsmsrf').map(function(){
    rpsmsrf = ($(this).val());
})
   }   

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

function submitAssetTesting(){
	getData();
    $.ajax({
        type:"POST",
        url:"refurbishDB.php",
        data: {assets:assets, FloorAndRoomID:FloorAndRoomID, building:building, officeID:officeID, remarks:remarks, rpsmsrf:rpsmsrf},
        success: function(data){

       				 }
    		});
	}
function alertness(){
	getData();
	alert(officeName);
}

function addOfficeDB(){
	getData();
    $.ajax({
        type:"POST",
        url:"addOfficeDB.php",
        data: {officeName:officeName},
        success: function(data){

       				 }
    		});
	}
</script>
</body>
</html>
