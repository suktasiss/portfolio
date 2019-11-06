<?php
	define('DB_SERVER','localhost');	// Server name
	define('DB_USER',''); 				// DB user name
	define('DB_PASS' ,''); 				// DB user pass
	define('DB_NAME', ''); 				// DB NAME
	$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

	if (mysqli_connect_errno())
	{
	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>