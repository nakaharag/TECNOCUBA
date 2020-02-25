<?php include("./assets/php/admin_header.php"); 
include("./assets/ajax/config.php");
?>

<div class="banner-top-interno">
    <div class="container">
        <div class="row">
            <h1>Administração do sistema</h1>
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
      <li class="active" ><a id="tabrep" data-toggle="tab" href="#home">Representantes</a></li>
      <li><a id="tabcli" data-toggle="tab" href="#clientes">Clientes</a></li>
      <li><a id="tabven" data-toggle="tab" href="#visitas">Interações</a></li>
      <li><a id="tabstat" data-toggle="tab" href="#status">Status de visitas</a></li>
      <li><a id="tabseg" data-toggle="tab" href="#segmento">Segmentos</a></li>
      <li><a id="tabcamp" data-toggle="tab" href="#campanhas">Campanhas</a></li>
      <li><a id="tabpromo" data-toggle="tab" href="#promocoes">Promoções</a></li>
      <li><a id="tabinfo" data-toggle="tab" href="#informativos">Informativos</a></li>
      <li><a id="tabpost" data-toggle="tab" href="#posts">Posts</a></li>
      <li><a id="tabmat" data-toggle="tab" href="#materiais">Materiais</a></li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="row">
                <div class="col-md-12">
                    <h3>Usuários do sistema:</h3>

                    <div class="records_content"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_new_record_modal">Adicionar novo usuário</button>
                    </div>
                </div>
            </div>
        </div>
<!-- /Content Section -->
        <div id="clientes" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Cadastro de clientes:</h3>

                        <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="clientes_admin" class="table table-bordered table-hover table-radius">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Razão Social</th>
                                <th>Representante</th>
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
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_novo_cliente_modal">Adicionar novo cliente</button>
                        </div>
                </div>
            </div>
        </div>     
        <div id="visitas" class="tab-pane fade">
            <div class="row">
                <div class="col-md-12">
                <h3>Relatório de Interações:</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="visitas_conteudo" class="table table-bordered table-hover table-radius">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Representante</th>
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
            </div><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_nova_visita_modal">Adicionar nova interação</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="status" class="tab-pane fade">
            <div class="row">
                <div class="col-md-12">
                    <h3>Status de negociação:</h3>

                    <div class="status_conteudo"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_novo_status_modal">Adicionar novo status</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="segmento" class="tab-pane fade">
            <div class="row">
                <div class="col-md-12">
                    <h3>Segmentos:</h3>

                    <div class="segmentos_conteudo"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_novo_segmento_modal">Adicionar novo segmento</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="campanhas" class="tab-pane fade">
            <div class="row">
                <div class="col-md-12">
                    <h3>Campanhas:</h3>

                    <div class="campanhas_conteudo"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_nova_campanha_modal">Adicionar Campanha</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="promocoes" class="tab-pane fade">
            <div class="row">
                <div class="col-md-12">
                    <h3>Promoções:</h3>

                    <div class="promocoes_conteudo"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_nova_promocao_modal">Adicionar Promoção</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="informativos" class="tab-pane fade">
            <div class="row">
                <div class="col-md-12">
                    <h3>Informativos:</h3>

                    <div class="informativos_conteudo"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_novo_informativo_modal">Adicionar Informativo</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="posts" class="tab-pane fade">
            <div class="row">
                <div class="col-md-12">
                    <h3>Posts:</h3>

                    <div class="pots_conteudo"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_novo_post_modal">Adicionar Post</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="materiais" class="tab-pane fade">
            <div class="row">
                <div class="col-md-12">
                    <h3>Materiais:</h3>

                    <div class="materiais_conteudo"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-default btn-red" data-toggle="modal" data-target="#add_novo_material_modal">Adicionar Material</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar novo usuario</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="first_name">Nome</label>
                    <input type="text" id="add_nome" placeholder="Nome" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="last_name">Permissão</label>
                      <select class="form-control" id="add_permissao">
                        <option value = "1">Administrador</option>
                        <option value = "2">Usuário Comum</option>
                      </select>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" id="add_email" placeholder="E-mail" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="meta_vendas">Meta de Vendas</label>
                    <input type="text" id="add_meta_vendas" placeholder="Somente números" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="meta_orcamento">Meta de Orçamentos</label>
                    <input type="text" id="add_meta_orcamento" placeholder="Meta de Orçamentos" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="meta_contato">Meta de Contatos</label>
                    <input type="text" id="add_meta_contato" placeholder="Meta de Contatos" class="form-control"/>
                </div>
                <p>Senha inicial padrão: 123456</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Adicionar</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualizar Usuário</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_first_name">Nome</label>
                    <input type="text" id="upd_nome" placeholder="Nome" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="last_name">Permissão</label>
                      <select class="form-control" id="upd_permissao">
                        <option value = "1">Administrador</option>
                        <option value = "2">Usuário Comum</option>
                      </select>
                </div>

                <div class="form-group">
                    <label for="update_email">E-mail</label>
                    <input type="text" id="upd_email" placeholder="E-mail" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="meta_vendas">Meta de Vendas</label>
                    <input type="text" id="upd_meta_vendas" placeholder="Somente números" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="meta_orcamento">Meta de Orçamentos</label>
                    <input type="text" id="upd_meta_orcamento" placeholder="Meta de Orçamentos" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="meta_contato">Meta de Contatos</label>
                    <input type="text" id="upd_meta_contato" placeholder="Meta de Contatos" class="form-control"/>
                </div>                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Salvar Alterações</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Modals -->
