<?php

//Dados do banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "guga100";
$banco = "iservices";

//String de conexão com o banco de dados
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
//Verificação de conexão
if (!$conexao) {
    die("Erro ao conectar: " . mysqli_error());
}

session_start();
?>

<?php

    $email = trim($_POST['cnpj']);
    $senha = trim($_POST['senha']);


    if ($email == "" || $senha == "") {

        echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos vazios!');window.location.href='/iservices/pages/index.php'</script>";
    } else {

        $sql = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'");

        if (mysqli_num_rows($sql) > 0) {

            $sql = mysqli_query($conexao, "SELECT idUsuario FROM usuario WHERE email = '{$email}'");

            $recebe = mysqli_fetch_array($sql);

            if (@mysqli_num_rows($sql) == 0) {

                echo "0";
            } else {
                $_SESSION['id'] = $recebe['idUsuario'];
                echo '1';
                //echo "<script language='javascript' type='text/javascript'>alert('Usuário logado com sucesso!!');window.location.href='/iservices/pages/usuario.php'</script>";
            }
        } else {

            echo '2';

            //echo "<script language='javascript' type='text/javascript'>alert('Email ou Senha incorretos!');window.location.href='/iservices/pages/index.php'</script>";
        }
?>