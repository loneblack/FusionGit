<?php require_once("mysqlconnect.php");?>
<html>
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Add Employee</title>
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

	<script src="layout/jquery.min.js"></script>
	<script src="layout/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="layout/moment.min.js"></script>
	<script type="text/javascript" src="layout/daterangepicker.min.js"></script>

</head>
	
	<body>						
		<header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>info@yourdomain.com
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
                           <li><a class="menu-top-active" href="employees-home.html">Dashboard</a></li>
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
		
		<div style="padding-top:20px; padding-bottom: 20px;">
			<div align="center" margin="auto" class="container" style="background-color:#73CD6F; width:300px; padding-bottom:10px; border-radius: 25px; border: solid white">
				<div class="input-group" style="padding-bottom:15px;">
					<form method="POST" action="addEmployeeDB.php">
						<h2 color="#332929">Add Employee</h2>
						
						<div style="padding-left:17px">
							<div>
								<b><font size="1" color="#332929">Department *</font></b>
								<br>
								<select style="border-radius:5px; width:150px" name="department">
								<option value=''>Select a Department</option>
									<?php
										$query="select * from department ORDER BY name;";
										$result=mysqli_query($dbc,$query);
										
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
										echo "<option value='{$row['DepartmentID']}'>{$row['name']}</option>";
										}
									?>
								</select>
							</div>
							<br>
							<div>
								<b><font size="1" color="#332929">Name *</font></b>
								<br>
								<input style="border-radius:5px" type="text" name="name" placeholder="Name" required>
							</div>
							<br>
							<div>
								<b><font size="1" color="#332929">Position *</font></b>
								<br>
								<input style="border-radius:5px" type="text" name="position" placeholder="Position" required>
							</div>
							<br>
							<div>
								<b><font size="1" color="#332929">Number *</font></b>
								<br>
								<input style="border-radius:5px" type="text" name="contactNumber" placeholder="Contact Number" required>
							</div>
							<br>
							<div>
								<b><font size="1" color="#332929">Email *</font></b>
								<br>
								<input style="border-radius:5px" type="email" name="email" placeholder="Email" required>
							</div>
						</div>
					</div>
							<button style="border-radius:5px" type="submit" name ="submit" class="btn btn-outline-secondary">Submit</button>
						</form>
				</div>
			</div>
		</div>
	</body>
</html>