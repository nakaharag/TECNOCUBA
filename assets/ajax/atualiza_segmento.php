<?php
        // inclui configuração do banco
                include("config.php");

// verifica request
if(isset($_POST))
{
    // recebe valores 
    $id = $_POST['id'];
    $tipo_segmento = mysqli_real_escape_string($connect, $_POST['tipo_segmento']);
    $segmento_observacao = mysqli_real_escape_string($connect, $_POST['segmento_observacao']);

    // Updaste User details
    $query = "UPDATE segmentos_cliente SET tipo_segmento = '$tipo_segmento', segmento_observacao = '$segmento_observacao' WHERE `segmentos_cliente`.`id` = '$id'";
    
    if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }
}