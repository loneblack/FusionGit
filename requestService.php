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
				<form method="POST" action="requestServiceDB.php">
					<h2 align="center">Your Request</h2>

						<div class="input-group"> <!-- Service Type -->
							<b><font size="1" color="#332929"> Select Service Type *</font></b>
							<br>
							<select class="form-control" name="serviceType" id="serviceType" onchange="showOthers(this);" style="border-radius:5px" required>
								<option value="">None</option>
								<?php
									$query="SELECT * FROM thesis.ref_servicetype LIMIT 25;";
									$result=mysqli_query($dbc,$query);
									
									while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
									echo "<option value='{$row['id']}'>{$row['serviceType']}</option>";
									}
								?>
							</select>
						</div>	<!-- Service Type -->

						<div id="others" style="display: none;"> <!--Others (If Service Type not applicable)-->
						<b><font size="1" color="#332929">Indicate Others (If Service Type not applicable)</font></b>
						<br>
						<input name="other" id="other" style="width: 350px;" required>
						</div><!--Others (If Service Type not applicable)-->
					
						<div> <!--Description-->
						<b><font size="1" color="#332929">Details of Request</font></b>
						<br>
						<textarea name="details" rows="5" cols="45" required></textarea>
						</div><!--Description-->
							
						<div> <!--Date Needed-->
						<b><font size="1" color="#332929">Date Needed</font></b>
						<br>
						<input type="date" name="dateNeeded" required>
						</div><!--Date Needed-->

						<div> <!--End Date-->
						<b><font size="1" color="#332929">End Date</font></b>
						<br>
						<input type="date" name="endDate" required>
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