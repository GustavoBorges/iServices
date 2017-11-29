//Carregamento das páginas
$(document).ready(function() {

    //Filtros de pesquisa das tabelas
    filtroPesquisaTable();

    //Balões de informações dos botões
    $('[data-balao="tooltip"]').tooltip(); 

    //Pegando posição atual do usuário
    getPosition();

    //verifica o status do serviço na tabela e muda o "número de retorno do banco" para o "nome correlacionado ao número"
    //0 - Solicitado / 1 - Aceito / 2 - Rejeitado / 3 - Cancelado / 4 - Concluido 
    verificaStatus();

    //Escondendo div's e atribuindo valores a botões e checkbox
    escondeDivs();

    //Verifica se o serviço está ativo. Caso este o check será true
    verificaCheckBoxCliente();

    //Verifica o status do serviço solicitado e faz o bloqueio dos botões de acordo com o status
    verificaButtonsAcoesUsuario();
    //
    verificaFavorito();

    $('.sliding-link').click(function(e) {
      e.preventDefault();
      var id = $(this).attr("href");
      $('html,body').animate({scrollTop: $(id).offset().top},'slow');
    });

});


//Functions criadas para execução do carregamento da página e condições

function filtroPesquisaTable(){

   $('#tab-servicos').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        }
    });

   $('#tab-avaliacoes').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        }
    });

   $('#tab-favoritos').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        }
    });

    $('#tab-servicosSolicitados').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        }
    });

    $('#tab-historicos').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        }
    });

    $('#tab-contratos').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        }
    });
}

function verificaFavorito(){

$('.favoritos-usuario').each(function() {
  
var favorito = $(this).data('favorito');

if (favorito == "1"){
  $(this).css('color', 'red');

  }

}); 

}

function escondeDivs(){

    //Itens da página index.php
    $('#carregando-acesso').hide('slow');
    $('#dados-acesso-usuario').hide();
    $('#dados-acesso-prestador').hide();
    $('#carregando-modal-cadastro').hide();
    $('#alert-success-cadastrar').hide();
    $('#alert-warning-cadastrar').hide();
    $('#acesso-prestador').hide();
    $('#acesso-usuario').hide();
    $('#alert-warning-login').hide(); 
    $('.dados-endereco').hide();    
    $('#alert-warning-cadastrar-existe').hide();
    $('#alert-danger-aceita-cadastrar').hide();
    $('#alert-warning-cadastrar-existe-usuario').hide();
    $('#arquivo-cadastro').hide();
      
    //Itens da página cliente.php
    $('#alert-danger-aceita-servico-prestador-dois').hide();
    $('#alert-success-aceita-servico-prestador-dois').hide();
    $('#alert-danger-aceita-servico-prestador').hide();
    $('#alert-success-aceita-servico-prestador').hide();
    $('#alert-warning-aceita-servico-prestador').hide();
    $('#alert-warning-aceita-servico-prestador-dois').hide();
    $('#carregando-modal-aceitar-servico-dois').hide();
    $('#carregando-modal-aceitar-servico').hide();
    $('#editar-horario-atendimento').hide();
    $('#editar-horario-urgencia').hide();
    $('#carregando-modal-alterar').hide();
    $('#alert-warning-alterar').hide();
    $('#alert-success-alterar').hide();
    $('#alert-danger-alterar').hide();
    $('#horario-atendimento').hide();
    $('#horario-urgencia').hide();
    $('#carregando-modal-cadastrar-servico').hide();
    $('#alert-warning-cadastro-servico').hide();
    $('#alert-success-cadastrar-servico').hide();
    $('span.id-servico').hide();    
    $('#carregando-modal-cancelar-servico').hide();
    $('#alert-warning-cancelar-servico').hide();
    $('#alert-success-cancelar-servico').hide();
    $('#alert-danger-cancelar-servico').hide();    

    //Itens da página usuario.php
    $('#modal-body-comentario').hide();
    $('#modal-body-agradecimento').hide();    
    $('#alert-success-contratar').hide('slow');    
    $('#alert-warning-contratar').hide('slow');
    $('#carregando-modal-contratar').hide('slow');
    $('#alert-success-contratar-favorito').hide('slow');    
    $('#alert-warning-contratar-favorito').hide('slow');
    $('#carregando-modal-contratar-favorito').hide('slow');
    $("textarea[name=messagem-text-termo]").prop('disabled', true);
    $('#div-recebe-id-servico').hide('slow');      
    $('#div-recebe-id-servico-favorito').hide('slow');
    $('#form-enddiferente').hide('slow');    
    $('#btn-contratar-modal').prop('disabled', true);
    $('#btn-contratar-modal-favorito').prop('disabled', true);
    $('#carregando-modal-cancelar-servico-usuario').hide();
    $('#alert-warning-cancelar-servico-usuario').hide();
    $('#alert-success-cancelar-servico-usuario').hide();
    $('#alert-danger-cancelar-servico-usuario').hide();
    $('#alert-warning-confirma-pagamento').hide();
    $('#alert-success-confirma-pagamento').hide();
    $('#carregando-modal-confirma-pagamento').hide();
    $('#alert-warning-confirma-pagamento-preco').hide();
    $('#form-enddiferente-favorito').hide('slow'); 


}

function verificaCheckBoxCliente(){

  $('.checkando').each(function(index, value) {

      var checkAtivo = $(this);
      var ativo = checkAtivo.data('ativo');

      if (ativo == "1") {
        checkAtivo.prop('checked', true); 
      } else{
        checkAtivo.prop('checked', false);
      }    
  });

}

function verificaButtonsAcoesUsuario(){

    $('.statusUsuario').each(function(index, value) {

      var recebeNome = $(this).data('name');

      if (recebeNome == "0"){
        $(this).html("Proposta Solicitada");
      }

      else if (recebeNome == "1"){
        $(this).html("Proposta Aceita");
      }

      else if (recebeNome == "2"){
        $(this).html("Pagamento Realizado");
      }

      else if (recebeNome == "3"){
        $(this).html("Proposta Cancelada");
      }

      else if (recebeNome == "4"){
        $(this).html("Serviço Concluido");
      }

      else if (recebeNome == "5"){
        $(this).html("Serviço Avaliado");
      }
      
    });

    $('.avaliar-prestador').each(function(index, value) {

      var pegaPropriedade = $(this);
      var recebeStatus = pegaPropriedade.data('status');

      if (recebeStatus != 4){
        pegaPropriedade.prop('disabled', true);

      } else {
        pegaPropriedade.hover(function() {
          pegaPropriedade.css('color', 'yellow');
        }, function() {
          pegaPropriedade.css('color', '#333');
        });
      }
      
    });

    $('.cancelar-proposta').each(function(index, value) {

      var pegaPropriedade = $(this);
      var recebeStatus = pegaPropriedade.data('status');

      if (recebeStatus != 0){
        pegaPropriedade.prop('disabled', true);

      } else {
        pegaPropriedade.hover(function() {
          pegaPropriedade.css('color', '#FF0000');
        }, function() {
          pegaPropriedade.css('color', '#333');
        });
      }
      
    });

    $('.btn-pagamento').each(function(index, value) {

      var pegaPropriedade = $(this);
      var recebeStatus = pegaPropriedade.data('status');

      if (recebeStatus != 1){
        pegaPropriedade.prop('disabled', true);
      
      } else {
        pegaPropriedade.hover(function() {
          pegaPropriedade.css('color', '#228B22');
        }, function() {
          pegaPropriedade.css('color', '#333');
        });
      }
      
    });
}

function getPosition(){
  // Verifica se o browser do usuario tem suporte a Geolocation
  if ( navigator.geolocation ){
    navigator.geolocation.getCurrentPosition( function( posicao ){
    } );
  }
}

function verificaStatus(){

  $('.status').each(function(index, value) {

    var recebeNome = $(this).data('name');

    if (recebeNome == "0"){
      $(this).html("Proposta Recebida");
    }

    else if (recebeNome == "1"){
      $(this).html("Proposta Aceita");
    }

    else if (recebeNome == "2"){
      $(this).html("Pagamento Confirmado");
    }

    else if (recebeNome == "3"){
        $(this).html("Proposta Cancelada");
    }

    else if (recebeNome == "4"){
        $(this).html("Serviço Concluido");
    }

    else if (recebeNome == "5"){
        $(this).html("Serviço Avaliado");
    }
    
  });
  
    $('.btn-visualizar-modal-servico').each(function(index, value) {
    var propriedadeButton = $(this)
    var recebeStatus = propriedadeButton.data('status');

    if (recebeStatus != "0"){

      propriedadeButton.prop('disabled', true);
    } else{

      $(this).hover(function() {
        propriedadeButton.css('color', '#4169E1');
      }, function() {
        propriedadeButton.css('color', '#333');
      });
    } 

  });

    $('.btn-conclui-proposta').each(function(index, value) {
    var propriedadeButton = $(this);
    var recebeStatus = propriedadeButton.data('status');

    if (recebeStatus != "2"){

      propriedadeButton.prop('disabled', true);
           
    } else{
      propriedadeButton.hover(function() {
        propriedadeButton.css('color', '#00FF7F');
      }, function (){
        propriedadeButton.css('color', '#333');
      });
    } 
  });

    $('.btn-detalhes-tab-solicitacao').each(function(index, value) {
    var propriedadeButton = $(this);
    var recebeStatus = propriedadeButton.data('status');

    if (recebeStatus != "0"){
      propriedadeButton.prop('disabled', false);
      propriedadeButton.hover(function() {
        propriedadeButton.css('color', '#6495ED');
      }, function() {
        propriedadeButton.css('color', '#333');
      });            
    } else {
      propriedadeButton.prop('disabled', true); 
    }
  });
}

