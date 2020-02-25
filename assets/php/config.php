<?php
// Connection variables 
$host = "localhost"; // MySQL host name eg. localhost
$user = "tecno502_root"; // MySQL user. eg. root ( if your on localserver)
$password = "tecnocuba2017"; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "tecno502_sys"; // MySQL Database name

// Connect to MySQL Database 
$connect = mysqli_connect($host, $user, $password, $database) or die("Não foi possivel conectar");
mysqli_set_charset($connect,"utf8");

// Select MySQL Database 
//mysql_select_db($database, $connect);

?>