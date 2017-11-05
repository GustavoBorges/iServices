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
    $('#horario-atendimento').hide();
    $('#horario-urgencia').hide();
    $('#carregando-modal-cadastrar-servico').hide();
    $('#alert-warning-cadastro-servico').hide();
    $('#alert-success-cadastrar-servico').hide();
    $('span.id-servico').hide();
    $('#editar-horario-atendimento').hide();
    $('#editar-horario-urgencia').hide();
    $('#carregando-modal-alterar').hide();
    $('#alert-warning-alterar').hide();
    $('#alert-success-alterar').hide();
    $('#alert-danger-alterar').hide();

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

$('.btn-excluir').click(function(event) {
    var button = $(this);
    var nome = button.data('name');
    var id = button.data('id');
    $('span.nome').text(nome);
    $('span.id-servico').text(id);
    $('#excluir-servico-modal').modal('show');
    
});

$('.btn-confirma-exclusao').click(function(event) {
    var id = $('span.id-servico').text();
    var button = $('button[name=btn-ok]').val();

    
    $.ajax({
        url: '/iservices/functions/acoes.php',
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
            $('#retorno').prepend('<span>Registro não pode ser excluido, pois o mesmo possui ligação com serviços contratados. Gentileza desativar o serviço!</span>')
        }
   },

    });    
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

$('#btn-alterar-servico').click(function(event) {

   var button = $('button[name=alterar]').val();
   var id = $('input[name=editar-identificador]').val();
   var tipoServico = $('select[name=editar-tipoServico]').val();
   var valor = $('input[name=editar-valor]').val();
   var descricao = $('textarea[name=editar-descricao-servico]').val();

   if($('#checkbox10').is(':checked') == true){

   var horarioInicial = $('select[name=editar-horario-atendimento-inicial]').val();
   var horarioFinal = $('select[name=editar-horario-atendimento-final]').val();
   var diaInicial = $('select[name=editar-dia-atendimento-inicial]').val();
   var diaFinal = $('select[name=editar-dia-atendimento-final]').val();
   var check = "0";

   $.ajax({
       url: '/iservices/functions/acoes.php',
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
        console.log(resultado);

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
       url: '/iservices/functions/acoes.php',
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
        console.log(resultado);

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

$('#btn-cadastrar-servico').click(function(event) {
   
    var tipoServico = $('select[name=tipo-servico-cadastro]').val();
    var valor = $('input[name=valor-servico]').val();
    var descricao = $('textarea[name=descricao-servico]').val();
    var button = $('button[name=cadastro-servico]').val();

     if($('#checkbox8').is(':checked') == false && $('#checkbox9').is(':checked') == false){
        $('#alert-warning-cadastro-servico').show();
    }

    else if ($('#checkbox8').is(':checked') == true){
    var horarioInicial = $('select[name=horario-atendimento-inicial]').val();
    var horarioFinal = $('select[name=horario-atendimento-final]').val();
    var diaInicial = $('select[name=dia-atendimento-inicial]').val();
    var diaFinal = $('select[name=dia-atendimento-final]').val();
    var checkClicado = "0";

    $.ajax({
        url: '/iservices/functions/cadastro.php',
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
        url: '/iservices/functions/cadastro.php',
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

});

$('.close').click(function(event) {
   $('#alert-warning-cadastrar').hide();
   $('#alert-warning-login').hide();
   $('#alert-warning').hide();
   $('#alert-warning-cadastro-servico').hide();
   $('#alert-success-cadastrar-servico').hide();
   $('#alert-warning-alterar').hide();
   $('#alert-success-alterar').hide();
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