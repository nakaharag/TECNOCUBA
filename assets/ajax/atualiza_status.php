<?php
        // inclui configuração do banco
                include("config.php");

// verifica request
if(isset($_POST))
{
    // recebe valores 
    $id = $_POST['id'];
    $descricao = mysqli_real_escape_string($connect, $_POST['descricao']);
    $status_observacao = mysqli_real_escape_string($connect, $_POST['status_observacao']);

    // Updaste User details
    $query = "UPDATE status_visita SET descricao = '$descricao', status_observacao = '$status_observacao' WHERE `status_visita`.`id` = '$id'";
    
    if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }
}