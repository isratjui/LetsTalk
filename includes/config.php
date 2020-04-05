<?php

        $dbServer = 'localhost'; //Define database server host
		$dbUsername = 'root'; //Define database username
		$dbPassword = ''; //Define database password
		$dbName = 'letstalk'; //Define database name
		
		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}

?>