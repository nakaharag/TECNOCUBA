<?php include("./assets/php/login_header.php"); ?>
<div class="banner-top-interno">
    <div class="container">
        <div class="row">
            <h1>Acesso ao sistema</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-signin">
                    <h2 class="form-signin-heading">Por favor, entre com seus dados de acesso</h2>
                    <br />
                    <form id="login-form" action="./assets/php/valida.php" method="post" role="form">
                        <div class="form-group field-loginform-username required">
                            <label class="control-label" for="email">E-mail</label>
                            <input type="text" id="email" class="form-control" name="email" autofocus aria-required="true">

                            <p class="help-block help-block-error"></p>
                        </div>
                        <div class="form-group field-inputPassword required">
                            <label class="control-label" for="senha">Senha</label>
                            <input type="password" id="senha" class="form-control" name="senha" aria-required="true">

                        <p class="help-block help-block-error"></p>
                        </div>
                        <div class="form-group field-loginform-rememberme">
                    <button type="submit" class="btn btn-lg btn-danger btn-block" name="login-button">Login</button>
                    </form>
                </div>
          </div>
    </div>
</div>

<?php include("./assets/php/footer.php") ?>