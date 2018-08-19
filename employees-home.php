<?php
session_start();
require_once("mysqlconnect.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Fusion IT Asset Management System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="layout/AssetsCssBootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="layout/AssetsCssFont-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="layout/AssetsCssStyle.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script src="http://www.designbootstrap.com/track/ga.js" ></script>

</head>
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
                            <li><a class="menu-top-active" href="employees-home.php">Dashboard</a></li>
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
    <!-- MENU SECTION END-->
	<body>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                     <div class="content-wrapper">
					 
        <div class="container">
            
                <div class="row">
                <div class="col-md-6">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            IT Assets 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                   
                                    <tbody>
                                        <tr>
                                            <td>Stocked</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="InStockTable.php">
											<?php
									
													$query = "SELECT COUNT(*) FROM asset WHERE status = 1;";
													
													$result = mysqli_query($dbc, $query);
													
													$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
													$number = $row['COUNT(*)'];
													echo $number;
													
											?>
											</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Deployed</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="DeployedTable.php">
											<?php
									
													$query = "SELECT COUNT(*) FROM asset WHERE status = 2;";
													
													$result = mysqli_query($dbc, $query);
													
													$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
													$number = $row['COUNT(*)'];
													echo $number;
													
											?>
											</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Moving</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="MovingTable.php">
											<?php
									
													$query = "SELECT COUNT(*) FROM asset WHERE status = 3;";
													
													$result = mysqli_query($dbc, $query);
													
													$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
													$number = $row['COUNT(*)'];
													echo $number;
													
											?>
											</a></td>
                                        </tr>
										 <tr>
                                            
                                            <td>In Testing</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="InTestingTable.php">
											<?php
									
													$query = "SELECT COUNT(*) FROM asset WHERE status = 4;";
													
													$result = mysqli_query($dbc, $query);
													
													$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
													$number = $row['COUNT(*)'];
													echo $number;
													
											?>
											</a></td>
                                        </tr>
										<tr>
                                            
                                            <td>In Repair</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="InRepairTable.php">
											<?php
									
													$query = "SELECT COUNT(*) FROM asset WHERE status = 5";
													
													$result = mysqli_query($dbc, $query);
													
													$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
													$number = $row['COUNT(*)'];
													echo $number;
													
											?>
											</a></td>
                                        </tr>
										<tr>
                                            
                                            <td>For Disposal</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="ForDisposalTable.php">
											<?php
									
													$query = "SELECT COUNT(*) FROM asset WHERE status = 6;";
													
													$result = mysqli_query($dbc, $query);
													
													$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
													$number = $row['COUNT(*)'];
													echo $number;
													
											?>
											</a></td>
                                        </tr>
										<tr>
                                            
                                            <td>Donated</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="DonatedTable.php">
											<?php
									
													$query = "SELECT COUNT(*) FROM asset WHERE status = 7;";
													
													$result = mysqli_query($dbc, $query);
													
													$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
													$number = $row['COUNT(*)'];
													echo $number;
													
											?>
											</a></td>
                                        </tr>
										<tr>
                                            
                                            <td>Diposed</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="DisposedTable.php">
											<?php
									
													$query = "SELECT COUNT(*) FROM asset WHERE status = 8;";
													
													$result = mysqli_query($dbc, $query);
													
													$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
													$number = $row['COUNT(*)'];
													echo $number;
													
											?>
											</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                     <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Assets Inventory
						   <br>
						   <a href = "Inventory.php"<button>View All Asset</button></a>
                        </div>
						
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                   
                                    <tbody>
										 <tr>
                                            <td>Workstations</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="#">0</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Printers</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="#">0</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Routers</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="#">0</a></td>
                                        </tr>
										 <tr>
                                            
                                            <td>Severs</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="#">0</a></td>
                                        </tr>
                                        <tr>
											<td>Projector</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="#">0</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Scanner</td>
                                            <td><a loadhash="true" p_tab="sdp.header.inventory" href ="#">0</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  -->
                </div>

            </div>
            <br>
			<br>
			<br>
            <div class="row">
                <div class="col-md-6">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           Expiring Software
                               
                            </div>
                            <div class="panel-body">
                               
                              <div class="table-responsive">          
							  <table class="table">
								<thead>
								  <tr>
									<th>Software</th>
									<th>Date</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td></td>
									<td></td>
								  </tr>
								</tbody>
							  </table>
							  </div>
							</div>
                            </div>
                          
                        </div>
                    </div>
                     <div class="table-responsive">
					 <div class="panel-heading">
                           Purchase order summary
                               
                            </div>
								<div class="panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ref. No.</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Delivery On </th>
                                            <th># #</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                            <td># 2501</td>
                                            <td>01/22/2015 </td>
                                            <td>
                                                <label class="label label-info">P300</label>
                                            </td>
                                            <td>
                                                <label class="label label-success">Delivered</label></td>
                                            <td>01/25/2015</td>
                                             <td> <a href="#"  class="btn btn-xs btn-danger"  >View</a> </td>
                                        </tr>
                                        <tr>
                                            <td># 15091</td>
                                            <td>12/12/2014 </td>
                                            <td>
                                                <label class="label label-danger">P7000 </label>
                                            </td>
                                            <td>
                                                <label class="label label-warning">Shipped</label></td>
                                            <td>N/A</td>
                                             <td> <a href="#"  class="btn btn-xs btn-success"  >View</a> </td>
                                        </tr>
                                        <tr>
                                            <td># 11291</td>
                                            <td>12/03/2014 </td>
                                            <td>
                                                <label class="label label-warning">P1000 </label>
                                            </td>
                                            <td>
                                                <label class="label label-success">Delivered</label></td>
                                            <td>01/23/2015</td>
                                             <td> <a href="#"  class="btn btn-xs btn-primary"  >View</a> </td>
                                        </tr>
                                        <tr>
                                            <td># 1808</td>
                                            <td>11/10/2014 </td>
                                            <td>
                                                <label class="label label-success">P2000 </label>
                                            </td>
                                            <td>
                                                <label class="label label-info">Returned</label></td>
                                            <td>N/A</td>
                                             <td> <a href="#"  class="btn btn-xs btn-danger"  >View</a> </td>
                                        </tr>
                                    </tbody>
                                </table>
								</div>
                            </div>
                </div>
                <div class="col-md-6">
                  
                    <hr />


    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>


</body>
</html>