//adiciona mascara ao telefone
function MascaraTelefone(tel) {
	if (mascaraInteiro(tel) === false) {
		event.returnValue = false;
	}
	return formataCampo(tel, '(00) 0000-0000', event);
}

//valida telefone
 /*function ValidaTelefone(tel) { exp = /\(\d{2}\)\ \d{4}\-\d{4}/ if
 (!exp.test(tel.value)) alert('Numero de Telefone Invalido!'); 
}
*/


//Exclui registro

/*$('a.delete').on('click', function(){
      var nome = $(this).data('name'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
      var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
      $('span.nome').text(nome+ ' (id = ' +id+ ')'); // inserir na o nome na pergunta de confirmação dentro da modal
      $('a.delete-yes').attr('href', '/iservices/functions/excluir.php?id=' +id); // mudar dinamicamente o link, href do botão confirmar da modal
      $('#delete-modal').modal('show'); // modal aparece
});*/