$('.btn-rejeitar-proposta').each(function(index, value) {
    var propriedadeButton = $(this);
    var recebeStatus = propriedadeButton.data('status');

    if (recebeStatus == "0" || recebeStatus == "1"){

      propriedadeButton.prop('disabled', false);
      propriedadeButton.hover(function() {
        propriedadeButton.css('color', '#FF0000');
      }, function (){
        propriedadeButton.css('color', '#333');
      });
           
    } else {

      propriedadeButton.prop('disabled', true); 
      
    } 
  });

//FUNÇÕES DE BOTÕES SEM REQUISIÇÕES AJAX

$('#proximo').click(function() {
  $('.dados-endereco').show();  
  $('.dados-acesso').hide();

});

$('#voltar').click(function() {
  $('.dados-endereco').hide();  
  $('.dados-acesso').show();

});

$('.btn-rejeitar-proposta').click(function(event) {
    var button = $(this);
    var idContrato = button.data('idcontrato');
    $('.cancela-idcontrato').text(idContrato);

    $('#cancelar-servico-modal').modal('show');

});


$('.btn-excluir').click(function(event) {
    var button = $(this);
    var nome = button.data('name');
    var id = button.data('id');
    $('span.nome').text(nome);
    $('span.id-servico').text(id);
    $('#retorno').html('');
    $('#excluir-servico-modal').modal('show');
    
});


$('.cancelar-proposta').click(function(event) {
      var button = $(this);
      var idContrato = button.data('idcontrato');
      $('.cancela-idcontrato').text(idContrato);

    $('#cancelar-servico-modal').modal('show');

});


$('#check-termo').change(function(){
        if ($('#check-termo').is(':checked')){
            $('#btn-contratar-modal').prop('disabled', false);
        }
        else {
            $('#btn-contratar-modal').prop('disabled', true);
        }
});

$('#check-termo-favorito').change(function(){
        if ($('#check-termo-favorito').is(':checked')){
            $('#btn-contratar-modal-favorito').prop('disabled', false);
        }
        else {
            $('#btn-contratar-modal-favorito').prop('disabled', true);
        }
});


$('.editar-servico').click(function(event) {
   var button = $(this);
   var id = button.data('id');
   var tipoServico = button.data('tipo');
   var valor = button.data('valor');
   var descricao = button.data('descricao');
   var horarioInicial = button.data('horarioinicial');
   var horarioFinal = button.data('horariofinal');
   var diaInicial = button.data('diainicial');
   var diaFinal = button.data('diafinal');
   var check = button.data('check');

   $('input[name=editar-identificador]').val(id);
   $('select[name=editar-tipoServico]').val(tipoServico);
   $('input[name=editar-valor]').val(valor);
   $('textarea[name=editar-descricao-servico]').val(descricao);

   if (check == "1"){

   $('input[name=editar-horario-atendimento').prop('checked', false);
   $('#editar-horario-atendimento').hide();

   $('input[name=editar-tipo-atendimento').prop('checked', true);
   $('#editar-horario-urgencia').show();

   } else{
    
   $('input[name=editar-tipo-atendimento').prop('checked', false);
   $('#editar-horario-urgencia').hide();

   $('input[name=editar-horario-atendimento').prop('checked', true);
   $('#editar-horario-atendimento').show();
   
   $('select[name=editar-horario-atendimento-inicial]').val(horarioInicial);
   $('select[name=editar-horario-atendimento-final]').val(horarioFinal);
   $('select[name=editar-dia-atendimento-inicial]').val(diaInicial);
   $('select[name=editar-dia-atendimento-final]').val(diaFinal);   

   }

   $('#modal-editar-cadastro').modal('show');

});


$('#contratacao-modal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var nome = button.data('name');
    var id = button.data('id');
    var valor = button.data('valor');
    $('#recebe-nome-servico').text(nome);
    $('#recebe-valor-servico').text(valor);
    $('#recebe-id-servico').text(id);
});


$('#contratacao-modal-favorito').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var nome = button.data('name');
    var id = button.data('id');
    var valor = button.data('valor');
    $('#recebe-nome-servico-favorito').text(nome);
    $('#recebe-valor-servico-favorito').text(valor);
    $('#recebe-id-servico-favorito').text(id);
});

$('.visualizar-servico').click(function(event) {

   var button = $(this);
   var id = button.data('id');
   var tipoServico = button.data('tipo');
   var valor = button.data('valor');
   var descricao = button.data('descricao');
   var horarioInicial = button.data('horarioinicial');
   var horarioFinal = button.data('horariofinal');
   var diaInicial = button.data('diainicial');
   var diaFinal = button.data('diafinal');
   var check = button.data('check');

   if(check == "0"){

   $('span[name=visualizacao-id-servico]').text(id);
   $('span[name=visualizacao-tipo-servico]').text(tipoServico);
   $('span[name=visualizacao-valor-servico]').text(valor);
   $('span[name=visualizacao-descricao-servico]').text(descricao);
   $('span[name=visualizacao-horainicial-servico]').text(horarioInicial);
   $('span[name=visualizacao-horafinal-servico]').text(horarioFinal);
   $('span[name=visualizacao-diainicial-servico]').text(diaInicial);
   $('span[name=visualizacao-diafinal-servico]').text(diaFinal);

   
   $('#modal-visualizacao').modal('show');
}

    else {

   $('span[name=visualizacao-id-servico-dois]').text(id);
   $('span[name=visualizacao-tipo-servico-dois]').text(tipoServico);
   $('span[name=visualizacao-valor-servico-dois]').text(valor);
   $('span[name=visualizacao-descricao-servico-dois]').text(descricao);     
   $('span[name=visualizacao-horainicial-servico-dois]').text(horarioInicial);
   $('span[name=visualizacao-diainicial-servico-dois]').text(diaInicial);

   
   $('#modal-visualizacao-dois').modal('show');

}
    
});

$('.btn-detalhe-buscar-servicos').click(function(event) {

   var button = $(this);
   var id = button.data('idservico');
   var tipoServico = button.data('tiposervico');
   var valor = button.data('preco');
   var descricao = button.data('descricao');
   var nomePrestador = button.data('name');
   var telefonePrestador = button.data('tel');
   var horarioInicial = button.data('horarioinicial');
   var horarioFinal = button.data('horariofinal');
   var diaInicial = button.data('diainicial');
   var diaFinal = button.data('diafinal');
   var check = button.data('check');

   if(check == "0"){

   $('span[name=visualizacao-id-servico-usuario-buscar-servico]').text(id);
   $('span[name=visualizacao-tipo-servico-usuario-buscar-servico]').text(tipoServico);
   $('span[name=visualizacao-valor-servico-usuario-buscar-servico]').text(valor);
   $('span[name=visualizacao-descricao-servico-usuario-buscar-servico]').text(descricao);
   $('span[name=visualizacao-prestador-servico-usuario-buscar-servico]').text(nomePrestador);
   $('span[name=visualizacao-telefone-servico-usuario-buscar-servico]').text(telefonePrestador);
   $('span[name=visualizacao-horainicial-servico-usuario-buscar-servico]').text(horarioInicial);
   $('span[name=visualizacao-horafinal-servico-usuario-buscar-servico]').text(horarioFinal);
   $('span[name=visualizacao-diainicial-servico-usuario-buscar-servico]').text(diaInicial);
   $('span[name=visualizacao-diafinal-servico-usuario-buscar-servico]').text(diaFinal);

   
   $('#modal-visualizacao-usuario-buscar-servico').modal('show');
}

    else {

   $('span[name=visualizacao-id-servico-usuario-buscar-servico-dois]').text(id);
   $('span[name=visualizacao-tipo-servico-usuario-buscar-servico-dois]').text(tipoServico);
   $('span[name=visualizacao-valor-servico-usuario-buscar-servico-dois]').text(valor);
   $('span[name=visualizacao-descricao-servico-usuario-buscar-servico-dois]').text(descricao);
   $('span[name=visualizacao-prestador-servico-usuario-buscar-servico-dois]').text(nomePrestador);
   $('span[name=visualizacao-telefone-servico-usuario-buscar-servico-dois]').text(telefonePrestador);     
   $('span[name=visualizacao-horainicial-servico-usuario-buscar-servico-dois]').text(horarioInicial);
   $('span[name=visualizacao-diainicial-servico-usuario-buscar-servico-dois]').text(diaInicial);

   
   $('#modal-visualizacao-usuario-buscar-servico-dois').modal('show');

}
    
});


