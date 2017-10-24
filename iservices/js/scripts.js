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

$('input[type="checkbox"]').on('change', function(e){
   if(e.target.checked){
     $('#ativacao-modal').modal('show');
   }
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