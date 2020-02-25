<?php
include("./assets/php/main_header.php");
?>
<div class="banner-top-interno">
    <div class="container">
        <div class="row">
            <h1>Produtos</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <br />
        <h4><i class="fa fa-home" aria-hidden="true"></i> <a href="#" onclick="window.history.back();">Voltar</a></h4>
    </div>
	<div class="row">
		<br />
		<div class="table-responsive">
                        <table id="produtos" class="table table-bordered table-hover table-radius">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descrição</th>
                                <th>Esp</th>
                                <th>Aço</th>
                                <th>Qtde por caixa</th>
                                <th>Depósito antecipado</th>        
                                <th>30 dias</th>
                                <th>30/45 dias</th> 
                                <th>30/60 dias ou 30/45/60 dias ou 45 dias</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
	</div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_produto_modal">Adicionar Produtos</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add_produto_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar Produto</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="add_codigo_produto">Código do Produto</label>
                    <input type="text" id="add_codigo_produto" name = "add_codigo_produto" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="add_desc_produto">Descrição do Produto</label>
                    <input type="text" id="add_desc_produto" name="add_desc_produto" class="form-control" />
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="add_esp_produto">Esp.</label>
                            <input type="text" id="add_esp_produto" name="add_esp_produto" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="add_aco_produto">Aço</label>
                            <input type="text" id="add_aco_produto" name="add_aco_produto" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="add_qtde_produto">Qtde por Caixa</label>
                            <input type="text" id="add_qtde_produto" name="add_qtde_produto" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="add_dep_produto">Depósito Antec.</label>
                            <input type="text" onkeypress="fixComma(this.val);" id="add_dep_produto" name="add_dep_produto" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="add_dep_30_produto">30 Dias</label>
                            <input type="text" id="add_dep_30_produto" name="add_dep_30_produto" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="add_dep_45_produto">30 / 45 Dias</label>
                            <input type="text" id="add_dep_45_produto" name="add_dep_45_produto" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="add_dep_60_produto" style="font-size:12px;">30/45/60 ou 45 Dias</label>
                            <input type="text" id="add_dep_60_produto" name="add_dep_60_produto" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addProduto()">Adicionar Produto</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal para atualizar campanha -->
<!-- <div class="modal fade" id="upd_produto_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualizar Produto</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="upd_codigo_produto">Código do Produto</label>
                    <input type="text" id="upd_codigo_produto" name = "upd_codigo_produto" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="upd_desc_produto">Descrição do Produto</label>
                    <input type="text" id="upd_desc_produto" name="upd_desc_produto" class="form-control" />
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="upd_esp_produto">Esp.</label>
                            <input type="text" id="upd_esp_produto" name="upd_esp_produto" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="upd_aco_produto">Aço</label>
                            <input type="text" id="upd_aco_produto" name="upd_aco_produto" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="upd_qtde_produto">Qtde por Caixa</label>
                            <input type="text" id="upd_qtde_produto" name="upd_qtde_produto" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="upd_dep_produto">Depósito Antec.</label>
                            <input type="text" id="upd_dep_produto" name="upd_dep_produto" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="upd_dep_30_produto">30 Dias</label>
                            <input type="text" id="upd_dep_30_produto" name="upd_dep_30_produto" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="upd_dep_45_produto">30 / 45 Dias</label>
                            <input type="text" id="upd_dep_45_produto" name="upd_dep_45_produto" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="upd_dep_60_produto" style="font-size:12px;">30/45/60 ou 45 Dias</label>
                            <input type="text" id="upd_dep_60_produto" name="upd_dep_60_produto" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="">Atualizar Produto</button>
            </div>
        </div>
    </div>
</div> -->

<?php include("./assets/php/footer.php"); ?>

<script>
$(document).ready(function() {
	lerProdutos();

    $(document).delegate("input, textarea", "keyup", function(event){
        if(event.which === 188) {
            var cleanedValue = $(this).val().replace(",",".");
            $(this).val(cleanedValue);
        }
    });
});

</script>