$('button.avaliar-prestador').click(function(event) {
    var button = $(this);
    var idContrato = button.data('idcontrato');
    var idCliente = button.data('idcliente');
    var nomePrestador = button.data('nomeprestador');

    $('span[name=nome-prestador-avaliacao]').text(nomePrestador);
    $('span[name=idcontrato-avaliacao]').text(idContrato);
    $('span[name=idcliente-avaliacao]').text(idCliente);
    $('#avaliacao-modal').modal('show');

});


$('.score').click(function(event) {
  var button = $(this);
  var nota = button.text();

  $('.select-score').text(nota);
  $('#modal-body-pontuacao').hide();
  $('#modal-body-comentario').show();

});


$('.btn-voltar-avaliacao').click(function(event) {

  $('#modal-body-comentario').hide();
  $('#modal-body-pontuacao').show();
  
});


// Verificando se o check está sendo ativado abrindo um modal. Ao clicar em não o mesmo não é ativado.
$('.checkando').change(function() {
     var button = $(this); //

    if ($(this).is(':checked')) {
        var nome = $(this).data('name');
        var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
        $('#ativando-servico').text(nome + ' (id = ' + id + ')'); // inserir na o nome na pergunta de confirmação dentro da modal
        $('#ativacao-modal').modal('show');
        
        $('#nao-ativa').click(function() {
            button.prop('checked', false);
        });

        $('#ativar-servico').click(function() {
            $('#ativar-servico').attr('href', '../functions/ativacao.php?id=' + id + '&&ativar=ativar'); // mudar dinamicamente o link, href do botão confirmar da modal
            button.prop('checked', true);
        });
    } else {
        var nome = $(this).data('name');
        var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
        $('#desativando-servico').text(nome + ' (id = ' + id + ')'); // inserir na o nome na pergunta de confirmação dentro da modal
        $('#desativacao-modal').modal('show');

        $('#nao-desativa').click(function() {
            button.prop('checked', true);
        });

        $('#desativar-servico').click(function() {
            $('#desativar-servico').attr('href', '../functions/ativacao.php?id=' + id + '&&desativar=desativar'); // mudar dinamicamente o link, href do botão confirmar da modal
            button.prop('checked', false);
        });

    }
});


$('#cadastrar-usuario').click(function() {
    $('#modal-login').modal('hide');
    $('#modal-cadastro').modal('show');
});


$('#modalLoginServico').on('show.bs.modal', function(event) {
    $('#carregando').hide();
});


$('.btn-avaliar').click(function() {
    $('#avaliacao-modal').modal('show');
});


$('#check-endcadastrado').change( function (){
    $('#form-enddiferente').hide('slow');

        if ($('#check-enddiferentecadastro').is(':checked')){
            $('#check-enddiferentecadastro').prop('checked', false);
        }

});


$('#check-enddiferentecadastro').change( function (){
    if ($('#check-endcadastrado').is(':checked')){
            $('#check-endcadastrado').prop('checked', false);
        }

            $('#form-enddiferente').show('slow');

            if ($('#check-enddiferentecadastro').is(':checked') == false){
                    $('#form-enddiferente').hide('slow');
     }
});

$('#check-endcadastrado-favorito').change( function (){
    $('#form-enddiferente-favorito').hide('slow');

        if ($('#check-enddiferentecadastro-favorito').is(':checked')){
            $('#check-enddiferentecadastro-favorito').prop('checked', false);
        }

});


$('#check-enddiferentecadastro-favorito').change( function (){
    if ($('#check-endcadastrado-favorito').is(':checked')){
            $('#check-endcadastrado-favorito').prop('checked', false);
        }

            $('#form-enddiferente-favorito').show('slow');

            if ($('#check-enddiferentecadastro-favorito').is(':checked') == false){
                    $('#form-enddiferente-favorito').hide('slow');
     }
});



$('.close').click(function(event) {

  //alerts modal cadastro usuário e prestador
   $('#alert-success-cadastrar').hide();
   $('#alert-warning-cadastrar').hide();   
   $('#alert-warning-cadastrar-existe').hide();
   $('#alert-danger-aceita-cadastrar').hide();
   $('#alert-warning-cadastrar-existe-usuario').hide();

   //
   $('#alert-warning-cadastrar').hide();
   $('#alert-warning-login').hide();
   $('#alert-warning-contratar').hide();
   $('#alert-warning-cadastro-servico').hide();
   $('#alert-success-cadastrar-servico').hide();
   //alerts modal alteração do serviço
   $('#alert-warning-alterar').hide();
   $('#alert-success-alterar').hide();
   //alerts modal aceitação do serviço
   $('#alert-success-aceita-servico-prestador-dois').hide();
   $('#alert-danger-aceita-servico-prestador-dois').hide();
   $('#alert-success-aceita-servico-prestador').hide();
   $('#alert-danger-aceita-servico-prestador').hide();
   $('#alert-warning-aceita-servico-prestador').hide();
   $('#alert-warning-aceita-servico-prestador-dois').hide();
   //alerts modal cancelamento do serviço pelo usuário
   $('#alert-warning-cancelar-servico-usuario').hide();
   $('#alert-success-cancelar-servico-usuario').hide();
   $('#alert-danger-cancelar-servico-usuario').hide();

   //alerts modal cancelamento do serviço pelo cliente
   $('#alert-warning-cancelar-servico').hide();
   $('#alert-success-cancelar-servico').hide();
   $('#alert-danger-cancelar-servico').hide();

   //alerts modal pagamento do serviço pelo usuário
   $('#alert-warning-confirma-pagamento').hide();
   $('#alert-success-confirma-pagamento').hide();
   $('#alert-warning-confirma-pagamento-preco').hide();
   //alerts modal contratação do serviço pelo usuário na Tab Favoritos
   $('#alert-success-contratar-favorito').hide('slow');    
   $('#alert-warning-contratar-favorito').hide('slow');
   $('#carregando-modal-contratar-favorito').hide('slow');


});


$('#checkbox3').change(function() {

    $('#alert-warning-login').hide();
    $('input[name=senha-acesso]').val("");
    $('input[name=email-acesso]').val("");

    $('#checkbox2').prop('checked', false);
    $('#acesso-usuario').show('slow');
    $('#acesso-prestador').hide('slow');

    if ($('#checkbox3').is(':checked') == false){
            $('#acesso-usuario').hide('slow');
    }
});


$('#checkbox2').change(function() {

    $('#alert-warning-login').hide();
    $('input[name=senha-acesso]').val("");
    $('input[name=cnpj-acesso]').val("");

    $('#checkbox3').prop('checked', false);
    $('#acesso-prestador').show('slow');
    $('#acesso-usuario').hide('slow');

    if($('#checkbox2').is(':checked') == false){
            $('#acesso-prestador').hide('slow');
    }
});


$('#checkbox4').change(function(event) {
    $('#checkbox5').prop('checked', false);
    $('#dados-acesso-prestador').show();
    $('#arquivo-cadastro').show();
    $('#dados-acesso-usuario').hide();

    if ($('#checkbox4').is(':checked') == false){
        $('#dados-acesso-prestador').hide();
        $('#arquivo-cadastro').hide();
    }
});


$('#checkbox5').change(function(event) {
    $('#checkbox4').prop('checked', false);
    $('#dados-acesso-usuario').show();
    $('#dados-acesso-prestador').hide();
    $('#arquivo-cadastro').hide();

    if ($('#checkbox5').is(':checked') == false){
        $('#dados-acesso-usuario').hide();
    }
});


$('#checkbox6').change(function(event) {
    $('#checkbox7').prop('checked', false);
    $('#checkbox12').prop('checked', false);
   
});


$('#checkbox7').change(function(event) {
    $('#checkbox6').prop('checked', false);
    $('#checkbox12').prop('checked', false);

});

$('#checkbox12').change(function(event) {
    $('#checkbox6').prop('checked', false);
    $('#checkbox7').prop('checked', false);

});


$('.btn-pagamento').click(function(event) {
    var button = $(this);
    var id = button.data('id');
    var name = button.data('name');
    var servico = button.data('servico');
    var status = button.data('status');
    var telefone = button.data('tel');

    if (status == "1"){

        status = "Proposta Aceita";

    }

    $('span.contrato').text(id);
    $('span.status').text(status);   
    $('span.nome-prestador').text(name);
    $('span.telefone').text(telefone);
    $('span.servico').text(servico);

    $('#pagamento-modal').modal('show');

});



