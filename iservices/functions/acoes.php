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

	if(isset($_GET['btn-ok']) && $_GET['btn-ok'] == "excluir")
{
	
	$id = (int)$_GET['id'];
	$deletar = mysqli_query($conexao, "DELETE FROM servico WHERE idServico = '{$id}'");

	if($deletar == true){
		echo "<script language='javascript' type='text/javascript'>alert('Registro excluido com sucesso!');window.location.href='/iservices/pages/cliente.php'</script>";
			} else {
		echo "Erro ao excluir registro: " . mysqli_error($conexao);
	}
}

	elseif(isset($_GET['alterar']) && $_GET['alterar'] == "alterar")
	{
		
		$identificador = trim($_GET['Editaridentificador']);
		$tipoServico = trim($_GET['EditartipoServico']);
		$valor = trim($_GET['Editarvalor']);
		$descricao = trim($_GET['Editardescricao']);

		if($valor == "" || $descricao == ""){
		echo "<script type='text/javascript' language='javascript'>alert('Preencha todos os campos!');window.location.href='/iservices/pages/cliente.php'</script>";
	}else{
		if($tipoServico == "Selecione Serviço"){
			echo "<script type='text/javascript' language='javascript'>alert('Selecione um serviço!');window.location.href='/iservices/pages/cliente.php'</script>";
			} else { 

				$sql = mysqli_query($conexao, "UPDATE servico SET tiposervico = '$tipoServico', valor = '$valor', descricao = '$descricao' WHERE idServico = '$identificador'");
				echo "<script type='text/javascript' language='javascript'>alert('Serviço alterado com sucesso!!');</script>";
				header("location: /iservices/pages/cliente.php"); 
		}
										}
	}
		mysqli_close($conexao);
    
?>