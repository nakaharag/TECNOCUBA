<?php include("./assets/php/login_header.php");
include("./assets/php/flashmessage.php");
// Sessao para o flash message
if (!session_id()) @session_start();
 
// Instancia a classe Flash Message
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

  if (isset($_GET['erro']) && $_GET['erro'] == 0) {
    $msg->success('O link para recuperar a senha foi enviado para o seu e-mail');
   } elseif (isset($_GET['erro']) && $_GET['erro'] == 1) {
    $msg->error('Preencha o campo e-mail');   
   } elseif (isset($_GET['erro']) && $_GET['erro'] == 2) {
    $msg->error('Este e-mail não está cadastrado');   
   } elseif (isset($_GET['erro']) && $_GET['erro'] == 3){
    $msg->error('Não foi possivel recuperar sua senha');   
   }

?>
<div class="banner-top-interno">
  <div class="container">
    <div class="row">
        <h1>Esqueci minha senha</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="form-signin">
        <h2 class="form-signin-heading">Verifique seu e-mail</h2>
        <br />
        <form id="login-form" action="./assets/php/resetar-senha.php" method="post" role="form">
        <?php $msg->display(); ?>
          <div class="form-group field-loginform-username required">
            <label class="control-label" for="email">E-mail</label>
            <input type="text" id="email" class="form-control" name="email" autofocus aria-required="true">
          </div>
            <button type="submit" class="btn btn-lg btn-danger btn-block" name="login-button">Recuperar senha</button>
        </form>
      </div>
          </div>
        </div>
</div><!-- novo-usuario -->
<?php
if (isset($_GET['erro']) && $_GET['erro'] == 0) {
  echo"
      <script>
      setTimeout(function () {    
        window.location.href = 'login.php'; 
      },5000);
      </script>";
}
include("./assets/php/footer.php");
ob_end_flush();
?>