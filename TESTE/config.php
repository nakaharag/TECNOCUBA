<?php

// Connection variables 
$host = "localhost"; // MySQL host name eg. localhost
$user = "tecno502_root"; // MySQL user. eg. root ( if your on localserver)
$password = "tecnocuba2017"; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "tecno502_sys"; // MySQL Database name

// Connect to MySQL Database 
$connect = mysqli_connect($host, $user, $password, $database) or die("Não foi possivel conectar");

// Select MySQL Database 
mysqli_select_db($connect, $database);
mysqli_set_charset($connect,"utf8");

try {
	  $dbh = new PDO("mysql:dbname=tecno502_sys;host=localhost;charset=utf8;","tecno502_root","tecnocuba2017");
	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	}

?>