$('#checkbox8').change(function(event) {
    $('#checkbox9').prop('checked', false);
     $('#horario-atendimento').show();    
     $('#horario-urgencia').hide();

     if($('#checkbox8').is(':checked') == false){
        $('#horario-atendimento').hide();
     }

});


$('#checkbox9').change(function(event) {
    $('#checkbox8').prop('checked', false);
    $('#horario-urgencia').show();
    $('#horario-atendimento').hide();

    if($('#checkbox9').is(':checked') == false){
        $('#horario-urgencia').hide();
     }    
     
});


$('#checkbox10').change(function(event) {
    $('#checkbox11').prop('checked', false);
     $('#editar-horario-atendimento').show();    
     $('#editar-horario-urgencia').hide();

     if($('#checkbox10').is(':checked') == false){
        $('#editar-horario-atendimento').hide();
     }

});


$('#checkbox11').change(function(event) {
    $('#checkbox10').prop('checked', false);
    $('#editar-horario-urgencia').show();
    $('#editar-horario-atendimento').hide();

    if($('#checkbox11').is(':checked') == false){
        $('#editar-horario-urgencia').hide();
     }    
     
});


$('.btn-visualizar-modal-servico').click(function(event) {
  
        var button = $(this);
        var id = button.data('id');
        var tipoServico = button.data('tipo');
        var preco = button.data('valor');
        var descricao = button.data('descricao');
        var horarioInicial = button.data('horarioinicial');
        var horarioFinal = button.data('horariofinal');
        var diaInicial  = button.data('diainicial');
        var diaFinal = button.data('diafinal');
        var nomeContratante  = button.data('contratante');
        var telefoneContratante = button.data('telefonecontratante');
        var emailContratante = button.data('emailcontratante');
        var endContratante= button.data('enderecocontratante');
        var detalhes= button.data('detalhes');
        var checkClidado = button.data('check');

        if (checkClidado == "1"){

        $('span[name=visualizacao-solicitacao-id-servico-dois]').text(id);
        $('span[name=visualizacao-solicitacao-tipo-servico-dois]').text(tipoServico);
        $('span[name=visualizacao-solicitacao-valor-servico-dois]').text(preco);
        $('span[name=visualizacao-solicitacao-descricao-servico-dois]').text(descricao);
        $('span[name=visualizacao-solicitacao-contratante-servico-dois]').text(nomeContratante);
        $('span[name=visualizacao-solicitacao-telefone-servico-dois]').text(telefoneContratante);
        $('span[name=visualizacao-solicitacao-email-servico-dois]').text(emailContratante);
        $('span[name=visualizacao-solicitacao-endereco-servico-dois]').text(endContratante);
        $('textarea[name=detalhes-solicitacao-modal-contratar-dois]').val(detalhes);        
        $('span[name=visualizacao-solicitacao-horainicial-servico-dois]').text(horarioInicial);
        $('span[name=visualizacao-solicitacao-diainicial-servico-dois]').text(diaInicial);
        $('span[name=check-clicado-visualizacao-dois]').text(checkClidado);

        $('textarea[name=detalhes-solicitacao-modal-contratar-dois]').prop('disabled', true);

        $('#detalhes-servico-modal-dois').modal('show');
        

      } else if (checkClidado = "0") {

              $('span[name=visualizacao-solicitacao-id-servico]').text(id);
              $('span[name=visualizacao-solicitacao-tipo-servico]').text(tipoServico);
              $('span[name=visualizacao-solicitacao-valor-servico]').text(preco);
              $('span[name=visualizacao-solicitacao-descricao-servico]').text(descricao);
              $('span[name=visualizacao-solicitacao-contratante-servico]').text(nomeContratante);
              $('span[name=visualizacao-solicitacao-telefone-servico]').text(telefoneContratante);
              $('span[name=visualizacao-solicitacao-email-servico]').text(emailContratante);
              $('span[name=visualizacao-solicitacao-endereco-servico]').text(endContratante);
              $('textarea[name=detalhes-solicitacao-modal-contratar]').val(detalhes);        
              $('span[name=visualizacao-solicitacao-horainicial-servico]').text(horarioInicial);
              $('span[name=visualizacao-solicitacao-diainicial-servico]').text(diaInicial);
              $('span[name=visualizacao-solicitacao-horafinal-servico]').text(horarioFinal);
              $('span[name=visualizacao-solicitacao-diafinal-servico]').text(diaFinal);
              $('span[name=check-clicado-visualizacao]').text(checkClidado);

              $('textarea[name=detalhes-solicitacao-modal-contratar]').prop('disabled', true);

              $('#detalhes-servico-modal').modal('show');


      }   

});

$('.btn-detalhes-tab-solicitacao').click(function(event) {
  
        var button = $(this);
        var id = button.data('id');
        var tipoServico = button.data('tipo');
        var preco = button.data('valor');
        var descricao = button.data('descricao');
        var horarioInicial = button.data('horarioinicial');
        var horarioFinal = button.data('horariofinal');
        var diaInicial  = button.data('diainicial');
        var diaFinal = button.data('diafinal');
        var nomeContratante  = button.data('contratante');
        var telefoneContratante = button.data('telefonecontratante');
        var emailContratante = button.data('emailcontratante');
        var endContratante= button.data('enderecocontratante');
        var detalhes= button.data('detalhes');
        var checkClidado = button.data('check');
        var dataInicial = button.data('inicial');
        
        if (checkClidado == "1"){

        $('span[name=detalhes-visualizacao-solicitacao-id-servico-dois]').text(id);
        $('span[name=detalhes-visualizacao-solicitacao-tipo-servico-dois]').text(tipoServico);
        $('span[name=detalhes-visualizacao-solicitacao-valor-servico-dois]').text(preco);
        $('span[name=detalhes-visualizacao-solicitacao-descricao-servico-dois]').text(descricao);
        $('span[name=detalhes-visualizacao-solicitacao-contratante-servico-dois]').text(nomeContratante);
        $('span[name=detalhes-visualizacao-solicitacao-telefone-servico-dois]').text(telefoneContratante);
        $('span[name=detalhes-visualizacao-solicitacao-email-servico-dois]').text(emailContratante);
        $('span[name=detalhes-visualizacao-solicitacao-endereco-servico-dois]').text(endContratante);
        $('textarea[name=detalhes-textarea-solicitacao-modal-contratar-dois]').val(detalhes);        
        $('span[name=detalhes-visualizacao-solicitacao-horainicial-servico-dois]').text(horarioInicial);
        $('span[name=detalhes-visualizacao-solicitacao-diainicial-servico-dois]').text(diaInicial);
        $('span[name=detalhes-check-clicado-visualizacao-dois]').text(checkClidado);
        $('span[name=detalhes-data-inicial-dois]').text(dataInicial);


        $('textarea[name=detalhes-textarea-solicitacao-modal-contratar-dois]').prop('disabled', true);

        $('#detalhes-solicitacao-servico-modal-dois').modal('show');
        

      } else if (checkClidado = "0") {

              $('span[name=detalhes-visualizacao-solicitacao-id-servico]').text(id);
              $('span[name=detalhes-visualizacao-solicitacao-tipo-servico]').text(tipoServico);
              $('span[name=detalhes-visualizacao-solicitacao-valor-servico]').text(preco);
              $('span[name=detalhes-visualizacao-solicitacao-descricao-servico]').text(descricao);
              $('span[name=detalhes-visualizacao-solicitacao-contratante-servico]').text(nomeContratante);
              $('span[name=detalhes-visualizacao-solicitacao-telefone-servico]').text(telefoneContratante);
              $('span[name=detalhes-visualizacao-solicitacao-email-servico]').text(emailContratante);
              $('span[name=detalhes-visualizacao-solicitacao-endereco-servico]').text(endContratante);
              $('textarea[name=detalhes-textarea-solicitacao-modal-contratar]').val(detalhes);        
              $('span[name=detalhes-visualizacao-solicitacao-horainicial-servico]').text(horarioInicial);
              $('span[name=detalhes-visualizacao-solicitacao-diainicial-servico]').text(diaInicial);
              $('span[name=detalhes-visualizacao-solicitacao-horafinal-servico]').text(horarioFinal);
              $('span[name=detalhes-visualizacao-solicitacao-diafinal-servico]').text(diaFinal);
              $('span[name=detalhes-check-clicado-visualizacao]').text(checkClidado);
              $('span[name=detalhes-data-inicial]').text(dataInicial);

              $('textarea[name=detalhes-textarea-solicitacao-modal-contratar]').prop('disabled', true);

              $('#detalhes-solicitacao-servico-modal').modal('show');

      }   

});