<!-- Modal - Add New Visita s-->
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
                            <input type="text" id="add_segmento_visita_tipo" placeholder="Selecione o cliente" class="form-control">
                            <input type="hidden" id="add_segmento_visita">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_contato_visita">Contato</label>
                            <input type="text" id="add_contato_visita" placeholder="Selecione o cliente" class="form-control" readonly="readonly"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_representante_visita">Representante</label>
                            <input type="text" id="add_representante_visita_nome" class="form-control" readonly="readonly" placeholder="Selecione o cliente"/>
                        </div>
                        <input type="hidden" id="add_representante_visita">
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_email_visita">E-mail</label>
                    <input type="text" id="add_email_visita" placeholder="Selecione o cliente" class="form-control" readonly="readonly" placeholder="Selecione o cliente"/>
                </div>
                <div class="form-group">
                    <label for="add_observacao_visita">Observação</label>

                    <textarea class="form-control" placeholder="Observação" rows="3" id="add_observacao_visita"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addVisita()">Adicionar</button>
            </div>
        </div>
    </div>
</div>

<<div class="modal fade" id="upd_visita_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                            <label for="upd_data">Data de Retorno</label>
                            <input type="text" id="upd_data" class="form-control data"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_data_previsao">Previsão de Fechamento</label>
                            <input type="text" id="upd_data_previsao" placeholder="Previsão de Fechamento" class="form-control data"/>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_valor_pedido">Valor do Pedido</label>
                            <input type="text" id="upd_valor_pedido" placeholder="Valor do Pedido" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_status">Status</label>
                            <?php
                            $query = "SELECT id, descricao FROM status_visita";
                            $result = mysqli_query($connect, $query);

                            echo "<select class='form-control' id='upd_status'>";
                            while($row = mysqli_fetch_array($result)) {
                              echo "<option value='".$row["id"]."'>".$row["descricao"]."</option>";
                            }
                            echo "</select>";
                        ?>
                        </div>
                    </div>
                </div>
                   <div class="form-group">
                            <label for="upd_cliente_nome">Cliente</label>
                            <?php
                                $user = $_SESSION["ID"];
                                $query = "SELECT razao, id_cliente FROM clientes WHERE id_representante = '$user'"; 
                                $result = mysqli_query($connect, $query);

                                echo "<select class='form-control cliente_ajax select-chosen' id='upd_cliente_nome'>";
                                while($row = mysqli_fetch_array($result)) {
                                  echo "<option value='".$row["id_cliente"]."'>".$row["razao"]."</option>";
                                }
                                echo "</select>";
                            ?>
                        </div>

                <div class="form-group">
                    <label for="upd_observacao">Observação</label>
                    <textarea class="form-control" placeholder="Observação" rows="3" id="upd_observacao"></textarea>
                </div>
                 <input type="hidden" id="hidden_visita_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger pull-left" onclick="deletaVisita()">Excluir</button>
                <button type="button" class="btn btn-primary" onclick="atualizaVisita()">Atualizar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_novo_cliente_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar novo cliente</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="add_representante_cliente">Representante</label>
                    <?php
                        $query = "SELECT usuario_nome, id FROM usuarios";
                        $result = mysqli_query($connect, $query);

                        echo "<select class='form-control select-chosen' id='add_representante_cliente'>";
                        while($row = mysqli_fetch_array($result)) {
                          echo "<option value='".$row["id"]."'>".$row["usuario_nome"]."</option>";
                        }
                        echo "</select>";
                    ?>
                </div>
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
                            <input type="text" id="add_cnpj_cliente" onblur="validaCnpj(this.value);" placeholder="Apenas Números" class="form-control"/>
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
                    <div class="col-sm-6">                
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
                    <div class="col-sm-6">                
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addCliente()">Adicionar</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="upd_cliente_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualizar cliente</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="upd_representante_cliente">Representante</label>
                    <?php
                        $query = "SELECT usuario_nome, id FROM usuarios";
                        $result = mysqli_query($connect, $query);

                        echo "<select class='form-control select-chosen' id='upd_representante_cliente'>";
                        while($row = mysqli_fetch_array($result)) {
                          echo "<option value='".$row["id"]."'>".mysqli_real_escape_string($connect, $row["usuario_nome"])."</option>";
                        }
                        echo "</select>";
                    ?>
                </div>
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
                            <input type="text" id="upd_cnpj_cliente" onblur="validaCnpj(this.value);" placeholder="Apenas Números" class="form-control"/>
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
                    <div class="col-sm-9">                
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
                    <div class="col-sm-3">                
                        <div class="form-group">
                            <label for="upd_select_situacao">Situação</label>
                            <select class='form-control' id='upd_select_situacao' name='upd_select_situacao'>
                                <option value='Ativo'>Ativo</option>
                                <option value='Inativo'>Inativo</option>
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="form-group">
                    <label for="upd_cliente_observacao">Observações</label>
                    <textarea class="form-control" placeholder="Campo de Observações"  rows="5" id="upd_cliente_observacao"></textarea>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" onclick="deletaCliente()">Excluir</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="atualizaCliente()">Salvar Alterações</button>
                <input type="hidden" id="hidden_cliente_id">
                <input type="hidden" id="upd_data_cliente">
            </div>
        </div>
    </div>
