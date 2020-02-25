<?php
	// Require DB Connection
	require_once('config.php');
    // Delete Event
	$sth = $dbh->prepare("DELETE FROM calendario WHERE id = ?");
	$sth->execute(array($_GET['id']));
	
?>