$('.detalhe-contrato-tab-servico-usuario').click(function(event) {
  
        var button = $(this);
        var idContrato = button.data('idcontrato');
        var tipoServico = button.data('tiposervico');
        var preco = button.data('preco');
        var status = button.data('status');        
        var nomePrestador  = button.data('name');
        var telefonePrestador = button.data('tel');
        var descricao = button.data('descricao');
        var horarioInicial = button.data('horainicial');
        var horarioFinal = button.data('horafinal');
        var diaInicial  = button.data('diainicial');
        var diaFinal = button.data('diafinal');
        var dataInicial = button.data('inicial');
        var dataFinal = button.data('final');
        var checkClidado = button.data('check');

        if (status == "0"){
           status = "Serviço Solicitado";
        }
        if (status == "1"){
           status = " Proposta Aceita";
        }
        if (status == "2"){
           status = "Pagamento Confirmado";
        }
        if (status == "4"){
           status = "Serviço Concluido";
        }        
        
        if (checkClidado == "0"){

              $('span[name=numero-contrato-dois]').text(idContrato);
              $('span[name=tipo-servico-contrato-dois]').text(tipoServico);
              $('span[name=preco-servico-contrato-dois]').text(preco);
              $('span[name=status-servico-contrato-dois]').text(status);
              $('span[name=nome-prestador-dois]').text(nomePrestador);
              $('span[name=telefone-prestador-dois]').text(telefonePrestador);
              $('span[name=descricao-servico-prestador-dois]').text(descricao);
              $('span[name=horario-inicial-atendimento-detalhes-dois]').text(horarioInicial);
              $('span[name=horario-final-atendimento-detalhes-dois]').text(horarioFinal);
              $('span[name=dia-inicial-atendimento-detalhes-dois]').text(diaInicial);
              $('span[name=dia-final-atendimento-detalhes-dois]').text(diaFinal);
              $('span[name=data-inicial-horario-servico-dois]').text(dataInicial);
              $('span[name=data-final-horario-servico-dois]').text(dataFinal);
      
              $('#detalhes-modal-comercial').modal('show');
        
//Atendimento 24 horas
      } else if (checkClidado = "1") {

              $('span[name=numero-contrato]').text(idContrato);
              $('span[name=tipo-servico-contrato]').text(tipoServico);
              $('span[name=preco-servico-contrato]').text(preco);
              $('span[name=status-servico-contrato]').text(status);
              $('span[name=nome-prestador]').text(nomePrestador);
              $('span[name=telefone-prestador]').text(telefonePrestador);
              $('span[name=descricao-servico-prestador]').text(descricao);
              $('span[name=horario-atendimento-detalhes]').text(horarioInicial);
              $('span[name=dia-atendimento-detalhes]').text(diaInicial);
              $('span[name=data-inicial-horario-servico]').text(dataInicial);
              $('span[name=data-final-horario-servico]').text(dataFinal);
              
              $('#detalhes-modal-vintequatro').modal('show');

      }   

});


//FUNÇÕES DE BOTÕES COM REQUISIÇÃO AJAX

$('.deslogar').click(function(event) {
      var deslogar = "logout";

      $.ajax({
        url: '../functions/validacao.php',
        type: 'GET',
        dataType: 'json',
        data: {
          deslogar: deslogar
        },

        success: function(resultado){

            if (resultado == "sucesso") {

                window.location.href = "../index.php";
            }
        }
    })
      
});

$('.btn-confirmar-pagamento').click(function(event) {

    $('#alert-danger-cancelar-servico').hide();
    $('#alert-warning-confirma-pagamento').hide();
    $('#alert-success-confirma-pagamento').hide();
    $('#alert-warning-confirma-pagamento-preco').hide();

     var idContrato = $('span.contrato').text();
     var pegaPropriedade = $(this).val();
     var precoPago = $('input[name=input-preco-pagamento]').val();
     var formapgto;
     var count = 0;

     $('.verifica-forma-pagamento').each(function(index, el) {
           if ($(this).is(':checked')){
           formapgto = $(this).val();
          
          } else {
            count = count + 1;
          }
     });

     if (count == "3"){
        $('#alert-warning-confirma-pagamento').show();

     } else {

        if (precoPago == ""){
        $('#alert-warning-confirma-pagamento-preco').show();

      } else {

     $.ajax({
         url: '../functions/acoes.php',
         type: 'POST',
         dataType: 'json',
         data: {
          idContrato: idContrato,
          precoPago: precoPago,
          formapgto: formapgto,
          pagamento: pegaPropriedade
        },

        success: function(resultado){

          if (resultado == "sucesso"){

            $('#carregando-modal-confirma-pagamento').show();

            setTimeout(function() {
              $('span[name=carregamento-pagamento]').text('Aguarde só mais um momento')
            }, 2000);

            setTimeout(function() {
              $('span[name=carregamento-pagamento]').text('Pagamento concluido')
            }, 4000);

            setTimeout(function() {
              $('#carregando-modal-confirma-pagamento').hide();              
              $('#alert-success-confirma-pagamento').show();
            }, 5000);

            setTimeout(function() {
              location.reload();
            }, 7000);

          } else {

              $('#alert-danger-cancelar-servico').show();
          }
      }
       
       })

     }
  }         

});

$('.favoritos-usuario').click(function(event) {
    var pegaPropriedade = $(this);
    var favorito = "favorito";
    var favoritoMarcado = $(this).data('favorito');
    var idCliente = pegaPropriedade.data('idcliente');
    var idServico = pegaPropriedade.data('idservico');    
    var decisao = "0"; 

    if (favoritoMarcado == ""){ 
    
    $.ajax({
      url: '../functions/acoes.php',
      type: 'GET',
      dataType: 'json',
      data: {
        idCliente: idCliente,
        idServico: idServico,
        decisao: decisao,
        favorito: favorito
      },

      success: function(resultado){
        if(resultado == "sucesso"){
            location.reload();            
                  
        } else if (resultado == "insucesso") {
          $('.resultado-favorito').text('Não foi possível inserir o prestador de serviço como Favoritos.');
          $('#modal-favorito').modal('show');
          

        } else if (resultado == "existe"){
          $('.resultado-favorito').text('Prestador de serviço já inserido como Favoritos.');
          $('#modal-favorito').modal('show');
        }
      }

    })
  
  }  else {

      decisao = "1";

      $.ajax({
        url: '../functions/acoes.php',
        type: 'GET',
        dataType: 'json',
        data: {
          idCliente: idCliente,
          idServico: idServico,
          decisao: decisao,
          favorito: favorito
        },
      
        success: function(resultado){

          if(resultado == "sucesso"){
            location.reload();            
                  
        } else if (resultado == "insucesso") {
          $('.resultado-favorito').text('Não foi possível retirar o prestador de serviço como Favoritos.');
          $('#modal-favorito').modal('show');          

        } else if (resultado == "inexistente"){
          $('.resultado-favorito').text('Prestador de serviço já retirado dos Favoritos.');
          $('#modal-favorito').modal('show');
        }
        
      }

    })
  }
});

$('.btn-conclui-proposta').click(function(event) {
  var idContrato = $(this).data('idcontrato');
  var pegaValorButton = $(this).val();

  $.ajax({
    url: '../functions/acoes.php',
    type: 'POST',
    dataType: 'json',
    data: {
      idContrato: idContrato,
      concluir: pegaValorButton
    
    },

    success: function(resultado){

    $('#concluido-servico-modal').modal('show');
      
        if (resultado == "sucesso"){
           
          setTimeout(function() {
            $('#carregando-modal-conclui-servico').hide();
            $('#modal-body-agradecimento').show();            
          }, 2000);

          setTimeout(function() {
            location.reload();
          }, 4000);


        } else {
          
          setTimeout(function() {
          $('#carregando-modal-conclui-servico').hide();
          $('.thanks').text('Ocorreu um erro ao concluir o serviço...');
          $('#modal-body-agradecimento').show();
          }, 2000);

          setTimeout(function() {
            location.reload();
          }, 4000);

        }
      }
  })

});


$('.btn-sim-cancela-servico-usuario').click(function(event) {

        $('#alert-warning-cancelar-servico-usuario').hide();
        $('#alert-success-cancelar-servico-usuario').hide();
        $('#alert-danger-cancelar-servico-usuario').hide();

              

        var idContrato = $('.cancela-idcontrato').text();
        var tipoCancelamento = "0";
        var pegaValorButton = $(this).val();

        $.ajax({
          url: '../functions/acoes.php',
          type: 'POST',
          dataType: 'json',
          data: {
            idContrato: idContrato,
            tipoCancelamento: tipoCancelamento,
            cancelar: pegaValorButton

          },

          success: function(resultado){

            $('#carregando-modal-cancelar-servico-usuario').show();

            setTimeout(function() {
              $('#carregando-modal-cancelar-servico-usuario').hide();
            if (resultado == "sucesso"){    
                $('#alert-success-cancelar-servico-usuario').show();                
             
              setTimeout(function() {
                location.reload();
              }, 4000);

            } else if (resultado == "aceito"){
              $('#alert-warning-cancelar-servico-usuario').show();

            } else{
              $('#alert-danger-cancelar-servico-usuario').show();
              
            }

          }, 3000);

        }
    });

});

