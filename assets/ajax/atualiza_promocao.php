<?php
  include("config.php");

      $data_ini = explode('/', mysqli_real_escape_string($connect, $_POST['upd_promo_data_inicio'])); // Converte data para o formato MYSQL
      $data_inicio = $data_ini[2].'-'.$data_ini[1].'-'.$data_ini[0];
      $data_fin = explode('/', mysqli_real_escape_string($connect, $_POST['upd_promo_data_final'])); // Converte data para o formato MYSQL
      $data_final = $data_fin[2].'-'.$data_fin[1].'-'.$data_fin[0];
      $descricao_pdf = mysqli_real_escape_string($connect, $_POST['upd_promo_descricao_pdf']);
      $id = $_POST['hidden_promocao_id'];
      $obs = mysqli_real_escape_string($connect, $_POST['upd_obs_promocao']);

      $query = "UPDATE uploads SET descricao_pdf = '$descricao_pdf', data_inicio = '$data_inicio', data_final = '$data_final', obs = '$obs' WHERE `uploads`.`id` = '$id'";

      if (!$result = mysqli_query($connect, $query)) {
            exit(mysqli_error());
      }

      $query = "UPDATE usuarios SET vis_promocoes = 0"; // DEFINE A FLAG DE VISUALIZACAO IGUAL A 0
      if (!$result = mysqli_query($connect, $query)) {
            exit(mysqli_error());
      }
?>