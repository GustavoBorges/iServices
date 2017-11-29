<?php

	include("../conexao/conecta.php");
	session_start();
	
?>

<?php



if (isset($_POST['enviar']) && $_POST['enviar'] == "Enviar" && $_POST['tipo'] == "0"){

		$razaoSocial = trim($_POST['razaoSocial']);
		$cpfcnpj = trim($_POST['cpfcnpj']);
		md5($senha = trim($_POST['senha']));
		$confirmaSenha = trim($_POST['confirmaSenha']);
		$rua = trim($_POST['rua']);
		$numero = trim($_POST['numero']);
		$complemento = trim($_POST['complemento']);
		$bairro = trim($_POST['bairro']);
		$cidade = trim($_POST['cidade']);
		$estado = trim($_POST['estado']);
		$cep = trim($_POST['cep']);
		$telefone = trim($_POST['telefone']);

		$sql = mysqli_query($conexao, "SELECT * FROM cliente WHERE cnpj = '{$cpfcnpj}'");

		if(mysqli_num_rows($sql) > 0 ){

			$result = "existe";

			echo json_encode($result);
		}else {

		$sql = mysqli_query($conexao, "INSERT INTO cliente (nome, cnpj, senha, confirmasenha, logradouro, numero, complemento, bairro, cidade, estado, cep, telefone)
			VALUES ('$razaoSocial', '$cpfcnpj', '$senha', '$confirmaSenha', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep' ,'$telefone')");


					if ($sql == true){
						$result = "cadastrado";
						
						echo json_encode($result);
					} else {
						$result = "erro";
						
						echo json_encode($result);
					}
			}
}

elseif (isset($_POST['enviar']) && $_POST['enviar'] == "Enviar" && $_POST['tipo'] == "1"){

		$nome = trim($_POST['nome']);
		$email = trim($_POST['email']);
		$senha = trim($_POST['senha']);
		$confirmaSenha = trim($_POST['confirmaSenha']);
		$rua = trim($_POST['rua']);
		$numero = trim($_POST['numero']);
		$complemento = trim($_POST['complemento']);
		$bairro = trim($_POST['bairro']);
		$cidade = trim($_POST['cidade']);
		$estado = trim($_POST['estado']);
		$cep = trim($_POST['cep']);
		$telefone = trim($_POST['telefone']);

		$sql = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '{$email}'");

		if(mysqli_num_rows($sql) > 0 ){

			$result = "existe";

			echo json_encode($result);
		}else {

		$sql = mysqli_query($conexao, "INSERT INTO  usuario (nome, email, senha, confirmasenha, logradouro, numero, complemento, bairro, cidade, estado, cep, telefone) 
			VALUES ('$nome','$email','$senha','$confirmaSenha','$rua','$numero', '$complemento' ,'$bairro','$cidade','$estado', '$cep', '$telefone')");

			if ($sql == true){
				$result = "cadastrado";

				echo json_encode($result);
			} else {
				$result = "erro";

				echo json_encode($result);
			}
				
			}
}			

	elseif (isset($_GET['cadastrar']) && $_GET['cadastrar'] == "cadastro-servico"){


	$tipo = trim($_GET['tipoServico']);
	$valor = moeda(trim($_GET['valor']));
	$descricao = trim($_GET['descricao']);
	$horarioInicial = trim($_GET['horarioInicial']);
	$horarioFinal = trim($_GET['horarioFinal']);
	$diaInicial = trim($_GET['diaInicial']);
	$diaFinal = trim($_GET['diaFinal']);
	$checkClicado = trim($_GET['checkClicado']);
	$idCliente = $_SESSION['idCliente'];
			
	$sql = mysqli_query($conexao, "INSERT INTO servico (tiposervico, valor, descricao, horarioInicial, horarioFinal, diaInicial, diaFinal, checkClicado, ativo, idCliente) 
						VALUES ('$tipo', '$valor', '$descricao', '$horarioInicial', '$horarioFinal', '$diaInicial', '$diaFinal', '$checkClicado', '0', '$idCliente')");
				
	echo "cadastrado"; 
}

function moeda($get_valor){
	$reescreve = array('.', ',');
	$reescrevendo = array('' , '.');
	$valor = str_replace($reescreve, $reescrevendo, $get_valor);
	return $valor;
}

	mysqli_close($conexao);


?>