$('.btn-sim-cancela-servico-prestador').click(function(event) {

        $('#alert-warning-cancelar-servico').hide();
        $('#alert-success-cancelar-servico').hide();
        $('#alert-danger-cancelar-servico').hide();              

        var idContrato = $('.cancela-idcontrato').text();
        var tipoCancelamento = "1";
        var pegaValorButton = $(this).val();

        $.ajax({
          url: '../functions/acoes.php',
          type: 'POST',
          dataType: 'json',
          data: {
            idContrato: idContrato,
            tipoCancelamento: tipoCancelamento,
            cancelar: pegaValorButton

          },

          success: function(resultado){

            $('#carregando-modal-cancelar-servico').show();

            setTimeout(function() {
              $('#carregando-modal-cancelar-servico').hide();
            if (resultado == "sucesso"){    
                $('#alert-success-cancelar-servico').show();                
             
              setTimeout(function() {
                location.reload();
              }, 4000);

            } else if (resultado == "pago"){
              $('#alert-warning-cancelar-servico').show();

            } else{
              $('#alert-danger-cancelar-servico').show();
              
            }

          }, 3000);

        }
    });

});

$('#btn-alterar-servico').click(function(event) {

  $('#alert-warning-alterar').hide();
  $('#alert-danger-alterar').hide();
  $('#alert-success-alterar').hide();
  $('#alert-warning-alterar').html('<a href="#" class="close" aria-label="close">&times;</a><strong>Atenção!</strong> Não foi selecionada nenhuma modalidade de atendimento.');

   var button = $('button[name=alterar]').val();
   var id = $('input[name=editar-identificador]').val();
   var tipoServico = $('select[name=editar-tipoServico]').val();
   var valor = $('input[name=editar-valor]').val();
   var descricao = $('textarea[name=editar-descricao-servico]').val();

   if (tipoServico == "Selecione Serviço"){

   $('#alert-warning-alterar').html('<a href="#" class="close" aria-label="close">&times;</a><strong>Atenção!</strong> Selecione um tipo de serviço.');

   $('#alert-warning-alterar').show();
   
   } else {

   if($('#checkbox10').is(':checked') == true){

   var horarioInicial = $('select[name=editar-horario-atendimento-inicial]').val();
   var horarioFinal = $('select[name=editar-horario-atendimento-final]').val();
   var diaInicial = $('select[name=editar-dia-atendimento-inicial]').val();
   var diaFinal = $('select[name=editar-dia-atendimento-final]').val();
   var check = "0";

   $.ajax({
       url: '../functions/acoes.php',
       type: 'GET',
       dataType: 'json',
       data: {
        alterar: button,
        id: id,
        tipoServico: tipoServico,
        valor: valor,
        descricao: descricao,
        horarioInicial: horarioInicial,
        horarioFinal: horarioFinal,
        diaInicial: diaInicial,
        diaFinal: diaFinal,
        checkClicado: check
        
    },
   
       success: function(resultado){

        if(resultado == "sucesso"){

            $('#carregando-modal-alterar').show();

            setTimeout(function() {
                $('#carregando-modal-alterar').hide();
                $('#alert-success-alterar').show();
            }, 3000);

            setTimeout(function() {
                location.reload();
            }, 5000);
    }

        else {
            $('#alert-danger-alterar').show();
    }

    },

   });

} else if($('#checkbox11').is(':checked') == true){

   var horarioInicial = "24horas";
   var horarioFinal = "24horas";
   var diaInicial = "Segunda-Feira/Domingo";
   var diaFinal = "Segunda-Feira/Domingo";
   var check = "1"

    $.ajax({
       url: '../functions/acoes.php',
       type: 'GET',
       dataType: 'json',
       data: {
        alterar: button,
        id: id,
        tipoServico: tipoServico,
        valor: valor,
        descricao: descricao,
        horarioInicial: horarioInicial,
        horarioFinal: horarioFinal,
        diaInicial: diaInicial,
        diaFinal: diaFinal,
        checkClicado: check
        
    },
   
       success: function(resultado){

        if(resultado == "sucesso"){

            $('#carregando-modal-alterar').show();

            setTimeout(function() {
                $('#carregando-modal-alterar').hide();
                $('#alert-success-alterar').show();
            }, 3000);

            setTimeout(function() {
                location.reload();
            }, 5000);
    }

        else {
            $('#alert-danger-alterar').show();
    }

    },

   });

} else {

        $('#alert-warning-alterar').show();
}

}

});

$('#avaliando-prestador').click(function(event) {

    var button = $('button[name=avaliando-prestador]').val();
    var idContrato = $('span[name=idcontrato-avaliacao]').text();
    var idCliente = $('span[name=idcliente-avaliacao]').text();
    var comentario = $('#message-text').val();
    var nota = $('.select-score').text(); 

    $.ajax({
      url: '../functions/acoes.php',
      type: 'GET',
      dataType: 'json',
      data: {
        idContrato: idContrato,
        idCliente: idCliente,
        comentario: comentario,
        nota: nota,
        avaliandoprestador: button
      
      },
    
      success: function(resultado){ 
       
       if (resultado == "sucesso"){

        $('#modal-body-comentario').hide();
        $('#modal-body-agradecimento').show();

        setTimeout(function() {
            location.reload();
        }, 2000);

        }

      },
   });
});

$('.btn-confirma-exclusao').click(function(event) {

    $('#retorno').html('');

    var id = $('span.id-servico').text();
    var button = $('button[name=btn-ok]').val();

    
    $.ajax({
        url: '../functions/acoes.php',
        type: 'GET',
        dataType: 'json',
        data: {
            id: id,
            exclusao: button

        },
    
    success: function(resultado){

        if(resultado == "sucesso"){
            location.reload();
        }else{
            $('#retorno').html('<span>Registro não pôde ser excluído, pois o mesmo está associado a serviços contratados.</br>Caso deseje que o serviço não seja apresentado ao contratante, gentileza desativá-lo!</span>');
        }
   },

    });    
});

$('#btn-contratar-modal').click( function(){

      $('#alert-success-contratar').hide();
      $('#alert-warning-contratar').hide();

        var preco = $('span[name=recebe-preco-servico]').text();
        var button = $('button[name=btn-contratar-modal]').val();
        var id = $('span[name=recebe-id-servico]').text();
        var enderecoCadastrado = "0";
        var detalhes = $('textarea[name=detalhes-modal-contratar]').val(); 

        if ($('#check-endcadastrado').is(':checked') == false && $('#check-enddiferentecadastro').is(':checked') == false){
            $('#alert-warning-contratar').html('<a href="#" class="close" aria-label="close">×</a><strong>Atenção!</strong> Selecione uma modalidade de endereço.');                      
            $('#alert-warning-contratar').show('slow');
        } else {
                if ($('#check-endcadastrado').is(':checked')){

                  $('#alert-success-contratar').hide();
                  $('#alert-warning-contratar').hide();
                    
                    $.ajax({
                        url: '../functions/contrata.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            contratarSemEnd: button,
                            id: id,
                            enderecoCadastrado: enderecoCadastrado,
                            preco: preco,
                            detalhes: detalhes
                        },
                    
                    success: function(resultado) {
                      
                        if (resultado == "sucesso"){
                                    $('#carregando-modal-contratar').show();
                        setTimeout(function() {   
                                    $('#carregando-modal-contratar').hide();
                                    $('#alert-success-contratar').show();
                        }, 3000);
                        setTimeout(function() {   
                                    location.reload();
                        }, 4000);
                      } else {
                    }

                                                
             },

        }); 

        }else {                 

                    var rua = $('input[name=rua]').val();
                    var numero = $('input[name=numero]').val();
                    var complemento = $('input[name=complemento]').val();
                    var bairro = $('input[name=bairro]').val();
                    var cidade = $('input[name=cidade]').val();
                    enderecoCadastrado = "1";

                  if (rua == "" || numero == "" || complemento == "" || bairro == "" || cidade == ""){

                      $('#alert-warning-contratar').html('<a href="#" class="close" aria-label="close">×</a><strong>Atenção!</strong> Preencha todos os campos do Endereço.');
                      $('#alert-warning-contratar').show();

                  } else { 

                    $('#alert-success-contratar').hide();
                    $('#alert-warning-contratar').hide();

                    $.ajax({
                        url: '../functions/contrata.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: id,
                            contratar: button,
                            rua: rua,
                            numero: numero,
                            complemento: complemento,
                            bairro: bairro,
                            cidade: cidade,
                            preco: preco,
                            enderecoCadastrado: enderecoCadastrado,
                            detalhes: detalhes
                        },

                    success: function(resultado) {
                        
                        if (resultado == "sucesso"){
                                    $('#carregando-modal-contratar').show();
                        setTimeout(function() {   
                                    $('#carregando-modal-contratar').hide();
                                    $('#alert-success-contratar').show();
                        }, 3000);
                        setTimeout(function() {   
                                    location.reload();
                        }, 4000);
                      } else {
                    }
                       
                       },

                    });

                  }                 

                }   
           }
    });

