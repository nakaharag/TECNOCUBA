<?php
        // inclui configuração do banco
    include("config.php");

    // Design initial table header 
    $data = '<table class="table table-bordered table-hover table-radius">
                        <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Representante</th>
                            <th>Quantidade de clientes</th>
                            <th>Valor Venda</th>
                        </tr>
                        </thead>';

    $query = "SELECT u.usuario_nome as Representante, SUM(h.valor_pedido) as Valor, COUNT(DISTINCT c.id_cliente) AS Clientes FROM historico h INNER JOIN usuarios u ON h.id_representante = u.id INNER JOIN clientes c ON h.id_representante = c.id_representante WHERE h.id_status = 6 AND MONTH(h.data_visita) = MONTH(CURDATE()) GROUP BY u.usuario_nome ORDER BY `Valor` DESC LIMIT 5";

    if (!$result = mysqli_query($connect , $query)) {
        exit(mysqli_error());
    }
    $rank = 1;
    // caso tenha registros na tabela 
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $data .= '<tr>
                <th scope="row" class="id">'.$rank.'</th>
                <td>'.$row['Representante'].'</td>
                <td>'.str_pad($row['Clientes'], 3, '0', STR_PAD_LEFT).'</td>
                <td>R$ '.number_format($row['Valor'],2, ',','.').'</td>
            </tr>';
            $rank++;
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