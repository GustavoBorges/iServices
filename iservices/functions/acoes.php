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

	if(isset($_GET['exclusao']) && $_GET['exclusao'] == "excluir"){

	$result;
	$id = (int)$_GET['id'];
	$deletar = mysqli_query($conexao, "DELETE FROM servico WHERE idServico = '{$id}'");

	if($deletar == true){
		$result = "sucesso";

		echo json_encode($result);
	} else {
		$result = "insucesso";
		echo json_encode($result);
	}
}

	elseif(isset($_GET['alterar']) && $_GET['alterar'] == "alterar-servico"){
		
		$result;
		$identificador = trim($_GET['id']);
		$tipoServico = trim($_GET['tipoServico']);
		$valor = trim($_GET['valor']);
		$descricao = trim($_GET['descricao']);
		$horarioInicial = trim($_GET['horarioInicial']);
		$horarioFinal = trim($_GET['horarioFinal']);
		$diaInicial = trim($_GET['diaInicial']);
		$diaFinal = trim($_GET['diaFinal']);
		$checkClicado = trim($_GET['checkClicado']);

		//$recebe = "UPDATE servico SET tiposervico = '$tipoServico', valor = '$valor', descricao = '$descricao', horarioInicial = '$horarioInicial', horarioFinal = '$horarioFinal', diaInicial = '$diaInicial', diaFinal = '$diaFinal', checkClicado = '$checkClicado'  WHERE idServico = '$identificador'";

		$sql = mysqli_query($conexao, "UPDATE servico SET tiposervico = '$tipoServico', valor = '$valor', descricao = '$descricao', horarioInicial = '$horarioInicial', horarioFinal = '$horarioFinal', diaInicial = '$diaInicial', diaFinal = '$diaFinal', checkClicado = '$checkClicado'  WHERE idServico = '$identificador'");
		
		if($sql == true){
			$result = "sucesso";

			echo json_encode($result);
		} else {
			$result = "insucesso";

			echo json_encode($result);
		}

}
		

		mysqli_close($conexao);
    
?>