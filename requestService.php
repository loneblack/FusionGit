<?php require_once("mysqlconnect.php");
session_start();
$_SESSION['previousPage']="request.php";?>
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
		<div style="padding-top:20px; padding-bottom: 20px;">
			<div align="center" margin="auto" class="container" style="background-color:#73CD6F; width:400px; padding-bottom:8px; padding-top:10px; border-radius: 25px; border: solid white">
				<div class="input-group">
				<form method="POST" action="requestServiceDB.php">
					<h2 align="center">Your Request</h2>

						<div class="input-group"> <!-- Service Type -->
							<b><font size="1" color="#332929">Service Type *</font></b>
							<br>
							<select class="form-control" name="serviceType" id="serviceType" onchange="showOthers(this);" style="border-radius:5px">
								<option value=''>Select</option>
								<?php
									$query="SELECT * FROM thesis.ref_servicetype;";
									$result=mysqli_query($dbc,$query);
									
									while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
									echo "<option value='{$row['id']}'>{$row['serviceType']}</option>";
									}
								?>
							</select>
						</div>	<!-- Service Type -->

						<div id="others" style="display: none;"> <!--Others (If Service Type not applicable)-->
						<b><font size="1" color="#332929">Indicate Others (If Service Type not applicable) *</font></b>
						<br>
						<input name="other" id="other">
						</div><!--Others (If Service Type not applicable)-->
					
						<div> <!--Description-->
						<b><font size="1" color="#332929">Details of Request *</font></b>
						<br>
						<textarea name="details" rows="5" cols="45"></textarea>
						</div><!--Description-->
							
						<div> <!--Date Needed-->
						<b><font size="1" color="#332929">Date Needed *</font></b>
						<br>
						<input type="date" name="dateNeeded">
						</div><!--Date Needed-->

						<div> <!--End Date-->
						<b><font size="1" color="#332929">End Date *</font></b>
						<br>
						<input type="date" name="endDate">
						</div><!--End Date-->

						<br>
					<button align="center" type="input" class="btn btn-outline-secondary">Submit</button>
					</form>
			</div>
		</div>
	</body>
	
</html>

<script>
  function showOthers(that) {
        if (that.value == "25") {
            document.getElementById("others").style.display = "block";
        } else {
            document.getElementById("others").style.display = "none";
        }
    }
</script>