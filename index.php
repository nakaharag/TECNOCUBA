<?php
include("./assets/php/main_header.php");
include("./assets/php/estatisticas.php");

?>
<div class="banner-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-offset-1">
                        <h1 class="h1-banner">Suas vendas viram créditos para gastar no seu cartão.</h1>
                        <p>Na intenção de promover as vendas e fidelizar seu consultor, a Tecnocuba possui o programa de incentivo feito na medida.</p>
                        <a href="#">Saiba mais ></a>
                    </div>
                        <!--<div class="col-md-5">
                            <img src="assets/images/cartao-tecnocuba.png" class="img-responsive">
                       </div>
                 <div class="col-md-1"></div>-->
            </div>
        </div>
    </div>
    <div id="content">
        <div class="botoes-de-chamada">
            <div class="container">
                <div class="row linha-do-botao">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="posts.php"><img <?php echo $posts;?> src="assets/images/button-whats-content.png" alt=""></a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="tabela.php"><img src="assets/images/button-tabela-content.png" alt=""></a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="orcamento.php"><img src="assets/images/button-orcamento-content.png" alt=""></a>
                        </div>
                    </div>    <!--/.row -->
                </div>
                <div class="row linha-do-botao">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="impressao.php"><img src="assets/images/button-impressao-content.png" alt=""></a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="produtos.php"><img src="assets/images/button-produtos-content.png" alt=""></a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="recados.php"><img src="assets/images/button-recados-content.png" alt=""></a>
                        </div>
                    </div>    <!--/.row -->
                </div>
                <div class="row linha-do-botao">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="campanhas.php"><img <?php echo $campanha;?> src="assets/images/button-campanhas-content.png" alt=""></a>
                            <!--<div class="botao-chamada">
                                <!--<a href="campanhas.php">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="assets/images/botao-de-campanha.png" class="img-btn-chamada">
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Campanhas</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>-->
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="promocoes.php"><img <?php echo $promocao;?> src="assets/images/button-promocao-content.png" alt=""></a>
                            <!--<div class="botao-chamada">
                                <a href="promocoes.php">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="assets/images/botao-promocoes.png" class="img-btn-chamada">
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Promoções</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>-->
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="informativo.php"><img <?php echo $informativo;?> src="assets/images/button-informativo-content.png" alt=""></a>
                            <!--<div class="botao-chamada">
                                <a href="informativo.php">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="assets/images/botao-informativo.png" class="img-btn-chamada">
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Informativo</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>-->
                        </div>
                    </div>    <!--/.row -->
                </div>
                <div class="row linha-do-botao">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="visitas.php"><img src="assets/images/button-visitas-content.png" alt=""></a>
                            <!--<div class="botao-chamada">
                                <a href="visitas.php">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="assets/images/botao-visitas-negociacoes.png" class="img-btn-chamada">
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Visitas / negociações</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>-->
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="#"><img src="assets/images/button-inclusao-content.png" alt=""></a>
                            <!--<div class="botao-chamada">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="assets/images/botao-inclusao-de-pedido.png" class="img-btn-chamada">
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Inclusão de pedidos</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>-->
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="#"><img src="assets/images/button-situacao-content.png" alt=""></a>
                            <!--<div class="botao-chamada">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="assets/images/botao-situacao-do-pedido.png" class="img-btn-chamada">
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Situação do pedido</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>-->
                        </div>
                    </div>    <!--/.row -->
                </div>
                <div class="row linha-do-botao">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="vendas.php"><img src="assets/images/button-vendas-content.png" alt=""></a>
                            <!--<div class="botao-chamada">
                            <a href="vendas.php">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="assets/images/botao-vendas.png" class="img-btn-chamada">
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Vendas</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>-->
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="clientes.php"><img src="assets/images/button-clientes-content.png" alt=""></a>
                            <!--<div class="botao-chamada">
                                <a href="clientes.php">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="assets/images/botao-clientes.png" class="img-btn-chamada">
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Clientes</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>-->
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="contato.php"><img src="assets/images/button-fale-content.png" alt=""></a>
                            <!--<div class="botao-chamada">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="assets/images/botao-abertura-chamado.png" class="img-btn-chamada">
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Abertura de chamado</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="row linha-do-botao">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="reuniao.php" target="_blank"><img src="assets/images/button-reuniao-content.png" alt="" ></a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="learning.php" target="_blank"><img src="assets/images/button-learning-content.png"  alt=""></a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="palestras.php" target="_blank"><img src="assets/images/button-palestras-content.png"  alt=""></a>
                        </div>
                    </div>    <!--/.row -->
                </div>
                <div class="row">
                    <div class="col-md-10 col-sm-offset-1">
                        <div class="tabela">
                            <img src="assets/images/ranking.png" class="img-responsive">
                            <?php include("assets/php/rank5.php"); ?>
                        </div>
                    </div>
                </div>
                <!--/.row -->
            </div>
            <!--/.container -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-sm-offset-1">
                    <div class="col-md-4 col-xs-12">
                        <div class="graficos">
                            <h2>% de Vendas</h2>
                            <div class="c100 p<?php echo $estat_vendas > 100?100:$estat_vendas; ?> big orange" style="color: #dd9d22 !important;">
                                <span><?php echo $estat_vendas; ?>%</span> <!-- Exibe o resultado do include estatisticas.php -->
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <div class="rodape-grafico">
                                <p><span><?php echo $mes_passado; ?></span><span class="percent"><?php echo $estat_vendas_mes_passado; ?>%</span></p>
                                <p><span><?php echo $mes_anterior; ?></span><span class="percent"><?php echo $estat_vendas_mes_anterior; ?>%</span></p>
                                <p><span><?php echo $mes_retrasado; ?></span><span class="percent"><?php echo $estat_vendas_mes_retrasado;?>%</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="graficos">
                            <h2>% de Contatos</h2>
                            <div class="c100 p<?php echo $estat_contato>100?100:$estat_contato; ?> big" style="color: #307bbb !important;">
                                <span><?php echo $estat_contato;?>%</span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <div class="rodape-grafico">
                                <p><span><?php echo $mes_passado; ?></span><span class="percent"><?php echo $estat_contato_mes_passado; ?>%</span></p>
                                <p><span><?php echo $mes_anterior; ?></span><span class="percent"><?php echo $estat_contato_mes_anterior; ?>%</span></p>
                                <p><span><?php echo $mes_retrasado; ?></span><span class="percent"><?php echo $estat_contato_mes_retrasado; ?>%</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="graficos">
                            <h2>% de Orçamentos</h2>
                            <div class="c100 p<?php echo $estat_orcamento>100?100:$estat_orcamento; ?> big green" style="color: #4db53c !important;">
                                <span><?php echo $estat_orcamento; ?>%</span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                            <div class="rodape-grafico">
                                <p><span><?php echo $mes_passado; ?></span><span class="percent"><?php echo $estat_orcamento_mes_passado; ?>%</span></p>
                                <p><span><?php echo $mes_anterior; ?></span><span class="percent"><?php echo $estat_orcamento_mes_anterior; ?>%</span></p>
                                <p><span><?php echo $mes_retrasado; ?></span><span class="percent"><?php echo $estat_orcamento_mes_retrasado; ?>%</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-sm-offset-1">
                    <div class="col-md-8 col-xs-12">
                        <div class="noticia">
                            <div class="col-md-5">
                                <img src="assets/images/post-image.png" class="img-responsive">
                                <div class="row">
                                    <div class="col-md-6 pull-left">
                                        <i class="fa fa-user-o" aria-hidden="true"></i> Admin
                                    </div>
                                    <div class="col-md-6 pull-right">
                                        8:15 AM
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3>Modelo de embutir, foi projetado com dimensões maiores</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-share-alt  fa-rotate-90" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                                <div class="row">
                                    <div class="col-md-4 pull-left">
                                        <a href="#">Veja mais ></a>
                                    </div>
                                    <div class="col-md-8 pull-right">
                                        <div style="float: right;">
                                            <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                            <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                            <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= include("./assets/php/footer.php") ?>