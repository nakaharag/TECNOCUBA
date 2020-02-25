<?php
// verifica request
if(isset($_POST['id']) && $_POST['id'] != "")
{
		// inclui configuração do banco
	include("config.php");

	// recebe valores 
    $informativo_id = $_POST['id'];

    // Recupera o path do arquivo a ser excluido
    $get_url = mysqli_query($connect, "SELECT arquivo_path FROM uploads WHERE `uploads`.`id` = '$informativo_id'");
    $path = mysqli_fetch_array($get_url, MYSQLI_ASSOC);

    // apaga o arquivo do servidor
    unlink($path[0]);

    // deleta registro
    $query = "DELETE FROM uploads WHERE id = '$informativo_id'";
    if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }
}
?>