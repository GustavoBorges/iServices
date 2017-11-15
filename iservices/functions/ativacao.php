<?php
	
	include("C:XAMPP/htdocs/iservices/conexao/conecta.php");	
	session_start();

?>

<?php
	
	if (isset($_GET['ativar']) && $_GET['ativar'] == "ativar"){

	$id = (int)$_GET['id'];
	$ativacao = mysqli_query($conexao, "UPDATE servico SET ativo = '1' WHERE idServico = '{$id}'");

	if($ativacao == true){
		header("location: /iservices/pages/cliente.php");
			} else {
		echo "Erro ao ativar registro: " . mysqli_error($conexao);
		}
	}

	else {

	$id = (int)$_GET['id'];
	$desativacao = mysqli_query($conexao, "UPDATE servico SET ativo = '0' WHERE idServico = '{$id}'");

	if($desativacao == true){
		header("location: /iservices/pages/cliente.php");
			} else {
		echo "Erro ao desativar registro: " . mysqli_error($conexao);
		}
	}

?>