<?php
ob_start();
include("./assets/php/login_header.php");
include("./assets/php/flashmessage.php");
// Sessao para o flash message
if (!session_id()) @session_start();
 
// Instancia a classe Flash Message
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

  if (isset($_GET['erro']) && $_GET['erro'] == 0) {
    $msg->success('Senha trocada com sucesso!');
   } elseif (isset($_GET['erro']) && $_GET['erro'] == 1) {
    $msg->error('Preencha o campo e-mail');
   } elseif (isset($_GET['erro']) && $_GET['erro'] == 2) {
    $msg->error('As senhas digitadas não conferem');   
   } elseif (isset($_GET['erro']) && $_GET['erro'] == 3){
    $msg->error('Credenciais inválidas');   
   } elseif (isset($_GET['erro']) && $_GET['erro'] == 4){
    $msg->error('Não foi possivel cadastrar este usuário');   
   }

?>
<div class="banner-top-interno">
  <div class="container">
    <div class="row">
        <h1>Trocar senha</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="form-signin">
        <h2 class="form-signin-heading">Entre com os seus dados</h2>
        <br />
        <form id="login-form" action="./assets/php/mudar-senha.php" method="post" role="form">
        <?php $msg->display(); ?>
          <div class="form-group field-loginform-username required">
            <label class="control-label" for="email">E-mail</label>
            <input type="text" id="email" class="form-control" name="email" autofocus aria-required="true">
          </div>
           <div class="form-group field-inputPassword required">
            <label class="control-label" for="senha_antiga">Senha antiga</label>
            <input type="password" id="senha_antiga" class="form-control" name="senha_antiga" autofocus aria-required="true">
          </div>
          <div class="form-group field-inputPassword required">
            <label class="control-label" for="nova_senha">Nova senha</label>
            <input type="password" id="nova_senha" class="form-control" name="nova_senha" autofocus aria-required="true">
            <p class="help-block help-block-error"></p>
          </div>
          <div class="form-group field-inputPassword required">
            <label class="control-label" for="c_nova_senha">Confirme a nova senha</label>
            <input type="password" id="c_nova_senha" class="form-control" name="c_nova_senha" aria-required="true">
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
  echo "
  <script>
  setTimeout(function () {    
    window.location.href = 'login.php'; 
  },5000);
  </script>";
}
include("./assets/php/footer.php");
ob_end_flush();
?>