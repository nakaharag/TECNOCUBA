<?php
		// inclui configuração do banco
				include("config.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-hover table-radius">
						<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Permissão</th>
							<th>Meta de Vendas</th>
							<th>Meta de Contatos</th>
							<th>Meta de Orçamentos</th>
							<th></th>
							<th></th>
						</tr>
						</thead>';

	$query = "SELECT * FROM usuarios";

	if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error());
    }

    // caso tenha registros na tabela 
    if(mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$permissao = $row['permissao'] == 1?'Usuário Master':'Usuário Comum';
    		$meta_vendas = number_format($row['meta_vendas'],2,",",".");
    		$data .= '<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['usuario_nome'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$permissao.'</td>
				<td>R$'.$meta_vendas.'</td>
				<td>'.$row['meta_contato'].'</td>
				<td>'.$row['meta_orcamento'].'</td>
				<td>
					<i style="text-align:center; cursor:pointer" onclick="GetUserDetails('.$row['id'].')" class="fa fa-pencil-square-o"></i>
				</td>
				<td>
					<i style="text-align:center; cursor:pointer" onclick="DeleteUser('.$row['id'].')" class="fa fa-trash-o"></i>
				</td>
    		</tr>';
    	}
    }
    else
    {
    	// caso não aja registros
    	$data .= '<tr><td colspan="6">Nenhum Usuário Encontrado!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>