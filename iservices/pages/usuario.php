<?php
include("C:XAMPP/htdocs/iservices/conexao/conecta.php");
include("C:XAMPP/htdocs/iservices/functions/funcoes.php");
$recebeu = recebeNomeUsuario($conexao);
?>
<!DOCTYPE html">
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Delivery de serviços | Entrega de serviços online | Peça iServices</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="/iservices/bootstrap/css/bootstrap.min.css" />
        <link rel="shortcut icon" href="/iservices/img/icon_logo.ico">
        <link rel="stylesheet" type="text/css" href="/iservices/css/design.css">
        <link rel="stylesheet" type="text/css" href="/iservices/css/estilo.css">
        <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">  
        <link href="/iservices/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script language="javaScript" type="text/javascript" src="/iservices/js/script.js"></script>
        <style type="text/css">
            table thead tr th {
                font-family: tahoma;
                font-size: 12px;
            }
            table tbody tr td {
                font-family: tahoma;
                font-size: 15px;
            }
        </style>
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

    </div>

</div>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="servicos">
        <div class="container" style="margin-top:2px;">
            <div class="row">
                <div class="panel panel-primary panel-table animated slideInDown">
                    <div class="panel-heading " style="padding:20px;">
                        <div class="row">
                            <div class="col col-xs-12 text-center">
                                <h1 class="panel-title">Serviços</h1>
                            </div>        
                        </div>
                    </div>
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped table-bordered table-list" cellspacing="0" cellpadding="0" id="tab-servicos">
                            <thead>
                                <tr>
                                    <th>Número do Serviço</th>
                                    <th>Tipo de Serviço</th>
                                    <th>Preço</th>
                                    <th>Descrição</th>
                                    <th class="actions">Ações</th>
                                    <th>Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $servicos = carregaServicoUsuario($conexao);
                                foreach ($servicos as $recebe) {

                                ?>

                                <tr>
                                    <td><?=$recebe['idServico'];?></td>
                                    <td><?=$recebe['tiposervico'];?></td>
                                    <td>R$<?=$recebe['valor'];?></td>
                                    <td><?=$recebe['descricao'];?></td>
                                    <td class="actions">
                                        <a data-name="<?=$recebe['tiposervico'];?>"data-id="<?=$recebe['idServico'];?>" class="contrata btn btn-danger" data-toggle="modal"><i class="glyphicon glyphicon-file" ></i>&nbspContratar</a>
                                    </td>                                    
                                    <td><a class="detail-icon" href="#"><i class="glyphicon glyphicon-plus-sign"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div role="tabpanel" class="tab-pane" id="contratos">
        <div class="container" style="margin-top:2px;">
            <div class="row">
                <div class="panel panel-primary panel-table animated slideInDown">
                    <div class="panel-heading " style="padding:20px;">
                        <div class="row">
                            <div class="col col-xs-12 text-center">
                                <h1 class="panel-title">Contratos</h1>
                            </div>        
                        </div>
                    </div>
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped table-bordered table-list" cellspacing="0" cellpadding="0" id="tab-contratos">
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
                                    <th>Detalhe</th>
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
                                    <td><a class="detail-icon" href="#"><i class="glyphicon glyphicon-plus-sign"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="historico">
        <div class="container" style="margin-top:2px;">
            <div class="row">
                <div class="panel panel-primary panel-table animated slideInDown">
                    <div class="panel-heading " style="padding:20px;">
                        <div class="row">
                            <div class="col col-xs-12 text-center">
                                <h1 class="panel-title">Histórico</h1>
                            </div>        
                        </div>
                    </div>
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped table-bordered table-list" cellspacing="0" cellpadding="0" id="tab-historicos">
                            <thead>
                                <tr>
                                    <th>Contrato</th>
                                    <th>Tipo de Serviço</th>
                                    <th>Preço</th>
                                    <th>Descrição</th>
                                    <th>Prestador</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                    <th>Detalhe</th>
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
                                    <td><a class="detail-icon" href="#"><i class="glyphicon glyphicon-plus-sign"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    </div>       
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/iservices/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tab-servicos').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
                }
            });
        });
        $(document).ready(function () {
            $('#tab-historicos').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
                }
            });
        });
        $(document).ready(function () {
            $('#tab-contratos').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
                }
            });
        });
    </script>
</body>
</html>