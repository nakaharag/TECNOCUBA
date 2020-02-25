<?php include("./assets/php/main_header.php"); ?>


<div class="banner-top-interno">
    <div class="container">
        <div class="row">
            <h1>Contato</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
    <div class="row">
        <br />
        <h4><i class="fa fa-home" aria-hidden="true"></i> <a href="#" onclick="window.history.back();">Voltar</a></h4>
    </div>
        <div class="col-md-3"></div>
        <div class="col-md-6 center-block">
            <div class="form-signin">
                    <h2 class="form-signin-heading">Fale com a Empresa</h2>
                    <br />
                    <form id="login-form" action="" method="post" role="form">
                        <div class="form-group field-loginform-username required">
                            <label class="control-label" for="usuario">Nome</label>
                            <input type="text" id="usuario" class="form-control" name="usuario" autofocus aria-required="true" readonly="readonly" value="<?php echo $_SESSION['Nome']; ?>">

                            <p class="help-block help-block-error"></p>
                        </div>
                        <div class="form-group field-loginform-username required">
                            <label class="control-label" for="assunto">Assunto</label>
                            <input type="text" id="assunto" class="form-control" name="assunto" autofocus aria-required="true">

                            <p class="help-block help-block-error"></p>
                        </div>
                        <div class="form-group field-loginform-username required">
                            <label class="control-label" for="destino">Destino</label>
                            <select class="form-control" id="destino" name="destino">
                                <option>Produção</option>
                                <option>Expedição</option>
                                <option>Comercial</option>
                                <option>Marketing</option>
                                <option>Financeiro</option>
                                <option>Diretoria</option>
                              </select>
                            <p class="help-block help-block-error"></p>
                        </div>
                        <div class="form-group field-inputPassword required">
                            <label class="control-label" for="senha">Comentários</label>

                            <textarea class="form-control" rows="5" name="comentarios" id="comentarios"></textarea>
                        <p class="help-block help-block-error"></p>
                        </div>
                    <button type="submit" class="btn btn-lg btn-danger btn-block" name="login-button">Enviar</button>
                    </form>
                </div>
        </div>
    </div>

<?php include("./assets/php/footer.php");

// Exibe as vendas de cada representante, passando o ID do usuario logado como parâmetro
?>