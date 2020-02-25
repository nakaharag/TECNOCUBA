<?php
		// inclui configuração do banco
				include("config.php");

	$representante_id = $_POST['id'];

	// Design initial table header 
	$data = '<table class="table table-bordered table-hover table-radius">
						<thead>
						<tr>
							<th>Data</th>
							<th>Cliente</th>
							<th class="col-sm-1">E-mail</th>
							<th>Valor do Pedido</th>
							<th>Previsão de Fechamento</th>
							<th>Status</th>
							<th>Observação</th>
						</tr>
						</thead>';

	$query = "SELECT visitas.*, DATE_FORMAT(visitas.data,'%d/%m/%Y') AS DATA1, DATE_FORMAT(visitas.previsao_fechamento,'%d/%m/%Y') AS DATA2, usuarios.usuario_nome, clientes.razao, a.descricao as descricao, b.descricao as descricao2 FROM visitas INNER JOIN usuarios ON visitas.representante_id = usuarios.id INNER JOIN clientes ON visitas.visita_cliente_id = clientes.id_cliente INNER JOIN status_visita a ON visitas.id_status = a.id INNER JOIN status_visita b ON visitas.id_status_anterior = b.id WHERE visitas.representante_id = '$representante_id' AND  id_status = 6";

	// O método DATE_FORMAT traz as datas do banco na notação brasileira
	if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }

    // caso tenha registros na tabela 
    if(mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$row['DATA1'].'</td>
				<td>'.$row['razao'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.number_format($row['valor'],2, ',','.').'</td>
				<td>'.$row['DATA2'].'</td>
				<td>'.utf8_encode($row['descricao']).'</td>
				<td>'.$row['observacao'].'</td>

    		</tr>';
    	}
    }
    else
    {
    	// caso não aja registros
    	$data .= '<tr><td colspan="6">Nenhuma visita encontrada!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>