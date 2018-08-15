<?php
session_start();
require_once("mysqlconnect.php");
$_SESSION['previousPage'] = "ticket.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fusion IT Asset Management System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

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
				  <th>Summary</th>
				  <th>Assignee</th>
				  <th>Creator</th>
				  <th>Priority</th>
				  <th>Due</th>
				  <th>Updated</th>
				  <th>Status</th>
          <th></th>
				</tr>
				</thead>
				  <tbody>
            <?php
            $count = 1;

            $query = "SELECT t.ticketID, (convert(aes_decrypt(au.firstName, 'Fusion') using utf8)) AS 'afirstName' ,(convert(aes_decrypt(au.lastName, 'Fusion')using utf8)) AS 'alastName',
                      (convert(aes_decrypt(cu.firstName, 'Fusion') using utf8)) AS 'cfirstName' ,(convert(aes_decrypt(cu.lastName, 'Fusion')using utf8)) AS 'clastName',
                      lastUpdateDate, dateCreated, dateClosed, dueDate, priority,summary, t.description, s.status FROM thesis.ticket t
                      JOIN ref_ticketstatus s
                        ON t.status = s.ticketID
                      LEFT JOIN user au
                        ON t.assigneeUserID = au.UserID
                      JOIN user cu
                        ON t.creatorUserID = cu.UserID;";
                          
            $result = mysqli_query($dbc, $query);
            
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
              
              echo "<tr data-details='t{$count}' class='tickets'>
                  <td>{$row['ticketID']}</td>
                  <td>{$row['summary']}</td>
                  <td>{$row['afirstName']} {$row['alastName']}</td>
                  <td>{$row['cfirstName']} {$row['clastName']}</td>
                  <td>{$row['priority']}</td>
                  <td>{$row['dueDate']}</td>
                  <td>{$row['lastUpdateDate']}</td>
                  <td>{$row['status']}</td>
                  <td><button class='viewTicket'>View Ticket</button></td>
                  </tr>";

                  $count++;
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
					
  <!-- Modal -->
  <div id="viewTicketModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ticket Details</h4>
        </div>
        <form action="ticketDetailsDB.php">
        <div class="modal-body" id='modal-body'>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-default">Save</button>
        </div>
      </form>
      </div>

    </div>
  </div>
  <!-- /.Modal -->

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

  $(".viewTicket").click(function() {
    var ticketID = $(this).closest('tr').children('td:first').text();// Retrieves the text within <td>

  $.ajax({
        type:"POST",
        url:"ticketDetails.php",
        data: {ticketID:ticketID},
        success: function(data){
          $("#modal-body").html(data);
          $("#viewTicketModal").modal();
               }
        })

});
</script>
</body>
</html>
