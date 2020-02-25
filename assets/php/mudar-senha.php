<?php 
include("config.php");


$email = mysqli_real_escape_string($connect , $_POST['email']);
$senha_antiga = mysqli_real_escape_string($connect , $_POST['senha_antiga']);
$c_nova_senha = mysqli_real_escape_string($connect , $_POST['c_nova_senha']);
$nova_senha = mysqli_real_escape_string($connect , $_POST['nova_senha'])  ;

$query_select = "SELECT email, senha FROM usuarios WHERE email = '$email' AND senha = '$senha_antiga'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select, MYSQLI_ASSOC);
$emarray = $array['email'];

  if($email == "" || $email == null){
    header("Location: /comercial/troca-senha.php?erro=1"); exit;
    // Preencher email
  }
  else if ($c_nova_senha != $nova_senha || $senha_antiga == "" || $senha_antiga == null)
  {
    header("Location: /comercial/troca-senha.php?erro=2"); exit;
    // senhas não conferem
  }
  else if(!isset($emarray))
  {
    header("Location: /comercial/troca-senha.php?erro=3"); exit;
    //email invalido
  }
  else
    {
      
      $query = "UPDATE usuarios set senha = '$nova_senha' WHERE email = '$email'";
      $insert = mysqli_query($connect, $query);
      
      if($insert)
      {
        header("Location: /comercial/troca-senha.php?erro=0"); exit;
      }
      else
      {
        header("Location: /comercial/troca-senha.php?erro=4"); exit;
        //Nao foi possivel cadastrar esse
      }
    }
?>