$('#btn-contratar-modal-favorito').click( function(){

  $('#alert-success-contratar-favorito').hide();
  $('#alert-warning-contratar-favorito').hide();

        var preco = $('span[name=recebe-preco-servico-favorito]').text();
        var button = $('button[name=btn-contratar-modal-favorito]').val();
        var id = $('span[name=recebe-id-servico-favorito]').text();
        var enderecoCadastrado = "0";
        var detalhes = $('textarea[name=detalhes-modal-contratar-favorito]').val(); 

        if ($('#check-endcadastrado-favorito').is(':checked') == false && $('#check-enddiferentecadastro-favorito').is(':checked') == false){
            $('#alert-warning-contratar-favorito').html('<a href="#" class="close" aria-label="close">×</a><strong>Atenção!</strong> Selecione uma modalidade de endereço.');
            $('#alert-warning-contratar-favorito').show('slow');
        } else {
                if ($('#check-endcadastrado-favorito').is(':checked')){

                    $('#alert-success-contratar-favorito').hide();
                    $('#alert-warning-contratar-favorito').hide();
                    
                    $.ajax({
                        url: '../functions/contrata.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            contratarSemEnd: button,
                            id: id,
                            enderecoCadastrado: enderecoCadastrado,
                            preco: preco,
                            detalhes: detalhes
                        },
                    
                    success: function(resultado) {
                      
                        if (resultado == "sucesso"){
                                    $('#carregando-modal-contratar-favorito').show();
                        setTimeout(function() {   
                                    $('#carregando-modal-contratar-favorito').hide();
                                    $('#alert-success-contratar-favorito').show();
                        }, 3000);
                        setTimeout(function() {   
                                    location.reload();
                        }, 4000);
                      } else {
                    }

                                                
             },

        }); 

        }else {                 
                                      
                    var rua = $('input[name=rua-favorito]').val();
                    var numero = $('input[name=numero-favorito]').val();
                    var complemento = $('input[name=complemento-favorito]').val();
                    var bairro = $('input[name=bairro-favorito]').val();
                    var cidade = $('input[name=cidade-favorito]').val();
                    enderecoCadastrado = "1";

                    if (rua == "" || numero == "" || complemento == "" || bairro == "" || cidade == ""){

                      $('#alert-warning-contratar-favorito').html('<a href="#" class="close" aria-label="close">×</a><strong>Atenção!</strong> Preencha todos os campos do Endereço.');
                      $('#alert-warning-contratar-favorito').show();


                  } else {

                    $('#alert-success-contratar-favorito').hide();
                    $('#alert-warning-contratar-favorito').hide();

                    $.ajax({
                        url: '../functions/contrata.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: id,
                            contratar: button,
                            rua: rua,
                            numero: numero,
                            complemento: complemento,
                            bairro: bairro,
                            cidade: cidade,
                            preco: preco,
                            enderecoCadastrado: enderecoCadastrado,
                            detalhes: detalhes
                        },

                    success: function(resultado) {
                        
                        if (resultado == "sucesso"){
                                    $('#carregando-modal-contratar-favorito').show();
                        setTimeout(function() {   
                                    $('#carregando-modal-contratar-favorito').hide();
                                    $('#alert-success-contratar-favorito').show();
                        }, 3000);
                        setTimeout(function() {   
                                    location.reload();
                        }, 4000);
                      } else {
                    }
                       
                       },

                    });
                  }
                }   
           }
    });


$('#btn-login').click( function() {

     $('#alert-warning-login').hide();

     var senha = $('input[name=senha-acesso]').val();
     var button = $('button[name=acessar]').val();


        if ($('#checkbox2').is(':checked') == true){

            var cnpj = $('input[name=cnpj-acesso]').val();
            var tipoAcesso = "0"
        
           $.ajax({
                url: './functions/validacao.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    cnpj: cnpj,
                    senha: senha,
                    acessar: button,
                    tipoAcesso: tipoAcesso

                },

            success: function(resultado){

              $('#carregando-acesso').show('slow');

              if (resultado == "sucesso"){

                setTimeout( function() {
                window.location.href = "./pages/cliente.php";
                }, 3000);

              }

              else {

                setTimeout( function() {
                  $('#carregando-acesso').hide();
                  $('#alert-warning-login').show();
                }, 3000);
              }

            },

        });
    
    } else if ($('#checkbox3').is(':checked') == true){

            var email = $('input[name=email-acesso]').val();
            var tipoAcesso = "1";
        
           $.ajax({
                url: './functions/validacao.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    email: email,
                    senha: senha,
                    acessar: button,
                    tipoAcesso: tipoAcesso

                },

            success: function(resultado) {


              $('#carregando-acesso').show('slow');

              if(resultado == "sucesso"){

                setTimeout( function() {
                window.location.href = "./pages/usuario.php";
                }, 3000);

            } else {

              setTimeout( function() {
                $('#carregando-acesso').hide();
                $('#alert-warning-login').show();
                }, 3000);


            }

            },

        });

    } else {

    $('#alert-warning-login').show();

        }

});




$('#btn-enviar-cadastro').click(function(event) {

    $('#alert-success-cadastrar').hide();
    $('#alert-warning-cadastrar').html('<a href="#" class="close" aria-label="close" id="close">&times;</a><strong>Atenção!</strong> Não foi selecionada nenhuma modalidade de acesso.');
    $('#alert-warning-cadastrar').hide();
    $('#alert-warning-cadastrar-existe').hide();
    $('#alert-warning-cadastrar-existe-usuario').hide();
    $('#alert-danger-aceita-cadastrar').hide();

    var senha = $('input[name=senha-cadastro]').val();
    var confirmaSenha = $('input[name=confirma-senha-cadastro]').val();
    var rua = $('input[name=rua]').val();
    var numero = $('input[name=numero]').val();
    var complemento = $('input[name=complemento]').val();
    var bairro = $('input[name=bairro]').val();
    var cidade = $('input[name=cidade]').val();
    var estado = $('input[name=estado]').val();
    var cep = $('input[name=cep]').val();
    var telefone = $('input[name=telefone]').val();
    var button = $('button[name=enviar]').val();

if ($('#checkbox4').is(':checked') == true){

    var razaoSocial = $('input[name=razaoSocial]').val();
    var cpfcnpj = $('input[name=cpfcnpj]').val();
    var tipo = "0";

    if (razaoSocial == "" || cpfcnpj == "" || senha == "" || confirmaSenha == "" || rua == "" || numero == "" || complemento == "" || bairro == "" || cidade == "" || estado == "" || cep == "" || telefone == ""){

      $('#alert-warning-cadastrar').html('<a href="#" class="close" aria-label="close" id="close">&times;</a><strong>Atenção!</strong> Preencha todos os campos.');
      $('#alert-warning-cadastrar').show();

    } else {

      if (senha == confirmaSenha){

        $.ajax({
        url: './functions/cadastro.php',
        type: 'POST',
        dataType: 'json',
        data: {
            razaoSocial: razaoSocial,
            cpfcnpj: cpfcnpj,
            tipo: tipo,
            senha: senha,
            confirmaSenha: confirmaSenha,
            rua: rua,
            numero: numero,
            complemento: complemento,
            bairro: bairro,
            cidade: cidade,
            estado: estado,
            cep: cep,
            telefone: telefone,
            enviar: button
        },

        success: function (resultado){

        $('#carregando-modal-cadastro').show();

        if (resultado == "cadastrado"){

        setTimeout(function() {
        $('#carregando-modal-cadastro').hide();
        $('#alert-success-cadastrar').show();

        setTimeout(function() {
          location.reload();
        }, 1000);

        }, 3000);

      } else if (resultado == "existe"){

        setTimeout(function() {
        $('#carregando-modal-cadastro').hide();
        $('#alert-warning-cadastrar-existe').show();
        }, 3000);

      } else if (resultado == "erro"){

        setTimeout(function() {
        $('#carregando-modal-cadastro').hide();        
        $('#alert-danger-aceita-cadastrar').show();
        }, 3000);
      
      } 
            
    },
});

} else {

      $('#alert-warning-cadastrar').html('<a href="#" class="close" aria-label="close" id="close">&times;</a><strong>Atenção!</strong> Campo senha diferente do campo confirma senha.');
      $('#alert-warning-cadastrar').show();

}

}


} else if($('#checkbox5').is(':checked') == true){

    var nome = $('input[name=nome]').val();
    var email = $('input[name=email]').val();
    var tipo = "1"

    if (nome == "" || email == "" || senha == "" || confirmaSenha == "" || rua == "" || numero == "" || complemento == "" || bairro == "" || cidade == "" || estado == "" || cep == "" || telefone == ""){

      $('#alert-warning-cadastrar').html('<a href="#" class="close" aria-label="close" id="close">&times;</a><strong>Atenção!</strong> Preencha todos os campos.');
      $('#alert-warning-cadastrar').show();

    } else {

    if (senha == confirmaSenha){

    $.ajax({
        url: './functions/cadastro.php',
        type: 'POST',
        dataType: 'json',
        data: {
            nome: nome,
            email: email,
            tipo: tipo,
            senha: senha,
            confirmaSenha: confirmaSenha,
            rua: rua,
            numero: numero,
            complemento: complemento,
            bairro: bairro,
            cidade: cidade,
            estado: estado,
            cep: cep,
            telefone: telefone,
            enviar: button
        },          

        success: function (resultado){

        $('#carregando-modal-cadastro').show();

        if (resultado == "cadastrado"){

        setTimeout(function() {
        $('#carregando-modal-cadastro').hide();
        $('#alert-success-cadastrar').show();

        setTimeout(function() {
          location.reload();
        }, 1000);

        }, 3000);

      } else if (resultado == "existe") {

        setTimeout(function() {
        $('#carregando-modal-cadastro').hide();
        $('#alert-warning-cadastrar-existe-usuario').show();
        }, 3000);

      } else if (resultado == "erro"){

        setTimeout(function() {
        $('#carregando-modal-cadastro').hide();        
        $('#alert-danger-aceita-cadastrar').show();
        }, 3000);
      }            

        },
     });

  } else {

    $('#alert-warning-cadastrar').html('<a href="#" class="close" aria-label="close" id="close">&times;</a><strong>Atenção!</strong> Campo senha diferente do campo confirma senha.');
    $('#alert-warning-cadastrar').show();

  }
 }
  } else {
        $('#alert-warning-cadastrar').show();
  }

});