</div>
<!-- Modal ADicionar segmento -->
<div class="modal fade" id="add_novo_segmento_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar novo segmento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">   
                        <div class="form-group">
                            <label for="add_segmento">Segmento</label>
                            <input type="text" id="add_segmento" placeholder="Segmento" class="form-control"/>
                        </div>
                    </div>
            </div>
            <div class="form-group">
                    <label for="add_segmento_observacao">Observações</label>
                    <textarea class="form-control" placeholder="Campo de Observações"  rows="5" id="add_segmento_observacao"></textarea>
                </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addSegmento()">Adicionar</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- // Modal -->

<!-- Modal - Update Segmento details -->
<div class="modal fade" id="upd_segmento_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualizar Segmento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">   
                        <div class="form-group">
                            <label for="upd_tipo_segmento">Segmento</label>
                            <input type="text" id="upd_tipo_segmento" placeholder="Segmento" class="form-control"/>
                        </div>
                    </div>
            </div>
            <div class="form-group">
                    <label for="upd_segmento_observacao">Observações</label>
                    <textarea class="form-control" placeholder="Campo de Observações"  rows="5" id="upd_segmento_observacao"></textarea>
                </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="atualizaSegmento()" >Salvar Alterações</button>
                <input type="hidden" id="hidden_segmento_id">
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal ADicionar status -->
<div class="modal fade" id="add_novo_status_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar novo status</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">   
                        <div class="form-group">
                            <label for="add_status_descricao">Status</label>
                            <input type="text" id="add_status_descricao" placeholder="Status" class="form-control"/>
                        </div>
                    </div>
                </div>
            <div class="form-group">
                    <label for="add_status_observacao">Observações</label>
                    <textarea class="form-control" placeholder="Campo de Observações"  rows="5" id="add_status_observacao"></textarea>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addStatus()">Adicionar</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- // Modal -->

