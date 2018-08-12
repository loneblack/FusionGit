<?php
require_once("mysqlconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fusion IT Asset Management System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="layout/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="layout/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="layout/dataTables.bootstrap.min.css">
  <link href="layout/AssetsCssBootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="layout/AssetsCssFont-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="layout/AssetsCssStyle.css" rel="stylesheet" />

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
                            <li><a class="menu-top-active" href="helpdesk-home.html">Dashboard</a></li>
                            <li><a href="ticket.php">Tickets</a></li>
							<li><a href="#">Request</a>
								<ul>
								<li> <a href="assetRequest.php">Asset Request</a> </li>
								<li> <a href="testingRequest.php">Testing Request</a> </li>
								</ul>
							</li>
                            <li><a href="#">Agents</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Main content -->
	<body>
    <section class="content">
      <div class="row">
	    <div class="col-sm-5">
		  <div class="box box-primary" style="width : 1000px; padding-left: 100px" align="center">
			<div class="box-header">
			  <h3 class="box-title">Tickets</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <table id="example2" class="table table-bordered table-striped" style="font-size:12px">
				<thead>
				<tr>
				  <th>ID</th>
				  <th>status</th>
				  <th>Assignee</th>
				  <th>Creator</th>
				  <th>Updated</th>
				  <th>Created</th>
				  <th>Closed</th>
				  <th>Due</th>
				  <th>Priority</th>
				  <th>Summary</th>
				  <th>Description</th>
				</tr>
				</thead>
			  
			  		
					<!-- /.col -->
			  <tbody>
				<?php
						$query = " SELECT ticketID, status, assigneeUserID, creatorUserID,lastUpdateDate,dateCreated,dateClosed, dueDate, priority, summary, description FROM ticket;";
													
						$result = mysqli_query($dbc, $query);
						
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
						{
							
							$ticketgID = $row['ticketID'];
							
							echo "<tr>
									<td>{$row['ticketID']}</td>
									<td>{$row['status']}</td>
									<td>{$row['assigneeUserID']}</td>
									<td>{$row['creatorUserID']}</td>
									<td>{$row['lastUpdateDate']}</td>
									<td>{$row['dateCreated']}</td>
									<td>{$row['dateClosed']}</td>
									<td>{$row['dueDate']}</td>
									<td>{$row['priority']}</td>
									<td>{$row['summary']}</td>
									<td>{$row['description']}</td>
									</tr>";
							$arrayticket;
						}	
					?>
			</tbody>
			</table>
			<!-- /.box-body -->
			</div>
			  <!-- /.box -->
			</div>
			
			</div>
			
			 </div>
			 </section>
<!-- jQuery 3 -->
<script src="layout/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="layout/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="layout/jquery.dataTables.min.js"></script>
<script src="layout/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
</body>
</html>
