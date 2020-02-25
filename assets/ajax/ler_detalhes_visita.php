<?php
        // inclui configuração do banco
                include("config.php");

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // // recebe valor ID
    $visita = $_POST['id'];

    // // recebe detalhes do usuario
    $query = "SELECT visitas.*, DATE_FORMAT(visitas.data,'%d/%m/%Y') AS data, DATE_FORMAT(visitas.previsao_fechamento,'%d/%m/%Y') as data_previsao, clientes.razao FROM visitas INNER JOIN clientes ON visitas.visita_cliente_id = clientes.id_cliente WHERE visitas.id = '$visita'";  

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
        $response['message'] = "Visita não encontrada!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Requisição inválida!";
}