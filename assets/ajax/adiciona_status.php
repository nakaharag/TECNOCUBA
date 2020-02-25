<?php
		// inclui configuração do banco
		include("config.php");
		
		// recebe valores 
		$status_descricao = mysqli_real_escape_string($connect, $_POST['status_descricao']);
		$status_observacao = umysqli_real_escape_string($connect, $_POST['status_observacao']);

		$query = "INSERT INTO status_visita (descricao, status_observacao) VALUES('$status_descricao', '$status_observacao')";
		if (!$result = mysqli_query($connect, $query)) {
	        exit(mysqli_error());
	    }
	    echo "Status adicionado!";
	
?>