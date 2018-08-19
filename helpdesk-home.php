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
	
	<script>
		function getSelectValue()
		{
			var selectedValue = document.getElementById("list").value;
			if selectedValue == ticket
				{
					
				}
		}
	</script>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="helpdesk-home.php">Dashboard</a></li>
                            <li><a href="ticket.php">Tickets</a></li>
							<li><a href="#">Request</a>
								<ul>
								<li> <a href="assetRequest.php">Asset Request</a> </li>
								<li> <a href="testingRequest.php">Testing Request</a> </li>
								</ul>
							</li>
                            <li><a href="#">Agents</a></li>
							<li><a href="notHome.html">Logout</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
	<body>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Helpdesk Dashboard</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                     <div class="content-wrapper">
					 
        <div class="container">
            
            <div class="row">
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        
							<a href = "assetRequest.php"> 
							<?php
									
									$query = "SELECT COUNT(*) FROM request;";
									
									$result = mysqli_query($dbc, $query);
									
									$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
									$number = $row['COUNT(*)'];
									echo $number;
									
							?>
							</a>
						
                        <div class="progress progress-striped active">
							<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						</div>
                           
						</div>
                         <h5>New Requests for Assets </h5>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <a href = " testingRequest.php"> 
							<?php
									
									$query = "SELECT COUNT(*) FROM assettesting;";
									
									$result = mysqli_query($dbc, $query);
									
									$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
									$number = $row['COUNT(*)'];
									echo $number;
									
							?>
						</a>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
  </div>
                           
</div>
                         <h5>New Requests for Testing </h5>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                       <a href = "ticket.php">  
							<?php
									
									$query = "SELECT COUNT(*) FROM ticket;";
									
									$result = mysqli_query($dbc, $query);
									
									$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
									$number = $row['COUNT(*)'];
									echo $number;
									
							?>
							</a> </a>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
  </div>
                           
</div>
                         <h5>All tickets </h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-four">
                        <a href = "unassignedTicket.php"> 
						<?php
									
									$query = "SELECT COUNT(*) FROM ticket WHERE status = 1;";
									
									$result = mysqli_query($dbc, $query);
									
									$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
									$number = $row['COUNT(*)'];
									echo $number;
									
							?>
						</a>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
  </div>
                           
</div>
                         <h5>Unassigned tickets </h5>
                    </div>
                </div>

            </div>
           
            <div class="row">
                <div class="col-md-6">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           Unresolved tickets 
                                <div class="pull-right" >
                                </div>
                            </div>
                            <div class="panel-body">
                               
								<div class="unresolved-widget">
								  <div class="widget-title mb-10">
									<h5 class="pull-right">
								<a href="/a/dashboard/unresolved_tickets" id="ember2772" class="ember-view">        View details
								</a>    </h5>

									<h4 class="text--medium text--semibold text--dark m0"> 2 </h4>


								  </div>

									  <div class="result-table">
										<table class="table">
										  <thead>
											<tr class="table-row">
											  <th class="table-header-cell text--normal text--gray">Group</th>
											  <th class="table-header-cell text-right text--normal text--gray">Open</th>
											</tr>
										  </thead>
										  <tbody>
											  <tr class="table-row">
												<td class="table-cell text--semibold">Unassigned</td>
												<td class="table-cell text--gray text-right">2</td>
											  </tr>
										  </tbody>
										</table>
									  </div>
								</div>
                            </div>
                        </div>
                    </div>
                    <hr />
              
                     
                    <hr />
                    
                </div>
                <div class="col-md-6">
                
                 
                     
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
  



    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>


</body>
</html>