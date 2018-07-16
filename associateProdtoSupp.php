
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Associate Product to Supplier</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href=bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PIS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PIS</b>CES</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>

                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Nigel Tan</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user.jpg" class="img-circle" alt="User Image">

                <p>
                  Nigel Tan - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../examples/login - Copy.html" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Nigel Tan</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
			<li><a href="../../index.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a></li>
			<li><a href="createMedicine.php"><i class="fa fa-medkit"></i> <span>Create Medicine</span> </a></li>
			<li><a href="createEditSupplier.php"><i class="fa fa-group"></i> <span>Create/Edit Supplier</span> </a></li>
			<li class="active"><a href="associateProdtoSupp.php"><i class="fa fa-exchange"></i> <span>Associate Product to Supplier</span> </a></li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-download"></i> <span>Receive Stocks</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="receiveOrderedItems.php"><i class="fa fa-circle-o"></i> Receive Ordered Items</a></li>
            <li><a href="receiveReplacement.php"><i class="fa fa-circle-o"></i> Receive Replacements</a></li>
          </ul>
        </li>
			<li><a href="inputDiscrepancy.php"><i class="fa fa-compress"></i> <span>Input Discrepancy</span> </a></li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Display Reports</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="salesReportInventory.php"><i class="fa fa-circle-o"></i> Sales Report</a></li>
            <li><a href="inventoryReportInventory.php"><i class="fa fa-circle-o"></i> Inventory Report</a></li>
          </ul>
        </li>
		<li><a href="../forms/supplierFeedbackInventory.php"><i class="fa fa-edit"></i> <span>Supplier Feedback</span> </a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Associate Product to Supplier
        <small>Association panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../index.html"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Associate Product to Supplier</li>
      </ol>
    </section>

    <!-- Main content -->
          
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#assocprodtosupp" data-toggle="tab">Associate Prod to Supp</a></li>
              <li><a href="#assoctbl" data-toggle="tab">Association Table</a></li>
            </ul>
            <div class="tab-content">
			  <div class="tab-pane active" id="assocprodtosupp">
			      <section class="content">
					  <div class="row">
					    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="col-sm-6">
						  <div class="box box-primary">
							<div class="box-header">
							  <h3 class="box-title">Medicine List</h3>
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
										$query = "SELECT M.MEDICINEID, M.BRANDNAME, M.GENERICNAME, M.DOSAGE, MT.DESCRIPTION
												  FROM MEDICINE M JOIN REF_MEDICINETYPE MT
																	ON M.MEDICINETYPE = MT.MEDICINETYPE;";
																	
										$result = mysqli_query($dbc, $query);
										
										while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
										{
											echo "<tr>
													<td><div style='text-align: center;'><input type='checkbox' class='checkbox' name='medicines[]' value='{$row['MEDICINEID']}' style='width: 2rem; height: 2rem;'></div></td>
													<td>{$row['BRANDNAME']}</td>
													<td>{$row['GENERICNAME']}</td>
													<td>{$row['DOSAGE']}</td>
													<td>{$row['DESCRIPTION']}</td>
												  </tr>";
										}
									?>
								</tbody>
								<tfoot>
								<tr>
								  <th></th>
								  <th>Brand name</th>
								  <th>Generic name</th>
								  <th>Dosage</th>
								  <th>Medicine type</th>
								</tr>
								</tfoot>
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
							  <h3 class="box-title">Supplier List</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
							  <table id="example3" class="table table-bordered table-striped">
								<thead>
								<tr>
								  <th></th>
								  <th>Supplier name</th>
								  <th>Address</th>
								</tr>
								</thead>
								<tbody>
								<?php
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
										}
									?>
								</tbody>
								<tfoot>
								<tr>
								  <th></th>
								  <th>Supplier name</th>
								  <th>Address</th>
								</tr>
								</tfoot>
							  </table>
							</div>
							<!-- /.box-body -->
						  </div>
						  <!-- /.box -->
						</div>
						<!-- /.col -->
						<div class="col-sm-12">
						  <hr>
						  <button type="submit" class="btn btn-primary">Submit</button>
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
								<tfoot>
								<tr>
								  <th>Brand name</th>
								  <th>Generic name</th>
								  <th>Dosage</th>
								  <th>Medicine type</th>
								  <th>Supplier</th>
								</tr>
								</tfoot>
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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
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
