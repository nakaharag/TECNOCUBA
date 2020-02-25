<?php if (!isset($_SESSION)) session_start();

  // Verifica se não há a variável da sessão que identifica o usuário ou se foi solicitado logout
  if (!isset($_SESSION['ID']) || isset($_GET['logout'])) {
    session_start();
    session_destroy();
    unset($_GET['logout']);
      // Destrói a sessão por segurança
      // Redireciona o visitante de volta pro login
     header("Location: login.php"); exit;
  } 
   
  ?>
<!DOCTYPE html>
<html lang="pt">
<meta charset="utf-8">
<head>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <meta http-equiv="refresh" content="120" > 
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/google.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/circle.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/css-circular-prog-bar.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/site.css">


    <title>DASHBOARD TECNOCUBA</title>

</head>
<body>

        <nav class="navbar navbar-default navbar-static-top">
                <div class="row">
                    <div class="col-md-3">
                        <a class="navbar-brand hidden-xs hidden-sm" href="index.php"><img src="./assets/images/logo_tecnocuba.png" class="img-responsive"></a>
                    </div>
                    <div class="col-md-4">
                        <a class="=hidden-xs hidden-sm navbar-comercial" href=""> <img src="./assets/images/departamento-comercial.png" class="img-responsive"></a>
                    </div>
                    <div class="col-md-5">
                        <ul class="">
                            <?php 
                              if ($_SESSION['Permissao'] == "1"){
                                echo "<li>";
                                echo "<a href = 'admin.php'>Admin <i class='fa fa-user icon-red' aria-hidden='true'></i>
                                </a>";
                                echo "</li>";
                              }
                            ?>
                            <li>
                                <a href="ranking.php">Ranking <i class="fa fa-line-chart icon-red" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="calendario.php">Calendário <i class="fa fa-calendar-o icon-red" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="recados.php">
                                    Mensagens <i class="fa fa-comment-o icon-red" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href = "index.php?logout">Sair <i class="fa fa-power-off icon-red" aria-hidden="true"></i>
                                </a>
                            </li>                         
                        </ul>
                    </div>
                </div>
        </nav>