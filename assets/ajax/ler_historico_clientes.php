<?php
		// inclui configuração do banco
				include("config.php");
	$cliente = $_POST['id'];
	// Design initial table header 
	$data = '<br/><table class="table table-bordered table-hover table-radius">
						<thead>
						<tr>
							<th>Cliente</th>
							<th>Segmento</th>
							<th>Contato</th>
							<th>Valor do Pedido</th>
							<th>Previsão de Fechamento</th>
							<th>Status</th>
							<th>Data da atualização</th>
							<th>Representante</th>
							<th>Observação</th>
						</tr>
						</thead>';

	$query = "SELECT historico.*, DATE_FORMAT(historico.data_previsao_fech,'%d/%m/%Y') AS DATA, DATE_FORMAT(historico.data_modificacao,'%d/%m/%Y') as DATA2, usuarios.usuario_nome, clientes.razao, segmentos_cliente.tipo_segmento, status_visita.descricao FROM historico INNER JOIN clientes ON clientes.id_cliente = historico.id_cliente INNER JOIN usuarios ON historico.id_usuario_mod = usuarios.id INNER JOIN segmentos_cliente ON historico.id_segmento = segmentos_cliente.id INNER JOIN status_visita ON historico.id_status = status_visita.id WHERE historico.id_cliente = '$cliente'";

	if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }

    // caso tenha registros na tabela 
    if(mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.utf8_encode($row['razao']).'</td>
				<td>'.utf8_encode($row['tipo_segmento']).'</td>
				<td>'.$row['contato_cliente'].'</td>
				<td>'.number_format($row['valor_pedido'],2, ',','.').'</td>
				<td>'.$row['DATA'].'</td>
				<td>'.utf8_encode($row['descricao']).'</td>
				<td>'.$row['DATA2'].'</td>
				<td>'.utf8_encode($row['usuario_nome']).'</td>
				<td>'.utf8_encode($row['observacoes']).'</td>
    		</tr>';
    	}
    }
    else
    {
    	// caso não aja registros
    	$data .= '<tr><td colspan="6">Nenhum histórico para esse cliente ainda!<td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>