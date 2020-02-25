// FIX das tabs admin
$(document).ready(function() {
    $("#home").show(250);
    $("#clientes").hide(250);
    $("#visitas").hide(250);
    $("#status").hide(250);
    $("#segmento").hide(250);
    $("#campanhas").hide(250);
    $("#promocoes").hide(250);
    $("#informativos").hide(250);
    $("#posts").hide(250);
    $("#materiais").hide(250);
    readRecords();
    

    
    $('#tabrep').click(function() {
        $("#home").show(250);
        $("#clientes").hide(250);
        $("#visitas").hide(250);
        $("#status").hide(250);
        $("#segmento").hide(250);
        $("#campanhas").hide(250);
        $("#promocoes").hide(250);
        $("#informativos").hide(250); 
        $("#posts").hide(250);
        $("#materiais").hide(250);       
        readRecords();

    });

    $('#tabven').click(function() {
        $("#home").hide(250);
        $("#clientes").hide(250);
        $("#visitas").show(250);
        $("#status").hide(250);
        $("#segmento").hide(250);
        $("#campanhas").hide(250);
        $("#promocoes").hide(250);
        $("#informativos").hide(250);
        $("#posts").hide(250);
        $("#materiais").hide(250);

    });
    $('#tabcli').click(function() {
        $("#home").hide(250);
        $("#clientes").show(250);
        $("#visitas").hide(250);
        $("#status").hide(250);
        $("#segmento").hide(250);
        $("#campanhas").hide(250);
        $("#promocoes").hide(250);
        $("#informativos").hide(250);
        $("#posts").hide(250);
        $("#materiais").hide(250);
        
    });

    $('#tabstat').click(function() {
        $("#home").hide(250);
        $("#clientes").hide(250);
        $("#visitas").hide(250);
        $("#status").show(250);
        $("#segmento").hide(250);
        $("#campanhas").hide(250);
        $("#promocoes").hide(250);
        $("#informativos").hide(250);
        $("#posts").hide(250);
        $("#materiais").hide(250);
        lerStatus();
    });
    
    $('#tabseg').click(function() {
        $("#home").hide(250);
        $("#clientes").hide(250);
        $("#visitas").hide(250);
        $("#status").hide(250);
        $("#segmento").show(250);
        $("#campanhas").hide(250);
        $("#promocoes").hide(250);
        $("#informativos").hide(250);
        $("#posts").hide(250);
        $("#materiais").hide(250);
        lerSegmentos();
    });

    $('#tabcamp').click(function() {
        $("#home").hide(250);
        $("#clientes").hide(250);
        $("#visitas").hide(250);
        $("#status").hide(250);
        $("#segmento").hide(250);
        $("#campanhas").show(250);
        $("#promocoes").hide(250);
        $("#informativos").hide(250);
        $("#posts").hide(250);
        $("#materiais").hide(250);
        lerCampanhas();
    });

    $('#tabpromo').click(function() {
        $("#home").hide(250);
        $("#clientes").hide(250);
        $("#visitas").hide(250);
        $("#status").hide(250);
        $("#segmento").hide(250);
        $("#campanhas").hide(250);
        $("#promocoes").show(250);
        $("#informativos").hide(250);
        $("#posts").hide(250);
        $("#materiais").hide(250);
        lerPromocoes();
    });

    $('#tabinfo').click(function() {
        $("#home").hide(250);
        $("#clientes").hide(250);
        $("#visitas").hide(250);
        $("#status").hide(250);
        $("#segmento").hide(250);
        $("#campanhas").hide(250);
        $("#promocoes").hide(250);
        $("#informativos").show(250);
        $("#posts").hide(250);
        $("#materiais").hide(250);
        lerInformativos();
    });    

    $('#tabpost').click(function() {
        $("#home").hide(250);
        $("#clientes").hide(250);
        $("#visitas").hide(250);
        $("#status").hide(250);
        $("#segmento").hide(250);
        $("#campanhas").hide(250);
        $("#promocoes").hide(250);
        $("#informativos").hide(250);
        $("#posts").show(250);
        $("#materiais").hide(250);
        lerInformativos();
    });    

    $('#tabmat').click(function() {
        $("#home").hide(250);
        $("#clientes").hide(250);
        $("#visitas").hide(250);
        $("#status").hide(250);
        $("#segmento").hide(250);
        $("#campanhas").hide(250);
        $("#promocoes").hide(250);
        $("#informativos").hide(250);
        $("#posts").hide(250);
        $("#materiais").show(250);
        lerInformativos();
    });   
});

// FIX das tabs clientes
$(document).ready(function() {
    $("#rep_home").show(250);
    $("#clientes").hide(250);
    
    $('#tabrepcli').click(function() {
        $("#rep_home").show(250);
        $("#hist_clientes").hide(250);
    });

    $('#tabhis').click(function() {
    $("#rep_home").hide(250);
    $("#hist_clientes").show(250);
    });
});

function addRecord() {
    // get values
    var nome = $("#add_nome").val();
    var permissao = $("#add_permissao").val();
    var email = $("#add_email").val();
    var meta_vendas = $("#add_meta_vendas").val();
    var meta_contato = $("#add_meta_contato").val();
    var meta_orcamento = $("#add_meta_orcamento").val();

    // Add record
    $.post("../comercial/assets/ajax/adiciona_usuario.php", {
        nome: nome,
        permissao: permissao,
        email: email,
        meta_orcamento: meta_orcamento,
        meta_contato: meta_contato,
        meta_vendas: meta_vendas
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#add_nome").val("");
        $("#add_permissao").val("");
        $("#add_email").val("");
        $("#add_meta_orcamento").val("");
        $("#add_meta_contato").val("");
        $("#add_meta_vendas").val("");
    });
}

