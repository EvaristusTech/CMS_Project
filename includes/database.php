<?php

// $server = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'CMS';

// $connection = mysqli_connect($server, $username, $password, $dbname);

// if (!$connection) {
// 	// code...
// 	// die('mysqli_error');
// 	echo "we are not connected";
// }


$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

foreach ($db as $key => $value) {
	// code...
	define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$connection) {
	// code...
	die("Query Failed" . mysqli_error($connection));
}