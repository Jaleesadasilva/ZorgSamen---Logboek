<?php
	
	//database name, host, username en password
	$dbHost = "159.253.0.127"; // database host 
	$dbUsername = "zorgsamen_app"; // username
	$dbPassword = "WUDUb6hGVS"; // password
	$dbName = "zorgsamen_app"; // name database
	$db_error1 = "<p>FOUT: verbinden met databaseserver is mislukt</p>"; // error 1
	$db_error2 = "<p>FOUT: selecteren van database is mislukt</p>"; // error 2
	$db_error3 = "<p>FOUT: sluiten van database is mislukt</p>"; // error 3
		
	// conect to database
	$connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

	// check connection database
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
?>