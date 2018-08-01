<?php
	require_once("mysqlconnect.php");
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>TITLE</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="icon" type="image/png" href="resource/dlsulogo.png" />
			<script src="layout/jquery.min.js"></script>
			<link rel="stylesheet" href="layout/bootstrap.min.css">
			<link rel="stylesheet" href="layout/pageformat.css">
			<script src="layout/bootstrap.min.js"></script>
			<link href="layout/AssetsCssBootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="layout/AssetsCssFont-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
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

	<body background="resource/green.jpg" style="background-attachment:fixed; background-repeat:no-repeat;">
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
								<li> <a href="addSoftware.php">Add Software</a> </li>
								</ul>
							</li>
							<li><a href="#">Assigning</a>
								<ul>
								<li> <a href="assignRoomToDepartment.php">Assign Room</a> </li>
								<li> <a href="assignAssetToPerson.php">Assign Asset</a> </li>
								</ul>
							</li>
                            <li><a href="DataTables.html">Data Tables</a>
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

		<div style="padding-top:10px"> <!-- Tables and stuff-->
			<div align="center" margin="auto" style=" background-color:#73CD6F; padding-top:10px; padding-bottom:10px; padding-left:5px; padding-right:5px; border-radius:25px; border: solid white">
				<!-- Main content -->
				<div class="tabbable-panel">
					<div>
						<section class="content">
						  <div class="row">
							<div class="col-xs-12">
							  
								<div class="tabbable-line">
									<ul class="nav nav-tabs">
									
									  <li class="active">
										<a href="#assocprodtosupp" data-toggle="tab">
											Assign Asset to Person
										</a>
									  </li>
									  
									  <li>
									    <a href="#assoctbl" data-toggle="tab">
											Association Table
										</a>
									  </li>
									</ul>
								</div>
								<div class="tab-content">
								  <div class="tab-pane active" id="assocprodtosupp">
									  <section class="content">
										  <div class="row">
											<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
											<!-- /.col -->
											<div class="col-sm-6">
											  <div class="box box-primary">
												<div class="box-header">
												  <h3 class="box-title">Asset List</h3>
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
																		where a.status = 1 or a.stauts = 2;";
																					 	
															$result = mysqli_query($dbc, $query);
															
															while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
															{
																echo "<tr>
																		<td><div style='text-align: center;'><input type='checkbox' class='checkbox' name='assets[]' value='{$row['assetID']}' style='width: 2rem; height: 2rem;'></div></td>
																		<td>{$row['propertyCode']}</td>
																		<td>{$row['serialNo']}</td>
																		<td>{$row['macAddress']}</td>
																		<td>{$row['itemSpecification']}</td>";
																if ($row['status'] == 1)
																	echo "<td>Unassigned</td>";
																else
																	echo "<td>Assigned</td>";
																	  echo "</tr>";
															}
														?>
													</tbody>
												
												  </table>
												</div>
												<!-- /.box-body -->
											  </div>
											  <!-- /.box -->
											</div>
											<div class="col-sm-6">
											  <div class="box box-primary">
												<div class="box-header">
												  <h3 class="box-title">Person List</h3>
												</div>
												<!-- /.box-header -->
												<div class="box-body">
												  <table id="example3" class="table table-bordered table-striped">
													<thead>
													<tr>
													  <th></th>
													  <th>Name</th>
													  <th>Position</th>
													  <th>Department</th>
													</tr>
													</thead>
													<tbody>
													<?php 
													
															$query = "	SELECT e.employeeID,e.name, position, (d.name)as 'department' 
																		FROM thesis.employee e 
																		join thesis.department d
																		on e.DepartmentID = d.DepartmentID;"; 
																						
															$result = mysqli_query($dbc, $query);
															
															while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
															{
																echo "<tr>
																		<td><div style='text-align: center;'><input type='radio' class='radio' name='persons[]' value='{$row['employeeID']}' style='width: 2rem; height: 2rem;'></div></td>
																		<td>{$row['name']}</td>
																		<td>{$row['position']}</td>
																		<td>{$row['department']}</td>
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
											  <button type="submit" name ="submit" onClick="submitAssetAssignment()" class="btn btn-outline-secondary">Submit</button>
											</div>
											</form>
										  </div>
										  <!-- /.row -->
										</section>
										<!-- /.content -->
								  </div>
								
								  <div class="tab-pane" id="assoctbl">
									  <section class="content">
										  <div class="row">
											<div class="col-sm-12">
											  <div class="box box-primary">
												<div class="box-header">
												  <h3 class="box-title">Association Table</h3>
												</div>
												<!-- /.box-header -->
												<div class="box-body">
												  <table id="example1" class="table table-bordered table-striped">
													<thead>
													<tr>
													  <th>Employee Name</th>
													  <th>Department</th>
													  <th>Brand</th>
													  <th>Asset Class</th>
													  <th>Item Specification</th>
													  <th>propertyCode</th>
													  <th>serialNo</th>
													  <th>macAddress</th>
													</tr>
													</thead>
													<tbody>
													  <?php
														$query = "SELECT (e.name)AS 'EmployeeName',	(d.name)AS 'Department',
																(b.name)AS 'Brand', (ac.name)AS 'AssetClass', at.itemSpecification,
																a.propertyCode, a.serialNo, a.macAddress 
																	FROM thesis.assetassignment aa
																	join personresponsible pr
														            on aa.personresponsible_id = pr.id
														            join employee e
														            on pr.employeeID = e.employeeID
														            join asset a
														            on a.assetID = aa.assetID
														            join assettype at
														            on a.assetTypeID = at.assetTypeID
														            join ref_assetclass ac
														            on at.assetClass = ac.assetClassID
														            join ref_brand b
														            on at.brand = b.brandID
														            join department d
														            on d.DepartmentID = e.DepartmentID;";
																						 
														$result = mysqli_query($dbc, $query);
														
														while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
														{
															echo "<tr>
																	<td>{$row['EmployeeName']}</td>
																	<td>{$row['Department']}</td>
																	<td>{$row['Brand']}</td>
																	<td>{$row['AssetClass']}</td>
																	<td>{$row['itemSpecification']}</td>
																	<td>{$row['propertyCode']}</td>
																	<td>{$row['serialNo']}</td>
																	<td>{$row['macAddress']}</td>
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
										  </div>
										  <!-- /.row -->
										</section>
										<!-- /.content -->
								  </div>
								  
								</div>
								<!-- /.tab-content -->
							  </div>
							  <!-- /.nav-tabs-custom -->
							</div>
							<!-- /.col -->
						  </div>
						  <!-- /.row -->
						</section>
						<!-- /.content -->
					</div>
				</div>
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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true, //
      'searching'   : true, //
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true  //
    })
	$('#example3').DataTable()
	
	//iCheck for checkbox
    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue'
    })
  })
var assets = new Array();
var person;

function getData(ele) {

 $("input[name='assets[]']:checked").map(function(){
    assets.push( $(this).val());
})
       $("input[name='persons[]']:checked").map(function(){
    person = $(this).val();

})
   }   
function alertness(){
	getData();
	alert("asseets: "+assets);
	alert("person: "+person);
}

function submitAssetAssignment(){
	getData();
    $.ajax({
        type:"POST",
        url:"submitAssetAssignment.php",
        data: {person:person, assets:assets},
        success: function(data){
            alert(data);
       				 }
    		});
	}
</script>
</body>
</html>
