<?php require_once("mysqlconnect.php");?>
<html>
	<head> 
		<title>Add Employee</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="icon" type="image/png" href="resource/dlsulogo.png" />
			<script src="layout/jquery.min.js"></script>
			<link rel="stylesheet" href="layout/bootstrap.min.css">
			<script src="layout/bootstrap.min.js"></script>
			
			<style>
			/* Remove the navbar's default margin-bottom and rounded borders */ 
			.navbar {
			  margin-bottom: 0;
			  border-radius: 0;
			}

			/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
			.row.content {height: 450px}

			/* Set gray background color and 100% height */
			.sidenav {
			  padding-top: 20px;
			  background-color: #f1f1f1;
			  height: 100%;
			}

			/* Set black background color, white text and some padding */
			footer {
			  background-color: #555;
			  color: white;
			  padding: 15px;
			}

			/* On small screens, set height to 'auto' for sidenav and grid */
			@media screen and (max-width: 767px) {
			  .sidenav {
				height: auto;
				padding: 15px;
			  }
			  .row.content {height:auto;} 
			}
			
			.{
				font-size: 16px;
				color:#332929;
			}
			
			</style>
	</head>
	
	<body background="resource/green.jpg" style="background-attachment:fixed; background-repeat:no-repeat;">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header" style="padding-top: 6px">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
				<a class="img-fluid" href="home.html"><img align="middle" src="resource/logo.png"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="home.html">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Projects</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="login.php"><span></span>Login</a></li>
						<li><a href="signup.php"><span></span>Register</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div style="padding-top:20px; padding-bottom: 20px;">
			<div align="center" margin="auto" class="container" style="background-color:#73CD6F; width:300px; padding-bottom:10px; border-radius: 25px; border: solid white">
				<div class="input-group" style="padding-bottom:15px;>
					<form method="POST" action="addEmployeeDB.php">
						<h2 color="#332929">Add Employee</h2>
						
						<div style="padding-left:10px">
							<div>
								<b><font size="1" color="#332929">Department *</font></b>
								<br>
								<select style="border-radius:5px" name="department">
								<option value=''>Select a Department</option>
									<?php
										$query="select * from building ORDER BY name;";
										$result=mysqli_query($dbc,$query);
										
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
										echo "<option value='{$row['BuildingID']}'>{$row['name']}</option>";
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