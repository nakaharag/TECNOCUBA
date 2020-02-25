<?php
		// inclui configuração do banco
				include("config.php");

	// Design initial table header 
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 => 't1.id',
		1 => 't6.usuario_nome',
		2 => 'data1',
		3 => 't2.razao',
		4 => 't1.contato',
		5 => 't3.tipo_segmento',
		6 => 't2.telefone',
		7 => 'data_fech',
		8 => 't1.valor',
		9 => 't4.descricao',
		10 => 't5.descricao',
		11 => 't1.observacao'
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( t2.razao LIKE '".$params['search']['value']."%' ";    
		$where .=" OR t3.tipo_segmento LIKE '".$params['search']['value']."%' ";
		$where .=" OR t4.descricao LIKE '".$params['search']['value']."%' ";
		$where .=" OR t1.valor LIKE '".$params['search']['value']."%' ";
		$where .=" OR t6.usuario_nome LIKE '".$params['search']['value']."%' ";
		$where .=" OR t1.contato LIKE '".$params['search']['value']."%' )";

	}

	// getting total number records without any search
	$sql = "SELECT t1.id, t6.usuario_nome, DATE_FORMAT(t1.data,'%d/%m/%Y') AS 'data1', t2.razao, t1.contato, t3.tipo_segmento, t2.telefone, DATE_FORMAT(t1.previsao_fechamento,'%d/%m/%Y') AS 'data_fech', t1.valor, t4.descricao, t5.descricao, t1.observacao
		FROM visitas t1
		INNER JOIN clientes t2 ON t1.visita_cliente_id = t2.id_cliente
		RIGHT JOIN segmentos_cliente t3 ON t1.id_segmento = t3.id
		LEFT JOIN status_visita t4 ON t1.id_status = t4.id
		LEFT JOIN status_visita t5 ON t1.id_status_anterior = t5.id
		INNER JOIN usuarios t6 ON t1.representante_id = t6.id";

	$sqlTot .= $sql;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}


 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($connect, $sqlTot) or die("database error:". mysqli_error($connect));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($connect, $sqlRec) or die("Nenhuma interação encontrada");

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_row($queryRecords) ) { 
		$data[] = $row;
	}	

	$json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);
	echo json_encode($json_data);  // send data as json format
?>