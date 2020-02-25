<?php
		// inclui configuração do banco
		include("config.php");
		
		// recebe valores 
		$codigo_tabela = $_POST['codigo_tabela'];
		$desc_tabela = $_POST['desc_tabela'];
		$esp_tabela = $_POST['esp_tabela'];
		$aco_tabela = $_POST['aco_tabela'];
		$qtde_tabela = $_POST['qtde_tabela'];
        $dep_tabela =  $_POST['dep_tabela'];
		$dep_30_tabela = $_POST['dep_30_tabela'];
		$dep_45_tabela = $_POST['dep_45_tabela'];
		$dep_60_tabela = $_POST['dep_60_tabela'];

		$query = "INSERT INTO `tecno502_sys`.`tabela` (`tbl_cod`, `tbl_desc`, `tbl_esp`, `tbl_aco`, `tbl_qtde`, `tbl_dep`, `tbl_dep_30`, `tbl_dep_45`, `tbl_dep_60`) VALUES ('$codigo_tabela', '$desc_tabela', '$esp_tabela', '$aco_tabela', '$qtde_tabela', '$dep_tabela', '$dep_30_tabela', '$dep_45_tabela', '$dep_60_tabela')";

		if (!$result = mysqli_query($connect, $query)) {
	        exit(mysqli_error());
	    }
	    echo "Tabela adicionada!";
?>	