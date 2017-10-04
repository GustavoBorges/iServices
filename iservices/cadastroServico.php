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

function moeda($get_valor){
	$reescreve = array('.', ',');
	$reescrevendo = array('' , '.');
	$valor = str_replace($reescreve, $reescrevendo, $get_valor);
	return $valor;
}

?>

<?php

	if(isset($_GET['envia']) && $_GET['envia'] == "Enviar"){

	$tipo = trim($_GET['tipoServico']);
	$valor = moeda(trim($_GET['valor']));
	$descricao = trim($_GET['descricao']);
	$idCliente = $_SESSION['idUsuario'];

	if($tipo == "" || $valor == "" || $descricao == ""){
		echo "<script type='text/javascript' language='javascript'>alert('Preencha todos os campos!');window.location.href='perfilCliente.php'</script>";
	}else{
		if($tipo == "Selecione Serviço"){
			echo "<script type='text/javascript' language='javascript'>alert('Selecione um serviço!');window.location.href='perfilCliente.php'</script>";
			} else { 

				$sql = mysqli_query($conexao, "INSERT INTO servico (tiposervico, valor, descricao, idCliente) 
					VALUES ('$tipo', '$valor', '$descricao', '$idCliente')");
				
				echo "<script type='text/javascript' language='javascript'>alert('Serviço cadastrado com sucesso!!');</script>";
				header("location: perfilCliente.php"); 
		}
										}

} else {
				echo "<script type='text/javascript' language='javascript'>alert('Serviço não pode ser cadastrado!!');window.location.href='perfilCliente.php'</script>";

		}		

		mysqli_close();

?>