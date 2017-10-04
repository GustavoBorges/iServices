<?php
include("C:XAMPP/htdocs/iservices/conexao/conecta.php");
include("C:XAMPP/htdocs/iservices/functions/funcoes.php");
$recebeu = recebeNomeUsuario($conexao);
?>
<!DOCTYPE html">
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Delivery de serviços | Entrega de serviços online | Peça iServices
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="/iservices/bootstrap/css/bootstrap.min.css" />
        </link>
        <link rel="shortcut icon" href="/iservices/img/icon_logo.ico">
        </link>
        <link rel="stylesheet" type="text/css" href="/iservices/css/design.css">
        <link rel="stylesheet" type="text/css" href="/iservices/css/estilo.css">
        <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">  
        <link href="/iservices/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script language="javaScript" type="text/javascript" src="/iservices/js/script.js"></script>
    </head>
    <body>
        <div class="navbar-header">
            <a class="navbar-brand">iServices</a>
        </div>
        <div class="container">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#servicos" aria-controls="servicos" data-toggle="tab" role="tab">Buscar Serviços</a></li>
                <li role="presentation"><a href="#historico" aria-controls="historico" data-toggle="tab" role="tab">Histórico</a></li>
                <li role="presentation"><a href="#contratos" aria-controls="contratos" data-toggle="tab" role="tab">Serviços Contratados</a></li>
                <li class="navbar-right"><a href=""  id="dropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seja bem vindo, <?=$recebeu;?>!</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown" href="#">Meu Perfil</a></li>
                        <li><a class="dropdown" href="#">Contratos</a></li>
                        <li><a class="dropdown" href="/iservices/functions/validacao.php?act=logout">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="servicos">
                <div class="row">
                    <div class="col-md-5">
                        <h2>Serviços</h2>&nbsp
                    </div>
                </div>
                
                <?php
                $servicos = carregaServicoUsuario($conexao);
                foreach ($servicos as $recebe) {

                ?>
                <div class="columns col-lg-4">
                    <ul class="price">
                        <li class="header" style="background-color:#4CAF50"><?=$recebe['nome'];?></li>
                        <li class="grey"><?=$recebe['idServico'];?></li>
                        <li class="grey"><?=$recebe['tiposervico'];?></li>
                        <li class="grey">R$<?=$recebe['valor'];?></li>
                        <li><?=$recebe['descricao'];?></li>
                        <li class="grey"><a href="contratar.php?id=<?=$recebe['idServico'];?>" class="button">Contratar</a></li>
                    </ul>
                </div>
                <?php } ?>
                <div id="bottom" class="row">
                    <div class="col-md-12">
                        <ul class="pagination">
                            <li class="disabled"><a>&lt; Anterior</a></li>
                            <li class="disabled"><a>1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
                        </ul>
                        <!-- /.pagination -->
                    </div>
                </div>
                <!-- /#bottom -->
            </div>
            <div class="tab-pane"  id="contratos">
                <div class="row">
                    <div class="col-md-3">
                        <h2>Serviços Contratados</h2>
                    </div>
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>Contrato</th>
                                    <th>Tipo de Serviço</th>
                                    <th>Preço</th>
                                    <th>Descrição</th>
                                    <th>Prestador</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                    <th class="actions">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contratos = carregaContrato($conexao);
                                foreach ($contratos as $recebeContrato) {

                                ?>

                                <tr>
                                    <td><?=$recebeContrato['idContrato'];?></td>
                                    <td><?=$recebeContrato['tiposervico'];?></td>
                                    <td>R$<?=$recebeContrato['valor'];?></td>
                                    <td><?=$recebeContrato['descricao'];?></td>
                                    <td><?=$recebeContrato['nome'];?></td>
                                    <td><?=$recebeContrato['telefone'];?></td>                           
                                    <td><?=$recebeContrato['status'];?></td>
                                    <td class="actions">
                                        <?php
                                        if($recebeContrato['status'] == "Concluido" ){
                                        $disabledC = "Disabled";
                                        $disabledP = "Disabled";
                                        $disabledA = "";
                                        $btnPagamento = "Concluido";
                                        $fncButao = "concluido";
                                        }elseif($recebeContrato['status'] == "Pago"){
                                        $disabledC = "";
                                        $disabledP = "Disabled";
                                        $disabledA = "Disabled";
                                        $btnPagamento = "Pagamento";
                                        $fncButao = "pagamento";
                                        }elseif($recebeContrato['status'] == "Avaliado"){
                                        $disabledC = "Disabled";
                                        $disabledP = "";
                                        $disabledA = "Disabled";
                                        $btnPagamento = "Concluido";
                                        $fncButao = "concluido";
                                        }elseif($recebeContrato['status'] == "Solicitado"){
                                        $disabledC = "";
                                        $disabledP = "Disabled";
                                        $disabledA = "Disabled";
                                        $btnPagamento = "Pagamento";
                                        $fncButao = "pagamento";
                                        }else{
                                        $disabledC = "";
                                        $disabledP = "";
                                        $disabledA = "Disabled";
                                        $btnPagamento = "Pagamento";
                                        $fncButao = "pagamento";
                                        }
                                        ?>  
                                        <a href="cancelar.php?id=<?=$recebeContrato['idContrato'];?>" class="btn btn-danger"  <?=$disabledC;?>>Cancelar</a>
                                        <a href="<?=$fncButao;?>.php?id=<?=$recebeContrato['idContrato'];?>" class="btn btn-primary" <?=$disabledP;?>><?=$btnPagamento;?></a>
                                        <a href="avaliar.php?id=<?=$recebeContrato['idContrato'];?>" class="btn btn-success" <?=$disabledA;?>>Avaliar</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="bottom" class="row">
                    <div class="col-md-12">
                        <ul class="pagination">
                            <li class="disabled"><a>&lt; Anterior</a></li>
                            <li class="disabled"><a>1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
                        </ul>
                        <!-- /.pagination -->
                    </div>
                </div>
                <!-- /#bottom -->
            </div>
            <div class="tab-pane"  id="historico">
                <div class="row">
                    <div class="col-md-3">
                        <h2>Hstórico de Contratos</h2>
                    </div>
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>Contrato</th>
                                    <th>Tipo de Serviço</th>
                                    <th>Preço</th>
                                    <th>Descrição</th>
                                    <th>Prestador</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contratos = carregaHistoricoUsuario($conexao);
                                foreach ($contratos as $recebeContrato) {

                                ?>

                                <tr>
                                    <td><?=$recebeContrato['idContrato'];?></td>
                                    <td><?=$recebeContrato['tiposervico'];?></td>
                                    <td>R$<?=$recebeContrato['valor'];?></td>
                                    <td><?=$recebeContrato['descricao'];?></td>
                                    <td><?=$recebeContrato['nome'];?></td>
                                    <td><?=$recebeContrato['telefone'];?></td>                           
                                    <td><?=$recebeContrato['status'];?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="bottom" class="row">
                    <div class="col-md-12">
                        <ul class="pagination">
                            <li class="disabled"><a>&lt; Anterior</a></li>
                            <li class="disabled"><a>1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
                        </ul>
                        <!-- /.pagination -->
                    </div>
                </div>
                <!-- /#bottom -->
            </div>
        </div>
        
                <script src="http://code.jquery.com/jquery-latest.js"></script>
                <script src="/iservices/js/bootstrap.min.js"></script>
                </body>
                </html>