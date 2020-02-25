<?php
include("./assets/php/main_header.php");
?>
<div class="banner-top-interno">
    <div class="container">
        <div class="row">
            <h1>Visualizar Recados</h1>
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
		<div class="impressao_conteudo"></div>
	</div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_nova_campanha_modal">Adicionar Material</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_posts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Exibir material</h4>
            </div>
            <div class="modal-body">
				<div class="modal_posts"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add_nova_campanha_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar Material para Impressão</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <form method="post" id="frm_campanha" enctype="multipart/form-data">
                    <label for="add_descricao_pdf">Nome do Material</label>
                    <input type="text" id="add_descricao_pdf" name = "add_descricao_pdf" placeholder="Nome do Material" class="form-control"/>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_data_inicio">Tipo</label>
                            <input type="text" id="add_data_inicio" name="add_data_inicio" class="form-control data" placeholder="Tipo" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Selecione o arquivo</label>
                    <input id="add_upload_file" name="add_upload_file" multiple type="file" class="file-loading">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="">Adicionar Material</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal para atualizar campanha -->
<div class="modal fade" id="upd_campanha_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar post</h4>
            </div>
            <form method="post" id="frm_upd_campanha" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="upd_descricao_pdf">Titulo do post</label>
                    <input type="text" id="upd_descricao_pdf" name="upd_descricao_pdf" placeholder="Titulo do Post" class="form-control"/>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_data_inicio">Data</label>
                            <input type="text" id="upd_data_inicio" name="upd_data_inicio" class="form-control data" placeholder="Data" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="" >Salvar Alterações</button>
                <input type="hidden" id="hidden_campanha_id" name="hidden_campanha_id">
                </div>
                </form>
        </div>
    </div>
</div>

<?php include("./assets/php/footer.php"); ?>

<script>
$(document).ready(function() {
	exibirPosts();
});

</script>