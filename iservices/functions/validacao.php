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
	
	if(isset($_POST['acessar']) && $_POST['acessar'] == "AcessarUsuario"){
		$email = trim($_POST['email']);
		$senha = trim($_POST['senha']);

		if($email == "" || $senha == ""){


			//$campoVazio = 'Os campos estão vazios'

			echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos vazios!');window.location.href='/iservices/pages/index.php'</script>";

		}else{

		$sql = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'");

		if (mysqli_num_rows($sql) > 0){

			$sql = mysqli_query($conexao, "SELECT idUsuario FROM usuario WHERE email = '{$email}'");

			$recebe = mysqli_fetch_array($sql);

			if(@mysqli_num_rows($sql) == 0 ){

				echo "0";
			}

			else {
				$_SESSION['id'] = $recebe['idUsuario'];
				
				echo "<script language='javascript' type='text/javascript'>alert('Usuário logado com sucesso!!');window.location.href='/iservices/pages/usuario.php'</script>";

			}
			
		} else {

			echo "<script language='javascript' type='text/javascript'>alert('Email ou Senha incorretos!');window.location.href='/iservices/pages/index.php'</script>";
		}
	}
}

	elseif(isset($_POST['acessar']) && $_POST['acessar'] == "Acessar")
{
		$cnpj = trim($_POST['cnpj']);
		$senha = trim($_POST['senha']);

		if($cnpj == "" || $senha == ""){

			echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos vazios!');window.location.href='/iservices/pages/index.php'</script>";
			
		}else{

		$sql = mysqli_query($conexao, "SELECT * FROM cliente WHERE cnpj = '{$cnpj}' AND senha = '{$senha}'");

		if (mysqli_num_rows($sql) > 0){

			$sql = mysqli_query($conexao, "SELECT idCliente FROM cliente WHERE cnpj = '{$cnpj}'");

			$recebe = mysqli_fetch_array($sql);

			if(mysqli_num_rows($sql) == 0){
				echo "0";
			}else{
				$_SESSION['idUsuario'] = $recebe['idCliente'];
				
			}

			echo "<script language='javascript' type='text/javascript'>alert('Cliente logado com sucesso!!');window.location.href='/iservices/pages/cliente.php'</script>";
			
									   }
			}
} 
	else {

			echo "<script language='javascript' type='text/javascript'>alert('CPF/CNPJ ou Senha incorretos!');window.location.href='/iservices/pages/index.php'</script>";
		}

	mysql_close($conexao);


	if($_GET["act"]=="logout"){
		session_destroy();
		header("location: /iservices/pages/index.php");
	exit;
}

?>

