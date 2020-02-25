<?php
		// inclui configuração do banco
	include("config.php");

	if (!isset($_SESSION)) @session_start();
	$user_id = $_SESSION['ID'];

	// Design initial table header 
	$data = '<table class="table table-bordered table-hover table-radius">
						<thead>
						<tr>
							<th class="col-sm-1">Visualizar</th>
							<th>Descrição da campanha</th>
							<th>Data de Inicio</th>
							<th>Data de encerramento</th>
							<th>Observações</th>
							<th>Download</th>					
						</tr>
						</thead>';
	

	$query = "SELECT uploads.*, DATE_FORMAT(uploads.data_inicio,'%d/%m/%Y') AS DATA1, DATE_FORMAT(uploads.data_final,'%d/%m/%Y') AS DATA2 FROM `uploads` WHERE `data_inicio` <= date(now()) AND `data_final` >= date(now()) AND tipo = 1";


	if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }

    // caso tenha registros na tabela 
    if(mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    	{
    		$data .= '<tr>

				<td>
					<i style="text-align:center; cursor:pointer" onclick="detalhesPDFcampanha('.$row['id'].')" class="fa fa-file-pdf-o icon-red"></i>
				</td>
				<td>'.$row['descricao_pdf'].'</td>
				<td>'.$row['DATA1'].'</td>
				<td>'.$row['DATA2'].'</td>
				<td>'.$row['obs'].'</td>
				<td>
					<a style="color:inherit; text-decoration: none;" href = "../comercial/assets/ajax/download.php?f='.$row['arquivo_path'].'"> <i style="text-align:center; cursor:pointer" class="fa fa-download"></i></a>
				</td>
    		</tr>';
    	}
    }
    else
    {
    	// caso não aja registros
    	$data .= '<tr><td colspan="6">Nenhuma campanha encontrada!</td></tr>';
    }

    $data .= '</table>';

    $query = "UPDATE usuarios SET vis_campanhas = 1 WHERE id = '$user_id'"; // DEFINE A FLAG DE VISUALIZACAO IGUAL A 0

    
      if (!$result = mysqli_query($connect, $query)) {
            exit(mysqli_error());
      }

    echo $data;
?>