<?php include("./assets/php/main_header.php");

include("./assets/ajax/config.php");

?>

<div class="banner-top-interno">
    <div class="container">
        <div class="row">
            <h1>Visitas / Negociações</h1>
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
            <h3>Histórico de Interações:</h3>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="representante_conteudo" class="table table-bordered table-hover table-radius">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Contato</th>
                                <th>Segmento</th>        
                                <th>Telefone</th>
                                <th>Data Fech.</th> 
                                <th>Valor</th> 
                                <th>Status</th>
                                <th>Status Ant.</th>
                                <th>Obs.</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_nova_visita_modal">Adicionar nova Interação</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_nova_visita_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar nova Interação</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_data_visita">Data de Retorno</label>
                            <input type="text" id="add_data_visita" class="form-control data"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_data_previsao_visita">Previsão de Fechamento</label>
                            <input type="text" id="add_data_previsao_visita" placeholder="Previsão de Fechamento" class="form-control data"/>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_valor_visita">Valor do Pedido</label>
                            <input type="text" id="add_valor_visita" placeholder="Valor do Pedido" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_status_visita">Status</label>
                            <?php
                            $query = "SELECT id, descricao FROM status_visita";
                            $result = mysqli_query($connect, $query);

                            echo "<select class='form-control' id='add_status_visita'>";
                            while($row = mysqli_fetch_array($result)) {
                              echo "<option value='".$row["id"]."'>".$row["descricao"]."</option>";
                            }
                            echo "</select>";
                        ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_cliente_visita">Cliente</label>
                            <?php
                                $user = $_SESSION["ID"];
                                $query = "SELECT razao, id_cliente FROM clientes WHERE id_representante = '$user'"; 
                                $result = mysqli_query($connect, $query);

                                echo "<select class='form-control cliente_ajax select-chosen' id='add_cliente_visita'>";
                                while($row = mysqli_fetch_array($result)) {
                                  echo "<option value='".$row["id_cliente"]."'>".$row["razao"]."</option>";
                                }
                                echo "</select>";
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_segmento_visita_tipo">Segmento</label>
                            <input type="text" id="add_segmento_visita_tipo" placeholder="Selecione o cliente" class="form-control" readonly="readonly">
                            <input type="hidden" id="add_segmento_visita">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_email_visita">E-mail</label>
                            <input type="text" id="add_email_visita" placeholder="Selecione o cliente" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_contato_visita">Contato</label>
                            <input type="text" id="add_contato_visita" placeholder="Selecione o cliente" class="form-control" readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_observacao_visita">Observação</label>
                    <textarea class="form-control" placeholder="Observação" rows="3" id="add_observacao_visita"></textarea>
                </div>
                 <input type="hidden" id="id_user" value="<?php echo $_SESSION['ID']?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addVisitaRepresentante()">Adicionar</button>
            </div>
        </div>
    </div>
</div>

<<div class="modal fade" id="upd_rep_visita_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualizar Interação</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_data_visita">Data de Retorno</label>
                            <input type="text" id="upd_data_visita" class="form-control data"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_data_previsao_visita">Previsão de Fechamento</label>
                            <input type="text" id="upd_data_previsao_visita" placeholder="Previsão de Fechamento" class="form-control data"/>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_valor_visita">Valor do Pedido</label>
                            <input type="text" id="upd_valor_visita" placeholder="Valor do Pedido" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_status_visita">Status</label>
                            <?php
                            $query = "SELECT id, descricao FROM status_visita";
                            $result = mysqli_query($connect, $query);

                            echo "<select class='form-control' id='upd_status_visita'>";
                            while($row = mysqli_fetch_array($result)) {
                              echo "<option value='".$row["id"]."'>".$row["descricao"]."</option>";
                            }
                            echo "</select>";
                        ?>
                        </div>
                    </div>
                </div>
                   <div class="form-group">
                            <label for="upd_cliente_visita">Cliente</label>
                            <?php
                                $user = $_SESSION["ID"];
                                $query = "SELECT razao, id_cliente FROM clientes WHERE id_representante = '$user'"; 
                                $result = mysqli_query($connect, $query);

                                echo "<select class='form-control cliente_ajax select-chosen' id='upd_cliente_visita'>";
                                while($row = mysqli_fetch_array($result)) {
                                  echo "<option value='".$row["id_cliente"]."'>".$row["razao"]."</option>";
                                }
                                echo "</select>";
                            ?>
                        </div>

                <div class="form-group">
                    <label for="upd_observacao_visita">Observação</label>
                    <textarea class="form-control" placeholder="Observação" rows="3" id="upd_observacao_visita"></textarea>
                </div>
                 <input type="hidden" id="id_user" value="<?php echo $_SESSION['ID']?>">
                 <input type="hidden" id="hidden_visita_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="atualizaVisitaRepresentante()">Atualizar</button>
            </div>
        </div>
    </div>
</div>
<?php include("./assets/php/footer.php"); ?>

<script>
$(document).ready(function() {
    lerVisitasRepresentante();
});
</script>

