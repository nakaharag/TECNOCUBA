<?php include("config.php");

$email = $_POST['email'];
$senha = md5(sha1($_POST['senha']));
$nome = $_POST['nome'];
$permissao = 2; // Permissao de usuario comum padrao

$query_select = "SELECT email FROM usuarios WHERE email = '$email'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
$emarray = $array['email'];

if($email == "" || $email == null)
{
  header("Location: /comercial/novo-usuario.php?erro=1"); exit;
  // Preencher email
  //echo "<script> location.replace('/novo-usuario.php?erro=1); </script>";
}
else
{
  if($emarray == $email){
    header("Location: /comercial/novo-usuario.php?erro=2"); exit;
    //echo "<script> location.replace('/novo-usuario.php?erro=2); </script>";
    // ja existe
  }
  else
  {
    $query = "INSERT INTO usuarios (usuario_nome, email,senha,permissao) VALUES ('$nome','$email','$senha','$permissao')";

    if(mysqli_query($connect,$query)){
       header("Location: /comercial/novo-usuario.php?erro=0"); exit;
       //echo "<script> location.replace('/novo-usuario.php?erro=0); </script>";
    }
    else
    {
      header("Location: /comercial/novo-usuario.php?erro=3"); exit;
      //echo "<script> location.replace('/novo-usuario.php?erro=3); </script>";
      //Nao foi possivel cadastrar esse
    }
  }
}
?>