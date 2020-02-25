<?php include("./assets/php/main_header.php");
include("./assets/ajax/config.php");?>
<div class="banner-top-interno">
    <div class="container">
        <div class="row">
            <h1>Carteira de Clientes</h1>
        </div>
    </div>
</div>
<br />
<div class="container">
<div class="row">
        <br />
        <h4><i class="fa fa-home" aria-hidden="true"></i> <a href="#" onclick="window.history.back();">Voltar</a></h4>
    </div>
  <div class="row">
    <ul class="nav nav-tabs">
      <li class="active" ><a id="tabrepcli" data-toggle="tab" href="#rep_home">Clientes</a></li>
      <li><a id="tabhis" data-toggle="tab" href="#hist_clientes">Histórico de Clientes</a></li>
    </ul>
    <div class="tab-content">
        <div id="rep_home" class="tab-pane fade in active">
        <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="clientes_rep" class="table table-bordered table-hover table-radius">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Razão Social</th>
                                <th>Segmento</th>
                                <th>Contato</th>
                                <th>Telefone</th>        
                                <th>Cidade</th>
                                <th>UF</th> 
                                <th>Situação</th> 
                                <th>Ult. Compra</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_representante_cliente_modal">Adicionar novo cliente</button>
                    </div>
                </div>
            </div>
        </div>
<!-- /Content Section -->
        <div id="hist_clientes" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Histórico de clientes:</h3>
                            <label for="select_cliente">Cliente</label>
                            <?php
                                $user = $_SESSION["ID"];
                                $query = "SELECT nome_fantasia, id_cliente FROM clientes WHERE id_representante = '$user'"; 
                                $result = mysqli_query($connect, $query);

                                echo "<select class='form-control select-chosen' id='select_cliente'>";
                                while($row = mysqli_fetch_array($result)) {
                                  echo "<option value='".$row["id_cliente"]."'>".$row["nome_fantasia"]."</option>";
                                }
                                echo "</select>";
                            ?>
                        <div class="representante_historico_clientes_conteudo"></div>
                    </div>
                </div>

        </div>     
    </div>
  </div>
</div>