// READ records
function readRecords() {
    $.get("../comercial/assets/ajax/ler_usuarios.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("Tem certeza que deseja apagar esse usuário?");
    if (conf == true) {
        $.post("../comercial/assets/ajax/deleta_usuario.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("../comercial/assets/ajax/ler_detalhes.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var usuario = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#upd_nome").val(usuario.usuario_nome);
            $("#upd_permissao").val(usuario.permissao);
            $("#upd_email").val(usuario.email);
            $("#upd_meta_vendas").val(numeral(usuario.meta_vendas).format('0,0.00'));
            $("#upd_meta_contato").val(usuario.meta_contato);
            $("#upd_meta_orcamento").val(usuario.meta_orcamento);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var nome = $("#upd_nome").val();
    var permissao = $("#upd_permissao").val();
    var email = $("#upd_email").val();
    var meta_vendas = $("#upd_meta_vendas").val();
    var meta_contato = $("#upd_meta_contato").val();
    var meta_orcamento = $("#upd_meta_orcamento").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("../comercial/assets/ajax/atualiza_usuarios.php", {
            id: id,
            nome: nome,
            permissao: permissao,
            email: email,
            meta_orcamento: meta_orcamento,
            meta_contato: meta_contato,
            meta_vendas: meta_vendas
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});


// Inicio do script ajax das visitas
function addVisita() {
    // get values
    var data = $("#add_data_visita").val();
    var cliente_id = $("#add_cliente_visita").val();
    var contato = $("#add_contato_visita").val();
    var email = $("#add_email_visita").val();
    var segmento = $("#add_segmento_visita").val();
    var representante = $("#add_representante_visita").val();
    var valor_pedido = $("#add_valor_visita").val();
    var data_previsao = $("#add_data_previsao_visita").val();
    var status = $("#add_status_visita").val();
    var observacao = $("#add_observacao_visita").val();

    // Add record
    $.post("../comercial/assets/ajax/adiciona_visita.php", {
        data: data,
        cliente_id: cliente_id,
        contato: contato,
        email: email,
        segmento: segmento,
        representante: representante,
        valor_pedido: valor_pedido,
        data_previsao: data_previsao,
        status: status,
        observacao: observacao
    }, function (data, status) {
        // close the popup
        $("#add_nova_visita_modal").modal("hide");

        // read records again
        //lerVisitas();

        // clear fields from the popup
        $("#add_cliente_visita").val("");
        $("#add_data_visita").val("");
        $("#add_contato_visita").val("");
        $("#add_email_visita").val("");
        $("#add_segmento_visita").val("");
        $("#add_representante_visita").val("");
        $("#add_valor_visita").val("");
        $("#add_data_previsao_visita").val("");
        $("#add_status_visita").val("");
        $("#add_observacao_visita").val("");
    });
}

// READ records
function lerVisitas() {
    // Exibe o conteúdo das visitas de cada representante
    $('#visitas_conteudo').DataTable({
        "bProcessing": true,
        "serverSide": true,
        "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
        },
        "initComplete": function (){
            $('#visitas_conteudo').on("click", "tr[role='row']", function(){
                 detalhesVisita($(this).children('td:first-child').text())
            });
        },
         "ajax":{
            url :"../comercial/assets/ajax/ler_visitas.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
              $("#visitas_conteudo_processing").css("display","none");
            }
          }
        }); 
}


function deletaVisita() {
    var conf = confirm("Tem certeza que deseja apagar essa visita?");
    var id = $("#hidden_visita_id").val();
    if (conf == true) {
        $.post("../comercial/assets/ajax/deleta_visita.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
        //                 $("#home").hide(250);
        // $("#clientes").hide(250);
        // $("#visitas").show(250);
        // $("#status").hide(250);
        // $("#segmento").hide(250);
        // $("#campanhas").hide(250);
        // $("#promocoes").hide(250);
        // $("#informativos").hide(250);
        $("#upd_visita_modal").modal("hide");
        location.reload()
            }
        );
    }
}

function detalhesVisita(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_visita_id").val(id);
    $.post("../comercial/assets/ajax/ler_detalhes_visita.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var visita = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#hidden_visita_id").val(visita.id);
            $("#upd_cliente_nome").val(visita.visita_cliente_id).trigger("chosen:updated");
            $("#upd_data").val(visita.data);
            $("#upd_email").val(visita.email);
            $("#upd_contato").val(visita.contato);
            $("#upd_segmento").val(visita.id_segmento);
            $("#upd_valor_pedido").val(visita.valor);
            $("#upd_data_previsao").val(visita.data_previsao);
            $("#upd_status").val(visita.id_status);
            $("#upd_observacao").val(visita.observacao);
        }
    );
    // Open modal popup
    $("#upd_visita_modal").modal("show");
}

function atualizaVisita() {
    // get values
    var cliente_nome = $("#upd_cliente_nome").val();
    var data = $("#upd_data").val();
    var email = $("#upd_email_visita").val();
    var contato = $("#upd_contato").val();
    var segmento = $("#upd_segmento").val();
    var valor_pedido = $("#upd_valor_pedido").val();
    var data_previsao = $("#upd_data_previsao").val();
    var status = $("#upd_status").val();
    var observacao = $("#upd_observacao").val();
    // get hidden field value
    var id = $("#hidden_visita_id").val();

    // Update the details by requesting to the server using ajax
    $.post("../comercial/assets/ajax/atualiza_visitas.php", {
        id: id,
        data: data,
        cliente_nome: cliente_nome,
        contato: contato,
        email: email,
        segmento: segmento,
        valor_pedido: valor_pedido,
        data_previsao: data_previsao,
        status: status,
        observacao: observacao
        },
        function (data, status) {
            // hide modal popup
            $("#upd_visita_modal").modal("hide");
            // reload Users by using readRecords();
            location.reload()
        }
    );
}


