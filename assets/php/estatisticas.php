<?php
// inclui configuração do banco
		include("config.php");

		// Recupera os meses anteriores para imprimir na home
	date_default_timezone_set('America/Sao_Paulo');
	setlocale (LC_ALL, "pt_BR", "utf-8");

	//$mes_passado = ucfirst(utf8_encode(strftime( "%B de %Y",mktime(0, 0, 0, date('m')-1  , 1 , date('Y')))));
	$mes_passado = ucwords(utf8_encode(strftime( "%B/%Y",mktime(0, 0, 0, date('m')-1  , 1 , date('Y')))));
	$mes_anterior = ucfirst(utf8_encode(strftime( "%B/%Y",mktime(0, 0, 0, date('m')-2  , 1 , date('Y')))));
	$mes_retrasado = ucfirst(utf8_encode(strftime( "%B/%Y",mktime(0, 0, 0, date('m')-3  , 1 , date('Y')))));

	// Recupera as informações de cada user
	if (!isset($_SESSION)) session_start();
	$representante = $_SESSION['ID'];

	// Consulta as metas do usuario
	$sql = "SELECT `meta_vendas`, `meta_contato`, `meta_orcamento`, `vis_campanhas`, `vis_promocoes`, `vis_informativo`  FROM `usuarios` WHERE id = '$representante' ";
  	 $query = mysqli_query($connect, $sql);	

	while ($resultado = mysqli_fetch_assoc($query)) {
      $meta_vendas = $resultado['meta_vendas'];
      $meta_contato = $resultado['meta_contato'];
      $meta_orcamento = $resultado['meta_orcamento'];
      $campanha = ($resultado['vis_campanhas']==0)?"style='box-shadow: 5px 5px 5px #f00;'":"";
	  $informativo = ($resultado['vis_informativo']==0)?"style='box-shadow: 5px 5px 5px #f00;'":"";
	  $promocao = ($resultado['vis_promocoes']==0)?"style='box-shadow: 5px 5px 5px #f00;'":"";

      }

	//SELECTs DAS METAS
    	//VENDAS
	$sql_vendas = "SELECT SUM(valor_pedido) FROM `historico` WHERE id_representante = '$representante' AND id_status = 6 AND MONTH(data_visita) = MONTH(CURDATE())"; // SELECT do MÊS ATUAL
	$met_vendas = mysqli_fetch_array(mysqli_query($connect, $sql_vendas));
	// Calcula a percentagem de vendas concretizadas e arredonda utilizando a floor
	@$estat_vendas = floor(($met_vendas[0]/$meta_vendas)*100);

	$sql_vendas2 = "SELECT SUM(valor_pedido) FROM `historico` WHERE id_representante = 1 AND id_status = 6 AND MONTH(data_visita) = MONTH(CURDATE())-1"; // SELECT do MÊS PASSADO
	$met_vendas2 = mysqli_fetch_array(mysqli_query($connect, $sql_vendas2));
	// Calcula a percentagem de vendas concretizadas e arredonda utilizando a floor
	@$estat_vendas_mes_passado = floor(($met_vendas2[0]/$meta_vendas)*100);

	$sql_vendas3 = "SELECT SUM(valor_pedido) FROM `historico` WHERE '$representante' = '$representante' AND id_status = 6 AND MONTH(data_visita) = MONTH(CURDATE())-2"; // SELECT do MÊS ANTERIOR
	$met_vendas3 = mysqli_fetch_array(mysqli_query($connect, $sql_vendas3));
	// Calcula a percentagem de vendas concretizadas e arredonda utilizando a floor
	@$estat_vendas_mes_anterior = floor(($met_vendas3[0]/$meta_vendas)*100);

	$sql_vendas4 = "SELECT SUM(valor_pedido) FROM `historico` WHERE '$representante' = '$representante' AND id_status = 6 AND MONTH(data_visita) = MONTH(CURDATE())-3"; // SELECT do MÊS RETRASADO
	$met_vendas4 = mysqli_fetch_array(mysqli_query($connect, $sql_vendas4));
	// Calcula a percentagem de vendas concretizadas e arredonda utilizando a floor
	@$estat_vendas_mes_retrasado = floor(($met_vendas4[0]/$meta_vendas)*100);


		//CONTATO
	$sql_contato = "SELECT COUNT(DISTINCT id_visita) FROM `historico` WHERE id_representante = '$representante' AND id_status <> 6 AND id_status <> 1 AND MONTH(data_visita) = MONTH(CURDATE())";
	$met_contato = mysqli_fetch_array(mysqli_query($connect, $sql_contato));
	// Calcula a percentagem de contatos e arredonda utilizando a floor
	@$estat_contato = floor(($met_contato[0]/$meta_contato)*100);

	$sql_contato2 = "SELECT COUNT(DISTINCT id_visita) FROM `historico` WHERE id_representante = '$representante' AND id_status <> 6 AND id_status <> 1 AND MONTH(data_visita) = (MONTH(CURDATE())-1)"; // SELECT do MÊS PASSADO
	$met_contato2 = mysqli_fetch_array(mysqli_query($connect, $sql_contato2));
	// Calcula a percentagem de contatos e arredonda utilizando a floor
	@$estat_contato_mes_passado = floor(($met_contato2[0]/$meta_contato)*100);

	$sql_contato3 = "SELECT COUNT(DISTINCT id_visita) FROM `historico` WHERE id_representante = '$representante' AND id_status <> 6 AND id_status <> 1 AND MONTH(data_visita) = (MONTH(CURDATE())-2)"; // SELECT do MÊS ANTERIOR
	$met_contato3 = mysqli_fetch_array(mysqli_query($connect, $sql_contato3));
	// Calcula a percentagem de contatos e arredonda utilizando a floor
	@$estat_contato_mes_anterior = floor(($met_contato3[0]/$meta_contato)*100);

	$sql_contato4 = "SELECT COUNT(DISTINCT id_visita) FROM `historico` WHERE id_representante = '$representante' AND id_status <> 6 AND id_status <> 1 AND MONTH(data_visita) = (MONTH(CURDATE())-3)"; // SELECT do MÊS RETRASADO
	$met_contato4 = mysqli_fetch_array(mysqli_query($connect, $sql_contato4));
	// Calcula a percentagem de contatos e arredonda utilizando a floor
	@$estat_contato_mes_retrasado = floor(($met_contato4[0]/$meta_contato)*100);

		//ORÇAMENTO
	$sql_orcamento = "SELECT COUNT(DISTINCT id_visita) FROM `historico` WHERE id_representante = '$representante' AND id_status = 1 AND MONTH(data_visita) = MONTH(CURDATE())"; 
	$met_orcamento = mysqli_fetch_array(mysqli_query($connect, $sql_orcamento));
	// Calcula a percentagem de orçamentos e arredonda utilizando a floor
	@$estat_orcamento = floor(($met_orcamento[0]/$meta_orcamento)*100);

	$sql_orcamento2 = "SELECT COUNT(DISTINCT id_visita) FROM `historico` WHERE id_representante = '$representante' AND id_status = 1 AND MONTH(data_visita) = (MONTH(CURDATE())-1)"; // SELECT do MÊS PASSADO
	$met_orcamento2 = mysqli_fetch_array(mysqli_query($connect, $sql_orcamento2));
	// Calcula a percentagem de orçamentos e arredonda utilizando a floor
	@$estat_orcamento_mes_passado = floor(($met_orcamento2[0]/$meta_orcamento)*100);

	$sql_orcamento3 = "SELECT COUNT(DISTINCT id_visita) FROM `historico` WHERE id_representante = '$representante' AND id_status = 1 AND MONTH(data_visita) = (MONTH(CURDATE())-2)"; // SELECT do MÊS ANTERIOR
	$met_orcamento3 = mysqli_fetch_array(mysqli_query($connect, $sql_orcamento3));
	// Calcula a percentagem de orçamentos e arredonda utilizando a floor
	@$estat_orcamento_mes_anterior = floor(($met_orcamento3[0]/$meta_orcamento)*100);

	$sql_orcamento4 = "SELECT COUNT(DISTINCT id_visita) FROM `historico` WHERE id_representante = '$representante' AND id_status = 1 AND MONTH(data_visita) = (MONTH(CURDATE())-3)"; // SELECT do MÊS RETRASADO
	$met_orcamento4 = mysqli_fetch_array(mysqli_query($connect, $sql_orcamento4));
	// Calcula a percentagem de orçamentos e arredonda utilizando a floor
	@$estat_orcamento_mes_retrasado = floor(($met_orcamento4[0]/$meta_orcamento)*100);



	?>