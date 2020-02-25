
<?php
	//include connectection file 
	include("config.php");
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 =>'razao',
		1 => 'tipo_nome',
		2 => 'contato_cliente',
		3 => 'telefone',
		4 => 'email_cliente',
		5 => 'cidade',
		6 => 'estado',
		7 => 'ult_venda'
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( razao LIKE '".$params['search']['value']."%' ";    
		$where .=" OR contato_cliente LIKE '".$params['search']['value']."%' ";
		$where .=" OR cidade LIKE '".$params['search']['value']."%' ";
		$where .=" OR estado LIKE '".$params['search']['value']."%' ";

		$where .=" OR ult_venda LIKE '".$params['search']['value']."%' )";
	}

	// getting total number records without any search
	$sql = "SELECT t1.id_cliente, t1.razao, t1.nome_fantasia, t2.tipo_nome, t1.email_cliente, t1.telefone, t1.contato_cliente, t1.endereco, t1.cidade, t1.estado, (SELECT MAX(data_previsao_fech) FROM historico WHERE id_cliente = t1.id_cliente) AS 'ult_venda' FROM clientes t1 INNER JOIN tipo_cliente t2 ON t1.id_tipo = t2.id_tipo";
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
	