<?php
		// inclui configuração do banco
				include("config.php");
	// Design initial table header 
// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 => 'tbl_cod',
		1 => 'tbl_desc',
		2 => 'tbl_esp',
		3 => 'tbl_aco',
		4 => 'tbl_qtde',
		5 => 'tbl_dep',
		6 => 'tbl_dep_30',
		7 => 'tbl_dep_45',
		8 => 'tbl_dep_60'
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( tbl_cod LIKE '".$params['search']['value']."%' ";    
		$where .=" OR tbl_desc LIKE '".$params['search']['value']."%' ) ";

	//	$where .=" OR t1.estado LIKE '".$params['search']['value']."%' )";
	}

	// getting total number records without any search
	$sql = "SELECT * FROM tabela";
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

	$queryRecords = mysqli_query($connect, $sqlRec) or die("Nenhum produto encontrado");

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