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

	$idUsuario = $_SESSION['id'];

	if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == "Cadastrar"){

		$nome = trim($_POST['nome']);
		$email = trim($_POST['email']);
		$senha = trim($_POST['senha']);
		$confirmaSenha = trim($_POST['confirmaSenha']);
		$logradouro = trim($_POST['rua']);
		$numero = trim($_POST['numero']);
		$complemento = trim($_POST['complemento']);
		$bairro = trim($_POST['bairro']);
		$cidade = trim($_POST['cidade']);
		$estado = trim($_POST['estado']);
		$cep = trim($_POST['cep']);
		$telefone = trim($_POST['telefone']);

	$sql = mysqli_query($conexao, "UPDATE usuario SET nome = '$nome', email = '$email', senha = '$senha', confirmasenha = '$confirmaSenha', logradouro = '$logradouro', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep' telefone = '$telefone' WHERE idUsuario = '{$idUsuario}'");

}


?>