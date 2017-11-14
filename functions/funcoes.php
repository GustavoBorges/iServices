<?php
	//Dados do banco de dados
	$servidor = "localhost";
	$usuario = "root";
	$senha = "guga100";
	$banco = "iservices";

	//String de conexão com o banco de dados
	$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
	//Verificação de conexão
	if (!$conexao){
		die("Erro ao conectar: " . mysqli_error());
	}

	
	session_start();

?>

<?php

	function carregaServico($conexao) {
	$servicos = array();

	$idCliente = $_SESSION['idCliente'];

	$sql = mysqli_query($conexao, "SELECT idServico, tiposervico, valor, descricao, horarioInicial, horarioFinal, diaInicial, diaFinal, checkClicado, REPLACE(ativo, '1', 'checked') AS ativo FROM servico WHERE idcliente = '{$idCliente}'");
	
	 
	while ($recebe = mysqli_fetch_array($sql)) {
		array_push($servicos, $recebe);			
	}

	return $servicos;

	}
	
?>



<?php
	
	function carregaContrato($conexao){
		$contratos = array();

		$idUsuario = $_SESSION['idUsuario'];

		$sql = mysqli_query($conexao, "SELECT c.idContrato, s.tiposervico, s.valor, s.descricao, cl.nome, cl.telefone, c.status FROM contrato AS c
							INNER JOIN servico AS s
							ON c.idServico = s.idServico
							INNER JOIN usuario AS u
							ON c.idUsuario = u.idUsuario
                            INNER JOIN cliente AS cl 
                            ON c.idCliente = cl.idCliente WHERE c.idUsuario = '{$idUsuario}'");

		while($recebe = mysqli_fetch_array($sql)){
			array_push($contratos, $recebe);
		}

		return $contratos;

	}


?>

<?php
	
	function carregarContratoCliente($conexao){

		$carregaContrato = array();

		$idCliente = $_SESSION['idCliente'];

		$recebeServicoSolicitado = mysqli_query($conexao, "SELECT contrato.idContrato, 
			servico.tiposervico, 
			contrato.preco, 
			servico.descricao, 
			servico.horarioInicial,
			servico.horarioFinal,
			servico.diaInicial,
			servico.diaFinal, 
			usuario.nome, 
			usuario.email, 
			usuario.telefone,
			contrato.status,
			contrato.detalhes,
			servico.checkClicado,
			CONCAT(contrato.rua,', ',
			contrato.numero,' - ',
			contrato.complemento,' - ',
			contrato.bairro,'/ ',
			contrato.cidade) AS endereco 
			FROM contrato 
			INNER JOIN usuario 
			ON contrato.idUsuario = usuario.idUsuario 
			INNER JOIN servico 
			ON contrato.idServico = servico.idServico
			WHERE contrato.idCliente = '{$idCliente}'");

		while ($recebe = mysqli_fetch_array($recebeServicoSolicitado)) {
				array_push($carregaContrato, $recebe);
		}

		return $carregaContrato;

	}

?>

<?php

	function carregaHistoricoCliente($conexao){

		$carregaContratoFinalizado = array();

		$idCliente = $_SESSION['idCliente'];

		$recebeContratoFinalizado = mysqli_query($conexao, "SELECT c.idContrato, s.tiposervico, s.valor, s.descricao, u.nome, u.email, u.telefone, REPLACE(c.status, 0, 'Finalizado') AS status FROM contrato AS c
												INNER JOIN servico AS s
												ON c.idServico = s.idServico
												INNER JOIN usuario AS u
												ON c.idUsuario = u.idUsuario
												WHERE c.idCliente = {$idCliente} AND c.status = '0'");

		while ($recebe = mysqli_fetch_array($recebeContratoFinalizado)) {
				array_push($carregaContratoFinalizado, $recebe);
		}

		return $carregaContratoFinalizado;


	}

?>

<?php

	function carregaServicoUsuario($conexao) {


	$servicos = array();

	$sql = mysqli_query($conexao, "SELECT servico.idServico, servico.tiposervico, servico.valor, servico.descricao, cliente.nome FROM servico 
								   INNER JOIN cliente ON servico.idCliente = cliente.idCliente");
	 
	while ($recebe = mysqli_fetch_array($sql)) {
		array_push($servicos, $recebe);			
	}

	return $servicos;

	}
	
?>

<?php
	
	function carregaHistoricoUsuario($conexao){
		$contratos = array();

		$idUsuario = $_SESSION['idUsuario'];

		$sql = mysqli_query($conexao, "SELECT c.idContrato, s.tiposervico, s.valor, s.descricao, cl.nome, cl.telefone, c.status FROM contrato AS c
							INNER JOIN servico AS s
							ON c.idServico = s.idServico
							INNER JOIN usuario AS u
							ON c.idUsuario = u.idUsuario
                            INNER JOIN cliente AS cl 
                            ON c.idCliente = cl.idCliente WHERE c.idUsuario = '{$idUsuario}' AND c.status = 'Finalizado' OR c.status = 'Cancelado' OR c.status = 'Rejeitado'");

		while($recebe = mysqli_fetch_array($sql)){
			array_push($contratos, $recebe);
		}

		return $contratos;

	}


?>

<?php

	function recebeNomeUsuario($conexao){

				$idUsuario = $_SESSION['idUsuario'];
				$sql = mysqli_query($conexao, "SELECT nome FROM usuario WHERE idUsuario = '{$idUsuario}' ");
				$recebendoNome = mysqli_fetch_row($sql);
				$recebeu = $recebendoNome[0];

				return $recebeu;

	}
	
?>

<?php

	function recebeNomeCliente($conexao){

				$idCliente = $_SESSION['idCliente'];
				$sql = mysqli_query($conexao, "SELECT nome FROM cliente WHERE idCliente = '{$idCliente}' ");
				$recebendoNome = mysqli_fetch_row($sql);
				$recebeu = $recebendoNome[0];

				return $recebeu;

	}
	
?>