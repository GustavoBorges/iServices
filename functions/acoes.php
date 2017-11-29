<?php

	include("../conexao/conecta.php");
	session_start();
	
?>

<?php

	if(isset($_GET['exclusao']) && $_GET['exclusao'] == "excluir"){

	$result;
	$id = (int)$_GET['id'];
	$deletar = mysqli_query($conexao, "DELETE FROM servico WHERE idServico = '{$id}'");

	if($deletar == true){
		$result = "sucesso";

		echo json_encode($result);
	} else {
		$result = "insucesso";
		echo json_encode($result);
	}
}

	elseif(isset($_GET['alterar']) && $_GET['alterar'] == "alterar-servico"){
		
		$identificador = trim($_GET['id']);
		$tipoServico = trim($_GET['tipoServico']);
		$valor = trim($_GET['valor']);
		$descricao = trim($_GET['descricao']);
		$horarioInicial = trim($_GET['horarioInicial']);
		$horarioFinal = trim($_GET['horarioFinal']);
		$diaInicial = trim($_GET['diaInicial']);
		$diaFinal = trim($_GET['diaFinal']);
		$checkClicado = trim($_GET['checkClicado']);

		$sql = mysqli_query($conexao, "UPDATE servico SET tiposervico = '$tipoServico', valor = '$valor', descricao = '$descricao', horarioInicial = '$horarioInicial', horarioFinal = '$horarioFinal', diaInicial = '$diaInicial', diaFinal = '$diaFinal', checkClicado = '$checkClicado'  WHERE idServico = '$identificador'");
		
		if($sql == true){
			$result = "sucesso";

			echo json_encode($result);
		} else {
			$result = "insucesso";

			echo json_encode($result);
		}

}

	elseif (isset($_POST['aceitar']) && $_POST['aceitar'] == "aceitar-servico") {


		$data = trim($_POST['data']);
		$idContrato = trim($_POST['idContrato']);

		$sql = mysqli_query($conexao, "UPDATE contrato SET dataInicial = '{$data}',
														   status = '1'
									   WHERE idContrato = '{$idContrato}'");



		if ($sql == true){
			$result = "sucesso";
			echo json_encode($result);

		} else {
			$result = "insucesso";
			echo json_encode($result);
		}

}

	elseif (isset($_GET['avaliandoprestador']) && $_GET['avaliandoprestador'] == "avaliando"){

			$idUsuario = $_SESSION['idUsuario'];
			$idContrato = trim($_GET['idContrato']);
			$idCliente = trim($_GET['idCliente']);
			$comentario = trim($_GET['comentario']);
			$nota = trim($_GET['nota']);

			$sql = mysqli_query($conexao, "UPDATE contrato SET status = '5' WHERE idContrato = '{$idContrato}'");

			if ($sql == true){
			
					$sql = mysqli_query($conexao, "INSERT INTO avaliacao (idCliente, idUsuario, idContrato, voto, comentario)
												   VALUES ('$idCliente', '$idUsuario', '$idContrato', '$nota', '$comentario')");


					if ($sql == true){
						$result = "sucesso";

						echo json_encode($result);
					}else {
						$result = "insucesso";

						echo json_encode($result);
					}
			}

}


	elseif (isset($_POST['cancelar']) && $_POST['cancelar'] == "btn-sim-cancela-servico-usuario" && $_POST['tipoCancelamento'] == "0"){
			$idContrato = trim($_POST['idContrato']);

			//Verifica se o contrato já foi aceito pelo prestador de serviço. Caso tenha ele não irá executar o update na tabela
			$verificaStatus = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT status FROM contrato WHERE idContrato = '{$idContrato}'"));
			$recebeStatus = $verificaStatus['status'];

			if ($recebeStatus == "1"){
				$result = "aceito";

				echo json_encode($result);
			} else {

				$sql = mysqli_query($conexao, "UPDATE contrato SET status = '3' WHERE idContrato = '{$idContrato}'");

				if ($sql == true){
					$result = "sucesso";

					echo json_encode($result);
				} else {
					$result = "insucesso";

					echo json_encode($result);
				}


			} 

}

	elseif (isset($_POST['cancelar']) && $_POST['cancelar'] == "btn-sim-cancela-servico-prestador" && $_POST['tipoCancelamento'] == "1"){
			$idContrato = trim($_POST['idContrato']);

			//Verifica se o contrato já foi pago pelo solicitante do serviço. Caso tenha ele não irá executar o update na tabela
			$verificaStatus = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT status FROM contrato WHERE idContrato = '{$idContrato}'"));
			$recebeStatus = $verificaStatus['status'];


			if ($recebeStatus == "2"){
				$result = "pago";

				echo json_encode($result);
			} else {

				$sql = mysqli_query($conexao, "UPDATE contrato SET status = '3' WHERE idContrato = '{$idContrato}'");

				if ($sql == true){
					$result = "sucesso";

					echo json_encode($result);
				} else {
					$result = "insucesso";

					echo json_encode($result);
				}


			}

}

	elseif (isset($_POST['concluir']) && $_POST['concluir'] == "btn-conclui-proposta") {

			$idContrato = trim($_POST['idContrato']);
			$date = date('Y/m/d');

			$sql = mysqli_query($conexao, "UPDATE contrato SET status = '4',
															   dataFinal = '$date' 
											WHERE idContrato = '{$idContrato}'" );

				if ($sql == true){
					$result = "sucesso";

					echo json_encode($result);
				} else {
					$result = "insucesso";

					echo json_encode($result);
				}
				
}

	elseif (isset($_POST['pagamento']) && $_POST['pagamento'] == "btn-confirmar-pagamento") {

			$idContrato = trim($_POST['idContrato']);
			$precoPago = trim($_POST['precoPago']);
			$formapgto = trim($_POST['formapgto']);

		  $sql = mysqli_query($conexao, "UPDATE contrato SET pgto = '$precoPago', 
										   					 formapgto = '$formapgto',
										   					 status = '2'
									     WHERE idContrato = '{$idContrato}'");

			if ($sql == true){
				$result = "sucesso";

				echo json_encode($result);
			} else {
				$result = "insucesso";

				echo json_encode($result);
			}
}	

	elseif (isset($_GET['favorito']) && $_GET['favorito'] == "favorito" && $_GET['decisao'] == "1") {
			$idUsuario = $_SESSION['idUsuario'];
			$idCliente = $_GET['idCliente'];
			$idServico = $_GET['idServico'];

			$recebe = "SELECT idFavorito FROM favoritos 
										            WHERE idCliente = '{$idCliente}'
										            AND idUsuario = '{$idUsuario}'
										            AND idServico = '{$idServico}'";

			$sql = mysqli_query($conexao, "SELECT idFavorito FROM favoritos 
										            WHERE idCliente = '{$idCliente}'
										            AND idUsuario = '{$idUsuario}'
										            AND idServico = '{$idServico}'");

			$pegaIdFavorito = mysqli_fetch_assoc($sql);
			$idFavorito = $pegaIdFavorito['idFavorito'];

			if (mysqli_num_rows($sql) > 0){

			$sql = mysqli_query($conexao, "DELETE FROM favoritos WHERE idFavorito = '{$idFavorito}'");

			if ($sql == true){
				$result = "sucesso";

				echo json_encode($result);
			} else {
				$result = "insucesso";

				echo json_encode($result);
			}
		} else {
			$result = "inexistente";

			echo json_encode($result);
		}

}
	
	elseif (isset($_GET['favorito']) && $_GET['favorito'] == "favorito" && $_GET['decisao'] == "0") {
			$idUsuario = $_SESSION['idUsuario'];
			$idCliente = $_GET['idCliente'];
			$idServico = $_GET['idServico'];

			$sql = mysqli_query($conexao, "SELECT * FROM favoritos 
										            WHERE idCliente = '{$idCliente}'
										            AND idUsuario = '{$idUsuario}'
										            AND idServico = '{$idServico}'");

			if (mysqli_num_rows($sql) == 0){

			$sql = mysqli_query($conexao, "INSERT INTO favoritos (idCliente, idUsuario, idServico, adicionado)
										   VALUES ('$idCliente', '$idUsuario', '$idServico', '1')");


			if ($sql == true){
				$result = "sucesso";

				echo json_encode($result);
			} else {
				$result = "insucesso";

				echo json_encode($result);
			}
		} else {
			$result = "existe";

			echo json_encode($result);
		}

}	


		mysqli_close($conexao);
    
?>