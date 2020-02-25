<?php
	// Require DB Connection
	require_once('config.php');

	if (!isset($_SESSION)) session_start();
	$user = $_SESSION["ID"];
    // Add Event
	$sth = $dbh->prepare("INSERT INTO calendario (id_representante, titulo,  calendario.data, descricao, cor) VALUES (?,?,?,?,?)");
	$sth->execute(array($user, $_POST['title'], $_POST['date'], $_POST['description'], $_POST['color']));

?>