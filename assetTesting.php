<?php
	require_once("mysqlconnect.php");
	session_start();
	$_SESSION['previousPage'] = "assetTesting.php"; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Test Stocked Assets</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="icon" type="image/png" href="resource/dlsulogo.png" />
			<script src="layout/jquery.min.js"></script>
			<link rel="stylesheet" href="layout/bootstrap.min.css">
			<link rel="stylesheet" href="layout/pageformat.css">
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
			<div class="input-group"> <!-- Office -->
				<b><font size="1" color="#332929">Office *</font></b>
				<br>
				<select class="form-control" name="officeID" id="officeID" style="border-radius:5px">
					<option value=''>Select</option>
					<?php
						$query="select * from Offices ORDER BY name;";
						$result=mysqli_query($dbc,$query);
						
						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
						echo "<option value='{$row['officeID']}'>{$row['Name']}</option>";
						}
					?>
				</select>
			</div>	<!-- Office -->

			<div class="input-group"> <!-- Building -->
				<b><font size="1" color="#332929">Building *</font></b>
				<br>
				<select class="form-control" name="building" id="building" onChange="getRooms(this.value)"style="border-radius:5px">
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
				<button type="button" style="display:inline" class="btn btn-secondary" data-toggle="modal" data-target="#addFloorRoomModal"><font size="1">Add New</font></button>
			</div><!-- Floor and Room-->
			<button onClick="submitAssetTesting()" type="submit">Submit</button>
		</form>


	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	<!-- /.Modal -->

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
				<select name = buildingID>
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
			<button type="submit">Submit</button>
		</form>


	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>




	<body background="resource/green.jpg" style="background-attachment:fixed; background-repeat:no-repeat;">
		<div>	<!-- Navbar -->
			<nav class="navbar navbar-inverse">
					<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>
						<a class="img-fluid" href="home.html"><img style="padding-top:6px" src="resource/logo.png"></a>
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
						  <h3 class="box-title" style="">Put ITS Stocked Assets to test</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <table id="example2" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th></th>
							  <th>Property Code</th>
							  <th>Serial Number</th>
							  <th>MAC Address</th>
							  <th>Item Specification</th>
							</tr>
							</thead>
							<tbody>
								<?php
									$query = "	SELECT * FROM thesis.asset a
												join assettype at on a.assetTypeID = at.assetTypeID
												join ref_brand b on at.brand = b.brandId 
												join ref_assetclass ac on at.assetClass = ac.assetClassID
												where a.status = 1 OR a.status = 2;";
																
									$result = mysqli_query($dbc, $query);
									
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
									{
										echo "<tr>
												<td><div style='text-align: center;'><input type='checkbox' class='checkbox' name='assets[]' value='{$row['assetID']}' style='width: 2rem; height: 2rem;'></div></td>
												<td>{$row['propertyCode']}</td>
												<td>{$row['serialNo']}</td>
												<td>{$row['macAddress']}</td>
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
					  <button type="submit" name ="submit"  class="btn btn-outline-secondary">Submit</button>
					  <!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><font size="1">Modal</font></button>

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
        url:"assetTestingDB.php",
        data: {assets:assets, FloorAndRoomID:FloorAndRoomID, building:building, officeID:officeID},
        success: function(data){
            alert(data);
       				 }
    		});
	}

function alertness(){
	getData();
	alert("asseets: "+assets);
	alert("FloorAndRoomID: "+FloorAndRoomID);
	alert("building: "+building);
}
</script>
</body>
</html>
