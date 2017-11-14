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

		$idUsuario = $_SESSION['idUsuario'];
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
		$result;

		$sql = mysqli_query($conexao, "SELECT idcliente FROM servico WHERE idServico = '{$id}'");
		while ($row = mysqli_fetch_row($sql)){
			$recebeValor = $row[0];
			
		}
			if(mysqli_num_rows($sql) > 0){
					
				//$sql = "INSERT INTO contrato (idServico, idUsuario, idCliente, preco, dataPreco, status, enderecoCadastrado, rua, numero, complemento, bairro, cidade, detalhes) VALUES ('$id', '$idUsuario', '$recebeValor', '$preco', '$data', '0', '$enderecoCadastrado', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$detalhes')";
				$sql = mysqli_query($conexao, "INSERT INTO contrato (idServico, idUsuario, idCliente, preco, dataPreco, status, enderecoCadastrado, rua, numero, complemento, bairro, cidade, detalhes) VALUES ('$id', '$idUsuario', '$recebeValor', '$preco', '$data', '0', '$enderecoCadastrado', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$detalhes')");

				$result = "sucesso";
		
				echo json_encode($result);
		} else {
					mysqli_error($conexao);

				$result = "insucesso";

				echo json_encode($result);	

				}


}

		elseif(isset($_POST['contratarSemEnd']) && $_POST['contratarSemEnd'] == "Contratar"){

		$idUsuario = $_SESSION['idUsuario'];
		$id = trim($_POST['id']);
		$preco = trim($_POST['preco']);
		$enderecoCadastrado = trim($_POST['enderecoCadastrado']);		
		$detalhes = trim($_POST['detalhes']);
		$data = date('Y/m/d');
		$sucesso = "sucesso";
		$result;

		$sql = mysqli_query($conexao, "SELECT idcliente FROM servico WHERE idServico = '{$id}'");
		while ($row = mysqli_fetch_row($sql)){
			$recebeValor = $row[0];
			
		}
			if(mysqli_num_rows($sql) > 0){
				$recebeEndereco = mysqli_query($conexao, "SELECT logradouro, numero, complemento, bairro, cidade FROM usuario WHERE idUsuario = '{$idUsuario}'");

				while ($row = mysqli_fetch_row($recebeEndereco)) {
					$recebeRua = $row[0];
					$recebeNumero = $row[1];
					$recebeComplemento = $row[2];
					$recebeBairro = $row[3];					
					$recebeCidade = $row[4];
			}

				$sql = mysqli_query($conexao, "INSERT INTO contrato (idServico, idUsuario, idCliente, preco, dataPreco, status, enderecoCadastrado, rua, numero, complemento, bairro, cidade, detalhes)	VALUES ('$id', '$idUsuario', '$recebeValor', '$preco', '$data', '0', '$enderecoCadastrado', '$recebeRua', '$recebeNumero', '$recebeComplemento', '$recebeBairro', '$recebeCidade', '$detalhes')");

				

			if ($sql == true){
				$result = "sucesso";
		
				echo json_encode($result);

			} else {

				$result = "insucesso";
		
				echo json_encode($result);

			}	

		   }
		}

?>