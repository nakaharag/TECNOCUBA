<?php
// verifica request
if(isset($_POST['id']) && $_POST['id'] != "")
{
		// inclui configuração do banco
	include("config.php");

	// recebe valores 
    $status_id = $_POST['id'];

    // deleta usuario
    $query = "DELETE FROM status_visita WHERE id = '$status_id'";
    if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }
}
?>