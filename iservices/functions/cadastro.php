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

		$enderecocompleto = $logradouro.", ".$numero. " - ".$bairro. " - " .$cidade. " - " .$cep; 

		if($nome == "" || $email == "" || $senha == "" || $confirmaSenha == "" || $logradouro == "" || $numero == "" || $cep == "" || $bairro == "" || $cidade == "" || $estado == "" || $telefone == ""){

			echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos!');window.location.href='/iservices/pages/index.php'</script>";

		}

		else {

		$sql = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '{$email}'");

		if(mysqli_num_rows($sql) > 0){
				echo "<script language='javascript' type='text/javascript'>alert('Email já consta cadastrado em nossa base de dados!');window.location.href='/iservices/pages/index.php'</script>";
		} else {

			if ($senha != $confirmaSenha){
					echo "<script language='javascript' type='text/javascript'>alert('Campo Senha diferente do campo Confirmar Senha!');window.location.href='/iservices/pages/index.php'</script>";
		   }else {
		   	$sql = mysqli_query($conexao, "INSERT INTO  usuario (nome, email, senha, confirmasenha, logradouro, numero, complemento, bairro, cidade, estado, cep, telefone) 
			VALUES ('$nome','$email','$senha','$confirmaSenha','$logradouro','$numero', '$complemento' ,'$bairro','$cidade','$estado', '$cep', '$telefone')");
	 		
	 		echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='/iservices/pages/index.php'</script>";
				 
				 }
			   }
			
			}
}


		elseif (isset($_POST['enviar']) && $_POST['enviar'] == "Enviar"){

		$razaoSocial = trim($_POST['razaoSocial']);
		$cnpj = trim($_POST['cpfcnpj']);
		$senha = trim($_POST['senhaServico']);
		$confirmaSenha = trim($_POST['confirmaSenhaServico']);
		$rua = trim($_POST['rua']);
		$numero = trim($_POST['numero']);
		$complemento = trim($_POST['complemento']);
		$bairro = trim($_POST['bairro']);
		$cidade = trim($_POST['cidade']);
		$estado = trim($_POST['estado']);
		$cep = trim($_POST['cep']);
		$telefone = trim($_POST['telefone']);


		if($razaoSocial == "" || $cnpj == "" || $senha == "" || $confirmaSenha == "" || $rua == "" || $numero == "" || $complemento == "" || $bairro == "" || $cidade == "" || $estado == "" || $cep == "" || $telefone == ""){

			echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos!');window.location.href='/iservices/pages/index.php'</script>";

		}else

		$sql = mysqli_query($conexao, "SELECT * FROM cliente WHERE cnpj = '{$cnpj}'");

		if(mysqli_num_rows($sql) > 0 ){

			echo "<script language='javascript' type='text/javascript'>alert('CPF/CNPJ já se encontra em nossa base de dados!');window.location.href='/iservices/pages/index.php'</script>";
		}else {
			if($senha != $confirmaSenha){

				echo "<script language='javascript' type='text/javascript'>alert('Campo Senha diferente do campo Confirmar Senha!');window.location.href='/iservices/pages/index.php'</script>";
			}else{

		$sql = mysqli_query($conexao, "INSERT INTO cliente (nome, cnpj, senha, confirmasenha, logradouro, numero, complemento, bairro, cidade, estado, cep, telefone)
			VALUES ('$razaoSocial', '$cnpj', '$senha', '$confirmaSenha', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep' ,'$telefone')");

	echo "<script language='javascript' type='text/javascript'>alert('Cliente cadastrado com sucesso!');window.location.href='/iservices/pages/index.php'</script>";
				 }
			  }
}			

		else {
	echo "<script language='javascript' type='text/javascript'>alert('Não foi possível inserir o registro!');window.location.href='/iservices/pages/index.php'</script>";
}
	
	mysqli_close($conexao);

?>