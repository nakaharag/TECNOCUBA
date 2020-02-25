<?php
        // inclui configuração do banco
                include("config.php");

// verifica request
if(isset($_POST))
{
    // recebe valores 
    $id = $_POST['id'];
    $nome = mysqli_real_escape_string($connect, $_POST['nome']);
    $email = $_POST['email'];
    $permissao = $_POST['permissao'];
    $meta_vendas = $_POST['meta_vendas'];
    $meta_contato = $_POST['meta_contato'];
    $meta_orcamento = $_POST['meta_orcamento'];

    // Updaste User details
    $query = "UPDATE usuarios SET usuario_nome = '$nome', email = '$email', permissao = '$permissao' , meta_vendas = '$meta_vendas', meta_contato = '$meta_contato', meta_orcamento = '$meta_orcamento' WHERE `usuarios`.`id` = '$id'";
    
    if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }
}