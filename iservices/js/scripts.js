$(document).ready(function() {
    $('#tab-servicos').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        }
    });
});

$(document).ready(function() {
    $('#tab-servicosSolicitados').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        }
    });
});

$(document).ready(function() {
    $('#tab-historicos').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        }
    });
});

$(document).ready(function() {
    $('#tab-contratos').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        }
    });
});

$('a.delete').on('click', function() {
    var nome = $(this).data('name'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
    var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
    $('span.nome').text(nome + ' (id = ' + id + ')'); // inserir na o nome na pergunta de confirmação dentro da modal
    $('a.delete-yes').attr('href', '/iservices/functions/acoes.php?id=' + id + '&&btn-ok=excluir'); // mudar dinamicamente o link, href do botão confirmar da modal
    $('#delete-modal').modal('show'); // modal aparece
});


$('#modal-EditarCadastro').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var indetificador = button.data('whatever');
    var tipoServico = button.data('whatevertiposervico');
    var preco = button.data('whateverpreco');
    var descricao = button.data('whateverdescricao');
    var modal = $(this)
    modal.find('#identificador').val(indetificador);
    modal.find('#preco').val(preco);
    modal.find('#descricao').val(descricao);
    modal.find('#tipoServico').val(tipoServico);
});

$('#modal-Visualizacao').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var indetificador = button.data('whatever');
    var tipoServico = button.data('whatevertiposervico');
    var preco = button.data('whateverpreco');
    var descricao = button.data('whateverdescricao');
    var modal = $(this)
    modal.find('#identificador').val(indetificador);
    modal.find('#preco').val(preco);
    modal.find('#descricao').val(descricao);
    modal.find('#tipoServico').val(tipoServico);
});

$('#avaliacao-modal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var indetificador = button.data('whatever');
    var modal = $(this)
    modal.find('#nome-prestador').val(indetificador);
});


$('.carousel[data-type="multi"] .item').each(function() {
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < 4; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
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
            $('#ativar-servico').attr('href', '/iservices/functions/ativacao.php?id=' + id + '&&ativar=ativar'); // mudar dinamicamente o link, href do botão confirmar da modal
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
            $('#desativar-servico').attr('href', '/iservices/functions/ativacao.php?id=' + id + '&&desativar=desativar'); // mudar dinamicamente o link, href do botão confirmar da modal
            button.prop('checked', false);
        });

    }
});

//Botão cadastra-se da index.php - Login Usuário

$('#cadastrar-usuario').click(function() {
    $('#modalLogin').modal('toggle');
    $('#modal').modal('show');
});

$('#modalLoginServico').on('show.bs.modal', function(event) {
    $('#carregando').hide();
});

$('.btn-avaliar').click(function() {
    $('#avaliacao-modal').modal('show');
});


$(document).ready(function() { 

    getPosition();

    $('#sucesso').hide('slow');
    $('#btn-proximo').prop('disabled', true);  
    $('#form-enddiferente').hide('slow');
    $('#alert-warning').hide('slow');
    $('#existente-no-banco').hide('slow');
    $("textarea[name=messagem-text-termo]").prop('disabled', true);

$('#check-termo').change(function(){
        if ($('#check-termo').is(':checked')){
            $('#btn-proximo').prop('disabled', false);
        }
        else {
            $('#btn-proximo').prop('disabled', true);
        }
    });
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

$('#btn-proximo').click( function(){
        if ($('#check-endcadastrado').is(':checked') == false && $('check-enddiferentecadastro').is(':checked') == false){
            $('#alert-warning').show('slow');
        } else {
            console.log("teste");
            $('#tab-detalhes').tab('show');
        }

});

$(function (){

$('#form-cadastro-usuario').submit ( function (){

        $.ajax({
        url: '/iservices/functions/cadastro.php',
        type: 'POST',
        data: {
            cadastrar: $("button[name=cadastrar]").val(),
            nome:  $("input[name=nome]").val(), 
            email: $("input[name=email]").val(), 
            senha: $("input[name=senha]").val(), 
            confirmaSenha: $("input[name=confirmaSenha]").val(), 
            rua: $("input[name=rua]").val(), 
            numero: $("input[name=numero]").val(), 
            complemento: $("input[name=complemento]").val(), 
            bairro: $("input[name=bairro]").val(), 
            cidade: $("input[name=cidade]").val(), 
            estado: $("input[name=estado]").val(), 
            cep: $("input[name=cep]").val(), 
            telefone: $("input[name=telefone]").val()
        },

        beforeSend: function () {
        //Aqui adicionas o loader
        $("#carregando").html("<img src='/iservices/img/carregando.gif'><span>Carregando...</span>");
        },         
        success: function(retorno) {
            console.log(retorno);
            /*if (retorno == "existe"){
                $('#existente-no-banco').show('slow');
            } else {
                $('#sucesso').show('slow');
            }*/

        },
        error: function(retorno) {
            console.log(retorno);
        }  

        });

        });
});


function getPosition(){
  // Verifica se o browser do usuario tem suporte a Geolocation
  if ( navigator.geolocation ){
    navigator.geolocation.getCurrentPosition( function( posicao ){
      console.log( posicao.coords.latitude, posicao.coords.longitude );
    } );
  }
}

