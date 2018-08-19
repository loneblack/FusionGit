<?php
session_start();
$_SESSION['previousPage'] = "serviceRequest.php";
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
	<!-- Font Awesome -->
	<link rel="stylesheet" href="layout/font-awesome.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="layout/dataTables.bootstrap.min.css">
	<link href="layout/AssetsCssBootstrap.css" rel="stylesheet" />
	<!-- FONT AWESOME ICONS  -->
	<link href="layout/AssetsCssFont-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLE  -->
	<link href="layout/AssetsCssStyle.css" rel="stylesheet" />

	<!-- Time picker source -->
	<script src="layout/timepicker.min.js"></script>
	<link href="layout/timepicker.min.css" rel="stylesheet"/>

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
                            <li><a class="menu-top-active" href="helpdesk-home.php">Dashboard</a></li>
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
    <!-- NAVBAR CONTENT END-->
<!-- NAVBAR END-->

<!-- Modal -->
	<div id="Modal" name ="Modal"class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Create a new Ticket</h4>
	      </div>
	      <div class="modal-body">

        <form action="serviceRequestDB.php" method="post">         
            <!-- Summary  -->
            <div class="control-group">
              <label>Summary</label>
              <div class="controls">
                <input id="summary"  name="summary" size=75" type="text">
              </div>
            </div>
            <!-- Summary  -->
            <br>
            <!-- Description  -->
            <div class="control-group">
              <label>Description</label>
              <div class="controls">
                  <textarea id="description" name="description" style="resize: none; height: 100px; width: 560px;"></textarea>
              </div>
            </div>
            <!-- Description  -->
            <br>
            <!-- Assigned to  -->
            <div class="control-group">
              <label>Assigned to</label>
              <div class="controls">
                <select id="assigned_to" name="assigned_to">
                	<option value=0>Unassigned</option>
                	<?php
                    $query="SELECT userID, userType, (CONVERT(aes_decrypt(username, 'Fusion') using utf8)) AS 'userName',(convert(aes_decrypt(firstName, 'Fusion') using utf8)) AS 'firstName' ,(convert(aes_decrypt(lastName, 'Fusion')using utf8)) AS 'lastName' FROM user;";
                    $result=mysqli_query($dbc,$query);
                    
                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    echo "<option value='{$row['userID']}'>{$row['firstName']} {$row['lastName']}</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <!-- Assigned to  -->
            <br>
            <!-- Due Date  -->
            <div class="control-group">
              <label >Due Date</label>
              <div class="controls">
                  <input type="date" id="due_date" name ="due_date">
              </div>
            </div>
            <!-- Due Date  -->
            <br>
            <!-- Due Time  -->
            <div class="control-group">
              <label>Due Time</label>
              <div class="controls">
                <input type="time" id="duetime" name="duetime">
              </div>
             </div>
            <!-- Due Time  -->
            <br>
            <!-- Priority  -->
            <div class="control-group">
              <label>Priority</label>
                <select id="priority" name="priority" >
                  <option value="High">High</option>
                  <option value="Medium" selected="selected">Medium</option>
                  <option value="Low">Low</option>
                </select>
            </div>
            <!-- Priority  -->
            <br>
            <div class="control-group">
			<label>Add testing Requests</label>
			<select name="testingID" style="border-radius:5px; height:25px; width:153px" required>
				<option>Select Request</option>
				<?php
				$query = "SELECT testingID, (E.name)AS'employeeName', F.floorRoom, (o.name)AS 'Office', (b.name)as'Building', remarks, rpsmsrf FROM thesis.assettesting AST 
						join employee E 
						on AST.PersonRequestedID = E.employeeID
						join FloorAndRoom f
						on AST.FloorAndRoomID = f.FloorAndRoomID
						join offices o
						on AST.officeID = o.officeID
						join building b
						on  f.BuildingID = b.BuildingID
						WHERE statusID = 10;";
					$result=mysqli_query($dbc,$query);
					
					while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					echo "<option value='{$row['testingID']}'>{$row['rpsmsrf']} {$row['Building']} {$row['floorRoom']} {$row['remarks']}</option>";
					}
				?> 
			</select>
			</div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-default" type="submit">Save</button>        
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         </div>
      </div>
    </div>
  <!-- Modal content-->
  </div>
</div>
<!-- Modal-->

    <!-- Main content -->	  
	<body>
    <section class="content">
      <div class="row">
	    <div class="col-sm-5">
		  <div class="box box-primary" style="width : 1000px; padding-left: 100px" align="center">
			<div class="box-header" 	>
			  <h3 class="box-title" >Service Request</h3>
				<!-- Modal trigger -->
				<div align="right" style="padding-bottom: 20px;">
				<button type='button' style='display:inline;' class='btn btn-secondary' data-toggle='modal' data-target='#Modal'><font size='1'>Create Ticket</font></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <table id="example2" class="table table-bordered table-striped"  style="font-size:12px">
				<thead>
					<tr>
					  <th>Service Type</th>
					  <th>Details</th>
					  <th>Date Needed</th>
					  <th>End Date</th>
					  <th>Requestor</th>
					</tr>
				</thead>
				<tbody>				
					<?php
						$query = "SELECT s.id, st.serviceType, details, dateNeed, endDate, e.employeeID, UserID, others, status, name 
								FROM thesis.service s join employee E 
								on s.employeeID = E.employeeID
								join ref_servicetype st
								on st.id = s.serviceType
								WHERE status = 10;";
													
						$result = mysqli_query($dbc, $query);
						
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
						{

							
							echo "<tr>
									<td>{$row['serviceType']}</td>
									<td>{$row['details']}</td>
									<td>{$row['dateNeed']}</td>
									<td>{$row['endDate']}</td>
									<td>{$row['name']}</td>
									</tr>";
						}
					?>
				</tbody>
			  </table>
			</div>
			<button class="btn btn-default spec-next-state-btn js-next-ticket-state" data-ember-action="1584">
                  Close
                </button>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
			</div>
			<!-- /.col -->				
		</div>
	</section>	  
</body>


<!-- jQuery 3 -->
<script src="layout/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="layout/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="layout/jquery.dataTables.min.js"></script>
<script src="layout/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->

<script>

$(".invi").nextUntil("tr:has(.showhr)").toggle();
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

<script src="layout/jquery.min.js"></script>

<script>
function openTab(tabName) {
  var i, x;
  x = document.getElementsByClassName("containerTab");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}

</script>
</html>
