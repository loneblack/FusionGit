<?php
	require_once("mysqlconnect.php");
	session_start();
	$_SESSION['previousPage'] = "assetTesting.php"; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Testing Request</title>
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
						  <h3 class="box-title" style="">Testing Request</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <table id="example2" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th hidden></th>
							  <th>Office Name</th>
							  <th>Building Name</th>
							  <th>Room and Floor</th>
							  <th></th>
							</tr>
							</thead>
							<tbody>
								<?php
									$query = "SELECT testingID, (o.Name)AS 'OfficeName',(b.name)AS 'BuildiingName', fr.floorRoom FROM `thesis`.`assettesting` ag
												JOIN floorandroom fr
												ON fr.FloorAndRoomID = ag.FloorAndRoomID
												JOIN building b
												ON fr.BuildingID = b.BuildingID
												JOIN offices o
												ON o.officeID = ag.officeID
												WHERE statusID = 10;";
																
									$result = mysqli_query($dbc, $query);
									
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
									{
										echo "<tr>
												<td hidden>{$row['testingID']}</td>
												<td>{$row['OfficeName']}</td>
												<td>{$row['BuildiingName']}</td>
												<td>{$row['floorRoom']}</td>
												<td><button>Button</button></td>
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
</script>
</body>
</html>
