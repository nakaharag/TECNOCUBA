<?php
// verifica request
if(isset($_POST['id']) && $_POST['id'] != "")
{
		// inclui configuração do banco
	include("config.php");

	// recebe valores 
    $campanha_id = $_POST['id'];

    // Recupera o path do arquivo a ser excluido
    $get_url = mysqli_query($connect, "SELECT * FROM uploads WHERE `uploads`.`id` = '$campanha_id'");
    $path = mysqli_fetch_array($get_url, MYSQLI_ASSOC);

    unlink($path['arquivo_path']);

	

    // deleta usuario
    $query = "DELETE FROM uploads WHERE id = '$campanha_id'";
    if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }
}
?>