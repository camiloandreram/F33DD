<?php


$databaseHost = 'b3f3vhux5ow86atx9cdx-mysql.services.clever-cloud.com';
$databaseName = 'b3f3vhux5ow86atx9cdx';
$databaseUsername = 'uxbz5bjhngpxcksk';
$databasePassword = 'jNH6WZeobY2H6bp9bMy4';

/*$databaseHost = 'localhost';
$databaseName = 'f33d';
$databaseUsername = 'root';
$databasePassword = '';*/

try {
	// http://php.net/manual/en/pdo.connections.php
	$dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);

	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
	// More on setAttribute: http://php.net/manual/en/pdo.setattribute.php
} catch(PDOException $e) {
	echo $e->getMessage();
}

?>