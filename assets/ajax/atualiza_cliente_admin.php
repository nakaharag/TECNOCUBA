<?php
        // inclui configuração do banco
                include("config.php");

// verifica request
if(isset($_POST))
{
    // recebe valores 


        $id = $_POST['id'];
        $razao = isset($_POST['razao'])?mysqli_real_escape_string($connect, $_POST['razao']):"";
        $cnpj = isset($_POST['cnpj'])?$_POST['cnpj']:"";
        $nome_fantasia = isset($_POST['nome_fantasia'])?mysqli_real_escape_string($connect, $_POST['nome_fantasia']):"";
        $rep = isset($_POST['representante_cliente'])?$_POST['representante_cliente']:"";
        $situacao =  isset($_POST['situacao'])?$_POST['situacao']:"";
        $email_cliente = isset($_POST['email_cliente'])?mysqli_real_escape_string($connect, $_POST['email_cliente']):"";
        $contato_cliente = isset($_POST['contato_cliente'])?$_POST['contato_cliente']:"";
        $telefone = isset($_POST['telefone'])?$_POST['telefone']:"";
        $ddd = isset($_POST['ddd'])?$_POST['ddd']:"";
        $cep = isset($_POST['cep'])?$_POST['cep']:"";
        $endereco = isset($_POST['endereco'])?mysqli_real_escape_string($connect, $_POST['endereco']):"";
        $cidade = isset($_POST['cidade'])?mysqli_real_escape_string($connect, $_POST['cidade']):"";
        $estado = isset($_POST['estado'])?$_POST['estado']:"";
        $id_segmento = isset($_POST['id_segmento'])?mysqli_real_escape_string($connect, $_POST['id_segmento']):"";
        $observacao = isset($_POST['cliente_observacao'])?mysqli_real_escape_string($connect, $_POST['cliente_observacao']):"";

    // Updaste User details
    $query = "UPDATE clientes SET nome_fantasia = '$nome_fantasia', razao = '$razao', cnpj = '$cnpj', cidade = '$cidade', estado = '$estado', id_segmento = '$id_segmento', email_cliente = '$email_cliente', contato_cliente = '$contato_cliente', id_representante = '$rep', telefone = '$telefone', ddd = '$ddd', cep = '$cep', endereco = '$endereco', data_mod = now(), situacao = '$situacao', observacoes = '$observacao' WHERE `clientes`.`id_cliente` = '$id'";

    if (!$result = mysqli_query($connect, $query)) {
        
    }
}