// Inicio do script ajax dos clientes
function addCliente() {
    // get values
    var razao = $("#add_razao_cliente").val();
    var cnpj = $("#add_cnpj_cliente").val();
    var nome_fantasia = $("#add_nome_cliente").val();
    var representante_cliente = $("#add_representante_cliente").val();
    var email_cliente = $("#add_email_cliente").val();
    var contato_cliente = $("#add_contato_cliente").val();
    var telefone = $("#add_telefone_cliente").val();
    var ddd = $("#add_ddd_cliente").val();
    var endereco = $("#add_endereco_cliente").val();
    var observacao = $("#add_cliente_observacao").val();
    var id_segmento = $("#add_select_segmento").val();
    var cep = $("#add_cep_cliente").val();
    var cidade = $("#add_cidade_cliente").val();
    var estado = $("#add_estado_cliente").val();
    var situacao = $("#add_select_situacao").val();

    var empr = cnpj.replace(/[^0-9]/g, '');
    var tipo_empr = "";
    if ( empr.length < 12 ) {
        tipo_empr == 'Fisica';
    } else {
        tipo_empr == 'Juridica';
    }

    // Add record
    $.post("../comercial/assets/ajax/adiciona_cliente.php", {
        razao: razao,
        cnpj: cnpj,
        representante_cliente: representante_cliente,
        email_cliente: email_cliente,
        nome_fantasia: nome_fantasia,
        tipo_empr: tipo_empr,
        contato_cliente: contato_cliente,
        id_segmento: id_segmento,
        telefone: telefone,
        ddd: ddd,
        cep: cep,
        cidade: cidade,
        situacao: situacao,
        estado: estado,
        endereco: endereco,
        observacao: observacao
    }, function (data, status) {
        // close the popup
        $("#add_novo_cliente_modal").modal("hide");

        // read records again
        location.reload()

        // clear fields from the popup
        $("#add_razao_cliente").val("");
        $("#add_cnpj_cliente").val("");
        $("#add_email_cliente").val("");
        $("#add_contato_cliente").val("");
        $("#add_telefone_cliente").val("");
        $("#add_endereco_cliente").val("");
        $("#add_select_segmento").val("");
        $("#add_select_situacao").val("");
        $("#add_cep_cliente").val("");
        $("#add_ddd_cliente").val("");
        $("#add_cidade_cliente").val("");
        $("#add_estado_cliente").val("");
        $("#add_cliente_observacao").val("");
        $("#add_nome_cliente").val("");
    });
}

// READ records
function lerClientes(id) {
    // Exibe o conteúdo das visitas de cada representante
    $('#clientes_admin').DataTable({
        "bProcessing": true,
        "serverSide": true,
        "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
        },
        "initComplete": function (){
            $('#clientes_admin').on("click", "tr[role='row']", function(){
                 detalhesCliente($(this).children('td:first-child').text())
            });
        },
         "ajax":{
            url :"../comercial/assets/ajax/ler_clientes.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
              $("#clientes_admin_processing").css("display","none");
            }
          }
        }); 
}


function deletaCliente() {

    var id = $("#hidden_cliente_id").val();
    var conf = confirm("Tem certeza que deseja apagar esse cliente?");
    if (conf == true) {
        $.post("../comercial/assets/ajax/deleta_cliente.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                location.reload();
            }
        );
    }
}

function detalhesCliente(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_cliente_id").val(id);
    $.post("../comercial/assets/ajax/ler_detalhes_cliente.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var cliente = JSON.parse(data);
            // Assing existing values to the modal popup fields]
            // $("#upd_representante_cliente").val(str_array[i]).trigger("chosen:updated");
            $("#upd_representante_cliente").val(cliente.id_representante).trigger("chosen:updated");
            $("#hidden_cliente_id").val(cliente.id_cliente);
            $("#upd_razao_cliente").val(cliente.razao);
            $("#upd_cnpj_cliente").val(cliente.cnpj);
            $("#upd_nome_cliente").val(cliente.nome_fantasia);
            $("#upd_email_cliente").val(cliente.email_cliente);
            $("#upd_contato_cliente").val(cliente.contato_cliente);
            $("#upd_telefone_cliente").val(cliente.telefone);
            $("#upd_data_cliente").val(cliente.data);
            $("#upd_ddd_cliente").val(cliente.ddd);
            $("#upd_endereco_cliente").val(cliente.endereco);
            $("#upd_cliente_observacao").val(cliente.observacoes);
            $("#upd_select_segmento").val(cliente.id_segmento).trigger("chosen:updated");
            $("#upd_select_situacao").val(cliente.situacao);
            $("#upd_cep_cliente").val(cliente.cep);
            $("#upd_cidade_cliente").val(cliente.cidade);
            $("#upd_estado_cliente").val(cliente.estado);
        }
    );
    // Open modal popup
    $("#upd_cliente_modal").modal("show");
}

function atualizaCliente() {
    // get values
    var representante_cliente = $("#upd_representante_cliente").val();
    var razao = $("#upd_razao_cliente").val();
    var nome_fantasia = $("#upd_nome_cliente").val();
    var cnpj = $("#upd_cnpj_cliente").val();
    var email_cliente = $("#upd_email_cliente").val();
    var contato_cliente = $("#upd_contato_cliente").val();
    var telefone = $("#upd_telefone_cliente").val();
    var id_segmento = $("#upd_select_segmento").val();
    var cep = $("#upd_cep_cliente").val();
    var ddd = $("#upd_ddd_cliente").val();
    var cidade = $("#upd_cidade_cliente").val();
    var estado = $("#upd_estado_cliente").val();
    var endereco = $("#upd_endereco_cliente").val();
    var situacao = $("#upd_select_situacao").val();
    var data_cadastro = $("#upd_data_cliente").val();
    moment(data_cadastro).format('MM/DD/YYYY');
    var cliente_observacao = $("#upd_cliente_observacao").val();
    // get hidden field value
    var id = $("#hidden_cliente_id").val();

    // Update the details by requesting to the server using ajax
    $.post("../comercial/assets/ajax/atualiza_cliente_admin.php", {
        representante_cliente: representante_cliente,
        id: id,
        razao: razao,
        cnpj: cnpj,
        email_cliente: email_cliente,
        contato_cliente: contato_cliente,
        telefone: telefone,
        ddd: ddd,
        id_segmento: id_segmento,
        endereco: endereco,
        cep: cep,
        situacao: situacao,
        nome_fantasia: nome_fantasia,
        cidade: cidade,
        estado: estado,
        data_cadastro: data_cadastro,
        cliente_observacao: cliente_observacao
        },
        function (data, status) {
            // hide modal popup
            $("#upd_cliente_modal").modal("hide");
            // reload Users by using readRecords();
            location.reload();
        }
    );
}


