$(document).ready(function() {
    //$('#tab-servicos-usuario').hide('slow');

    $('#tab-servicos').DataTable({
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

    //Pegando posição atual do usuário
    getPosition();

    //atribuindo algumas informações aos atributos do html
    $('#sucesso').hide('slow');
    $('#btn-contratar-modal').prop('disabled', true);  
    $('#form-enddiferente').hide('slow');
    $('#alert-warning').hide('slow');
    $('#existente-no-banco').hide('slow');
    $("textarea[name=messagem-text-termo]").prop('disabled', true);
    $('#div-recebe-id-servico').hide('slow');
    $('#alert-success-contratar').hide('slow');
    $('#carregando-modal-contratar').hide('slow');
    $('#carregando-acesso').hide('slow');
    $('#dados-acesso-usuario').hide();
    $('#dados-acesso-prestador').hide();
    $('#carregando-modal-cadastro').hide();
    $('#alert-success-cadastrar').hide();
    $('#alert-warning-cadastrar').hide();
    $('#acesso-prestador').hide();
    $('#acesso-usuario').hide();
    $('#alert-warning-login').hide();

   /* setTimeout(function() {
        $('#carregamento-pagina-usuario').hide('slow');
        $('#tab-servicos-usuario').show();

    }, 7000);*/

      
$('#check-termo').change(function(){
        if ($('#check-termo').is(':checked')){
            $('#btn-contratar-modal').prop('disabled', false);
        }
        else {
            $('#btn-contratar-modal').prop('disabled', true);
        }
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

$('a.delete').on('click', function() {
    var nome = $(this).data('name'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
    var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
    $('span.nome').text(nome + ' (id = ' + id + ')'); // inserir na o nome na pergunta de confirmação dentro da modal
    $('a.delete-yes').attr('href', '/iservices/functions/acoes.php?id=' + id + '&&btn-ok=excluir'); // mudar dinamicamente o link, href do botão confirmar da modal
    $('#delete-modal').modal('show'); // modal aparece
});

$('#contratacao-modal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var nome = button.data('name');
    var id = button.data('id');
    var valor = button.data('valor');
    $('#recebe-nome-servico').val(nome);
    $('#recebe-valor-servico').val(valor);
    $('#recebe-id-servico').val(id);
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

$('.btn-visualizar-modal-servico').click(function() {
    $('#detalhes-servico-modal').modal('show');
});

//Requisições ajax

$('#btn-contratar-modal').click( function(){

        var preco = $('input[name=recebe-preco-servico]').val();
        var button = $('button[name=btn-contratar-modal]').val();
        var id = $('input[name=recebe-id-servico]').val();
        var enderecoCadastrado = "0";
        var detalhes = $('textarea[name=detalhes-modal-contratar]').val(); 

        if ($('#check-endcadastrado').is(':checked') == false && $('#check-enddiferentecadastro').is(':checked') == false){
            $('#alert-warning').show('slow');
        } else {
                if ($('#check-endcadastrado').is(':checked')){
                    
                    $.ajax({
                        url: '/iservices/functions/contrata.php',
                        type: 'POST',
                        dataType: 'html',
                        data: {
                            contratarSemEnd: button,
                            id: id,
                            enderecoCadastrado: enderecoCadastrado,
                            preco: preco,
                            detalhes: detalhes
                        },
                    
                    complete: function(resultado) {
                                                
                                    $('#carregando-modal-contratar').show();
                        setTimeout(function() {   
                                    $('#carregando-modal-contratar').hide();
                                    $('#alert-success-contratar').show();
                        }, 3000);
                       
                 },

        }); 

        }else {                 
                                      
                    var rua = $('input[name=rua]').val();
                    var numero = $('input[name=numero]').val();
                    var complemento = $('input[name=complemento]').val();
                    var bairro = $('input[name=bairro]').val();
                    var cidade = $('input[name=cidade]').val();
                    enderecoCadastrado = "1";                    

                    $.ajax({
                        url: '/iservices/functions/contrata.php',
                        type: 'POST',
                        dataType: 'html',
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

                    complete: function(resultado) {
                                    $('#carregando-modal-contratar').show();
                        setTimeout(function() {   
                                    $('#carregando-modal-contratar').hide();
                                    $('#alert-success-contratar').show();
                        }, 3000);
                       
                       },

                    });
                }   
           }
    });

$('#btn-login').click( function() {

     var senha = $('input[name=senha-acesso]').val();
     var button = $('button[name=acessar]').val();

            
        if ($('#checkbox2').is(':checked') == true){

            var cnpj = $('input[name=cnpj-acesso]').val();
            var tipoAcesso = "0"
        
           $.ajax({
                url: '/iservices/functions/validacao.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    cnpj: cnpj,
                    senha: senha,
                    acessar: button,
                    tipoAcesso: tipoAcesso

                },

            success: function(resultado){

                $('#carregando-acesso').show('slow');

                setTimeout( function() {
                window.location.href = "/iservices/pages/cliente.php";
                }, 3000);


            },

        });
    
    } else if ($('#checkbox3').is(':checked') == true){

            var email = $('input[name=email-acesso]').val();
            var tipoAcesso = "1"
        
           $.ajax({
                url: '/iservices/functions/validacao.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    email: email,
                    senha: senha,
                    acessar: button,
                    tipoAcesso: tipoAcesso

                },

            complete: function(resultado) {

               $('#carregando-acesso').show('slow');

                setTimeout( function() {
                window.location.href = "/iservices/pages/usuario.php";
                }, 3000);

            },

        });

    } else {

    $('#alert-warning-login').show();

        }

});


$('#btn-enviar-cadastro').click(function(event) {

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

        $.ajax({
        url: '/iservices/functions/cadastro.php',
        type: 'POST',
        dataType: 'html',
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

          

        complete: function (resultado){
            
        $('#carregando-modal-cadastro').show();

        setTimeout(function() {
        $('#carregando-modal-cadastro').hide();
        $('#alert-success-cadastrar').show();
        }, 3000);

        },


    });   

} else if($('#checkbox5').is(':checked') == true){

    var nome = $('input[name=nome]').val();
    var email = $('input[name=email]').val();
    var tipo = "1"

    $.ajax({
        url: '/iservices/functions/cadastro.php',
        type: 'POST',
        dataType: 'html',
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

        complete: function (resultado){
            
        $('#carregando-modal-cadastro').show();

        setTimeout(function() {
        $('#carregando-modal-cadastro').hide();
        $('#alert-su ccess-cadastrar').show();
        console.log(resultado);
        }, 3000);

        },
     });
  } else {
        $('#alert-warning-cadastrar').show();
  }

});

$('.close').click(function(event) {
   $('#alert-warning-cadastrar').hide();
   $('#alert-warning-login').hide();
   $('#alert-warning').hide();
});




$('#checkbox3').change(function() {
    $('#checkbox2').prop('checked', false);
    $('#acesso-usuario').show('slow');
    $('#acesso-prestador').hide('slow');

    if ($('#checkbox3').is(':checked') == false){
            $('#acesso-usuario').hide('slow');
    }
});

$('#checkbox2').change(function() {
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
    $('#dados-acesso-usuario').hide();

    if ($('#checkbox4').is(':checked') == false){
        $('#dados-acesso-prestador').hide();
    }
});

$('#checkbox5').change(function(event) {
    $('#checkbox4').prop('checked', false);
    $('#dados-acesso-usuario').show();
    $('#dados-acesso-prestador').hide();

    if ($('#checkbox5').is(':checked') == false){
        $('#dados-acesso-usuario').hide();
    }
});

$('#checkbox6').change(function(event) {
    $('#checkbox7').prop('checked', false);
   
});

$('#checkbox7').change(function(event) {
    $('#checkbox6').prop('checked', false);

});

$('.btn-pagamento').click(function(event) {
    var button = $(this);
    var id = button.data('id');
    var name = button.data('name');
    var servico = button.data('servico');
    var status = button.data('status');
    var telefone = button.data('tel');
    $('span.contrato').text(id);
    $('span.status').text(status);   
    $('span.nome-prestador').text(name);
    $('span.telefone').text(telefone);
    $('span.servico').text(servico);

    $('#pagamento-modal').modal('show');


});