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
		
		$idContrato = (int)$_GET['id'];

		$sql = mysqli_query($conexao, "UPDATE contrato SET status = 'Pago' WHERE idContrato = '{$idContrato}'");

		echo "<script type='text/javascript' language='javascript'>alert('Pagamento realizado com sucesso!');window.location.href='perfilUsuario.php'</script>";
		
		mysqli_close($conexao);

?>