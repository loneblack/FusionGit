<?php session_start();  //unset($_SESSION["message"]);?>
<html>
	<head>
		<title>Registration</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="resource/dlsulogo.png" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			  <link href="layout/AssetsCssBootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="layout/AssetsCssFont-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="layout/AssetsCssStyle.css" rel="stylesheet" />
	</head>
	
	</head>
	<body background="resource/green.jpg" style="background-attachment:fixed; background-repeat:no-repeat;">	
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
<section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-left">
                            <li><a class="menu-top-active" href="notHome.html">Home</a></li>
							<li><a href="request.php">Request</a></li>
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
	
		<div style="padding-top:20px; padding-bottom: 20px;">
			<div margin="auto" class="container" style="background-color:#73CD6F; width:270px; padding-bottom:5px; border-radius: 25px; border: solid white">
			
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<h2 color="#332929" align="center">Register</h2>
					<div style="padding-left:40px">
							<b><font size="1" color="#332929" align="left">First Name</font></b>
						<br>
						<input type="text" name="fname" placeholder="First Name" style="border-radius:5px" required>
					</div>
					<br>
					<div style="padding-left:40px">
						<b><font size="1" color="#332929" align="left">Last Name</font></b>
						<br>
						<input type="text" name="lname" placeholder="Last Name" style="border-radius:5px" required>
					</div>
					<br>
					<div style="padding-left:40px">
						<b><font size="1" color="#332929" align="left">Email</font></b>
						<br>
						<input type="email" name="email" placeholder="Email" style="border-radius:5px" required>
					</div>
					<br>
					<div style="padding-left:40px">
						<b><font size="1" color="#332929" align="left">Number</font></b>
						<br>
						<input type="number" name="number" placeholder="Contact Number"  min = "0" max="99999999999" step="0" style="border-radius:5px" required>
					</div>
					<br>
					<div style="padding-left:40px">
						<b><font size="1" color="#332929" align="left">Username</font></b>
						<br>
						<input type="text" name="username" placeholder="User Name" style="border-radius:5px" required>
					</div>
					<br>
					<div style="padding-left:40px">
						<b><font size="1" color="#332929" align="left">Password</font></b>
						<br>
						<input type="password" name="password" placeholder="Password" style="border-radius:5px" required>
					</div>
					<br>
					<div style="padding-left:40px">
						<b><font size="1" color="#332929" align="left">Confirm Password</font></b>
						<br>
						<input type="password" name="cpassword" placeholder="Confirm Password" style="border-radius:5px" required>
					</div>
					<br>
					<div style="padding-left:40px">
						<b><font size="1" color="#332929" align="left">User type:</font></b>
						<br>
						<select name="userType" style="border-radius:5px; width:150px">
							<option value="0">Select User Type</option>
							<option value="1">Administrator</option>
							<option value="2">Asset Manager</option>
							<option value="3">Helpdesk</option>
						</select>
					</div>
					<br>
					<div style="padding-left:75px">
						<button style="padding-bottom: 7px" type="submit" name ="submit" align="center" class="btn btn-outline-secondary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>


<!-- Modal -->
<div id="successModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Success</h4>
      </div>
      <div class="modal-body">
        <p>From Submitted</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php

  require_once("mysqlconnect.php");

  $key = "Fusion";

  $passwordCheck = false;
  $userCheck = true;

if(isset($_POST['submit'])){

$_SESSION["message"]="";
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $userType = $_POST['userType'];
  $firstName = $_POST['fname'];
  $lastName = $_POST['lname'];
  $email = $_POST['email'];
  $contactNumber = $_POST['number'];

  if($pass != $cpass){
    $_SESSION["message"] .= "Passwords do not match. ";
  }

  if($_POST['userType'] == "0")$_SESSION["message"] .= "Please select a usertype. ";

  $checkQuery1 = "SELECT CONVERT(AES_DECRYPT(userName, '{$key}') USING utf8) FROM user WHERE username = AES_ENCRYPT('{$username}', '{$key}');";

  $checkResult1 = mysqli_query($dbc, $checkQuery1);

  if ($checkResult1->num_rows > 0)$_SESSION["message"] .= "Username already exists. ";
  
  $checkQuery2 = "SELECT CONVERT(AES_DECRYPT(email, '{$key}') USING utf8) FROM user WHERE email = AES_ENCRYPT('{$email}', '{$key}');";

  $checkResult2 = mysqli_query($dbc, $checkQuery2);

  if ($checkResult2->num_rows > 0)$_SESSION["message"] .= "Email already exists. ";

  if(($_SESSION["message"])==""){
    
    //SELECT  CONVERT(userName USING utf8) FROM bankdb.user;
    
    //Inserting onto Table
    $insertQuery = "INSERT INTO User(userName, password, userType, firstName, lastName, email, contactNo) VALUES 
    ( AES_ENCRYPT('{$username}', '{$key}'), AES_ENCRYPT('{$password}', '$key'), '{$userType}', AES_ENCRYPT('{$firstName}', '{$key}'), AES_ENCRYPT('{$lastName}', '{$key}'), AES_ENCRYPT('{$email}', '{$key}'), AES_ENCRYPT('{$contactNumber}', '{$key}'));";
    
    
    $insertResult = mysqli_query($dbc, $insertQuery);

     echo "<script>$('#successModal').modal('show')</script>"; // Show modal
          
  }
  else{

   echo "<script type='text/javascript'>alert('{$_SESSION["message"]}');</script>";

   
  }

  }
?>