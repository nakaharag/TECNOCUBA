<?php
		// inclui configuração do banco
		include("config.php");
		
		// recebe valores 
		$tipo_segmento = mysqli_real_escape_string($connect, $_POST['tipo_segmento']);
		$segmento_observacao = mysqli_real_escape_string($connect, $_POST['segmento_observacao']);

		$query = "INSERT INTO segmentos_cliente (tipo_segmento, segmento_observacao) VALUES('$tipo_segmento', '$segmento_observacao')";
		if (!$result = mysqli_query($connect, $query)) {
	        exit(mysqli_error());
	    }
	    echo "Segmento adicionado!";
	
?>