<!-- Modal - Update Segmento details -->
<div class="modal fade" id="upd_status_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualizar Status</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">   
                        <div class="form-group">
                            <label for="upd_status_descricao">Status</label>
                            <input type="text" id="upd_status_descricao" placeholder="Status" class="form-control"/>
                        </div>
                    </div>


            </div>
            <div class="form-group">
                    <label for="upd_status_observacao">Observações</label>
                    <textarea class="form-control" placeholder="Campo de Observações"  rows="5" id="upd_status_observacao"></textarea>
                </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="atualizaStatus()" >Salvar Alterações</button>
                <input type="hidden" id="hidden_status_id">
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal da campanha -->
<div class="modal fade" id="add_nova_campanha_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar nova campanha</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <form method="post" id="frm_campanha" enctype="multipart/form-data">
                    <label for="add_descricao_pdf">Nome da Campanha</label>
                    <input type="text" id="add_descricao_pdf" name = "add_descricao_pdf" placeholder="Nome da Campanha" class="form-control"/>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_data_inicio">Data de Inicio</label>
                            <input type="text" id="add_data_inicio" name="add_data_inicio" class="form-control data" placeholder="Inicio da campanha" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_data_final">Data final</label>
                            <input type="text" id="add_data_final" name="add_data_final" placeholder="Final da campanha" class="form-control data"/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_obs_campanha">Observação</label>

                    <textarea class="form-control" placeholder="Observação" rows="3" name="add_obs_campanha" id="add_obs_campanha"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Selecione o arquivo</label>
                    <input id="add_upload_file" name="add_upload_file" multiple type="file" class="file-loading">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addCampanha()">Adicionar Campanha</button>
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
                <h4 class="modal-title" id="myModalLabel">Atualizar campanha existente</h4>
            </div>
            <form method="post" id="frm_upd_campanha" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="upd_descricao_campanha">Nome da Campanha</label>
                    <input type="text" id="upd_descricao_campanha" name="upd_descricao_campanha" placeholder="Nome da Campanha" class="form-control"/>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_data_inicio_campanha">Data de Inicio</label>
                            <input type="text" id="upd_data_inicio_campanha" name="upd_data_inicio_campanha" class="form-control data" placeholder="Inicio da campanha" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_data_final_campanha">Data final</label>
                            <input type="text" id="upd_data_final_campanha" name="upd_data_final_campanha" placeholder="Final da campanha" class="form-control data"/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="upd_obs_campanha">Observação</label>

                    <textarea class="form-control" placeholder="Observação" rows="3" name="upd_obs_campanha" id="upd_obs_campanha"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="atualizaCampanha()" >Salvar Alterações</button>
                <input type="hidden" id="hidden_campanha_id" name="hidden_campanha_id">
                </div>
                </form>
        </div>
    </div>
