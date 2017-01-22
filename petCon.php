<?php
// Grab configuration for petConnect mysqli  - This should live outside of directory but keeping inside for project 
$petConfig = parse_ini_file('config/petConfig.ini'); 

//Define Variables For Connect
define('DB_SERVER','localhost');
define('DB_USER',$petConfig['username']);
define('DB_PASS',$petConfig['password']);
define('DB_NAME',$petConfig['dbname']);

//Init Connect - display errors
$petConnect = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if (mysqli_connect_errno($petConnect)) {
	echo "Failed to Connect" , mysqli_connect_error();
}
   

?>