//Inicio do script para adicionar segmento
function addSegmento() {
    // get values
    var tipo_segmento = $("#add_segmento").val();
    var segmento_observacao = $("#add_segmento_observacao").val();

    // Add record
    $.post("../comercial/assets/ajax/adiciona_segmento.php", {
        tipo_segmento: tipo_segmento,
        segmento_observacao: segmento_observacao

    }, function (data, status) {
        // close the popup
        $("#add_novo_segmento_modal").modal("hide");

        // read records again
        lerSegmentos();

        // clear fields from the popup
        $("#add_segmento").val("");
        $("#add_segmento_observacao").val("");

    });
}

// READ records
function lerSegmentos() {
    $.get("../comercial/assets/ajax/ler_segmentos.php", {}, function (data, status) {
        $(".segmentos_conteudo").html(data);
    });
}


function deletaSegmento(id) {
    var conf = confirm("Tem certeza que deseja apagar esse segmento?");
    if (conf == true) {
        $.post("../comercial/assets/ajax/deleta_segmento.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                lerSegmentos();
            }
        );
    }
}
function detalhesSegmento(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_segmento_id").val(id);
    $.post("../comercial/assets/ajax/ler_detalhes_segmento.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var segmento = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#hidden_segmento_id").val(segmento.id);
            $("#upd_tipo_segmento").val(segmento.tipo_segmento);
            $("#upd_segmento_observacao").val(segmento.segmento_observacao);
        }
    );
    // Open modal popup
    $("#upd_segmento_modal").modal("show");
}
function atualizaSegmento() {
    // get values
    var tipo_segmento = $("#upd_tipo_segmento").val();
    var id = $("#hidden_segmento_id").val();
    var segmento_observacao = $("#upd_segmento_observacao").val();

    // Update the details by requesting to the server using ajax
    $.post("../comercial/assets/ajax/atualiza_segmento.php", {
        id: id,
        tipo_segmento: tipo_segmento,
        segmento_observacao: segmento_observacao
        },
        function (data, status) {
            // hide modal popup
            $("#upd_segmento_modal").modal("hide");
            // reload Users by using readRecords();
            lerSegmentos();
        }
    );
}

//Inicio do script para adicionar status
function addStatus() {
    // get values
    var status_descricao = $("#add_status_descricao").val();
    var status_observacao = $("#add_status_observacao").val();

    // Add record
    $.post("../comercial/assets/ajax/adiciona_status.php", {
        status_descricao: status_descricao,
        status_observacao: status_observacao

    }, function (data, status) {
        // close the popup
        $("#add_novo_status_modal").modal("hide");

        // read records again
        lerStatus();

        // clear fields from the popup
        $("#add_status_descricao").val("");
        $("#add_status_observacao").val("");

    });
}

// READ records
function lerStatus() {
    $.get("../comercial/assets/ajax/ler_status.php", {}, function (data, status) {
        $(".status_conteudo").html(data);
    });
}


function deletaStatus(id) {
    var conf = confirm("Tem certeza que deseja apagar esse status?");
    if (conf == true) {
        $.post("../comercial/assets/ajax/deleta_status.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                lerStatus();
            }
        );
    }
}
function detalhesStatus(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_status_id").val(id);
    $.post("../comercial/assets/ajax/ler_detalhes_status.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var status = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#hidden_status_id").val(status.id);
            $("#upd_status_descricao").val(status.descricao);
            $("#upd_status_observacao").val(status.status_observacao);
        }
    );
    // Open modal popup
    $("#upd_status_modal").modal("show");
}
function atualizaStatus() {
    // get values
    var descricao = $("#upd_status_descricao").val();
    var id = $("#hidden_status_id").val();
    var status_observacao = $("#upd_status_observacao").val();

    // Update the details by requesting to the server using ajax
    $.post("../comercial/assets/ajax/atualiza_status.php", {
        id: id,
        descricao: descricao,
        status_observacao: status_observacao
        },
        function (data, status) {
            // hide modal popup
            $("#upd_status_modal").modal("hide");
            // reload Users by using readRecords();
            lerStatus();
        }
    );
}

//Inicio do script Ajax das Visitas de Cada Representante
function lerVisitasRepresentante() {
    // Exibe o conteúdo das visitas de cada representante
    $('#representante_conteudo').DataTable({
        "bProcessing": true,
        "serverSide": true,
        "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
        },
        "initComplete": function (){
            $( document ).on("click", "tr[role='row']", function(){
                 detalhesVisitaRepresentante($(this).children('td:first-child').text())
            });
        },
         "ajax":{
            url :"../comercial/assets/ajax/ler_representantes.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
              $("#representante_conteudo_processing").css("display","none");
            }
          }
        }); 
}

function addVisitaRepresentante() {
    // get values
    var data = $("#add_data_visita").val();
    moment(data).format('MM/DD/YYYY'); // Formata a data para receber no MY SQL
    var cliente_id = $("#add_cliente_visita").val();
    var contato = $("#add_contato_visita").val();
    var email = $("#add_email_visita").val();
    var segmento = $("#add_segmento_visita").val();
    var valor_pedido = $("#add_valor_visita").val();
    var data_previsao = $("#add_data_previsao_visita").val();
    moment(data_previsao).format('MM/DD/YYYY'); // Formata a data para receber no MY SQL
    var status = $("#add_status_visita").val();
    var observacao = $("#add_observacao_visita").val();

    // Add record
    $.post("../comercial/assets/ajax/adiciona_visita_representante.php", {
        data: data,
        cliente_id: cliente_id,
        contato: contato,
        email: email,
        segmento: segmento,
        valor_pedido: valor_pedido,
        data_previsao: data_previsao,
        status: status,
        observacao: observacao
    }, function (data, status) {
        // close the popup
        $("#add_nova_visita_modal").modal("hide");

        // read records again
        location.reload();

        // clear fields from the popup
        $("#add_cliente_visita").val("");
        $("#add_data_visita").val("");
        $("#add_contato_visita").val("");
        $("#add_email_visita").val("");
        $("#add_segmento_visita").val("");
        $("#add_representante_visita").val("");
        $("#add_valor_visita").val("");
        $("#add_data_previsao_visita").val("");
        $("#add_status_visita").val("");
        $("#add_observacao_visita").val("");
    });
}

