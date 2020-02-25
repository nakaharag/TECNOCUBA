<?php
// inclui configuração do banco
		include("config.php");

$id_cliente = $_GET['cliente'];
$result = mysqli_query($connect, "SELECT razao, email_cliente, telefone, id_representante, usuarios.usuario_nome, segmentos_cliente.tipo_segmento, id_segmento AS 'segmento' FROM clientes INNER JOIN usuarios ON clientes.id_representante = usuarios.id INNER JOIN segmentos_cliente ON clientes.id_segmento = segmentos_cliente.id WHERE id_cliente = ".$id_cliente);

$row = mysqli_fetch_assoc($result);

// De acordo com o 'tipo' passado via parametro, este ajax retorna um dado diferente da tabela de clientes
switch ($_GET['tipo']) {
	case 0:
		echo $row['id_representante'];
        break;
    case 1:
        echo $row['usuario_nome'];
        break;
    case 2:
        echo $row['email_cliente'];
        break;
    case 3:
        echo $row['telefone'];
        break;
    case 4:
        echo $row['tipo_segmento'];
        break;
    case 5:
        echo $row['segmento'];
        break;

}

?>