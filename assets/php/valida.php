<?php
include("config.php");

  if (isset($_SESSION['ID'])) {
      // Destrói a sessão por segurança
      session_destroy();
  }

  $email = mysqli_real_escape_string($connect , $_POST['email']);
  $senha = mysqli_real_escape_string($connect , $_POST['senha']);
   
  // Validação do usuário/senha digitados
  $sql = "SELECT `id`, `usuario_nome`, `permissao` FROM `usuarios` WHERE (`email` = '".$email ."') AND (`senha` = '". $senha ."') AND (`permissao` IS NOT NULL) LIMIT 1";
  $query = mysqli_query($connect, $sql);

  if (mysqli_num_rows($query) != 1) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
       header("Location: /comercial/login.php"); exit;
  } else {
      
      if (!isset($_SESSION)) session_start(); // Se a sessão não existir, inicia uma

      // Salva os dados encontados na variável $resultado

      while ($resultado = mysqli_fetch_assoc($query)) {
      $_SESSION['ID'] = $resultado['id'];
      $_SESSION['Nome'] = $resultado['usuario_nome'];
      $_SESSION['Permissao'] = $resultado['permissao'];
      $_SESSION['vis_campanhas'] = $resultado['vis_campanhas'];
      $_SESSION['vis_promocoes'] = $resultado['vis_promocoes'];
      $_SESSION['vis_informativo'] = $resultado['vis_informativo'];
      }

      // Redireciona o visitante
      //$msg->success('Seja bem vindo (a), '.$resultado['nome'], '/index.php'); exit;
      //$msg->display();
      header("Location: /comercial/index.php"); exit;
  }
   
  ?>