</div>
<!-- Modal da promocao -->
<div class="modal fade" id="add_nova_promocao_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar nova promoção</h4>
            </div>
            <form method="post" id="frm_promocao" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="add_descricao_pdf">Nome da Promoção</label>
                    <input type="text" id="add_promo_descricao_pdf" name="add_promo_descricao_pdf" placeholder="Nome da Promoção" class="form-control"/>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_data_inicio">Data de Inicio</label>
                            <input type="text" id="add_promo_data_inicio" name="add_promo_data_inicio" class="form-control data" placeholder="Inicio da promoção" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_data_final">Data final</label>
                            <input type="text" id="add_promo_data_final" name="add_promo_data_final" placeholder="Final da promoção" class="form-control data"/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_obs_promocao">Observação</label>
                    <textarea class="form-control" placeholder="Observação" rows="3" name="add_obs_promocao" id="add_obs_promocao"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Selecione o arquivo</label>
                    <input id="add_promo_upload_file" name="add_promo_upload_file" multiple type="file" class="file-loading">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addPromocao()">Adicionar Promoção</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal para atualizar promocao -->
<div class="modal fade" id="upd_promocao_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualizar promoção existente</h4>
            </div>
            <form method="post" id="frm_upd_promocao" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="upd_descricao_pdf">Nome da promoção</label>
                    <input type="text" id="upd_promo_descricao_pdf" name="upd_promo_descricao_pdf" placeholder="Nome da promoção" class="form-control"/>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_data_inicio">Data de Inicio</label>
                            <input type="text" id="upd_promo_data_inicio" name="upd_promo_data_inicio" class="form-control data" placeholder="Inicio da promoção" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_data_final">Data final</label>
                            <input type="text" id="upd_promo_data_final" name="upd_promo_data_final" placeholder="Final da promoção" class="form-control data"/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="upd_obs_promocao">Observação</label>
                    <textarea class="form-control" placeholder="Observação" rows="3" name="upd_obs_promocao" id="upd_obs_promocao"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="atualizaPromocao()" >Salvar Alterações</button>
                <input type="hidden" id="hidden_promocao_id" name="hidden_promocao_id">
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal do informativo -->
<div class="modal fade" id="add_novo_informativo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar novo informativo</h4>
            </div>
            <div class="modal-body">
            <form method="post" id="frm_informativo" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="add_descricao_pdf">Nome do Informativo</label>
                    <input type="text" id="add_info_descricao_pdf" name="add_info_descricao_pdf" placeholder="Nome do informativo" class="form-control"/>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_data_inicio">Data de Inicio</label>
                            <input type="text" id="add_info_data_inicio" name="add_info_data_inicio" class="form-control data" placeholder="Inicio do informativo" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="add_data_final">Data final</label>
                            <input type="text" id="add_info_data_final" name="add_info_data_final" placeholder="Final do informativo" class="form-control data"/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_obs_informativo">Observação</label>
                    <textarea class="form-control" placeholder="Observação" rows="3" name="add_obs_informativo" id="add_obs_informativo"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Selecione o arquivo</label>
                    <input id="add_info_upload_file" name="add_info_upload_file" multiple type="file" class="file-loading">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addInformativo()">Adicionar Informativo</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal para atualizar informativo -->
<div class="modal fade" id="upd_informativo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualizar informativo existente</h4>
            </div>
            <div class="modal-body">
            <form method="post" id="frm_upd_informativo" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="upd_descricao_pdf">Nome do informativo</label>
                    <input type="text" id="upd_info_descricao_pdf" name="upd_info_descricao_pdf" placeholder="Nome do informativo" class="form-control"/>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_data_inicio">Data de Inicio</label>
                            <input type="text" id="upd_info_data_inicio" name="upd_info_data_inicio" class="form-control data" placeholder="Inicio do informativo" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upd_data_final">Data final</label>
                            <input type="text" id="upd_info_data_final" name="upd_info_data_final" placeholder="Final do informativo" class="form-control data"/>
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="upd_obs_informativo">Observação</label>
                    <textarea class="form-control" placeholder="Observação" rows="3" name="upd_obs_informativo" id="upd_obs_informativo"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="atualizaInformativo()" >Salvar Alterações</button>
                <input type="hidden" id="hidden_informativo_id" name="hidden_informativo_id">
                </div>
                </form>
        </div>
    </div>
</div>
<!-- Bootstrap Modals -->
<?php include("./assets/php/footer.php"); ?>
<script>
$(document).ready(function() {
    lerClientes();
    lerVisitas();
});
</script>