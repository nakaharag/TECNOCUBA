<?php
		// inclui configuração do banco
				include("config.php");
	// check request
	if(isset($_POST['id']) && isset($_POST['id']) != "")
	{

		$id = $_POST['id'];

		$query = "SELECT descricao_pdf, obs, DATE_FORMAT(uploads.data_inicio,'%d/%m/%Y') AS data_inicio, DATE_FORMAT(uploads.data_final,'%d/%m/%Y') AS data_final FROM uploads WHERE tipo = 3 AND id = '$id'";
		if (!$result = mysqli_query($connect, $query)) {
	        exit(mysql_error());
	    }
	    $response = array();
	    if(mysqli_num_rows($result) > 0) {
	        while ($row = mysqli_fetch_assoc($result)) {
	            $response = $row;
	        }
	    }
	    else
	    {
	        $response['status'] = 200;
	        $response['message'] = "Informativo não encontrado!";
	    }
      if (!$result = mysqli_query($connect, $query)) {
            exit(mysqli_error());
      }
	    // display JSON data
	    echo json_encode($response);
	}
	else
	{
	    $response['status'] = 200;
	    $response['message'] = "Requisição inválida!";
	}
?>