function detalhesVisitaRepresentante(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_visita_id").val(id);
    $.post("../comercial/assets/ajax/ler_detalhes_visita_representante.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var visita = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#hidden_visita_id").val(visita.id);
            $("#upd_cliente_visita").val(visita.visita_cliente_id).trigger("chosen:updated");
            $("#upd_data_visita").val(visita.data);
            $("#upd_email_visita").val(visita.email);
            $("#upd_contato").val(visita.contato);
            $("#upd_segmento_visita").val(visita.id_segmento);
            $("#upd_valor_visita").val(visita.valor);
            $("#upd_data_previsao_visita").val(visita.data_previsao);
            $("#upd_status_visita").val(visita.id_status);
            $("#upd_observacao_visita").val(visita.observacao);
        }
    );
    // Open modal popup
    $("#upd_rep_visita_modal").modal("show");
}

function atualizaVisitaRepresentante() {
    // get values
    var cliente_id = $("#upd_cliente_visita").val();
    var data = $("#upd_data_visita").val();
    var valor_pedido = $("#upd_valor_visita").val();
    var data_previsao = $("#upd_data_previsao_visita").val();
    var status = $("#upd_status_visita").val();
    var observacao = $("#upd_observacao_visita").val();
    // get hidden field value
    var id = $("#hidden_visita_id").val();

    // Update the details by requesting to the server using ajax
    $.post("../comercial/assets/ajax/atualiza_visita_representante.php", {
        id: id,
        data: data,
        cliente_id: cliente_id,
        valor_pedido: valor_pedido,
        data_previsao: data_previsao,
        status: status,
        observacao: observacao
        },
        function (data, status) {
            // hide modal popup
            $("#upd_rep_visita_modal").modal("hide");
            // reload
            location.reload();
        }
    );
}

function lerVendasRepresentante(id) {
    // Exibe o conteúdo das visitas de cada representante
    $.post("../comercial/assets/ajax/ler_representantes_vendas.php", {
        id: id
    }, function (data, status) {
        $(".representante_conteudo_vendas").html(data);
    });
}

//Inicio do script Ajax das Visitas de Cada Representante
function lerClientesRepresentante() {
    // Exibe o conteúdo das visitas de cada representante
    $('#clientes_rep').DataTable({
        "bProcessing": true,
        "serverSide": true,
        "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
        },
        "initComplete": function (){
            $( document ).on("click", "tr[role='row']", function(){
                 detalhesClienteRepresentante($(this).children('td:first-child').text())
            });
        },
         "ajax":{
            url :"../comercial/assets/ajax/ler_clientes_representantes.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
              $("#clientesrepresentantes_processing").css("display","none");
            }
          }
        }); 
}

function addClienteRepresentante() {
    // get values
    var razao = $("#add_razao_cliente").val();
    var cnpj = $("#add_cnpj_cliente").val();
    var nome_fantasia = $("#add_nome_cliente").val();
    var representante_cliente = $("#add_representante_cliente").val();
    var email_cliente = $("#add_email_cliente").val();
    var contato_cliente = $("#add_contato_cliente").val();
    var telefone = $("#add_telefone_cliente").val();
    var ddd = $("#add_ddd_cliente").val();
    var endereco = $("#add_endereco_cliente").val();
    var observacao = $("#add_cliente_observacao").val();
    var id_segmento = $("#add_select_segmento").val();
    var cep = $("#add_cep_cliente").val();
    var cidade = $("#add_cidade_cliente").val();
    var estado = $("#add_estado_cliente").val();
    var situacao = $("#add_select_situacao").val();

    var empr = cnpj.replace(/[^0-9]/g, '');
    var tipo_empr = "";
    if ( empr.length < 12 ) {
        tipo_empr == 'Fisica';
    } else {
        tipo_empr == 'Juridica';
    }
    // Add record
    $.post("../comercial/assets/ajax/adiciona_cliente.php", {
        razao: razao,
        cnpj: cnpj,
        representante_cliente: representante_cliente,
        email_cliente: email_cliente,
        nome_fantasia: nome_fantasia,
        tipo_empr: tipo_empr,
        contato_cliente: contato_cliente,
        id_segmento: id_segmento,
        telefone: telefone,
        ddd: ddd,
        cep: cep,
        cidade: cidade,
        situacao: situacao,
        estado: estado,
        endereco: endereco,
        observacao: observacao
    }, function (data, status) {
        // close the popup
        $("#add_representante_cliente_modal").modal("hide");
        // read records again
        location.reload()

        // clear fields from the popup
        $("#add_razao_cliente").val("");
        $("#add_cnpj_cliente").val("");
        $("#add_email_cliente").val("");
        $("#add_contato_cliente").val("");
        $("#add_telefone_cliente").val("");
        $("#add_endereco_cliente").val("");
        $("#add_select_segmento").val("");
        $("#add_select_situacao").val("");
        $("#add_cep_cliente").val("");
        $("#add_ddd_cliente").val("");
        $("#add_cidade_cliente").val("");
        $("#add_estado_cliente").val("");
        $("#add_cliente_observacao").val("");
        $("#add_nome_cliente").val("");
    });
}

function detalhesClienteRepresentante(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_cliente_id").val(id);
    $.post("../comercial/assets/ajax/ler_detalhes_cliente.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var cliente = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#hidden_cliente_id").val(cliente.id_cliente);
            $("#upd_razao_cliente").val(cliente.razao);
            $("#upd_cnpj_cliente").val(cliente.cnpj);
            $("#upd_nome_cliente").val(cliente.nome_fantasia);
            $("#upd_email_cliente").val(cliente.email_cliente);
            $("#upd_contato_cliente").val(cliente.contato_cliente);
            $("#upd_telefone_cliente").val(cliente.telefone);
            $("#upd_data_cliente").val(cliente.data);
            $("#upd_ddd_cliente").val(cliente.ddd);
            $("#upd_endereco_cliente").val(cliente.endereco);
            $("#upd_observacao_cliente").val(cliente.observacoes);
            $("#upd_select_segmento").val(cliente.id_segmento).trigger("chosen:updated");
            $("#upd_select_situacao").val(cliente.situacao);
            $("#upd_cep_cliente").val(cliente.cep);
            $("#upd_cidade_cliente").val(cliente.cidade);
            $("#upd_estado_cliente").val(cliente.estado);
        }
    );
    // Open modal popup
    $("#upd_representante_cliente_modal").modal("show");
}

