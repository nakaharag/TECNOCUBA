<?php
		// inclui configuração do banco
				include("config.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-hover table-radius">
						<thead>
						<tr>
							<th>ID</th>
							<th>Status</th>
                            <th>Observações</th>
                            <th></th>
                            <th></th>
						</tr>
						</thead>';

	$query = "SELECT * FROM status_visita WHERE id <> 99";

	if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }

    // caso tenha registros na tabela 
    if(mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['descricao'].'</td>
                <td>'.$row['status_observacao'].'</td>

                <td>
                    <i style="text-align:center; cursor:pointer" onclick="detalhesStatus('.$row['id'].')" class="fa fa-pencil-square-o"></i>
                </td>
				<td>
					<i style="text-align:center; cursor:pointer" onclick="deletaStatus('.$row['id'].')" class="fa fa-trash-o"></i>
				</td>
    		</tr>';
    	}
    }
    else
    {
    	// caso não aja registros
    	$data .= '<tr><td colspan="6">Nenhum status encontrado!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>