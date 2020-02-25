<?php
		// inclui configuração do banco
		include("config.php");

				if (!isset($_SESSION)) session_start();
				$user = $_SESSION["ID"];

		// recebe valores 
		$razao = mysqli_real_escape_string($connect, $_POST['razao']);
		$cnpj = $_POST['cnpj'];
		$email_cliente = mysqli_real_escape_string($connect, $_POST['email_cliente']);
		$contato_cliente = $_POST['contato_cliente'];
		$nome_fantasia = $_POST['nome_fantasia'];
		$tipo_empr = $_POST['tipo_empr'];
		$tipo = $_POST['tipo'];
        $situacao =  $_POST['situacao'];
		$representante_cliente = isset($_POST['representante_cliente'])?$_POST['representante_cliente']:$user;
		$telefone = $_POST['telefone'];
		$cep = $_POST['cep'];
		$ddd = $_POST['ddd'];
		$cidade = mysqli_real_escape_string($connect, $_POST['cidade']);
		$estado = $_POST['estado'];
		$endereco = mysqli_real_escape_string($connect, $_POST['endereco']);
		$id_segmento = mysqli_real_escape_string($connect, $_POST['id_segmento']);
        //$data = explode('/', $_POST['data']); // Converte data para o formato MYSQL
        //$data2 = $data[2].'-'.$data[1].'-'.$data[0];
		$observacao = mysqli_real_escape_string($connect, $_POST['observacao']);

		$query = "INSERT INTO clientes (id_representante, tipo_empr, razao, cnpj, id_segmento, email_cliente, contato_cliente, telefone, ddd, cep, cidade, estado, endereco, data_mod, observacoes, nome_fantasia, situacao) VALUES ('$representante_cliente', '$tipo_empr', '$razao', '$cnpj', '$id_segmento', '$email_cliente', '$contato_cliente' ,'$telefone', '$ddd', '$cep','$cidade', '$estado','$endereco', now(), '$observacao' ,'$nome_fantasia', '$situacao')";

		if (!$result = mysqli_query($connect, $query)) {
	        exit(mysqli_error());
	    }

	    echo "Cliente adicionado!";

?>