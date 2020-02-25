<?php
		// inclui configuração do banco
				include("config.php");
				if (!isset($_SESSION)) session_start();
				$user = $_SESSION["ID"];
	// Design initial table header 
// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 => 'id_cliente',
		1 => 'razao',
		2 => 'tipo_segmento',
		3 => 'contato_cliente',
		4 => 'telefone',
		5 => 'cidade',
		6 => 'estado',
		7 => 'situacao',
		8 => 'ult_venda'
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" AND ";
		$where .=" ( tipo_segmento LIKE '".$params['search']['value']."%' ";    
		$where .=" OR razao LIKE '".$params['search']['value']."%' ";
		$where .=" OR situacao LIKE '".$params['search']['value']."%' ";
		$where .=" OR cidade LIKE '".$params['search']['value']."%' )";

	//	$where .=" OR t1.estado LIKE '".$params['search']['value']."%' )";
	}

	// getting total number records without any search
	$sql = "SELECT t1.id_cliente, t1.razao, t2.tipo_segmento, t1.contato_cliente, t1.telefone, t1.cidade, t1.estado, t1.situacao, (SELECT DATE_FORMAT(MAX(data_previsao_fech),'%d/%m/%Y')FROM historico WHERE id_cliente = t1.id_cliente) AS 'ult_venda' FROM clientes t1 INNER JOIN segmentos_cliente t2 ON t1.id_segmento = t2.id WHERE id_representante = '$user'";
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

	$queryRecords = mysqli_query($connect, $sqlRec) or die("Nenhum cliente encontrado");

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