$('#btn-cadastrar-servico').click(function(event) {

    $('#alert-success-cadastrar-servico').hide();
    $('#alert-warning-cadastro-servico').hide();
    $('#alert-warning-cadastro-servico').html('<a href="#" class="close" aria-label="close">&times;</a><strong>Atenção!</strong> Selecione uma modalidade de atendimento.');
   
    var tipoServico = $('select[name=tipo-servico-cadastro]').val();
    var valor = $('input[name=valor-servico]').val();
    var descricao = $('textarea[name=descricao-servico]').val();
    var button = $('button[name=cadastro-servico]').val();

  if (tipoServico == "Selecione Serviço"){

         $('#alert-warning-cadastro-servico').html('<a href="#" class="close" aria-label="close">&times;</a><strong>Atenção!</strong> Selecione um tipo de serviço.');
         $('#alert-warning-cadastro-servico').show();   
  
  }  else if($('#checkbox8').is(':checked') == false && $('#checkbox9').is(':checked') == false){
        $('#alert-warning-cadastro-servico').show();     
  
  } else {
    
    if ($.isNumeric(valor)){

    if ($('#checkbox8').is(':checked') == true){
    var horarioInicial = $('select[name=horario-atendimento-inicial]').val();
    var horarioFinal = $('select[name=horario-atendimento-final]').val();
    var diaInicial = $('select[name=dia-atendimento-inicial]').val();
    var diaFinal = $('select[name=dia-atendimento-final]').val();
    var checkClicado = "0";

    $.ajax({
        url: '../functions/cadastro.php',
        type: 'GET',
        dataType: 'html',
        data: {
            tipoServico: tipoServico,
            valor: valor,
            descricao: descricao, 
            horarioInicial: horarioInicial,
            horarioFinal: horarioFinal,
            diaInicial: diaInicial,
            diaFinal: diaFinal,
            checkClicado: checkClicado,
            cadastrar: button

        },

        success: function(resultado){

            $('#carregando-modal-cadastrar-servico').show();

            setTimeout(function() {
            $('#carregando-modal-cadastrar-servico').hide();
            $('#alert-success-cadastrar-servico').show();
            }, 3000);
            
            setTimeout(function() {
                location.reload();
            }, 5000);

        },
    });

  } else{
    var horarioInicial = "24horas";
    var horarioFinal = "24horas";
    var diaInicial = "Segunda-Feira/Domingo";
    var diaFinal = "Segunda-Feira/Domingo";
    var checkClicado = "1";

    $.ajax({
        url: '../functions/cadastro.php',
        type: 'GET',
        dataType: 'html',
        data: {
            tipoServico: tipoServico,
            valor: valor,
            descricao: descricao,
            horarioInicial: horarioInicial,
            horarioFinal: horarioFinal,
            diaInicial: diaInicial,
            diaFinal: diaFinal,
            checkClicado: checkClicado,
            cadastrar: button

        },

        success: function(resultado){

            $('#carregando-modal-cadastrar-servico').show();

            setTimeout(function() {
            $('#carregando-modal-cadastrar-servico').hide();
            $('#alert-success-cadastrar-servico').show();
            }, 3000);

            setTimeout(function() {
                location.reload();
            }, 5000);

            },
    
        });
    }

  } else {

    $('#alert-warning-cadastro-servico').html('<a href="#" class="close" aria-label="close">&times;</a><strong>Atenção!</strong> Valor digitado inválido.');
    $('#alert-warning-cadastro-servico').show();
  }
}

});


$('button.btn-aceita-contratar-modal-dois').click(function(event) {

      $('#alert-success-aceita-servico-prestador-dois').hide();
      $('#alert-danger-aceita-servico-prestador-dois').hide();
      $('#alert-warning-aceita-servico-prestador-dois').hide();  

      var button = $(this).val();
      var data = $('input[name=data-inicial-dois').val();
      var idContrato = $('span[name=visualizacao-solicitacao-id-servico-dois]').text();      
            
      if (data != ""){

      $.ajax({
        url: '../functions/acoes.php',
        type: 'POST',
        dataType: 'json',
        data: {
          data: data,
          idContrato: idContrato,
          aceitar: button

        },
      
        success: function(resultado){

          if (resultado == "sucesso"){
            
            $('#alert-success-aceita-servico-prestador-dois').hide();
            $('#carregando-modal-aceitar-servico-dois').show();

            setTimeout(function() {
            $('#carregando-modal-aceitar-servico-dois').hide();
            $('#alert-success-aceita-servico-prestador-dois').show();
            }, 3000);

            setTimeout(function() {
                location.reload();
            }, 5000);

        } else {

            $('#alert-success-aceita-servico-prestador-dois').hide();
            $('#alert-danger-aceita-servico-prestador-dois').hide();
            $('#carregando-modal-aceitar-servico-dois').show();

            setTimeout(function() {
            $('#carregando-modal-aceitar-servico-dois').hide();
            $('#alert-danger-aceita-servico-prestador-dois').hide();
            }, 3000);

            setTimeout(function() {
                location.reload();
            }, 5000);
          }
      }

    });

} else{
       
    $('#alert-warning-aceita-servico-prestador-dois').show();  

}

});

$('button.btn-aceita-contratar-modal').click(function(event) {

      $('#alert-success-aceita-servico-prestador').hide();
      $('#alert-danger-aceita-servico-prestador').hide();
      $('#alert-warning-aceita-servico-prestador').hide();

      var button = $(this).val();
      var data = $('input[name=data-inicial').val();
      var idContrato = $('span[name=visualizacao-solicitacao-id-servico]').text();      
            
     if (data != ""){

      $.ajax({
        url: '../functions/acoes.php',
        type: 'POST',
        dataType: 'json',
        data: {
          data: data,
          aceitar: button,
          idContrato: idContrato

        },
      
        success: function(resultado){
          if (resultado == "sucesso"){
            
            $('#alert-success-aceita-servico-prestador').hide();
            $('#carregando-modal-aceitar-servico').show();

            setTimeout(function() {
            $('#carregando-modal-aceitar-servico').hide();
            $('#alert-success-aceita-servico-prestador').show();
            }, 3000);

            setTimeout(function() {
                location.reload();
            }, 5000);

        } else {

            $('#alert-success-aceita-servico-prestador').hide();
            $('#alert-danger-aceita-servico-prestador').hide();
            $('#carregando-modal-aceitar-servico').show();

            setTimeout(function() {
            $('#carregando-modal-aceitar-servico').hide();
            $('#alert-danger-aceita-servico-prestador').hide();
            }, 3000);

            setTimeout(function() {
                location.reload();
            }, 5000);
          }
        }

      });

} else {

  $('#alert-warning-aceita-servico-prestador').show();

}

});