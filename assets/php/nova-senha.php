<?php 
include("config.php");

$email = mysqli_real_escape_string($connect , $_POST['email']);
$token = mysqli_real_escape_string($connect , $_POST['token']);

$c_nova_senha = mysqli_real_escape_string($connect , $_POST['c_nova_senha']);
$nova_senha = mysqli_real_escape_string($connect , $_POST['nova_senha']);

if($c_nova_senha != $nova_senha){
  header("Location: /comercial/recuperar.php?erro=1&e=".$email."&t=".$token);
    // senhas não conferem
}
else
{
  $query = "UPDATE usuarios set senha = '$nova_senha' WHERE email = '$email'";

  if(mysqli_query($connect, $query))
  {
    header("Location: /comercial/recuperar.php?erro=0&e=".$email."&t=".$token); exit;
  }
  else
  {
    header("Location: /comercial/recuperar.php?erro=2&e=".$email."&t=".$token); exit;
    //Nao foi possivel cadastrar esse
  }
}
    
?>