function atualizaClienteRepresentante() {
    // get values
    var razao = $("#upd_razao_cliente").val();
    var nome_fantasia = $("#upd_nome_cliente").val();
    var cnpj = $("#upd_cnpj_cliente").val();
    var email_cliente = $("#upd_email_cliente").val();
    var contato_cliente = $("#upd_contato_cliente").val();
    var telefone = $("#upd_telefone_cliente").val();
    var id_segmento = $("#upd_select_segmento").val();
    var cep = $("#upd_cep_cliente").val();
    var ddd = $("#upd_ddd_cliente").val();
    var cidade = $("#upd_cidade_cliente").val();
    var estado = $("#upd_estado_cliente").val();
    var endereco = $("#upd_endereco_cliente").val();
    var situacao = $("#upd_select_situacao").val();
    var data_cadastro = $("#upd_data_cliente").val();
    moment(data_cadastro).format('MM/DD/YYYY');
    var cliente_observacao = $("#upd_observacao_cliente").val();
    // get hidden field value
    var id = $("#hidden_cliente_id").val();

    // Update the details by requesting to the server using ajax
    $.post("../comercial/assets/ajax/atualiza_cliente.php", {
        id: id,
        razao: razao,
        cnpj: cnpj,
        email_cliente: email_cliente,
        contato_cliente: contato_cliente,
        telefone: telefone,
        ddd: ddd,
        id_segmento: id_segmento,
        endereco: endereco,
        cep: cep,
        situacao: situacao,
        nome_fantasia: nome_fantasia,
        cidade: cidade,
        estado: estado,
        data_cadastro: data_cadastro,
        cliente_observacao: cliente_observacao
        },
        function (data, status) {
            // hide modal popup
            $("#upd_representante_cliente_modal").modal("hide");
            // reload Users by using readRecords();
            //location.reload();
        }
    );
}

// AJAX dos CLIENTES em relação aos REPRESENTANTES

$(document).ready(function(){
    $('#select_cliente').change(function(){ // Funciona para a classe upd-cliente_ajax
        // Para cada caso, um parametro diferente é enviado alem do ID do cliente
        lerHistoricoClientesRepresentante(this.value);
    }); 

    $('.cliente_ajax').change(function(){ // Funciona para a classe cliente_ajax
        // Para cada caso, um parametro diferente é enviado alem do ID do cliente
        $.get('../comercial/assets/ajax/get_cliente_info.php?tipo=0&cliente='+$('.cliente_ajax').val(), function(result) {
            $('#add_representante_visita').val(result); //Puxa o ID do representante
            
        });
        $.get('../comercial/assets/ajax/get_cliente_info.php?tipo=1&cliente='+$('.cliente_ajax').val(), function(result) {
            $('#add_representante_visita_nome').val(result); // Puxa o nome do representante
            
        });
        $.get('../comercial/assets/ajax/get_cliente_info.php?tipo=2&cliente='+$('.cliente_ajax').val(), function(result) {
            $('#add_email_visita').val(result); // Puxa o email do cliente
            
        });
        $.get('../comercial/assets/ajax/get_cliente_info.php?tipo=3&cliente='+$('.cliente_ajax').val(), function(result) {
            $('#add_contato_visita').val(result); // Puxa o numero de contato do cliente
            
        });
        $.get('../comercial/assets/ajax/get_cliente_info.php?tipo=4&cliente='+$('.cliente_ajax').val(), function(result) {
            $('#add_segmento_visita_tipo').val(result); // Puxa o numero de contato do cliente
            
        });
        $.get('../comercial/assets/ajax/get_cliente_info.php?tipo=5&cliente='+$('.cliente_ajax').val(), function(result) {
            $('#add_segmento_visita').val(result); // Puxa o numero de contato do cliente
            
        });
    }); 

    $('.upd-cliente_ajax').change(function(){ // Funciona para a classe upd-cliente_ajax
        // Para cada caso, um parametro diferente é enviado alem do ID do cliente
        $.get('../comercial/assets/ajax/get_cliente_info.php?tipo=0&cliente='+$('.upd-cliente_ajax').val(), function(result) {
            //Puxa o ID do representante
            $('#upd_representante_visita').val(result);
        });
        $.get('../comercial/assets/ajax/get_cliente_info.php?tipo=1&cliente='+$('.upd-cliente_ajax').val(), function(result) {
            // Puxa o nome do representante
            $('#upd_representante_visita_nome').val(result);
        });
        $.get('../comercial/assets/ajax/get_cliente_info.php?tipo=2&cliente='+$('.upd-cliente_ajax').val(), function(result) {
            // Puxa o email do cliente
            $('#upd_email_visita').val(result);
        });
        $.get('../comercial/assets/ajax/get_cliente_info.php?tipo=3&cliente='+$('.upd-cliente_ajax').val(), function(result) {
            // Puxa o numero de contato do cliente
            $('#upd_contato').val(result);
        });
        $.get('../comercial/assets/ajax/get_cliente_info.php?tipo=4&cliente='+$('.upd-cliente_ajax').val(), function(result) {
            // Puxa o numero de contato do cliente
            $('#upd_segmento_visita_tipo').val(result);
        });
    }); 
});

//Inicio do script Ajax do histórico de clientes
function lerHistoricoClientesRepresentante(id) {
    // Exibe o conteúdo das visitas de cada representante
    $.post("../comercial/assets/ajax/ler_historico_clientes.php", {
        id: id
    }, function (data, status) {
        $(".representante_historico_clientes_conteudo").html(data);
    });
}


//AJAX da pagina de histórico de clientes

//Inicio do script das Campanhas do admin
function lerCampanhas(id) {
    // Exibe o conteúdo das visitas de cada representante
    $.post("../comercial/assets/ajax/ler_campanhas.php", {
        id: id
    }, function (data, status) {
        $(".campanhas_conteudo").html(data);
    });
}

