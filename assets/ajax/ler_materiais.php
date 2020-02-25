<?php
		// inclui configuração do banco
				include("config.php");
	// Design initial table header 
	$data = '<table class="table table-bordered table-hover table-radius">
						<thead>
						<tr>
							<th>Descrição do material</th>
							<th>Data de Inicio</th>
							<th>Data de encerramento</th>
							<th>Observações</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						</thead>';

	$query = "SELECT uploads.*, DATE_FORMAT(uploads.data_inicio,'%d/%m/%Y') AS DATA1, DATE_FORMAT(uploads.data_final,'%d/%m/%Y') AS DATA2 FROM uploads WHERE tipo = 5";

	if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }

    // caso tenha registros na tabela 
    if(mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$row['descricao_pdf'].'</td>
				<td>'.$row['DATA1'].'</td>
				<td>'.$row['DATA2'].'</td>
				<td>'.$row['obs'].'</td>
				<td>
					<i style="text-align:center; cursor:pointer" onclick="detalhesMaterial('.$row['id'].')" class="fa fa-pencil-square-o"></i>
				</td>
				<td>
					<i style="text-align:center; cursor:pointer" onclick="deletaMaterial('.$row['id'].')" class="fa fa-trash-o"></i>
				</td>
				<td>
					<a style="color:inherit; text-decoration: none;" href = "../comercial/assets/ajax/download.php?f='.$row['arquivo_path'].'"> <i style="text-align:center; cursor:pointer" class="fa fa-download"></i></a>
				</td>
    		</tr>';
    	}
    }
    else
    {
    	// caso não aja registros
    	$data .= '<tr><td colspan="6">Nenhum material encontrado!</td></tr>';
    }

    $data .= '</table>';
    echo $data;
?>