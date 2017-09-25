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


