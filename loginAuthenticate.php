

<?php
	session_start();

		$key = "Fusion";

		require_once("mysqlconnect.php");

		if($dbc){
		
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$_SESSION['$user_id'] = '';
		$userType ='';

    	$sql = "SELECT userID, userType FROM user WHERE username = AES_ENCRYPT('{$username}', '{$key}') and password = AES_ENCRYPT('{$password}', '{$key}');";

	  	$result = mysqli_query($dbc, $sql);

	  		while($row = $result->fetch_assoc()){
			$_SESSION['user_id'] = $row['userID'];
			$userType = $row['userType'];

			//echo encrypt($row['userName'], $key);

		}
		
	    if ($result->num_rows > 0) {
	    	unset($_SESSION["message"]);
	    	echo "log-in successful";

	    	if($userType = '1'){
				//header("Location:dashboardDatabaseManager.php");
	    	}
	        if($userType = '2'){
				//header("Location:dashboardSystemAdmin.php");
	    	}
	        if($userType = '3'){
				//header("Location:dashboardBankManager.php");
	    	}
	        if($userType = '4'){
				//header("Location:dashboardClient.php");
	    	}
	        
	        exit;
	    } else {
	    	$_SESSION["Lmessage"] = "Wrong username or password";
	        header("Location:login.php");
	        exit;
	    }

	    $dbc->close();
    }
?>