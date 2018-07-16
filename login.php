<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="icon" type="image/png" href="resource/dlsulogo.png" />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
			
			</style>
	</head>

	<!-- Modal -->
<div id="failModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Error</h4>
      </div>
      <div class="modal-body">
        <p><?php echo $_SESSION["Lmessage"];?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<body background="resource/green.jpg" style="background-attachment:fixed; background-repeat:no-repeat;">
	<nav class="navbar navbar-inverse">
			<div class="container-fluid">
			<div class="navbar-header">
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
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
					<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>Register</a></li>
				</ul>
			</div>
		  </div>
		</nav>

	<div style="padding-top:20px; padding-bottom: 20px;">
		<div align="center" margin="auto" class="container" style="background-color:#73CD6F; width:300px; padding-bottom:5px; border-radius: 25px; border: solid white">
   
			<form method="post" action="loginAuthenticate.php">
				<h2 color="#332929">Login</h2>
				<div class="input-group">
				  <b><font size="1" color="#332929">Username</font></b>
				  <br>
				  <input type="text" name="username" >
				</div>
				<div class="input-group">
				  <b><font size="1" color="332929">Password</font></b>
				  <br>
				  <input type="password" name="password">
				</div>
				<br>
				<div class="input-group">
				  <button type="submit" class="btn" name="login_user">Login</button>
				</div>
				 <?php if(isset($_SESSION["Lmessage"])){ 

				   echo "<script>$('#failModal').modal('show')</script>"; // Show modal

				  unset($_SESSION["Lmessage"]);
					}
				  ?>
			</form>
		</div>
	</div>
</body>
</html>