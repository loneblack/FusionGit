<?php
	require_once("mysqlconnect.php");
	session_start();
	$_SESSION['previousPage'] = "assetTesting.php"; 
	$_
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cart</title>
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
						  <table class="table" style="background: #ffffff; margin: 0; padding: 0;">
							<tr>
							<td style="width: 90%">Asset Components</td>
							<td><button>Empty List</button></td>
							</tr>
						  </table>
						  <table id="cart" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th style="display: none;"></th>
							  <th>Asset Class</th>
							  <th>Brand</th>
							  <th>Property Code</th>
							  <th>Serial Number</th>
							  <th>MAC Address</th>
							  <th>Item Specification</th>
							  <th width="7%"></th>
							</tr>
							</thead>
							<tbody>
									<?php
									for ()


									?>
							</tbody>
						
						  </table>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <table id="example2" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th style="display: none;"></th>
							  <th>Asset Class</th>
							  <th>Brand</th>
							  <th>Property Code</th>
							  <th>Serial Number</th>
							  <th>MAC Address</th>
							  <th>Item Specification</th>
							  <th width="7%"></th>
							</tr>
							</thead>
							<tbody>
								<?php
									$query = "SELECT A.assetID, AST.assetTypeID, A.propertyCode, A.serialNo, A.macAddress, AST.itemSpecification,
													(AC.name)AS 'assetClass', (B.name)AS 'brand'
													FROM thesis.asset A 
												JOIN assettype AST
													ON A.assetTypeID = AST.assetTypeID
												JOIN ref_assetclass AC
													ON	AST.assetClass = AC.assetClassID
												JOIN ref_brand B
													ON B.brandID = AST.brand
												WHERE A.status = 1;";
																
									$result = mysqli_query($dbc, $query);
									
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
									{	
										echo "<tr>
												<td style='display: none;'>{$row['assetID']}</td>
												<td>{$row['assetClass']}</td>
												<td>{$row['brand']}</td>
												<td>{$row['propertyCode']}</td>
												<td>{$row['serialNo']}</td>
												<td>{$row['macAddress']}</td>
												<td>{$row['itemSpecification']}</td>
												<td><button>Add Asset</button></td>
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
        data: {assets:assets, FloorAndRoomID:FloorAndRoomID, building:building, officeID:officeID, remarks:remarks},
        success: function(data){

       				 }
    		});
	}
</script>
</body>
</html>
