<?php
session_start();

// Define database
define('dbhost', 'b3f3vhux5ow86atx9cdx-mysql.services.clever-cloud.com');
define('dbuser', 'uxbz5bjhngpxcksk');
define('dbpass', 'jNH6WZeobY2H6bp9bMy4');
define('dbname', 'b3f3vhux5ow86atx9cdx');

/*define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'f33d');}*/



// Connecting database
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

?>
