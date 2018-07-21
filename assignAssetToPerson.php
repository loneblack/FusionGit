<?php
	require_once("mysqlconnect.php");
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
													  <th>Brand name</th>
													  <th>Generic name</th>
													  <th>Dosage</th>
													  <th>Medicine type</th>
													</tr>
													</thead>
													<tbody>
														<?php
															$query = "SELECT * FROM thesis.asset a
															 			join assettype at on a.assetTypeID = at.assetTypeID
																		join ref_brand b on at.brand = b.brandId 
																		join ref_assetclass ac on at.assetClass = ac.assetClassID;";
																						
															$result = mysqli_query($dbc, $query);
															
															while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
															{
																echo "<tr>
																		<td><div style='text-align: center;'><input type='checkbox' class='checkbox' name='medicines[]' value='{$row['assetID']}' style='width: 2rem; height: 2rem;'></div></td>
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
													  <th>Address</th>
													</tr>
													</thead>
													<tbody>
													<?php 
													/*
															$query = "SELECT SUPPLIERID, SUPPLIERNAME, ADDRESS
																	  FROM SUPPLIER;"; 
																						
															$result = mysqli_query($dbc, $query);
															
															while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
															{
																echo "<tr>
																		<td><div style='text-align: center;'><input type='checkbox' class='checkbox' name='suppliers[]' value='{$row['SUPPLIERID']}' style='width: 2rem; height: 2rem;'></div></td>
																		<td>{$row['SUPPLIERNAME']}</td>
																		<td>{$row['ADDRESS']}</td>
																	  </tr>";
															}*/
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
											  <button type="submit" name ="submit" class="btn btn-outline-secondary">Submit</button>
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
													  <th>Brand name</th>
													  <th>Generic name</th>
													  <th>Dosage</th>
													  <th>Medicine type</th>
													  <th>Supplier</th>
													</tr>
													</thead>
													<tbody>
													  <?php
														$query = "SELECT M.BRANDNAME, M.GENERICNAME, M.DOSAGE, MT.DESCRIPTION, S.SUPPLIERNAME
																  FROM MEDICINE M JOIN REF_MEDICINETYPE MT
																					ON M.MEDICINETYPE = MT.MEDICINETYPE
																				  JOIN MEDICAL_SUPPLIERS MS
																					ON M.MEDICINEID = MS.MEDICINEID
																				  JOIN SUPPLIER S
																					ON MS.SUPPLIERID = S.SUPPLIERID;";
																						 
														$result = mysqli_query($dbc, $query);
														
														while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
														{
															echo "<tr>
																	<td>{$row['BRANDNAME']}</td>
																	<td>{$row['GENERICNAME']}</td>
																	<td>{$row['DOSAGE']}</td>
																	<td>{$row['DESCRIPTION']}</td>
																	<td>{$row['SUPPLIERNAME']}</td>
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
</script>
</body>
</html>
