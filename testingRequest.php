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
	<!-- Ionicons -->
	<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="layout/dataTables.bootstrap.min.css">
	<link href="layout/AssetsCssBootstrap.css" rel="stylesheet" />
	<!-- FONT AWESOME ICONS  -->
	<link href="layout/AssetsCssFont-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLE  -->
	<link href="layout/AssetsCssStyle.css" rel="stylesheet" />

	<!-- Time picker source -->
	<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
	<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>

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
                            <li><a class="menu-top-active" href="employees-home.html">Dashboard</a></li>
                            <li><a href="#">Add</a>
                                <ul>
                                <li> <a href="addAsset.html">Add Asset</a> </li>
                                <li> <a href="assignRoomToDepartment.html">Assign Room</a> </li>
                                <li> <a href="addEmployee.html">Add Employee</a> </li>
                                <li> <a href="addSoftware.html">Add Software</a> </li>
                                </ul>
                            </li>
                            <li><a href="DataTables.html">Data Tables</a></li>
                            <li><a href="#">Forms</a></li>
                             <li><a href="login.html">Login Page</a></li>
                            <li><a href="#">Blank Page</a></li>

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

        <form action="" method="post">
            
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
                <div class="ui-wrapper" style="overflow: hidden; position: relative; width: 600px; height: 100px; top: auto; left: auto; margin: 0px; padding-bottom: 14px;">
                  <textarea id="ticket_description_" name="ticket[description]" style="margin: 0px; resize: none; position: static; zoom: 1; display: block; height: 100px; width: 560px;">         
                  </textarea>
                </div>
              </div>
            </div>
            <!-- Description  -->
            <br>
            <!-- Assigned to  -->
            <div class="control-group">
              <label>Assigned to</label>
              <div class="controls">
                <select id="assigned_to" name="assigned_to">
                	<option value="0">Unassigned</option>
                	<?php
                    $query="select * from employee ORDER BY name;";
                    $result=mysqli_query($dbc,$query);
                    
                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    echo "<option value='{$row['employeeID']}'>{$row['name']}</option>";
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
                <input type="time" id="time">
              </div>
            </div>
            <!-- Due Time  -->
            <br>
            <!-- Priority  -->
            <div class="control-group">
              <label>Priority</label>
                <select id="priority" name="priority" >
                  <option value="1">High</option>
                  <option value="2" selected="selected">Medium</option>
                  <option value="3">Low</option>
                </select>
            </div>
            <!-- Priority  -->
            <br>

          <div class="modal-footer">
            <button type="submit" type="submit">Save</button>
            <button >Cancel</button>
          </div>
        </form>
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
			<div class="box-header">
			  <h3 class="box-title">Testing Request</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <table id="example2" class="table table-bordered table-striped"  style="font-size:12px">
				<thead>
					<tr>
					  <th></th>
					  <th>RPSM/SRF Number</th>
					  <th>User Name</th>
					  <th>Office</th>
					  <th>Building</th>
					  <th>Room Number</th>				  
					  <th></th>
					</tr>
				</thead>
				<tbody>				
					<?php
					require_once("mysqlconnect.php");
						$link_address = 'createTicket.php';
						$query = "	SELECT testingID, (E.name)AS'employeeName', F.floorRoom, (o.name)AS 'Office', (b.name)as'Building'FROM thesis.assettesting AST 
									join employee E 
									on AST.PersonRequestedID = E.employeeID
									join FloorAndRoom f
									on AST.FloorAndRoomID = f.FloorAndRoomID
									join offices o
									on AST.officeID = o.officeID
									join building b
									on  f.BuildingID = b.BuildingID;";
													
						$result = mysqli_query($dbc, $query);
						
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
						{
							
							$testingID = $row['testingID'];
							
							echo "<tr>
									
									<td <a class='showhr'><button>Expand/Collapses</button></a></td>
									<td>number</td>
									<td>{$row['employeeName']}</td>
									<td>{$row['Office']}</td>
									<td>{$row['Building']}</td>
									<td> {$row['floorRoom']}</td>
									<td><button onClick='modalness();'>New Ticket</button></td>
									</tr>";
								
								$query2 = "SELECT (assettesting_testingID) as 'testingID',
											assetID, propertyCode, serialNo, macAddress, itemSpecification,
											(b.name) as 'brandName', (ac.name)as'assetClass' 
											FROM thesis.asset a 
											join assettype at 
											on a.assetTypeID = at.assetTypeID 
											join ref_brand b 
											on at.brand = b.brandId 
											join ref_assetclass ac 
											on at.assetClass = ac.assetClassID 
											join assettesting_details ad 
											on a.assetID = ad.asset_assetID
											where ad.assettesting_testingID = {$testingID};";

								$result2 = mysqli_query($dbc, $query2);
								
									echo "	<tr class = 'invi' id= 'invi' style='display:none' >
											<tr>
											  <th style='display: none'></th>
											  <th>Property Code</th>
											  <th>Serial Number</th>
											  <th>MAC Address</th>
											  <th>Asset Class</th>
											  <th>Brand Name</th>
											  <th>Item Specification</th>
											  <td></td>
											</tr>
											<tr>";
											
								while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC))
								{
											
									echo "	<tr class = 'invi' id= 'invi' style='display:none' >
											<tr>
											<td style='display: none'>{$row['assetID']}</td>
											<td> {$row['propertyCode']}</td>
											<td> {$row['serialNo']}</td>
											<td> {$row['macAddress']}</td>
											<td>{$row['assetClass']}</td>
											<td>{$row['brandName']}</td>
											<td>{$row['itemSpecification']}</td>
											<td></td>
											</tr>
											</tr>";
								}
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
		
		<div id="b1" class="containerTab" style="display:none;background:white">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
		<h2>Items Testing</h2>
        <table id="example2" class="table table-bordered table-striped"  style="font-size:12px; color:black">
				<tr>
				  <th>Item specification</th>
				  <th>ProperSASDASDASDSty Code</th>
				  <th>Serial Number</th>
				  <th>MAC Address</th>
				</tr>
				<tr>
				  <td>Solid Computer</td>
				  <td>AB1234</td>
				  <td>12768405</td>
				  <td>10.00.44.55</td>
				 </tr>
			  </table>
</div>
	  
</body>


<!-- jQuery 3 -->
<script src="layout/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="layout/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(".showhr").click(function() {
    $(this).closest('tr').nextUntil("tr:has(.showhr)").toggle("slow", function() {});
    //$(this).getElementByClassName("showhr").toggle("slow", function() {});
});

  var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});
timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});

</script>


<script>
function openTab(tabName) {
  var i, x;
  x = document.getElementsByClassName("containerTab");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}

function modalness(){

$('#Modal').modal('show');

}
</script>
</html>
