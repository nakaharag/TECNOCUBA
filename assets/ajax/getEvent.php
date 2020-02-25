<?php
	// Require DB Connection
	require_once('config.php');

	if (!isset($_SESSION)) session_start();
	$user = $_SESSION["ID"];
    // Get Event By Id
	$sth = $dbh->prepare("SELECT * FROM calendario WHERE id_representante = '?'");
	$sth->execute(array($user));
	$result = $sth->fetch(PDO::FETCH_ASSOC);
	echo json_encode($result);

?>