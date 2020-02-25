<?php
	// Require DB Connection
	require_once('config.php');

	if (!isset($_SESSION)) session_start();
	$user = $_SESSION["ID"];
    // Update Event
	$sth = $dbh->prepare("UPDATE calendario SET id_representante = ?, titulo = ?, calendario.data = ?, descricao = ?, cor = ? WHERE id = ?");
	$sth->execute(array($user, $_POST['title'], $_POST['date'], $_POST['description'], $_POST['color'], $_POST['id']));
	
?>