<div class="modal fade" id="add_representante_cliente_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar novo cliente</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">   
                        <div class="form-group">
                            <label for="add_razao_cliente">Razão Social</label>
                            <input type="text" id="add_razao_cliente" placeholder="Razão Social" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="add_nome_cliente">Nome Fantasia</label>
                            <input type="text" id="add_nome_cliente" placeholder="Nome Fantasia" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="add_cnpj_cliente">CNPJ</label>
                            <input type="text" id="add_cnpj_cliente" maxlength="18" placeholder="Apenas Números" class="form-control cpf_cnpj"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">  
                        <div class="form-group">
                            <label for="add_ddd_cliente">DDD</label>
                            <input type="text" id="add_ddd_cliente" maxlength="2" class="form-control"/>
                        </div>                  
                </div>
                <div class="col-sm-3">  
                        <div class="form-group">
                            <label for="add_telefone_cliente">Telefone</label>
                            <input type="text" id="add_telefone_cliente" placeholder="Apenas Números" class="form-control"/>
                        </div>                  
                    </div>
                    <div class="col-sm-4"> 
                        <div class="form-group">
                            <label for="add_email_cliente">E-mail</label>
                            <input type="text" id="add_email_cliente" placeholder="Separe os e-mails por virgula" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="add_contato_cliente">Contato</label>
                            <input type="text" id="add_contato_cliente" placeholder="Contato" class="form-control"/>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">                
                        <div class="form-group">
                            <label for="add_cep_cliente">CEP</label>
                            <input type="text" id="add_cep_cliente" onblur="pesquisacep(this.value);" placeholder="CEP" class="form-control cep"/>
                        </div>  
                    </div>
                    <div class="col-sm-2">  
                         <div class="form-group">
                            <label for="add_estado_cliente">Estado</label>
                            <input type="text" id="add_estado_cliente" placeholder="UF" class="form-control"/>
                        </div>                   
                    </div>
                    <div class="col-sm-5">  
                         <div class="form-group">
                            <label for="add_cidade_cliente">Cidade</label>
                            <input type="text" id="add_cidade_cliente" placeholder="Busque pelo CEP" class="form-control"/>
                        </div>                   
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_endereco_cliente">Endereço</label>
                    <input type="text" id="add_endereco_cliente" placeholder="Busque pelo CEP" class="form-control"/>
                </div>
                <div class="row">
                    <div class="col-sm-8">                
                        <div class="form-group">
                            <label for="select_segmento">Segmento</label>
                            <?php
                                $query = "SELECT id, tipo_segmento FROM segmentos_cliente"; 
                                $result = mysqli_query($connect, $query);

                                echo "<select class='form-control select-chosen' id='add_select_segmento'>";
                                while($row = mysqli_fetch_array($result)) {
                                  echo "<option value='".$row["id"]."'>".$row["tipo_segmento"]."</option>";
                                }
                                echo "</select>";
                            ?>
                        </div>  
                    </div>
                    <div class="col-sm-4">                
                        <div class="form-group">
                            <label for="add_select_tipo">Situação</label>
                            <select class='form-control' id='add_select_situacao' name='add_select_situacao'>
                                <option value='Ativo'>Ativo</option>
                                <option value='Inativo'>Inativo</option>
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_cliente_observacao">Observações</label>
                    <textarea class="form-control" placeholder="Campo de Observações"  rows="5" id="add_cliente_observacao"></textarea>
                </div> 
            </div>
            <input type="hidden" id="add_representante_cliente" value="<?php echo $user; ?>"/>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addClienteRepresentante()">Adicionar</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="upd_representante_cliente_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualizar cliente</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">   
                        <div class="form-group">
                            <label for="upd_razao_cliente">Razão Social</label>
                            <input type="text" id="upd_razao_cliente" placeholder="Razão Social" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="upd_nome_cliente">Nome Fantasia</label>
                            <input type="text" id="upd_nome_cliente" placeholder="Nome Fantasia" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="upd_cnpj_cliente">CNPJ</label>
                            <input type="text" id="upd_cnpj_cliente" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' placeholder="Apenas Números" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">  
                        <div class="form-group">
                            <label for="upd_ddd_cliente">DDD</label>
                            <input type="text" id="upd_ddd_cliente" maxlength="2" class="form-control"/>
                        </div>                  
                </div>
                <div class="col-sm-3">  
                        <div class="form-group">
                            <label for="upd_telefone_cliente">Telefone</label>
                            <input type="text" id="upd_telefone_cliente" placeholder="Apenas Números" class="form-control"/>
                        </div>                  
                    </div>
                    <div class="col-sm-4"> 
                        <div class="form-group">
                            <label for="upd_email_cliente">E-mail</label>
                            <input type="text" id="upd_email_cliente" placeholder="Separe os e-mails por virgula" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="upd_contato_cliente">Contato</label>
                            <input type="text" id="upd_contato_cliente" placeholder="Contato" class="form-control"/>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">                
                        <div class="form-group">
                            <label for="upd_cep_cliente">CEP</label>
                            <input type="text" id="upd_cep_cliente" onblur="pesquisacep(this.value);" placeholder="CEP" class="form-control cep"/>
                        </div>  
                    </div>
                    <div class="col-sm-2">  
                         <div class="form-group">
                            <label for="upd_estado_cliente">Estado</label>
                            <input type="text" id="upd_estado_cliente" placeholder="UF" class="form-control"/>
                        </div>                   
                    </div>
                    <div class="col-sm-5">  
                         <div class="form-group">
                            <label for="upd_cidade_cliente">Cidade</label>
                            <input type="text" id="upd_cidade_cliente" placeholder="Busque pelo CEP" class="form-control"/>
                        </div>                   
                    </div>
                </div>
                <div class="form-group">
                    <label for="upd_endereco_cliente">Endereço</label>
                    <input type="text" id="upd_endereco_cliente" placeholder="Busque pelo CEP" class="form-control"/>
                </div>
                <div class="row">
                    <div class="col-sm-8">                
                        <div class="form-group">
                            <label for="upd_select_segmento">Segmento</label>
                            <?php
                                $query = "SELECT id, tipo_segmento FROM segmentos_cliente"; 
                                $result = mysqli_query($connect, $query);

                                echo "<select class='form-control select-chosen' id='upd_select_segmento'>";
                                while($row = mysqli_fetch_array($result)) {
                                  echo "<option value='".$row["id"]."'>".$row["tipo_segmento"]."</option>";
                                }
                                echo "</select>";
                            ?>
                        </div>  
                    </div>
                    <div class="col-sm-4">                
                        <div class="form-group">
                            <label for="upd_select_tipo">Situação</label>
                            <select class='form-control' id='upd_select_situacao' name='upd_select_situacao'>
                                <option value='Ativo'>Ativo</option>
                                <option value='Inativo'>Inativo</option>
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="form-group">
                    <label for="upd_observacao_cliente">Observações</label>
                    <textarea class="form-control" placeholder="Campo de Observações"  rows="5" id="upd_observacao_cliente"></textarea>
                </div> 
            </div>
            <input type="hidden" id="upd_representante_cliente" value="<?php echo $user; ?>"/>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="atualizaClienteRepresentante()">Salvar Alterações</button>
                <input type="hidden" id="hidden_cliente_id">
                <input type="hidden" id="upd_data_cliente">
            </div>
        </div>
    </div>
</div>
<?php include("./assets/php/footer.php"); ?>

<script>
$(document).ready(function() {
    lerClientesRepresentante();
});
</script>

<script src="./assets/js/cnpj.js"></script>