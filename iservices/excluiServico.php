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
	$deletar = mysqli_query($conexao, "DELETE FROM servico WHERE idServico = '{$id}'");

	if($deletar == true){
		echo "<script language='javascript' type='text/javascript'>alert('Registro excluido com sucesso!');window.location.href='perfilCliente.php'</script>";
			} else {
		echo "Erro ao excluir registro: " . mysqli_error($conexao);
	}
    
?>