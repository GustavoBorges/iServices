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
	
	$id = (int)$_GET['id'];
	$idUsuario = $_SESSION['id'];

	$pegaIdCliente = mysqli_query($conexao, "SELECT idCliente FROM servico WHERE idServico = '{$id}'");

	$recebeIdCliente = mysqli_fetch_row($pegaIdCliente);
	$recebendo = $recebeIdCliente [0];
	

	$inserir = mysqli_query($conexao, "INSERT INTO contrato (idServico, idUsuario, idCliente , status)
							VALUES ('$id', '$idUsuario' , '$recebendo', 'Solicitado')");

	echo "<script type='text/javascript' language='javascript'>alert('Serviço contratado com sucesso!');window.location.href='perfilUsuario.php'</script>";
	
	mysqli_close($conexao);

?>