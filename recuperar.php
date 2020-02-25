<?php 
ob_start();
include("./assets/php/config.php");
include("./assets/php/login_header.php");
include("./assets/php/flashmessage.php");
// Sessao para o flash message
if (!session_id()) @session_start();

$email = mysqli_real_escape_string($connect , $_GET['e']);
$token = mysqli_real_escape_string($connect , $_GET['t']);

$query_select = "SELECT token FROM usuarios WHERE email = '$email'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select, MYSQLI_ASSOC);
$tokarray = mysqli_real_escape_string($connect , $array['token']);

if(!isset($tokarray) || $tokarray != $token)
{
  header("Location: /esqueci-senha.php?erro=3"); exit;
  // erro
} 

$msg = new \Plasticbrain\FlashMessages\FlashMessages();

  if (isset($_GET['erro']) && $_GET['erro'] == 0) {
    $msg->success('Senha recuperada com sucesso!');
   } elseif (isset($_GET['erro']) && $_GET['erro'] == 1) {
    $msg->error('As digitadas senhas não conferem');
   } elseif (isset($_GET['erro']) && $_GET['erro'] == 2) {
    $msg->error('Não foi possivel recuperar sua senha. Tente novamente');   
   }
?>

<div class="banner-top-interno">
  <div class="container">
    <div class="row">
        <h1>Senha</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="form-signin">
        <h2 class="form-signin-heading">Insira a nova senha</h2>
        <br />
        <form id="login-form" action="./assets/php/nova-senha.php" method="post" role="form">
        <?php $msg->display(); ?>
          <div class="form-group field-inputPassword required">
            <label class="control-label" for="nova_senha">Nova senha</label>
            <input type="password" id="nova_senha" class="form-control" name="nova_senha" autofocus aria-required="true">
            <p class="help-block help-block-error"></p>
          </div>
          <div class="form-group field-inputPassword required">
            <label class="control-label" for="c_nova_senha">Confirme a nova senha</label>
            <input type="password" id="c_nova_senha" class="form-control" name="c_nova_senha" aria-required="true">
            <input type="hidden" id="email" name="email" value="<?php echo $email;?>"/>
            <input type="hidden" id="token" name="token" value="<?php echo $token;?>"/>
            <p class="help-block help-block-error"></p>
          </div>
            <button type="submit" class="btn btn-lg btn-danger btn-block" name="login-button">Alterar senha</button>
        </form>
      </div>
          </div>
        </div>
</div><!-- novo-usuario -->
<?php
if (isset($_GET['erro']) && $_GET['erro'] == 0) {
  $query = "UPDATE usuarios set token = NULL WHERE email = '$email'";
  mysqli_query($connect, $query);
  echo "
  <script>
  setTimeout(function () {    
    window.location.href = 'login.php'; 
  },4000);
  </script>";
}
include("./assets/php/footer.php");
ob_end_flush();
?>