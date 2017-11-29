<?php
   include("../functions/funcoes.php");
   $recebeu = recebeNomeUsuario($conexao);
?>
<!DOCTYPE html">
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Delivery de serviços | Entrega de serviços online | Peça iServices</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="navbar-header">
        <a href="http://localhost:8080/iservices/index.php" target="_blank" class="navbar-brand"> 
            <i class="glyphicon glyphicon-home"></i>&nbspiServices
        </a>
    </div>
    <div class="container">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active">
                <a href="#servicos" aria-controls="servicos" data-toggle="tab" role="tab">Buscar Serviços</a>
            </li>
            <li role="presentation">
                <a href="#historico" aria-controls="historico" data-toggle="tab" role="tab">Histórico</a>
            </li>
            <li role="presentation">
                <a href="#contratos" aria-controls="contratos" data-toggle="tab" role="tab">Serviços Contratados</a>
            </li>
            <li role="presentation">
                <a href="#favoritos" aria-controls="favoritos" data-toggle="tab" role="tab">Favoritos</a>
            </li>
            <li class="navbar-right">
                <a href="" id="dropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-user"></i>&nbspSeja bem vindo, <?=$recebeu;?>!
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown" href="#funcao-construcao-modal" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i>&nbspMeu Perfil</a></li>
                    <li><a class="dropdown" href="#contratos" data-toggle="tab"><i class="glyphicon glyphicon-file"></i>&nbspContratos</a></li>
                    <li><a class="deslogar dropdown" href="#"><i class="glyphicon glyphicon-off"></i>&nbspSair</a></li>
                </ul>
            </li>
        </ul>
    </div>
    </div>
    </div>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="servicos">
            <div class="container" style="margin-top: 2px;">
                <div class="row">
                    <div class="panel panel-primary panel-table animated slideInDown">
                        <div class="panel-heading" style="padding: 37px;">
                            <div class="row">
                                <div class="col col-xs-12 text-center">
                                    <h1 class="panel-title">Serviços</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12" id="tab-servicos-usuario">
                            <table class="table table-striped table-bordered table-list" cellspacing="0" cellpadding="0" id="tab-servicos">
                                <thead>
                                    <tr>
                                        <th>Prestador</th>
                                        <th>Contato</th>
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
                                            <img src="../img/foto.jpg"> <?=$recebe['nome'];?>
                                        </td>
                                        <td>
                                            <?=$recebe['telefone'];?>
                                        </td>
                                        <td class= "td-carrega-servico">
                                            <?=$recebe['idServico'];?>
                                        </td>
                                        <td>
                                            <?=$recebe['tiposervico'];?>
                                        </td>
                                        <td>R$ <?=$recebe['valor'];?>
                                        </td>
                                        <td class="actions" align="center">
                                            <a href="#" class="contrata-servico"
                                            data-toggle="modal"
                                            data-target="#contratacao-modal"
                                            data-balao="tooltip"
                                            title="Clicando neste botão você estará contratando o serviço."
                                            data-name="<?=$recebe['tiposervico'];?>"
                                            data-valor="<?=$recebe['valor'];?>"
                                            data-id="<?=$recebe['idServico'];?>"> 
                                            <i class="fa fa-handshake-o" id="icon-contratacao"></i>
                                            </a>&nbsp

                                            <a href="#" class="favoritos-usuario"
                                            data-balao="tooltip"
                                            title="Clicando neste botão você estará inserindo o prestador/serviço como favoritos."
                                            data-idCliente="<?=$recebe['idCliente'];?>"
                                            data-idservico="<?=$recebe['idServico'];?>"
                                            data-favorito="<?=$recebe['adicionado'];?>">
                                                <i class="glyphicon glyphicon-heart" id="icon-favoritos"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <button  class="btn-detalhe-buscar-servicos btn btn-default"
                                            data-balao="tooltip"
                                            title="Clicando neste botão você estará visualizando os detalhes do serviço."                                            
                                            data-idservico="<?=$recebe['idServico'];?>"
                                            data-tiposervico="<?=$recebe['tiposervico'];?>"
                                            data-preco="<?=$recebe['valor']?>"
                                            data-descricao="<?=$recebe['descricao'];?>"
                                            data-name="<?=$recebe['nome'];?>"
                                            data-tel="<?=$recebe['telefone'];?>"
                                            data-horarioinicial="<?=$recebe['horarioInicial'];?>"
                                            data-horariofinal="<?=$recebe['horarioFinal'];?>"
                                            data-diainicial="<?=$recebe['diaInicial'];?>"
                                            data-diafinal="<?=$recebe['diaFinal'];?>"
                                            data-check="<?=$recebe['checkClicado'];?>">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            </button>
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
        <div role="tabpanel" class="tab-pane" id="contratos">
            <div class="container" style="margin-top: 2px;">
                <div class="row">
                    <div class="panel panel-primary panel-table animated slideInDown">
                        <div class="panel-heading" style="padding: 37px;">
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
                                        <th>Detalhes</th>
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
                                        <td>R$ <?=$recebeContrato['preco'];?>
                                        </td>
                                        <td class="statusUsuario" data-name="<?=$recebeContrato['status'];?>">
                                            <?=$recebeContrato['status'];?>
                                        </td>
                                        <td class="actions">
                                            <button class="cancelar-proposta btn btn-default" id="btnRejeitar"
                                                data-target="#cancelar-servico-modal" data-balao="tooltip"
                                                title="Clicando neste botão você estará cancelando a proposta de serviço."
                                                data-status="<?=$recebeContrato['status'];?>"
                                                data-idcontrato="<?=$recebeContrato['idContrato'];?>">
                                                <i class="glyphicon glyphicon-remove icon-remove" id="btn-rejeitar"></i>
                                            </button>
                                            <button class="avaliar-prestador btn btn-default"
                                                data-balao="tooltip"
                                                title="Clicando neste botão você estará avaliando o prestador de serviço."
                                                data-idcontrato="<?=$recebeContrato['idContrato'];?>"
                                                data-idcliente="<?=$recebeContrato['idCliente'];?>"
                                                data-nomeprestador="<?=$recebeContrato['nome']?>"
                                                data-status="<?=$recebeContrato['status'];?>">
                                                <i class="glyphicon glyphicon-star"></i>
                                            </button>
                                            <button class="btn-pagamento btn btn-default"
                                                data-balao="tooltip"
                                                title="Clicando neste botão você estará selecionando a forma de pagamento do serviço."
                                                data-id="<?=$recebeContrato['idContrato'];?>"
                                                data-status="<?=$recebeContrato['status'];?>"
                                                data-name="<?=$recebeContrato['nome'];?>"
                                                data-tel="<?=$recebeContrato['telefone'];?>"
                                                data-servico="<?=$recebeContrato['tiposervico'];?>"
                                                data-status="<?=$recebeContrato['status'];?>">
                                                <i class="fa fa-money" style="font-size: 20px"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="detalhe-contrato-tab-servico-usuario btn btn-default"
                                            data-balao="tooltip"
                                            title="Clicando neste botão você estará verificando todos os detalhes do contrato."
                                            data-idcontrato="<?=$recebeContrato['idContrato'];?>"
                                            data-tiposervico="<?=$recebeContrato['tiposervico'];?>"
                                            data-preco="<?=$recebeContrato['preco'];?>"
                                            data-status="<?=$recebeContrato['status'];?>" 
                                            data-name="<?=$recebeContrato['nome'];?>"                                            
                                            data-tel="<?=$recebeContrato['telefone'];?>"
                                            data-descricao="<?=$recebeContrato['descricao'];?>"
                                            data-horainicial="<?=$recebeContrato['horarioInicial'];?>"
                                            data-horafinal="<?=$recebeContrato['horarioFinal'];?>"
                                            data-diainicial="<?=$recebeContrato['diaFinal'];?>"
                                            data-diafinal="<?=$recebeContrato['diaInicial'];?>"
                                            data-inicial="<?=$recebeContrato['dataInicial'];?>"
                                            data-final="<?=$recebeContrato['dataFinal'];?>"
                                            data-check="<?=$recebeContrato['checkClicado'];?>">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            </button>
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
        <div role="tabpanel" class="tab-pane" id="historico">
            <div class="container" style="margin-top: 2px;">
                <div class="row">
                    <div class="panel panel-primary panel-table animated slideInDown">
                        <div class="panel-heading" style="padding: 10px;">
                            <div class="row">
                                <div class="col col-xs-12 text-center">
                                    <h1 class="panel-title">Histórico</h1>
                                    <a href="#funcao-construcao-modal" data-toggle="modal" class="btn btn-info pull-right h1"> <i
                                        class="glyphicon glyphicon-print"></i>&nbspGerar Relatório
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
                                        <th>Preço do Serviço</th>
                                        <th>Preço Pago</th>
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
                                        <td>R$ <?=$recebeContrato['valor'];?>
                                        </td>
                                        <td>R$ <?=$recebeContrato['pgto'];?>
                                        </td>
                                        <td>
                                            <?=$recebeContrato['nome'];?>
                                        </td>
                                        <td>
                                            <?=$recebeContrato['telefone'];?>
                                        </td>
                                        <td class="statusUsuario" data-name="<?=$recebeContrato['status'];?>">
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
        <div role="tabpanel" class="tab-pane" id="favoritos">
            <div class="container" style="margin-top: 2px;">
                <div class="row">
                    <div class="panel panel-primary panel-table animated slideInDown">
                        <div class="panel-heading" style="padding: 37px;">
                            <div class="row">
                                <div class="col col-xs-12 text-center">
                                    <h1 class="panel-title">Favoritos</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">
                            <table class="table table-striped table-bordered table-list" cellspacing="0" cellpadding="0" id="tab-favoritos">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>Ações</th>
                                        <th>Serviço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $favoritos = recebeFavoritos($conexao);
                                            foreach ($favoritos as $recebeContrato) {
                                            
                                    ?>
                                    <tr>
                                        <td>
                                            <?=$recebeContrato['nome'];?>
                                        </td>
                                        <td>
                                            <?=$recebeContrato['telefone'];?>
                                        </td>
                                        <td align="center">
                                            <a href="#" class="btn-contratar-favorito"
                                            data-balao="tooltip"
                                            title="Clicando neste botão você estará contratando o serviço."
                                            data-toggle="modal" data-target="#contratacao-modal-favorito"
                                            data-name="<?=$recebeContrato['tiposervico'];?>"
                                            data-valor="<?=$recebeContrato['valor'];?>"
                                            data-id="<?=$recebeContrato['idServico'];?>"> 
                                            <i class="fa fa-handshake-o" id="icon-contratacao"></i>                                                
                                            </a>
                                        </td>
                                        <td>
                                            <?=$recebeContrato['tiposervico'];?>
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
    </div>
        <!--Modal de avaliação do serviço-->
        <div class="modal fade" id="avaliacao-modal" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Avaliação do prestador de serviço</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="modal-body-pontuacao">
                        <div class="form">
                            <p class="salute"><?=$recebeu;?>, tudo bem?</p>
                            <p class="question">Em uma escala de 0 a 10, o quanto você avaliaria o serviço prestado pelo 
                                <span name="nome-prestador-avaliacao" style="font-weight: bold"></span>?
                            </p>
                        </div>
                        <div class="row row-nps">
                            <div class="col-xs-1">
                                <div class="score score-0" data-score="0">0</div>
                            </div>
                            <div class="col-xs-1">
                                <div class="score score-1" data-score="1">1</div>
                            </div>
                            <div class="col-xs-1">
                                <div class="score score-2" data-score="2">2</div>
                            </div>
                            <div class="col-xs-1">
                                <div class="score score-3" data-score="3">3</div>
                            </div>
                            <div class="col-xs-1">
                                <div class="score score-4" data-score="4">4</div>
                            </div>
                            <div class="col-xs-1">
                                <div class="score score-5" data-score="5">5</div>
                            </div>
                            <div class="col-xs-1">
                                <div class="score score-6" data-score="6">6</div>
                            </div>
                            <div class="col-xs-1">
                                <div class="score score-7" data-score="7">7</div>
                            </div>
                            <div class="col-xs-1">
                                <div class="score score-8" data-score="8">8</div>
                            </div>
                            <div class="col-xs-1">
                                <div class="score score-9" data-score="9">9</div>
                            </div>
                            <div class="col-xs-1">
                                <div class="score score-10" data-score="10">10</div>
                            </div>
                        </div>
                    </div>
                    <div id="modal-body-comentario">
                        <div>
                            <button class="btn-voltar-avaliacao btn btn-primary"
                                data-toggle="tooltip" title="Clique para voltar.">
                                <i class="glyphicon glyphicon-arrow-left"></i>
                            </button>
                        </div>
                        <div class="avaliacao-comentario">
                            <p class="questao">Em poucas palavras, descreva o que motivou sua nota 
                                <span class="select-score badge score"></span>? 
                                <span style="color: #888; font-size: 10px;">(opcional)</span>
                            </p>
                            <textarea class="justification" id="message-text"></textarea>
                            <span class="idcontrato-avaliacao" name="idcontrato-avaliacao" style="display: none;"></span>  
                            <span class="idcliente-avaliacao" name="idcliente-avaliacao" style="display: none;"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="avaliando-prestador" name="avaliando-prestador" value="avaliando">
                                <i class="glyphicon glyphicon-thumbs-up"></i>&nbspAvaliar
                            </button>
                        </div>
                    </div>
                    <div id="modal-body-agradecimento" class="step3" style="display: block;">
                        <p class="thanks"><?=$recebeu;?>, obrigado!</p>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal de pagamento do serviço-->
        <div class="modal fade" id="pagamento-modal" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pagamento do prestador de serviço</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="detalhes-modal-pagamento">
                        Contrato do serviço: <span class="contrato"></span></br> 
                        Status: <span class="status"></span></br> 
                        Prestador de serviço: <span class="nome-prestador"></span></br> 
                        Telefone: <span class="telefone"></span></br>
                        Serviço: <span class="servico"></span></br></br> 
                        <label>Preço à ser pago: R$</label> 
                        <input class="form-control" id="input-preco-pagamento" name="input-preco-pagamento">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox6" type="checkbox" class="verifica-forma-pagamento" value="0"> 
                            <label for="checkbox6">Cartão de crédito</label>&nbsp 
                            <i class="glyphicon glyphicon-credit-card" style="font-size: 20px"></i>
                        </div>
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox12" type="checkbox" class="verifica-forma-pagamento" value="1"> 
                            <label for="checkbox12">Cartão de débito</label>&nbsp 
                            <i class="glyphicon glyphicon-credit-card" style="font-size: 20px"></i>
                        </div>
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox7" type="checkbox" class="verifica-forma-pagamento" value="2"> 
                            <label for="checkbox7">Dinheiro</label>&nbsp 
                            <i class="fa fa-money" style="font-size: 20px"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn-confirmar-pagamento btn btn-primary" value="btn-confirmar-pagamento">
                            <i class="glyphicon glyphicon-thumbs-up"></i>&nbspConfirmar Pagamento
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-thumbs-down"></i>&nbspCancelar
                        </button>
                        </br>
                        </br>
                        <div id="carregando-modal-confirma-pagamento" align="center">
                            <img src="../img/carregando.gif"></br><span name="carregamento-pagamento">Confirmando Pagamento</span>
                        </div>
                    </div>
                    <div class="alert alert-warning" id="alert-warning-confirma-pagamento">
                        <a href="#" class="close" aria-label="close">&times;</a> 
                        <strong>Atenção!</strong> Selecione uma forma de pagamento.
                    </div>
                    <div class="alert alert-warning" id="alert-warning-confirma-pagamento-preco">
                        <a href="#" class="close" aria-label="close">&times;</a> 
                        <strong>Atenção!</strong> Informe o valor de pagamento.
                    </div>
                    <div class="alert alert-success" id="alert-success-confirma-pagamento">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Sucesso!</strong> Pagamento efetuado.
                    </div>
                    <div class="alert alert-danger" id="alert-danger-cancelar-servico">
                        <a href="#" class="close" aria-label="close">&times;</a>
                        <strong>Error!</strong> Ocorreu uma inconsistência ao efetuar o pagamento.
                    </div>                    
                </div>
            </div>
        </div>
        <!-- Modal para cancelar serviço-->
        <div class="modal fade" id="cancelar-servico-modal" tabindex="-1"
            role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalLabel">Cancelar Item</h4>
                    </div>
                    <div class="modal-body">
                        Deseja realmente cancelar o serviço? <span class="cancela-idcontrato" style="display: none;"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="" value="btn-sim-cancela-servico-usuario" class="btn-sim-cancela-servico-usuario btn btn-primary"> 
                            <i class="glyphicon glyphicon-thumbs-up"></i>&nbspSim
                        </button> 
                        <button href="#" type="button" class="btn btn-default" data-dismiss="modal"> 
                            <i class="glyphicon glyphicon-thumbs-down"></i>&nbspN&atilde;o
                        </button>
                        <div id="carregando-modal-cancelar-servico-usuario" align="center">
                            <img src="../img/carregando.gif"></br><span>Cancelando Serviço</span>
                        </div>                    
                    </div>
                    <div class="alert alert-warning" id="alert-warning-cancelar-servico-usuario">
                        <a href="#" class="close" aria-label="close">&times;</a> 
                        <strong>Atenção!</strong> Não foi possível cancelar o serviço, pois o mesmo já foi "Aceito" pelo prestador.
                    </div>
                    <div class="alert alert-success" id="alert-success-cancelar-servico-usuario">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Sucesso!</strong> Serviço cancelado.
                    </div>
                    <div class="alert alert-danger" id="alert-danger-cancelar-servico-usuario">
                        <a href="#" class="close" aria-label="close">&times;</a>
                        <strong>Error!</strong> Ocorreu uma inconsistência ao aceitar o serviço.
                    </div>
                </div>
            </div>
        </div>
        <!--Modal de contratação de serviço-->
        <div class="modal fade" id="contratacao-modal" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="container">
                            <ul class="nav nav-tabs" id="menu-modal-contratacao" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#tab-informacoes" arial-controls="" data-toggle="tab" role="tab">Informações</a>
                                </li>
                                <li role="presentation">
                                    <a href="#tab-detalhes" arial-controls="" data-toggle="tab" role="tab">Detalhes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab-informacoes">
                            <div class="modal-body">
                                <form>
                                    <div class="form">
                                        Nome do Serviço: <span id="recebe-nome-servico" readonly="true"></span></br>
                                        Preço do Serviço: R$<span id="recebe-valor-servico" name="recebe-preco-servico" readonly="true"></span>
                                        <div id="div-recebe-id-servico">
                                            <label for="id-servico" class="col-form-label">Id:</label> 
                                            <span name="recebe-id-servico" id="recebe-id-servico" name="recebe-id-servico"></span>
                                        </div>
                                    </div>
                                    </br>
                                    <div class="form-check-label">
                                        <label class="form-check-label"> 
                                            <input type="checkbox" class="form-check-input" id="check-endcadastrado"> Endereço cadastrado
                                        </label></br> 
                                        <label class="form-check-label"> 
                                            <input type="checkbox" class="form-check-input" id="check-enddiferentecadastro"> Endereço diferente do cadastrado
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
                                        <textarea class="form-control" id="message-text"
                                            name="messagem-text-termo">O contrato de prestação de serviços foi criado para garantir os direitos e deveres dos profissionais que pretendem prestar serviços na condição de autônomos, como também defender os direitos e deveres dos contratantes.
                                        </textarea>
                                    </div>
                                    <label class="form-check-label">
                                        <input type="checkbox" id="check-termo"> Li e concordo com os termos e condições</label>
                                </form>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab-detalhes">
                            <div class="modal-body">
                                <form>
                                    <div class="form">
                                        <label for="message-text" class="col-form-label">Detalhamento da ocorrência:</label>
                                        <textarea class="form-control" id="message-text"
                                            placeholder="Digite aqui o detalhamento da sua ocorrência..." name="detalhes-modal-contratar">
                                        </textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"
                            id="btn-contratar-modal" name="btn-contratar-modal"
                            value="Contratar">
                            <i class="glyphicon glyphicon-ok"></i>&nbspContratar
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-remove"></i>&nbspCancelar
                        </button>
                        </br>
                        <div id="carregando-modal-contratar" align="center">
                            <img src="../img/carregando.gif"></br><span>Contratando Serviço</span>
                        </div>
                    </div>
                    <div class="alert alert-warning" id="alert-warning-contratar">
                        <a href="#" class="close" aria-label="close">&times;</a> 
                        <strong name="alert-warning-contratar">Atenção!</strong> Selecione uma modalidade de endereço.
                    </div>                    
                    <div class="alert alert-success" id="alert-success-contratar">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Sucesso!</strong> Serviço contratado.
                    </div>
                </div>
            </div>
        </div>
        <!--Modal de contratação de serviço pela tab Favoritos-->
        <div class="modal fade" id="contratacao-modal-favorito" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="container">
                            <ul class="nav nav-tabs" id="menu-modal-contratacao-favorito" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#tab-informacoes-favorito" arial-controls="" data-toggle="tab" role="tab">Informações</a>
                                </li>
                                <li role="presentation">
                                    <a href="#tab-detalhes-favorito" arial-controls="" data-toggle="tab" role="tab">Detalhes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab-informacoes-favorito">
                            <div class="modal-body">
                                <form>
                                    <div class="form">
                                        Nome do Serviço: <span id="recebe-nome-servico-favorito" readonly="true"></span></br>
                                        Preço do Serviço: R$<span id="recebe-valor-servico-favorito" name="recebe-preco-servico-favorito" readonly="true"></span>
                                        <div id="div-recebe-id-servico-favorito">
                                            <label for="id-servico-favorito" class="col-form-label">Id:</label> 
                                            <span name="recebe-id-servico-favorito" id="recebe-id-servico-favorito" name="recebe-id-servico-favorito"></span>
                                        </div>
                                    </div>
                                    </br>
                                    <div class="form-check-label">
                                        <label class="form-check-label"> 
                                            <input type="checkbox" class="form-check-input" id="check-endcadastrado-favorito"> Endereço cadastrado
                                        </label></br> 
                                        <label class="form-check-label"> 
                                            <input type="checkbox" class="form-check-input" id="check-enddiferentecadastro-favorito"> Endereço diferente do cadastrado
                                        </label>
                                        <div id="form-enddiferente-favorito">
                                            <label for="rua">Av/Rua:</label> 
                                            <input type="text" name="rua-favorito" id="rua-favorito" class="form-control"></input> 
                                            <label for="numero">Número:</label> 
                                            <input type="text" name="numero-favorito" id="numero-favorito" class="form-control"></input> 
                                            <label for="complemento">Complemento:</label> 
                                            <input type="text" name="complemento-favorito" class="form-control"></input> 
                                            <label for="bairro">Bairro:</label> 
                                            <input type="text" name="bairro-favorito" id="bairro-favorito" class="form-control"></input> 
                                            <label for="cidade">Cidade:</label> 
                                            <input type="text" name="cidade-favorito" id="cidade-favorito" class="form-control"></input>
                                        </div>
                                    </div>
                                    </br>
                                    <div class="form">
                                        <label for="message-text" class="col-form-label">Termo</label>
                                        <textarea class="form-control" id="message-text-favorito"
                                            name="messagem-text-termo-favorito">O contrato de prestação de serviços foi criado para garantir os direitos e deveres dos profissionais que pretendem prestar serviços na condição de autônomos, como também defender os direitos e deveres dos contratantes.
                                        </textarea>
                                    </div>
                                    <label class="form-check-label">
                                        <input type="checkbox" id="check-termo-favorito"> Li e concordo com os termos e condições</label>
                                </form>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab-detalhes-favorito">
                            <div class="modal-body">
                                <form>
                                    <div class="form">
                                        <label for="message-text" class="col-form-label">Detalhamento da ocorrência</label>
                                        <textarea class="form-control" id="message-text-favorito"
                                            placeholder="Digite aqui o detalhamento da sua ocorrência..." name="detalhes-modal-contratar-favorito">
                                        </textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"
                            id="btn-contratar-modal-favorito" name="btn-contratar-modal-favorito"
                            value="Contratar">
                            <i class="glyphicon glyphicon-ok"></i>&nbspContratar
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-remove"></i>&nbspCancelar
                        </button>
                        </br>
                        <div id="carregando-modal-contratar-favorito" align="center">
                            <img src="../img/carregando.gif"></br><span>Contratando Serviço</span>
                        </div>
                    </div>
                    <div class="alert alert-warning" id="alert-warning-contratar-favorito">
                        <a href="#" class="close" aria-label="close">&times;</a> 
                        <strong>Atenção!</strong> Selecione uma modalidade de endereço.
                    </div>
                    <div class="alert alert-success" id="alert-success-contratar-favorito">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Sucesso!</strong> Serviço contratado.
                    </div>
                </div>
            </div>
        </div>
        <!--Modal de detalhes do produto atendimento 24hrs-->
        <div class="modal fade" id="detalhes-modal-comercial" tabindex="-1"
            role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalLabel">Detalhamento do Contrato</h4>
                    </div>
                    <div class="modal-body" id="corpo-detalhe-servico-usuario-dois">                        
                        Número de contrato: <span name="numero-contrato-dois"></span></br>
                        Tipo de serviço: <span name="tipo-servico-contrato-dois"></span></br>
                        Preço do serviço: <span name="preco-servico-contrato-dois"></span></br>
                        Status do serviço: <span name="status-servico-contrato-dois"></span></br>                        
                        Nome do prestador de serviço: <span name="nome-prestador-dois"></span></br>
                        Telefone: <span name="telefone-prestador-dois"></span></br> 
                        Descrição do serviço: <span name="descricao-servico-prestador-dois"></span></br> 
                        Atendimento: De: <span name="horario-inicial-atendimento-detalhes-dois"></span> 
                        às <span name="horario-final-atendimento-detalhes-dois"></span>
                        / De: <span name="dia-inicial-atendimento-detalhes-dois"></span>
                        à <span name="dia-final-atendimento-detalhes-dois"></span></br>
                        Data inicial para realização do serviço: <span name="data-inicial-horario-servico-dois"></span></br>
                        Data final da realização do serviço: <span name="data-final-horario-servico-dois"></span>
                    </div>
                    <div class="modal-footer">
                        <a type="button" name="" class="btn btn-primary" data-dismiss="modal"> 
                            <i class="glyphicon glyphicon-thumbs-up"></i>&nbspOK
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal de detalhes do produto atendimento dentro do horário comercial-->
        <div class="modal fade" id="detalhes-modal-vintequatro" tabindex="-1"
            role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalLabel">Detalhamento do Contrato</h4>
                    </div>
                    <div class="modal-body" id="corpo-detalhe-servico-usuario">                        
                        Número de contrato: <span name="numero-contrato"></span></br>
                        Tipo de serviço: <span name="tipo-servico-contrato"></span></br>
                        Preço do serviço: <span name="preco-servico-contrato"></span></br>
                        Status do serviço: <span name="status-servico-contrato"></span></br>                        
                        Nome do prestador de serviço: <span name="nome-prestador"></span></br>
                        Telefone: <span name="telefone-prestador"></span></br> 
                        Descrição do serviço: <span name="descricao-servico-prestador"></span></br> 
                        Atendimento: <span name="horario-atendimento-detalhes"></span>
                        De: <span name="dia-atendimento-detalhes"></span></span></br>
                        Data inicial para realização do serviço: <span name="data-inicial-horario-servico"></span></br>
                        Data final da realização do serviço: <span name="data-final-horario-servico"></span>
                    </div>
                    <div class="modal-footer">
                        <a type="button" name="" class="btn btn-primary" data-dismiss="modal"> 
                            <i class="glyphicon glyphicon-thumbs-up"></i>&nbspOK
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para visualizar e aceitação do cadastro de serviço atendimento definido -->
        <div id="modal-visualizacao-usuario-buscar-servico" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div align="center">
                            <img src="../img/logo.png" alt="Logo da empresa"></img>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div id="dados-visualizacao-servico">
                            Identificador do serviço: <span name="visualizacao-id-servico-usuario-buscar-servico"></span></br>
                            Tipo de Serviço: <span name="visualizacao-tipo-servico-usuario-buscar-servico"></span></br>
                            Preço do Serviço: <span name="visualizacao-valor-servico-usuario-buscar-servico"></span></br>
                            Descrição: <span name="visualizacao-descricao-servico-usuario-buscar-servico"></span></br>
                            Prestador: <span name="visualizacao-prestador-servico-usuario-buscar-servico"></span></br>
                            Telefone: <span name="visualizacao-telefone-servico-usuario-buscar-servico"></span></br>
                            Atendimento: De: <span name="visualizacao-horainicial-servico-usuario-buscar-servico"></span>
                            às <span name="visualizacao-horafinal-servico-usuario-buscar-servico"></span>
                            / De: <span name="visualizacao-diainicial-servico-usuario-buscar-servico"></span>
                            à <span name="visualizacao-diafinal-servico-usuario-buscar-servico"></span></br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para visualizar o serviço atendimento urgência -->
        <div id="modal-visualizacao-usuario-buscar-servico-dois" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div align="center">
                            <img src="../img/logo.png" alt="Logo da empresa"></img>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div id="dados-visualizacao-servico">
                            Identificador do serviço: <span name="visualizacao-id-servico-usuario-buscar-servico-dois"></span></br> 
                            Tipo de Serviço: <span name="visualizacao-tipo-servico-usuario-buscar-servico-dois"></span></br> 
                            Preço do Serviço: <span name="visualizacao-valor-servico-usuario-buscar-servico-dois"></span></br> 
                            Descrição: <span name="visualizacao-descricao-servico-usuario-buscar-servico-dois"></span></br> 
                            Prestador: <span name="visualizacao-prestador-servico-usuario-buscar-servico-dois"></span></br>
                            Telefone: <span name="visualizacao-telefone-servico-usuario-buscar-servico-dois"></span></br>
                            Atendimento: <span name="visualizacao-horainicial-servico-usuario-buscar-servico-dois"></span> 
                            De: <span name="visualizacao-diainicial-servico-usuario-buscar-servico-dois"></span></span></br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal caso ocorra um erro ao inserir o registro de favoritos-->
        <div id="modal-favorito" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="font-family:Times New Roman; font-size: 17px" align="center">
                        <span style="font-weight: bold; color: red;">Atenção!</span>&nbsp
                        <span class="resultado-favorito"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para funções em construção Cadastro-->
        <div class="modal fade" id="funcao-construcao-modal" tabindex="-1"
            role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Esta função está Inativa, pois a mesma se encontra em fase de desenvolvimento.
                    </div>
                    <div class="modal-footer">
                        <a href="#" type="button" class="btn btn-primary" data-dismiss="modal">OK</a>
                    </div>
                    <div id="retorno"></div>
                </div>
            </div>
        </div>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxaIU8lVDlpJRJcP6xMcx8VXZvxdCmX9c&callback=initMap" async defer></script>
        <script type="text/javascript" src="../js/scripts.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.tracksale.co/tracksale-js/internal/modal.css?v=1.3.4">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
</body>
</html>