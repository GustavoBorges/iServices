<?php
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
        <link rel="stylesheet" type="text/css" href="/iservices/css/estilo.css">
        <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="/iservices/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="navbar-header">
            <a href="localhost:8080/iservices/pages/index.php" target="_blank" class="navbar-brand">
                <i class="glyphicon glyphicon-home"></i>&nbspiServices
            </a>
        </div>
        <div class="container">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#servicos" aria-controls="servicos" data-toggle="tab" role="tab">Buscar Serviços</a></li>
                <li role="presentation"><a href="#historico" aria-controls="historico" data-toggle="tab" role="tab">Histórico</a></li>
                <li role="presentation"><a href="#contratos" aria-controls="contratos" data-toggle="tab" role="tab">Serviços Contratados</a></li>
                <li class="navbar-right"><a href="" id="dropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-user"></i>&nbspSeja bem vindo, <?=$recebeu;?>!</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown" href="#"><i class="glyphicon glyphicon-pencil"></i>&nbspMeu Perfil</a></li>
                        <li><a class="dropdown" href="#"><i class="glyphicon glyphicon-file"></i>&nbspContratos</a></li>
                        <li><a class="dropdown" href="/iservices/functions/validacao.php?act=logout"><i class="glyphicon glyphicon-off"></i>&nbspSair</a></li>
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
                            <div class="panel-heading " style="padding:37px;">
                                <div class="row">
                                    <div class="col col-xs-12 text-center">
                                        <h1 class="panel-title">Serviços</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- <div align="center" id="carregamento-pagina-usuario"><img src="/iservices/img/carregamento_pagina.gif"></div>-->
                        <div id="list" class="row">
                            <div class="table-responsive col-md-12" id="tab-servicos-usuario">
                                <table class="table table-striped table-bordered table-list" cellspacing="0" cellpadding="0" id="tab-servicos" >
                                    <thead>
                                        <tr>
                                            <th>Número do Serviço</th>
                                            <th>Tipo de Serviço</th>
                                            <th>Preço</th>
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
                                                <td>
                                                    <?=$recebe['idServico'];?>
                                                </td>
                                                <td>
                                                    <?=$recebe['tiposervico'];?>
                                                </td>
                                                <td>R$
                                                    <?=$recebe['valor'];?>
                                                </td>
                                                <td class="actions">
                                                    <a href="#" data-name="<?=$recebe['tiposervico'];?>" data-valor="<?=$recebe['valor'];?>" data-id="<?=$recebe['idServico'];?>" class="contrata-servico" data-toggle="modal" data-target="#contratacao-modal">
                                                        <i class="fa fa-handshake-o" id="icon-contratacao"></i>
                                                    </a>                                                   
                                                </td>
                                                <td><a class="detail-icon" href="#" data-name="<?=$recebe['nome'];?>" data-tel="<?=$recebe['telefone'];?>" data-descricao="<?=$recebe['descricao'];?>"><i class="glyphicon glyphicon-plus"></i></a></td>
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
                            <div class="panel-heading " style="padding:37px;">
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
                                                <td>
                                                    <?=$recebeContrato['idContrato'];?>
                                                </td>
                                                <td>
                                                    <?=$recebeContrato['tiposervico'];?>
                                                </td>
                                                <td>R$
                                                    <?=$recebeContrato['valor'];?>
                                                </td>
                                                <td>
                                                    <?=$recebeContrato['status'];?>
                                                </td>
                                                <td class="actions">
                                                    <a href="#cancelar-servico-modal" data-toggle="modal" id="btnRejeitar" ><i class="glyphicon glyphicon-remove icon-remove" id="btn-rejeitar"></i></a>
                                                     <a href="" data-toggle="modal" data-target="#avaliacao-modal" data-whatever="<?=$recebeContrato['nome']?>">
                                                        <i class="glyphicon glyphicon-star" id="icon-estrela"></i>
                                                    </a>
                                                    <a href="" class="btn-pagamento" data-toggle="modal" data-id="<?=$recebeContrato['idContrato'];?>" data-status="<?=$recebeContrato['status'];?>" data-name="<?=$recebeContrato['nome'];?>" data-tel="<?=$recebeContrato['telefone'];?>" data-servico="<?=$recebeContrato['tiposervico'];?>"><i class="fa fa-money" style="font-size:20px"></i></a>
                                                </td>
                                                <td><a class="detail-icon" href="#detalhes-modal" data-toggle="modal" data-name="<?=$recebeContrato['nome'];?>" data-descricao="<?=$recebeContrato['descricao'];?>" data-tel="<?=$recebeContrato['telefone'];?>"><i class="glyphicon glyphicon-plus"></i></a></td>
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
                            <div class="panel-heading " style="padding:10px;">
                                <div class="row">
                                    <div class="col col-xs-12 text-center">
                                        <h1 class="panel-title">Histórico</h1>
                                        <a href="" class="btn btn-info pull-right h1">
                                             <i class="glyphicon glyphicon-print"></i>&nbspImprimir Relatório
                                       </a>
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
                                                <td>
                                                    <?=$recebeContrato['idContrato'];?>
                                                </td>
                                                <td>
                                                    <?=$recebeContrato['tiposervico'];?>
                                                </td>
                                                <td>R$
                                                    <?=$recebeContrato['valor'];?>
                                                </td>
                                                <td>
                                                    <?=$recebeContrato['nome'];?>
                                                </td>
                                                <td>
                                                    <?=$recebeContrato['telefone'];?>
                                                </td>
                                                <td>
                                                    <?=$recebeContrato['status'];?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal de avaliação do serviço-->
            <div class="modal fade" id="avaliacao-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Avaliação do prestado de serviço</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form">
                                    <label for="recipient-name" class="col-form-label">Nome do prestador de serviço</label>
                                    <input class="form-control" id="nome-prestador" readonly="true"></input>
                                </div>
                                <div class="form">
                                    <h1 for="recipient-name" class="col-form-label"><img src="/iservices/img/icon-estrela.jpg"></h1>
                                </div>
                                <div class="form">
                                    <label for="message-text" class="col-form-label">Mensagem</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success">
                                <i class="glyphicon glyphicon-thumbs-up"></i>&nbspAvaliar
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="glyphicon glyphicon-thumbs-down"></i>&nbspCancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal de pagamento do serviço-->
            <div class="modal fade" id="pagamento-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pagamento do prestado de serviço</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="detalhes-modal-pagamento">
                            Contrato: <span class="contrato"></span></br>
                            Status: <span class="status"></span></br>
                            Prestador de serviço: <span class="nome-prestador"></span></br>
                            Telefone: <span class="telefone"></span></br>
                            Serviço: <span class="servico"></span></br></br>
                            <label>Preço à ser pago: R$</label>
                            <input class="form-control" id="input-preco-pagamento">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox6" type="checkbox">
                                    <label for="checkbox6">
                                        Cartão de 'crédito
                                    </label>&nbsp
                                    <i class="glyphicon glyphicon-credit-card" style="font-size:20px"></i>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox7" type="checkbox">
                                    <label for="checkbox7">
                                        Dinheiro
                                    </label>&nbsp
                                    <i class="fa fa-money" style="font-size:20px"></i>
                                </div>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success">
                                <i class="glyphicon glyphicon-thumbs-up"></i>&nbspConfirma Pagamento
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="glyphicon glyphicon-thumbs-down"></i>&nbspCancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal para cancelar serviço-->
        <div class="modal fade" id="cancelar-servico-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Cancelar Item</h4>
                    </div>
                    <div class="modal-body">
                        Deseja realmente cancelar o serviço? <span class="nome"></span>
                    </div>
                    <div class="modal-footer">
                        <a type="button" name="" value="" class="btn btn-success">
                            <i class="glyphicon glyphicon-thumbs-up"></i>&nbspSim
                        </a>
                        <a href="#" type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="glyphicon glyphicon-thumbs-down"></i>&nbspN&atilde;o
                        </a>
                    </div>
                </div>
            </div>
        </div>
            <!--Modal de contratação de serviço-->
            <div class="modal fade" id="contratacao-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="container">
                                <ul class="nav nav-tabs" id="menu-modal-contratacao" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab-informacoes" arial-controls="" data-toggle="tab" role="tab">Informações</a></li>
                                    <li role="presentation"><a href="#tab-detalhes" arial-controls="" data-toggle="tab" role="tab">Detalhes</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab-informacoes">
                                <div class="modal-body">
                                    <form>
                                        <div class="form">
                                            <label for="nome-servico" class="col-form-label">Nome do Serviço</label>
                                            <input class="form-control" id="recebe-nome-servico" readonly="true"></input>
                                            <label for="valor-servico" class="col-form-label">Preço do Serviço</label>
                                            <input class="form-control" id="recebe-valor-servico" name="recebe-preco-servico" readonly="true"></input>
                                            <div id="div-recebe-id-servico">
                                            <label for="id-servico" class="col-form-label">Id</label>
                                            <input name="recebe-id-servico" class="form-control" id="recebe-id-servico" name="recebe-id-servico"></input>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="form-check-label">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="check-endcadastrado">
                                                    Endereço cadastrado
                                                </label>
                                                </br>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="check-enddiferentecadastro">
                                                    Endereço diferente do cadastrado
                                                </label>
                                            <div id="form-enddiferente">
                                                <label for="rua">Av/Rua:</label>
                                                <input type="text" name="rua" id="rua" class="form-control"></input>
                                                <label for="numero">Número:</label>
                                                <input type="text" name="numero" id="numero" class="form-control"></input>
                                                <label for="complemento">Complemento:</label>
                                                <input type="text" name="complemento" class="form-control"></input>
                                                <label for="bairro">Bairro:</label>
                                                <input type="text" name="bairro" id="bairro" class="form-control"></input>
                                                <label for="cidade">Cidade:</label>
                                                <input type="text" name="cidade" id="cidade" class="form-control"></input>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="form">
                                            <label for="message-text" class="col-form-label">Termo</label>
                                            <textarea class="form-control" id="message-text" name="messagem-text-termo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi massa eros, fermentum in tincidunt eu, in lobortis sit amet, blandit sed ipsum. Aenean pharetra blandit lorem, quis mattis libero tincidunt in. Nulla vestibulum lobortis vulputate. Praesent sit amet nunc commodo, ultricies nulla eu, vestibulum justo. Maecenas orci dui, mattis sit amet euismod a, placerat ac ante. Integer ornare tortor elit, eu mollis nisl varius ultrices. Maecenas consectetur, ipsum in tincidunt fermentum, est nulla vehicula erat, sed laoreet urna quam a erat. Phasellus feugiat mi vel ante venenatis viverra. Pellentesque ornare tortor non eros aliquam porta. Curabitur pulvinar accumsan dui nec viverra.
                                            </textarea>
                                        </div>
                                        <label class="form-check-label"><input type="checkbox" id="check-termo">
                                         Li e concordo com os termos em condições
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tab-detalhes">
                                <div class="modal-body">
                                    <form>
                                        <div class="form">
                                            <label for="message-text" class="col-form-label">Detalhamento da ocorrência</label>
                                            <textarea class="form-control" id="message-text" placeholder="Digite aqui o detalhamento da sua ocorrência..." name="detalhes-modal-contratar"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btn-contratar-modal" name="btn-contratar-modal" value="Contratar">
                                <i class="glyphicon glyphicon-ok"></i>&nbspContratar
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="glyphicon glyphicon-remove"></i>&nbspCancelar
                            </button>
                            </br>
                            <div id="carregando-modal-contratar" align="center"><img src="/iservices/img/carregando.gif"></br><span>Contratando Serviço</span></div>
                        </div>
                        <div class="alert alert-warning" id="alert-warning">
                            <a href="#" class="close" aria-label="close">&times;</a>
                            <strong>Atenção!</strong> Não foi selecionada nenhuma modalidade de endereço.
                        </div>
                        <div class="alert alert-success" id="alert-success-contratar">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Sucesso!</strong> O seu serviço foi contratado com sucesso.
                        </div>                        
                    </div>
                </div>
            </div>
            <!--Modal de detalhes do produto-->
            <div class="modal fade" id="detalhes-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Detalhamento do contrato</h4>
                    </div>
                    <div class="modal-body">
                        Nome do prestador de serviço: <span class="nome-prestador"></span></br>
                        Telefone: <span class="telefone-prestador"></span></br>
                        Descrição do serviço: <span class="descricao-servico-prestador"></span></br>
                        Horário de atendimento: <span class="horario-atendimento"></span></br>
                        Data e horário para realização do serviço: <span class="data-horario-servico"></span>
                    </div>
                    <div class="modal-footer">
                        <a type="button" name="" class="btn btn-success" data-dismiss="modal">
                            <i class="glyphicon glyphicon-thumbs-up"></i>&nbspOK
                        </a>
                    </div>
                </div>
            </div>
        </div>
            <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="//code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
            <script src="/iservices/js/bootstrap.min.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxaIU8lVDlpJRJcP6xMcx8VXZvxdCmX9c&callback=initMap" async defer></script>
            <script type="text/javascript" src="/iservices/js/scripts.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    </body>

    </html>