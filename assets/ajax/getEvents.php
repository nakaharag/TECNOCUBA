<?php
	// Require DB Connection
	require_once('config.php');

	if (!isset($_SESSION)) session_start();
	$user = $_SESSION["ID"];
    // Get ALl Event
	$sth = $dbh->prepare("SELECT id, titulo AS 'title', data AS 'date', descricao AS 'description', cor AS 'color' FROM calendario WHERE id_representante = ? AND calendario.data BETWEEN ? AND ? ORDER BY calendario.data ASC");
	$sth->execute(array($user, $_GET['start'], $_GET['end']));
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($result);
?>