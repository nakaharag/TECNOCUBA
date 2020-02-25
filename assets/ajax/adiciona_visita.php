<?php
if (!isset($_SESSION)) session_start();
		// inclui configuração do banco
		include("config.php");
		
		// recebe valores

		$data2 = explode('/', $_POST['data']); // Converte data para o formato MYSQL
		$data = $data2[2].'-'.$data2[1].'-'.$data2[0];
		$cliente_id = $_POST['cliente_id'];
		$email = $_POST['email'];
		$representante = $_POST['representante'];
		$contato = mysqli_real_escape_string($connect, $_POST['contato']);
		$segmento = $_POST['segmento'];
		$valor_pedido = $_POST['valor_pedido'];
		$data_previsao2 = explode('/', $_POST['data_previsao']); // Converte data para o formato MYSQL
		$data_previsao = $data_previsao2[2].'-'.$data_previsao2[1].'-'.$data_previsao2[0];
		$status = $_POST['status'];
		$observacao = mysqli_real_escape_string($connect, $_POST['observacao']);		
		$id_status_anterior = 7; // ID PADRAO VAZIO

		$query = "INSERT INTO visitas (data, visita_cliente_id, contato, representante_id, email, id_segmento, valor, previsao_fechamento, id_status, id_status_anterior, observacao) VALUES ( '$data', '$cliente_id', '$contato','$representante', '$email', '$segmento', '$valor_pedido', '$data_previsao', '$status', '$id_status_anterior', '$observacao')";

		if (!$result = mysqli_query($connect, $query)) {
	        exit(mysqli_error());
	    }

	//Recupera o ID da visita recem adicionada
	$sql_visitas = "SELECT id FROM `visitas` WHERE representante_id = '$representante' AND visita_cliente_id = '$cliente_id' AND id_status_anterior = '$id_status_anterior' AND data = '$data' AND previsao_fechamento = '$data_previsao' AND id_status = '$status' AND valor = '$valor_pedido'";

	$id_visita = mysqli_fetch_array(mysqli_query($connect, $sql_visitas));

	//Adiciona informações ao histórico, a começar pela data de modificação:
    $dia_modificado = date("Y-m-d");

    //Recupera o ID do usuario
    $id_user = $_SESSION['ID'];

    $add_historico = "INSERT INTO historico (data_visita, data_previsao_fech, id_visita, id_cliente, id_representante, id_status, id_segmento, valor_pedido, data_modificacao, id_usuario_mod, observacoes) VALUES ('$data', '$data_previsao', '$id_visita[0]', '$cliente_id', '$representante', '$status', '$segmento', '$valor_pedido', '$dia_modificado', '$id_user', '$observacao')";

    if (!$result2 = mysqli_query($connect, $add_historico)) {
        exit(mysql_error());
    }

    //Adiciona visita ao calendario
    $add_calendario ="INSERT INTO calendario(id_visita, id_representante, titulo, data, descricao, cor) VALUES ('$id_visita[0]', '$representante', '$cliente_id', '$data', '$observacao', '#28b82e')";

   	if (!$calendario = mysqli_query($connect, $add_calendario)) {
        exit(mysqli_error());
    }

	    echo "Visita adicionada!";
	    print_r($data_previsao);

?>
