<?php include("./assets/php/main_header.php"); ?>


<div class="banner-top-interno">
    <div class="container">
        <div class="row">
            <h1>Vendas</h1>
        </div>
    </div>
</div>
<div class="container">
<div class="row">
        <br />
        <h4><i class="fa fa-home" aria-hidden="true"></i> <a href="#" onclick="window.history.back();">Voltar</a></h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Representante: <?php echo $_SESSION['Nome']; ?></h3>

            <div class="representante_conteudo_vendas"></div>
        </div>
    </div>

<?php include("./assets/php/footer.php");

// Exibe as vendas de cada representante, passando o ID do usuario logado como parâmetro
echo "<script type ='text/javascript'>";
echo "$(document).ready(function () {
        lerVendasRepresentante(".$_SESSION['ID'].")
        });";
echo "</script>";
?>