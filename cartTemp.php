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
											  <th style="display: none;">assetID</th>
											  <th>Asset Class</th>
											  <th>Brand</th>
											  <th>Property Code</th>
											  <th>Serial Number</th>
											  <th>MAC Address</th>
											  <th>Item Specification</th>
											  <th></th>
											</tr>
											</thead>
											<tbody id = "body" class = "body">
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
																<td class='nr' style='display: none'><input >{$row['assetID']}</td>
																<td>{$row['assetClass']}</td>
																<td>{$row['brand']}</td>
																<td>{$row['propertyCode']}</td>
																<td>{$row['serialNo']}</td>
																<td>{$row['macAddress']}</td>
																<td>{$row['itemSpecification']}</td>
																<td><button type='submit' class='addness' onClick=''>Add Asset</button></td>
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
									<div class="col-sm-6">
									  <div class="box box-primary">
										<div class="box-header">
										  <h3 class="box-title">Person List</h3>
										</div>
										<!-- /.box-header -->
										<div class="box-body">
										  <table class="table" style="background: #ffffff; margin: 0; padding: 0;">
									<tr>
									<td style="width: 90%">Asset Components</td>
									<td><button onClick="emptyList()">Empty List</button></td>
									</tr>
								  </table>

								  <table id="cart" class="table table-bordered table-striped">
									<thead>
									<tr>
									  <th style="display: none;">assetID</th>
									  <th>Asset Class</th>
									  <th>Brand</th>
									  <th>Property Code</th>
									  <th>Serial Number</th>
									  <th>MAC Address</th>
									  <th>Item Specification</th>
									  <th width="7%"></th>
									</tr>
									</thead>
									<tbody id="body" class="body">
											<?php
											if (isset($_SESSION['cart'])){
												for ($i =0; $i<count($_SESSION['cart']); $i++){

													$query = "SELECT A.assetID, AST.assetTypeID, A.propertyCode, A.serialNo, A.macAddress, AST.itemSpecification,
																(AC.name)AS 'assetClass', (B.name)AS 'brand'
																FROM thesis.asset A 
															JOIN assettype AST
																ON A.assetTypeID = AST.assetTypeID
															JOIN ref_assetclass AC
																ON	AST.assetClass = AC.assetClassID
															JOIN ref_brand B
																ON B.brandID = AST.brand
															WHERE A.assetID = '{$_SESSION['cart'][$i]}';";
																			
												$result = mysqli_query($dbc, $query);
												
													while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
													{	
														echo "<tr>
																<td name='assets[]' class = 'nr' style='display: none'>{$row['assetID']}</td>
																<td>{$row['assetClass']}</td>
																<td>{$row['brand']}</td>
																<td>{$row['propertyCode']}</td>
																<td>{$row['serialNo']}</td>
																<td>{$row['macAddress']}</td>
																<td>{$row['itemSpecification']}</td>
																<td>
																<div style='text-align: center;'>";

														echo "<button type='submit' class='buttoness' onClick=''>Remove Asset</button>";
																
														echo  "</div>
																</td>
															  </tr>";
													}
												}
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
							  <button type="submit" name ="submit" onClick="alertness()" class="btn btn-outline-secondary">Submit</button>
							</div>
							</form>
						  </div>
						  <!-- /.row -->
						</section>

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

$(".buttoness").click(function() {
    var item = $(this).closest('tr').children('td:first').text();         // Retrieves the text within <td>

	$.ajax({
        type:"POST",
        url:"cartRemoveItem.php",
        data: {item:item},
        success: function(data){
        	alert(data);
       				 }
    		})

});
$(".addness").click(function() {
    var item = $(this).closest('tr').children('td:first').text();         // Retrieves the text within <td>

	$.ajax({
        type:"POST",
        url:"cartSession.php",
        data: {item:item},
        success: function(data){
        	alert(data);
       				 }
    		})

});

function getData(ele) {

$('#body tr').each(function() {
    assets.push($(this).find("td:first").html());    

});

   }   

function alertness(){
	getData();
	alert(assets.join("\n"));
}
function emptyList(){
	getData();
    $.ajax({
        url:"cartEmptyList.php",
    		});
	}
</script>
</body>
</html>
