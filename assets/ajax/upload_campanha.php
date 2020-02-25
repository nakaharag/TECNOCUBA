<?php
  include("config.php");
   if(isset($_FILES['add_upload_file']))
   {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

      $data_ini = explode('/', $_POST['add_data_inicio']); // Converte data para o formato MYSQL
      $data_inicio = $data_ini[2].'-'.$data_ini[1].'-'.$data_ini[0];
      $data_fin = explode('/', $_POST['add_data_final']); // Converte data para o formato MYSQL
      $data_final = $data_fin[2].'-'.$data_fin[1].'-'.$data_fin[0];
      $descricao_pdf = $_POST['add_descricao_pdf'];
      $ext = strtolower(substr($_FILES['add_upload_file']['name'],-4)); //Pegando extensão do arquivo
      $new_name = "campanha - " . $data_inicio . $ext; //Definindo um novo nome para o arquivo
      $pasta = '/pdf/'; //Diretório para uploads
      $dirpath = dirname(getcwd()).$pasta;
      $obs = mysqli_real_escape_string($connect, $_POST['add_obs_campanha']);

      $arquivo_path = $dirpath.$new_name;

      move_uploaded_file($_FILES['add_upload_file']['tmp_name'], $dirpath.$new_name); //Fazer upload do arquivo

      $query = "INSERT INTO uploads (arquivo_path, descricao_pdf, tipo, data_inicio, data_final, obs) VALUES ('$arquivo_path', '$descricao_pdf', 1, '$data_inicio', '$data_final', '$obs')"; // DEFINE A FLAG DE VISUALIZACAO IGUAL A 0
      if (!$result = mysqli_query($connect, $query)) {
            exit(mysqli_error());
      }

      echo $query;

      $query = "UPDATE usuarios SET vis_campanhas =0"; // DEFINE A FLAG DE VISUALIZACAO IGUAL A 0
      if (!$result = mysqli_query($connect, $query)) {
            exit(mysqli_error());
      }


   }

?>