<?php
		// inclui configuração do banco
		include("config.php");
		
		// recebe valores 
		$codigo_produto = $_POST['codigo_produto'];
		$desc_produto = $_POST['desc_produto'];
		$esp_produto = $_POST['esp_produto'];
		$aco_produto = $_POST['aco_produto'];
		$qtde_produto = $_POST['qtde_produto'];
        $dep_produto =  $_POST['dep_produto'];
		$dep_30_produto = $_POST['dep_30_produto'];
		$dep_45_produto = $_POST['dep_45_produto'];
		$dep_60_produto = $_POST['dep_60_produto'];

		$query = "INSERT INTO `tecno502_sys`.`produtos` (`prod_cod`, `prod_desc`, `prod_esp`, `prod_aco`, `prod_qtde`, `prod_dep`, `prod_dep_30`, `prod_dep_45`, `prod_dep_60`) VALUES ('$codigo_produto', '$desc_produto', '$esp_produto', '$aco_produto', '$qtde_produto', '$dep_produto', '$dep_30_produto', '$dep_45_produto', '$dep_60_produto')";

		if (!$result = mysqli_query($connect, $query)) {
	        exit(mysqli_error());
	    }
	    echo "Produto adicionado!";
	    echo $query;
	    die;
?>	