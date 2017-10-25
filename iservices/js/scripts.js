$(document).ready(function () {
                $('#tab-servicos').DataTable({
                    "language": {
                        "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
                    }
                });
            });

$(document).ready(function () {
                $('#tab-servicosSolicitados').DataTable({
                    "language": {
                        "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
                    }
                });
            });

$(document).ready(function () {
                $('#tab-historicos').DataTable({
                    "language": {
                        "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
                    }
                });
            });

$(document).ready(function () {
            $('#tab-contratos').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
                }
            });
        });

$('a.delete').on('click', function () {
                var nome = $(this).data('name'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
                var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
                $('span.nome').text(nome + ' (id = ' + id + ')'); // inserir na o nome na pergunta de confirmação dentro da modal
                $('a.delete-yes').attr('href', '/iservices/functions/acoes.php?id=' + id + '&&btn-ok=excluir'); // mudar dinamicamente o link, href do botão confirmar da modal
                $('#delete-modal').modal('show'); // modal aparece
            });


$('#modal-EditarCadastro').on('show.bs.modal', function (event) {
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

$('#modal-Visualizacao').on('show.bs.modal', function (event) {
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

$('.carousel[data-type="multi"] .item').each(function () {
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
$('.checkando').change( function(){
        
    if ($(this).is(':checked')){
        var nome = $(this).data('name');
        var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
        $('#ativando-servico').text(nome + ' (id = ' + id + ')'); // inserir na o nome na pergunta de confirmação dentro da modal
        $('#ativacao-modal').modal('show');

            $('#nao-ativa').click( function (){                     
                $('.checkando').prop('checked', false);
                });

            $('#ativar-servico').click( function (){
                $('#ativar-servico').attr('href', '/iservices/functions/ativacao.php?id=' + id + '&&ativar=ativar'); // mudar dinamicamente o link, href do botão confirmar da modal
                $('.checkando').prop('checked', true);
            });
        }

    else {
        var nome = $(this).data('name');
        var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
        $('#desativando-servico').text(nome + ' (id = ' + id + ')'); // inserir na o nome na pergunta de confirmação dentro da modal
        $('#desativacao-modal').modal('show');

            $('#nao-desativa').click( function (){                     
                $('.checkando').prop('checked', true);
                });

            $('#desativar-servico').click( function (){
                    $('#desativar-servico').attr('href', '/iservices/functions/ativacao.php?id=' + id + '&&desativar=desativar'); // mudar dinamicamente o link, href do botão confirmar da modal
                    $('.checkando').prop('checked', false);
                });

    }
});

//Botão cadastra-se da index.php - Login Usuário

        $('#cadastrar-usuario').click( function (){
            $('#modalLogin').modal('toggle');
            $('#modal').modal('show');
        });

$('#modalLoginServico').on('show.bs.modal', function (event) {
    $('#carregando').hide();
});

    $('#btn-avaliar').click( function (){
        $('#avaliacao-modal').modal('show');
    });

   