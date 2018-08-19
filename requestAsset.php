<?php require_once("mysqlconnect.php");
session_start();
$_SESSION['previousPage']="requestService.php";?>
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
                        <ul id="menu-top" class="nav navbar-nav navbar-left">
                            <li><a class="menu-top-active" href="notHome.html">Home</a></li>
							<li><a href="request.php">Request</a>
								<ul>
									<li> <a href="requestAsset.php">Asset Request</a> </li>
									<li> <a href="requestService.php">Service Request</a> </li>
								</ul>
							
							</li>
                        </ul>
						<ul class="nav navbar-nav navbar-right">
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
						<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>Register</a></li>
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
				<form method="POST" action="requestAssetDB.php">
					<h2 align="center">Your Request</h2>

						<div> <!--Name-->
						<b><font size="1" color="#332929"> Name *</font></b>
						<br>
						<input name="name" id="name" style="width: 350px;">
						</div><!--Name-->

						<div> <!--ID Number-->
						<b><font size="1" color="#332929"> ID Number *</font></b>
						<br>
						<input type="number" name="idNumber" id="idNumber" style="width: 350px;">
						</div><!--ID Number-->

						<div class="input-group"> <!-- Select Affiliation -->
							<b><font size="1" color="#332929">Select Affiliation *</font></b>
							<br>
							<select class="form-control" name="Affiliation" id="Affiliation" onchange="showOthers(this);" style="border-radius:5px">
								<option value='1'>Office</option>
								<option value='2'>Department</option>
								<option value='3'>School Organization</option>
							</select>
						</div>	<!-- Select Affiliation -->


						<div id="Office" style=""> <!--lable-->
						<b><font size="1" color="#332929">Office *</font></b>
							<br>
							<select name="officeID" id ="officeID" style="border-radius:5px; width: 350px; height: 35px;">
								<option value=''>Select</option>
								<?php
									$query="select * from Offices ORDER BY name;";
									$result=mysqli_query($dbc,$query);
									
									while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
									echo "<option value='{$row['officeID']}'>{$row['Name']}</option>";
									}
								?>
							</select>
						</div><!--lable-->

						<div id="Department" style="display: none;"> <!--lable-->
						<b><font size="1" color="#332929">Department *</font></b>
							<br>
							<select name="departmentID" id ="departmentID" style="border-radius:5px; width: 350px; height: 35px;">
								<option value=''>Select</option>
								<?php
									$query="select * from Department ORDER BY name;";
									$result=mysqli_query($dbc,$query);
									
									while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
									echo "<option value='{$row['DepartmentID']}'>{$row['name']}</option>";
									}
								?>
							</select>
						</div><!--lable-->

						<div id="SchoolOrg" style="display: none;"> <!--School Organization-->
						<b><font size="1" color="#332929">School Organization Name</font></b>
						<br>
						<input name="orgName" id="orgName" style="width: 350px;">
						</div><!--School Organization-->
					
						<div> <!--DLSU EMAIL ADDRESS-->
						<b><font size="1" color="#332929"> DLSU Email Address *</font></b>
						<br>
						<input type="email" name="email" id="email" style="width: 350px;">
						</div><!--DLSU EMAIL ADDRESS-->

						<div> <!--Contact Number-->
						<b><font size="1" color="#332929"> Contact Number *</font></b>
						<br>
						<input type="number" name="contactNo" id="contactNo" style="width: 350px;">
						</div><!--Contact Number-->
							
						<div> <!--Start Date-->
						<b><font size="1" color="#332929">Start Date *</font></b>
						<br>
						<input type="date" name="startDate">
						</div><!--Date -->

						<div> <!--End Date-->
						<b><font size="1" color="#332929">End Date *</font></b>
						<br>
						<input type="date" name="endDate">
						</div><!--End Date-->

						<div> <!--Description-->
						<b><font size="1" color="#332929">Purpose of using the Equipment *</font></b>
						<br>
						<textarea name="details" rows="2" cols="45"></textarea>
						</div><!--Description-->

						Equipment to be borrowed

						<div> <!--Contact Number-->
						<input type="number" name="laptop" id="laptop" min = 0 style="width: 30px;" value = 0>
						<b><font size="1" color="#332929"> unit/s Laptop</font></b>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="number" name="extension" id="extension" min = 0 style="width: 30px;" value = 0>
						<b><font size="1" color="#332929"> unit/s Extension Cord</font></b>
						</div><!--Contact Number-->

						<div> <!--Contact Number-->
						<input type="number" name="projector" id="projector" min = 0 style="width: 30px;" value = 0>
						<b><font size="1" color="#332929"> unit/s LCD Projector</font></b>
						<input type="number" name="vga" id="vga" min = 0 style="width: 30px;" value = 0>
						<b><font size="1" color="#332929"> pc/s VGA Cable</font></b>
						</div><!--Contact Number-->

						<div> <!--Contact Number-->
						<input type="number" name="number" id="number" min = 0 style="width: 30px;" value = 0>
						<b><font size="1" color="#332929"> unit/s</font></b>
						<input type="text" name="unit" id="unit" style="width: 200px;" >
						</div><!--Contact Number-->
						<br>

					<button align="center" type="input" class="btn btn-outline-secondary">Submit</button>
					</form>
			</div>
		</div>
	</body>
	
</html>

<script>
	  function showOthers(that) {
        if (that.value == "1") {
            document.getElementById("Office").style.display = "block";
            document.getElementById("Department").style.display = "none";
            document.getElementById("SchoolOrg").style.display = "none";
        }
        if (that.value == "2") {
            document.getElementById("Department").style.display = "block";
            document.getElementById("Office").style.display = "none";
            document.getElementById("SchoolOrg").style.display = "none";
        } 
        if (that.value == "3") {
            document.getElementById("SchoolOrg").style.display = "block";
            document.getElementById("Office").style.display = "none";
            document.getElementById("Department").style.display = "none";
        } 

    }
</script>