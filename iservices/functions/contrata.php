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
	
	if(isset($_POST['contratar']) && $_POST['contratar'] == "Contratar"){

		$idUsuario = $_SESSION['id'];
		$id = trim($_POST['id']);
		$rua = trim($_POST['rua']);
		$numero = trim($_POST['numero']);
		$complemento = trim($_POST['complemento']);
		$bairro = trim($_POST['bairro']);
		$cidade = trim($_POST['cidade']);
		$preco = trim($_POST['preco']);
		$enderecoCadastrado = trim($_POST['enderecoCadastrado']);
		$data = date('Y/m/d');
		$detalhes = trim($_POST['detalhes']);

		$sql = mysqli_query($conexao, "SELECT idcliente FROM servico WHERE idServico = '{$id}'");
		while ($row = mysqli_fetch_row($sql)){
			$recebeValor = $row[0];
			
		}
			if(mysqli_num_rows($sql) > 0){
				$sql = mysqli_query($conexao, "INSERT INTO contrato (idServico, idUsuario, idCliente, preco, dataPreco, status, enderecoCadastrado, detalhes) VALUES ('$id', '$idUsuario', '$recebeValor', '$preco', '$data', '0', '$enderecoCadastrado', '$detalhes')");

				$query = mysqli_query($conexao, "SELECT MAX(idContrato) as idContrato FROM contrato WHERE idUsuario = '{$idUsuario}'");
				
				while ($row = mysqli_fetch_row($query)){
			    $recebeValor = $row[0];
			
			}	if(mysqli_num_rows($query) > 0){
					$sql = mysqli_query($conexao, "INSERT INTO endereco_complementar (idContrato, rua, numero, complemento, bairro, cidade) VALUES ('$recebeValor', '$rua', '$numero', '$complemento', '$bairro', '$cidade')");
				} else {
					mysqli_error($conexao);
				}

				echo "sucesso";

			} else {
				mysqli_error($conexao);
			}
		}

		elseif(isset($_POST['contratarSemEnd']) && $_POST['contratarSemEnd'] == "Contratar"){

		$idUsuario = $_SESSION['id'];
		$id = trim($_POST['id']);
		$preco = trim($_POST['preco']);
		$enderecoCadastrado = trim($_POST['enderecoCadastrado']);		
		$detalhes = trim($_POST['detalhes']);
		$data = date('Y/m/d');
		$sucesso = "sucesso";

		$sql = mysqli_query($conexao, "SELECT idcliente FROM servico WHERE idServico = '{$id}'");
		while ($row = mysqli_fetch_row($sql)){
			$recebeValor = $row[0];
			
		}
			if(mysqli_num_rows($sql) > 0){
				$sql = mysqli_query($conexao, "INSERT INTO contrato (idServico, idUsuario, idCliente, preco, dataPreco, status, enderecoCadastrado, detalhes) VALUES ('$id', '$idUsuario', '$recebeValor', '$preco', '$data', '0', '$enderecoCadastrado', '$detalhes')");

				return $sucesso;

			} else {
				mysqli_error($conexao);
			}
		}

?>