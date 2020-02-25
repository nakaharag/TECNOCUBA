<?php
        // inclui configuração do banco
                include("config.php");

                if (!isset($_SESSION)) session_start();
                $user = $_SESSION["ID"];

// verifica request
if(isset($_POST))
{
    // recebe valores 
        $id = $_POST['id'];
        $datar = explode('/', $_POST['data']); // Converte data para o formato MYSQL
        $data = $datar[2].'-'.$datar[1].'-'.$datar[0];
        $cliente_id = $_POST['cliente_id'];
        $valor_pedido = $_POST['valor_pedido'];
        $datara = explode('/', $_POST['data_previsao']); // Converte data para o formato MYSQL
        $data_previsao = $datara[2].'-'.$datara[1].'-'.$datara[0];
        $status = $_POST['status'];
        $observacao = mysqli_real_escape_string($connect, $_POST['observacao']); 

    // Updaste User details
    $get_status_anterior = mysqli_query($connect, "SELECT id_status FROM visitas WHERE `visitas`.`id` = '$id'");
    $id_status_anterior = mysqli_fetch_array($get_status_anterior, MYSQLI_NUM);

    $query = "UPDATE visitas SET data = '$data', visita_cliente_id = '$cliente_id', valor = '$valor_pedido', previsao_fechamento = '$data_previsao', id_status = '$status', id_status_anterior = '$id_status_anterior[0]', observacao = '$observacao' WHERE `visitas`.`id` = '$id'";

    if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }

    $get_segmento_qry = mysqli_query($connect, "SELECT id_segmento FROM clientes WHERE `clientes`.`id_cliente` = '$cliente_id'");
    $get_segmento = mysqli_fetch_array($get_segmento_qry, MYSQLI_NUM);
    //Adiciona informações ao histórico, a começar pela data de modificação:

    $add_historico = "INSERT INTO historico (data_visita, data_previsao_fech, id_visita, id_cliente, id_representante, id_status, id_segmento, valor_pedido, data_modificacao, id_usuario_mod, observacoes) VALUES ('$data', '$data_previsao', '$id', '$cliente_id', '$user', '$status','$get_segmento[0]', '$valor_pedido', now(), '$user', '$observacao')";

    if (!$result2 = mysqli_query($connect, $add_historico)) {
        exit(mysqli_error());
    }
}
