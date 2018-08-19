<?php
	require_once("mysqlconnect.php");
	session_start();
	$_SESSION['previousPage'] = "assetTesting.php"; 
?>


<!DOCTYPE html>
<html>
	<head>
		<title>TITLE</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
			<link href="layout/AssetsCssBootstrap.css" rel="stylesheet" />
		    <!-- FONT AWESOME ICONS  -->
		    <link href="layout/AssetsCssFont-awesome.css" rel="stylesheet" />
		    <!-- CUSTOM STYLE  -->
		    <link href="layout/AssetsCssStyle.css" rel="stylesheet" />

			<script src="layout/jquery.min.js"></script>
			
	</head>
<!-- NAVBAR START-->
	<!-- HEADER START-->
	<header>
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">
	                <strong>Email: </strong>fushion@dlsu.edu.com
	                &nbsp;&nbsp;
	                <strong>Support: </strong>+90-897-678-44
	                &nbsp;&nbsp;
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

	<body background="resource/green.jpg" style="background-attachment:fixed; background-repeat:no-repeat;">

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
						  <h3 class="box-title" style="">IT Hardware Assets</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
        <table id="example2" class="table table-bordered table-striped" style="font-size:12px">
        <thead>
        <tr>
          <th>Brand</th>
          <th>Asset Class</th>
          <th>Item Specification</th>
          <th>Quantity</th>
        </tr>
        </thead>
          <tbody>
            <?php

             $query = "SELECT ast.assetTypeID, (b.name) AS 'brandName', (ac.name) AS 'assetClassName', softwareName, description, itemSpecification, COUNT(ast.assetTypeID) AS 'quantity'
                  FROM thesis.assettype ast
                  JOIN ref_assetclass ac
                  ON ast.assetClass = ac.assetClassID
                  JOIN ref_brand b
                  ON ast.brand = b.brandID
                  JOIN asset a
                ON ast.assetTypeID = a.assetTypeID
                WHERE status != 6 AND status!= 7 AND status != 8 
                GROUP BY ast.assetTypeID;";
                          
            $result = mysqli_query($dbc, $query);
            
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
              $assetTypeID = $row['assetTypeID'];
             echo "<tr>
                  <td>{$row['brandName']}</td>
                  <td>{$row['assetClassName']}</td>
                  <td>{$row['itemSpecification']}</td>
                  <td>{$row['quantity']}</td>
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
					  <!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Select</button>

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
  })

</script>
</body>
</html>
