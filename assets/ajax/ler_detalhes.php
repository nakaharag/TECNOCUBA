<?php
        // inclui configuração do banco
                include("config.php");

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // // recebe valor ID
    $usuario = $_POST['id'];

    // // recebe detalhes do usuario
    $query = "SELECT * FROM usuarios WHERE id = '$usuario'";
    if (!$result = mysqli_query($connect, $query)) {
        exit(mysql_error());
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
        $response['message'] = "Usuário não encontrado!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Requisição inválida!";
}