function addCampanha() {

var options = {
   url     : './assets/ajax/upload_campanha.php',
   success : function(responseText) { lerCampanhas(); }
};

$("#frm_campanha").ajaxSubmit(options);


    // close the popup
    $("#add_nova_campanha_modal").modal("hide");

    // clear fields from the popup
    $("#add_descricao_pdf").val("");
    $("#add_data_inicio").val("");
    $("#add_data_final").val("");
    $("#add_upload_file").val("");
    $("#add_obs_campanha").val("");

}

function detalhesCampanha(id) {
    // Add Campanha ID to the hidden field for furture usage
    $("#hidden_campanha_id").val(id);
    $.post("../comercial/assets/ajax/ler_detalhes_campanha.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var campanha = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#upd_descricao_campanha").val(campanha.descricao_pdf);
            $("#upd_data_inicio_campanha").val(campanha.data_inicio);
            $("#upd_data_final_campanha").val(campanha.data_final);
            $("#upd_obs_campanha").val(campanha.obs);
 
        }
    );
    // Open modal popup
    $("#upd_campanha_modal").modal("show");
}

function atualizaCampanha() {
        var id = $("#hidden_campanha_id").val();
        var descricao = $("#upd_descricao_campanha").val();
        var data_inicio = $("#upd_data_inicio_campanha").val();
        var data_final = $("#upd_data_final_campanha").val();
        var obs = $("#upd_obs_campanha").val();

        $.post("../comercial/assets/ajax/atualiza_campanha.php", {
        id: id,
        descricao: descricao,
        data_inicio: data_inicio,
        data_final: data_final,
        obs: obs
        },
        function (data, status) {
            // hide modal popup
            $("#upd_campanha_modal").modal("hide");
            // reload Users by using readRecords();
            lerCampanhas();
        }
    );
    $("#upd_campanha_modal").modal("hide");
    // reload Users by using readRecords();
    
}

function deletaCampanha(id) {
    var conf = confirm("Tem certeza que deseja apagar essa campanha?");
    if (conf == true) {
        $.post("../comercial/assets/ajax/deleta_campanha.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                lerCampanhas();
            }
        );
    }
}

function downloadFile(path_str){

    $.ajax({
        url: '../comercial/assets/ajax/download.php',
        type: 'POST',
        success: function() {
            window.location = 'download.php';
        }
    });
}

//Inicio do script dos Informativos do admin
function lerInformativos(id) {
    // Exibe o conteúdo das visitas de cada representante
    $.post("../comercial/assets/ajax/ler_informativos.php", {
        id: id
    }, function (data, status) {
        $(".informativos_conteudo").html(data);
    });
}

function addInformativo() {


var promo = {
   url     : './assets/ajax/upload_informativo.php',
   success : function(responseText) { lerInformativos(); }
};

$("#frm_informativo").ajaxSubmit(promo);


    // close the popup
    $("#add_novo_informativo_modal").modal("hide");

    // clear fields from the popup
    $("#add_info_descricao_pdf").val("");
    $("#add_info_data_inicio").val("");
    $("#add_info_data_final").val("");
    $("#add_info_upload_file").val("");
    $("#add_obs_informativo").val("");

}

function detalhesInformativo(id) {
    // Add Campanha ID to the hidden field for furture usage
    $("#hidden_informativo_id").val(id);
    $.post("../comercial/assets/ajax/ler_detalhes_informativo.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var informativo = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#upd_info_descricao_pdf").val(informativo.descricao_pdf);
            $("#upd_info_data_inicio").val(informativo.data_inicio);
            $("#upd_info_data_final").val(informativo.data_final);
            $("#upd_obs_informativo").val(informativo.obs);
 
        }
    );
    // Open modal popup
    $("#upd_informativo_modal").modal("show");
}

function atualizaInformativo() {

    // get hidden field value
    var id = $("#hidden_informativo_id").val();

    var options = {
    url     : './assets/ajax/atualiza_informativos.php',
   success : function(responseText) { lerInformativos(); }
    };

    $("#frm_upd_informativo").ajaxSubmit(options);

    $("#upd_informativo_modal").modal("hide");
    // reload Users by using readRecords();
    
}

function deletaInformativo(id) {
    var conf = confirm("Tem certeza que deseja apagar esse informativo?");
    if (conf == true) {
        $.post("../comercial/assets/ajax/deleta_informativo.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                lerInformativos();
            }
        );
    }
}

//Inicio do script das Promocoes do admin
function lerPromocoes(id) {
    // Exibe o conteúdo das visitas de cada representante
    $.post("../comercial/assets/ajax/ler_promocoes.php", {
        id: id
    }, function (data, status) {
        $(".promocoes_conteudo").html(data);
    });
}

function addPromocao() {


var promocao = {
   url     : './assets/ajax/upload_promocao.php',
   success : function(responseText) { lerPromocoes(); }
};

$("#frm_promocao").ajaxSubmit(promocao);


    // close the popup
    $("#add_nova_promocao_modal").modal("hide");

    // clear fields from the popup
    $("#add_promo_descricao_pdf").val("");
    $("#add_promo_data_inicio").val("");
    $("#add_promo_data_final").val("");
    $("#add_promo_upload_file").val("");
    $("#add_obs_promocao").val("");
}

function detalhesPromocao(id) {
    // Add Campanha ID to the hidden field for furture usage
    $("#hidden_promocao_id").val(id);
    $.post("../comercial/assets/ajax/ler_detalhes_promocao.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var promocao = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#upd_promo_descricao_pdf").val(promocao.descricao_pdf);
            $("#upd_promo_data_inicio").val(promocao.data_inicio);
            $("#upd_promo_data_final").val(promocao.data_final);
            $("#upd_obs_promocao").val(promocao.obs);
 
        }
    );
    // Open modal popup
    $("#upd_promocao_modal").modal("show");
}

function atualizaPromocao() {

    // get hidden field value
    var id = $("#hidden_promocao_id").val();

    var updpromo = {
    url     : './assets/ajax/atualiza_promocao.php',
   success : function(responseText) { lerPromocoes(); }
    };

    $("#frm_upd_promocao").ajaxSubmit(updpromo);

    $("#upd_promocao_modal").modal("hide");
    // reload Users by using readRecords();
    
}

