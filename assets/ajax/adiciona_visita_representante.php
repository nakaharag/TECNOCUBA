<?php
        // inclui configuração do banco
        include("config.php");

        if (!isset($_SESSION)) session_start();
                $user = $_SESSION["ID"];

        // recebe valores 
        $data2 = explode('/', $_POST['data']); // Converte data para o formato MYSQL
        $data = $data2[2].'-'.$data2[1].'-'.$data2[0];
        $cliente_id = isset($_POST['cliente_id'])?$_POST['cliente_id']:"";
        $email = isset($_POST['email'])?$_POST['email']:"";
        $contato = isset($_POST['contato'])?mysqli_real_escape_string($connect, $_POST['contato']):"";
        $segmento = isset($_POST['segmento'])?$_POST['segmento']:"";
        $valor_pedido = isset($_POST['valor_pedido'])?$_POST['valor_pedido']:"";
        $data_previsao2 = explode('/', $_POST['data_previsao']);
        $data_previsao = $data_previsao2[2].'-'.$data_previsao2[1].'-'.$data_previsao2[0];
        $status = isset($_POST['status'])?$_POST['status']:"";
        $observacao = isset($_POST['observacao'])?mysqli_real_escape_string($connect, $_POST['observacao']):"";
        $id_status_anterior = 3; // ID PADRAO 'EM NEGOCIACAO'     

        $query = "INSERT INTO visitas (data, visita_cliente_id, representante_id, contato, email, id_segmento, valor, previsao_fechamento, id_status, id_status_anterior, observacao)
        VALUES('$data', '$cliente_id', '$user', '$contato', '$email', '$segmento', '$valor_pedido', '$data_previsao', '$status', '$id_status_anterior', '$observacao')
        ";

        if (!$result = mysqli_query($connect, $query)) {
            exit(mysqli_error());
        }

    //Recupera o ID da visita recem adicionada
     $sql_visitas = "SELECT id FROM visitas ORDER BY id DESC LIMIT 1"; 

     $id_visita = mysqli_fetch_array(mysqli_query($connect, $sql_visitas));

     $dia_modificado = date("Y-m-d");

     $add_historico = "INSERT INTO historico (data_visita, data_previsao_fech, id_visita, id_cliente, id_representante, id_status, id_segmento, valor_pedido, data_modificacao, id_usuario_mod, observacoes) VALUES ('$data', '$data_previsao', '$id_visita[0]', '$cliente_id', '$user', '$status', '$segmento', '$valor_pedido', '$dia_modificado', '$user', '$observacao')";


     if (!$result2 = mysqli_query($connect, $add_historico)) {
         exit(mysqli_error());
     }

         echo "Visita adicionada!";
?>