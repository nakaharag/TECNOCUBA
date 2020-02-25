<?php
header('Content-Type: text/html; charset=UTF-8');
if (!isset($_SESSION)){
    @session_start();
}  // Somente quem tem permissão de admin possui acesso
if ($_SESSION['Permissao'] <> "1"){
   header("Location: index.php");
}
  ?>
<!DOCTYPE html>
<html lang="pt">
<meta charset="utf-8">
<head>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/google.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/circle.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/css-circular-prog-bar.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/site.css" />



    <title>DASHBOARD TECNOCUBA - ADMINISTRADOR</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->
</head>
<body>

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a class="navbar-brand hidden-xs hidden-sm" href="index.php"><img src="assets/images/logo.jpg" class="img-responsive" style="width: 140px;margin-left: 90px;"></a>
                    </div>
                    <div class="col-md-4">
                        <a class="=hidden-xs hidden-sm navbar-comercial" href=""> <img src="./assets/images/departamento-comercial.png" class="img-responsive img-area-do-representante" style="margin-top: 30px;""></a>
                    </div>
                    <div class="col-md-6" style="margin-top: -6%; margin-left: 55%;">
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
            </div>
        </nav>