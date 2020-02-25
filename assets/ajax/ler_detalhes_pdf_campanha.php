<?php
		// inclui configuração do banco
				include("config.php");
	// check request
	if(isset($_POST['id']) && isset($_POST['id']) != "")
	{

		$id = $_POST['id'];
 		
 		// Recupera a path relativa do banco
		$query = "SELECT SUBSTR(arquivo_path, (SELECT POSITION('/comercial' IN arquivo_path) FROM uploads WHERE id = '$id')) AS arquivo_path, descricao_pdf FROM uploads WHERE id = '$id'";

		if (!$result = mysqli_query($connect, $query)) {
	        exit(mysqli_error());
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
	        $response['message'] = "Erro!";
	    }
      if (!$result = mysqli_query($connect, $query)) {
            exit(mysqli_error());
      }
	    echo json_encode($response);
	}
	else
	{
	    $response['status'] = 200;
	    $response['message'] = "Requisição inválida!";
	}
?>