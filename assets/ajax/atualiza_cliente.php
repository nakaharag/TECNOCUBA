<?php
        // inclui configuração do banco
                include("config.php");

// verifica request
if(isset($_POST))
{
    // recebe valores 
        $id = $_POST['id'];
        $razao = mysqli_real_escape_string($connect, $_POST['razao']);
        $cnpj = $_POST['cnpj'];
        $nome_fantasia = $_POST['nome_fantasia'];
        $situacao =  $_POST['situacao'];
        $email_cliente = mysqli_real_escape_string($connect, $_POST['email_cliente']);
        $contato_cliente = $_POST['contato_cliente'];
        $telefone = $_POST['telefone'];
        $ddd = $_POST['ddd'];
        $cep = $_POST['cep'];
        $endereco = mysqli_real_escape_string($connect, $_POST['endereco']);
        $cidade = mysqli_real_escape_string($connect, $_POST['cidade']);
        $estado = $_POST['estado'];
        $id_segmento = mysqli_real_escape_string($connect, $_POST['id_segmento']);
        $observacao = mysqli_real_escape_string($connect, $_POST['cliente_observacao']);

    // Updaste User details
    $query = "UPDATE clientes SET nome_fantasia = '$nome_fantasia', razao = '$razao', cnpj = '$cnpj', cidade = '$cidade', estado = '$estado', id_segmento = '$id_segmento', email_cliente = '$email_cliente', contato_cliente = '$contato_cliente', telefone = '$telefone', ddd = '$ddd', cep = '$cep', endereco = '$endereco', data_mod = now(), situacao = '$situacao', observacoes = '$observacao' WHERE `clientes`.`id_cliente` = '$id'";

    if (!$result = mysqli_query($connect, $query)) {
        
    }
    
}