function deletaPromocao(id) {
    var conf = confirm("Tem certeza que deseja apagar essa promoção?");
    if (conf == true) {
        $.post("../comercial/assets/ajax/deleta_promocao.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                lerPromocoes();
            }
        );
    }
}

function exibirCampanhas() {
    $.get("../comercial/assets/ajax/exibir_campanhas.php", {}, function (data, status) {
        $(".campanhas").html(data);
    });
}

function exibirInformativos() {
    $.get("../comercial/assets/ajax/exibir_informativos.php", {}, function (data, status) {
        $(".informativos").html(data);
    });
}

function exibirPromocoes() {
    $.get("../comercial/assets/ajax/exibir_promocoes.php", {}, function (data, status) {
        $(".promocoes").html(data);
    });
}

function detalhesPDFcampanha(id) {
    // Add Campanha ID to the hidden field for furture usage

    $.post("../comercial/assets/ajax/ler_detalhes_pdf_campanha.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var campanha = JSON.parse(data);
            // Embeda o PDF path no modal .pdf-campanha da pagina campanhas.php

        var url = campanha.arquivo_path;
        var nome = campanha.descricao_pdf;
        $(".modal-body").html('<iframe width="100%" height="100%" frameborder="0" scrolling="yes" allowtransparency="true" src="'+url+'"></iframe>');

    $('#pdf_campanha').on('show.bs.modal', function () {
        $( "#myModalLabel" ).html(nome);
        $(this).find('.modal-dialog').css({
                  width:'100%', //choose your width
                  height:'100%', 
                  'padding':'0'
           });
         $(this).find('.modal-content').css({
                  height:'90%', 
                  'border-radius':'0',
                  'padding':'0'
           });
         $(this).find('.modal-body').css({
                  width:'100%',
                  height:'90%', 
                  'max-width':'100%',
                  'padding':'0'
           });
    }).modal("show");
 
        }
    );
}

//Validação de CNPJ
function validaCnpj(cnpj){

cnpj = cnpj.replace(/[^\d]+/g,'');

        var a = new Array();
    var b = new Number;
    var c = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    for (i = 0; i < 12; i++) {
        a[i] = CNPJ.charAt(i);
        b += a[i] * c[i + 1];
    }
    if ((x = b % 11) < 2) {
        a[12] = 0
    } else {
        a[12] = 11 - x
    }
    b = 0;
    for (y = 0; y < 13; y++) {
        b += (a[y] * c[y]);
    }
    if ((x = b % 11) < 2) {
        a[13] = 0;
    } else {
        a[13] = 11 - x;
    }
    if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])) {
        alert("CNPJ!");
        return false;
    }
    return true;

}

//CEP


    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('add_endereco_cliente').value=(conteudo.logradouro);
            document.getElementById('add_cidade_cliente').value=(conteudo.localidade);
            document.getElementById('add_estado_cliente').value=(conteudo.uf);
            document.getElementById('upd_endereco_cliente').value=(conteudo.logradouro);
            document.getElementById('upd_cidade_cliente').value=(conteudo.localidade);
            document.getElementById('upd_estado_cliente').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('add_endereco_cliente').value="...";
                document.getElementById('add_cidade_cliente').value="...";
                document.getElementById('add_estado_cliente').value="...";
                document.getElementById('upd_endereco_cliente').value="...";
                document.getElementById('upd_cidade_cliente').value="...";
                document.getElementById('upd_estado_cliente').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };



function lerTabela() {
    // Exibe o conteúdo das visitas de cada representante
    $('#tabela').DataTable({
        "bProcessing": true,
        "serverSide": true,
        "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
        },
        "initComplete": function (){
            $( document ).on("click", "tr[role='row']", function(){
                 detalhesTabela($(this).children('td:first-child').text())
            });
        },
         "ajax":{
            url :"../comercial/assets/ajax/ler_tabela.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
              $("#tabela_processing").css("display","none");
            }
          }
        }); 
}

function addTabela() {
    // get values
    var codigo_tabela = $("#add_codigo_tabela").val();
    var desc_tabela = $("#add_desc_tabela").val();
    var esp_tabela = $("#add_esp_tabela").val();
    var aco_tabela = $("#add_aco_tabela").val();
    var qtde_tabela = $("#add_qtde_tabela").val();
    var dep_tabela = $("#add_dep_tabela").val();
    var dep_30_tabela = $("#add_dep_30_tabela").val();
    var dep_45_tabela = $("#add_dep_45_tabela").val();
    var dep_60_tabela = $("#add_dep_60_tabela").val();


    // Add record
    $.post("../comercial/assets/ajax/adiciona_tabela.php", {
        codigo_tabela: codigo_tabela,
        desc_tabela: desc_tabela,
        esp_tabela: esp_tabela,
        aco_tabela: aco_tabela,
        qtde_tabela: qtde_tabela,
        dep_tabela: dep_tabela,
        dep_30_tabela: dep_30_tabela,
        dep_45_tabela: dep_45_tabela,
        dep_60_tabela: dep_60_tabela

    }, function (data, status) {
        // close the popup
        $("#add_tabela_modal").modal("hide");
        // read records again
        location.reload();

        // clear fields from the popup

        $("#add_codigo_tabela").val("");
        $("#add_desc_tabela").val("");
        $("#add_esp_tabela").val("");
        $("#add_aco_tabela").val("");
        $("#add_qtde_tabela").val("");
        $("#add_dep_30_tabela").val("");
        $("#add_dep_tabela").val("");
        $("#add_dep_45_tabela").val("");
        $("#add_dep_60_tabela").val("");
    });
}

$(function(){
 
    // ## EXEMPLO 3
    // Aciona a validação e formatação ao sair do input
    $('.cpf_cnpj').blur(function(){
    
        // O CPF ou CNPJ
        var cpf_cnpj = $(this).val();
        
        // Testa a validação e formata se estiver OK
        if ( formata_cpf_cnpj( cpf_cnpj ) ) {
            $(this).val( formata_cpf_cnpj( cpf_cnpj ) );
        } else {
            alert('Documento inválido!');
        }
        
    });
 
});