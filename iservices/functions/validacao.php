<?php

    include("C:XAMPP/htdocs/iservices/conexao/conecta.php");
    session_start();

?>

<?php

if (isset($_POST['acessar']) && $_POST['acessar'] == "Acessar" && $_POST['tipoAcesso'] == "0") {
        $cnpj = trim($_POST['cnpj']);
        $senha = trim($_POST['senha']);
        $result;

        $sql = mysqli_query($conexao, "SELECT * FROM cliente WHERE cnpj = '{$cnpj}' AND senha = '{$senha}'");

       if (mysqli_num_rows($sql) > 0) {
            $sql = mysqli_query($conexao, "SELECT idCliente FROM cliente WHERE cnpj = '{$cnpj}'");
            $recebe = mysqli_fetch_array($sql);
            
            $_SESSION['idCliente'] = $recebe['idCliente']; 

            $result = "sucesso";

            echo json_encode($result);

        } else {
            $result = "insucesso";

            echo json_encode($result);
        }
        
}

elseif (isset($_POST['acessar']) && $_POST['acessar'] == "Acessar" && $_POST['tipoAcesso'] == "1") {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

        $sql = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'");

        if (mysqli_num_rows($sql) > 0) {
            $sql = mysqli_query($conexao, "SELECT idUsuario FROM usuario WHERE email = '{$email}'");
            $recebe = mysqli_fetch_array($sql);

            $_SESSION['idUsuario'] = $recebe['idUsuario'];
            
            echo "sucesso";

           } else {
            echo "insucesso";
           }
        
}




/*if ($_GET["act"] == "logout") {
    session_destroy(); 
    header("location: /iservices/pages/index.php");
    exit;
}*/
?>

