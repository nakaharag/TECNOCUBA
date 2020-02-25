
<?php
        // inclui configuração do banco
                include("config.php");

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // // recebe valor ID
    $segmentos_id = $_POST['id'];

    // // recebe detalhes do usuario
    $query = "SELECT * FROM segmentos_cliente WHERE id = '$segmentos_id'";
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
        $response['message'] = "Segmento não encontrado!";
    }

    $query = "UPDATE usuarios SET vis_informativo =1"; // DEFINE A FLAG DE VISUALIZACAO IGUAL A 0
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