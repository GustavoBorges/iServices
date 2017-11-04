<?php
   include("C:XAMPP/htdocs/iservices/conexao/conecta.php");
   include("C:XAMPP/htdocs/iservices/functions/funcoes.php");
   $recebeu = recebeNomeCliente($conexao);
   ?>
    <!DOCTYPE html">
    <html lang="pt-BR">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Delivery de serviços | Entrega de serviços online | Peça iServices</title>
        <link rel="stylesheet" href="/iservices/bootstrap/css/bootstrap.min.css" />
        <link rel="shortcut icon" href="/iservices/img/icon_logo.ico">
        <link rel="stylesheet" type="text/css" href="/iservices/css/switch.css">
        <link rel="stylesheet" type="text/css" href="/iservices/css/estilo.css">
        <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    </head>

    <body>
        <div class="navbar-header">
            <a href="localhost:8080/iservices/pages/index.php" target="_blank" class="navbar-brand">
                <i class="glyphicon glyphicon-home"></i>&nbspiServices
           </a>
        </div>
        <div class="container">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#cadastro" arial-controls="cadastro" data-toggle="tab" role="tab">Serviços</a></li>
                <li role="presentation"><a href="#historico" arial-controls="historico" data-toggle="tab" role="tab">Histórico</a></li>
                <li role="presentation"><a href="#servicoSolicitado" arial-controls="servicoSolicitado" data-toggle="tab" role="tab">Serviços Solicitados</a></li>
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
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="cadastro">
                <div class="container" style="margin-top:2px;">
                    <div class="row">
                        <div class="panel panel-primary panel-table animated slideInDown">
                            <div class="panel-heading " style="padding:10px;">
                                <div class="row">
                                    <div class="col col-xs-12 text-center">
                                        <h1 class="panel-title">Serviços</h1>
                                        <a href="" class="btn btn-info pull-right h1" data-toggle="modal" data-target="#modalCadastro">
                                             <i class="glyphicon glyphicon-plus"></i>&nbspNovo Serviço
                                       </a>
                                    </div>
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
                                        <th>Ativo</th>
                                        <th>Detalhes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                          $servicos = carregaServico($conexao);
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
                                            <td>
                                                <?=$recebe['descricao'];?>
                                            </td>
                                            <td class="actions">
                                                <a href="" class="btn btn-default" data-toggle="modal" data-target="#modal-Visualizacao" data-whatever="<?=$recebe['idServico'];?>" data-whatevertiposervico="<?=$recebe['tiposervico'];?>" data-whateverpreco="<?=$recebe['valor'];?>" data-whateverdescricao="<?=$recebe['descricao'];?>" class="editar"><i class="glyphicon glyphicon-file" ></i></a>
                                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-EditarCadastro" data-whatever="<?=$recebe['idServico'];?>" data-whatevertiposervico="<?=$recebe['tiposervico'];?>" data-whateverpreco="<?=$recebe['valor'];?>" data-whateverdescricao="<?=$recebe['descricao'];?>" class="editar"><i class="glyphicon glyphicon-edit" ></i></a>
                                                <a href="" data-name="<?=$recebe['tiposervico'];?>" data-id="<?=$recebe['idServico'];?>" class="delete btn btn-danger" data-toggle="modal"><i class="glyphicon glyphicon-trash" ></i></a>
                                            </td>                                            
                                            <td>
                                                <label class="switch">
                                                   <input type="checkbox" data-name="<?=$recebe['tiposervico'];?>" class="checkando" data-id="<?=$recebe['idServico'];?>" id="checkando" <?=$recebe['ativo'];?> >
                                                   <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td><a class="detail-icon" href="#"><i class="glyphicon glyphicon-plus"></i></a></td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="servicoSolicitado">
                <div class="container" style="margin-top:2px;">
                    <div class="row">
                        <div class="panel panel-primary panel-table animated slideInDown">
                            <div class="panel-heading " style="padding:37px;">
                                <div class="row">
                                    <div class="col col-xs-12 text-center">
                                        <h1 class="panel-title">Serviços Solicitados</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">
                            <table class="table table-striped table-bordered table-list" cellspacing="0" cellpadding="0" id="tab-servicosSolicitados">
                                <thead>
                                    <tr>
                                        <th>Contrato</th>
                                        <th>Tipo de Serviço</th>
                                        <th>Preço</th>
                                        <th>Descrição</th>
                                        <th>Contratante</th>
                                        <th>Telefone</th>
                                        <th>Status</th>
                                        <th class="actions">Ações</th>
                                        <th>Detalhe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                         $contratosSolicitados = carregarContratoCliente($conexao);
                                         foreach ($contratosSolicitados as $recebe) {
                                         
                                     ?>
                                        <tr>
                                            <td>
                                                <?=$recebe['idContrato'];?>
                                            </td>
                                            <td>
                                                <?=$recebe['tiposervico'];?>
                                            </td>
                                            <td>R$
                                                <?=$recebe['valor'];?>
                                            </td>
                                            <td>
                                                <?=$recebe['descricao'];?>
                                            </td>
                                            <td>
                                                <?=$recebe['nome'];?>
                                            </td>
                                            <td>
                                                <?=$recebe['telefone'];?>
                                            </td>
                                            <td>
                                                <?=$recebe['status'];?>
                                            </td>
                                            <td class="actions">
                                                <a href="" class="btn-visualizar-modal-servico" data-toggle="modal"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                <a href="" id="btnAceitar"><i class="glyphicon glyphicon-ok icon-success"></i></a>
                                                <a href="" id="btnRejeitar"><i class="glyphicon glyphicon-remove icon-remove" id="btn-rejeitar"></i></a>
                                            </td>
                                            <td><a class="detail-icon" href="#"><i class="glyphicon glyphicon-plus"></i></a></td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="historico">
                <div class="container" style="margin-top:2px;">
                    <div class="row">
                        <div class="panel panel-primary panel-table animated slideInDown">
                            <div class="panel-heading " style="padding:37px;">
                                <div class="row">
                                    <div class="col col-xs-12 text-center">
                                        <h1 class="panel-title">Histórico</h1>
                                    </div>
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
                                        <th>Contratante</th>
                                        <th>Telefone</th>
                                        <th>Status</th>
                                        <th>Detalhe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                         $contratosFinalizado = carregaHistoricoCliente($conexao);
                                         foreach ($contratosFinalizado as $recebe) {
                                         
                                     ?>
                                        <tr>
                                            <td>
                                                <?=$recebe['idContrato'];?>
                                            </td>
                                            <td>
                                                <?=$recebe['tiposervico'];?>
                                            </td>
                                            <td>R$
                                                <?=$recebe['valor'];?>
                                            </td>
                                            <td>
                                                <?=$recebe['descricao'];?>
                                            </td>
                                            <td>
                                                <?=$recebe['nome'];?>
                                            </td>
                                            <td>
                                                <?=$recebe['telefone'];?>
                                            </td>
                                            <td>
                                                <?=$recebe['status'];?>
                                            </td>
                                            <td><a class="detail-icon" href="#"><i class="glyphicon glyphicon-plus"></i></a></td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para cadastro de serviço -->
        <div id="modalCadastro" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <img src="/iservices/img/logo.png" alt="Logo da empresa" class="logoTelaCadastroServico"></img>
                    </div>
                    <div class="modal-body">
                        <form action="/iservices/functions/cadastro.php" role="form" method="GET">
                            <label for="tipoServico">Tipo de Serviço:</label>
                                <select type="text" name="tipoServico" class="form-control">
                                  <option>Selecione Serviço</option>
                                  <option>Babá</option>
                                  <option>Mecânico Automotivo</option>
                                  <option>Eletricista</option>
                                  <option>Encanador</option>
                                  <option>Bombeiro Hidráulico</option>
                               </select>
                            <label for="valor">Preço do Serviço:</label>
                            <input type="text" name="valor" class="form-control"></input>
                            <label for="descricao">Descrição:</label>
                            <input type="text" name="descricao" class="form-control"></input>
                            </br>
                            <button type="submit" name="envia" value="Submit" class="btn btn-success">
                                <i class="glyphicon glyphicon-thumbs-up"></i>&nbspEnviar
                            </button>
                            <button type="button" name="fecha" class="btn btn-danger" data-dismiss="modal">
                                <i class="glyphicon glyphicon-thumbs-down"></i>&nbspFechar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para Excluir Cadastro-->
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                    </div>
                    <div class="modal-body">
                        Deseja realmente excluir este item? <span class="nome"></span>
                    </div>
                    <div class="modal-footer">
                        <a name="btn-ok" value="excluir" type="button" class="btn btn-success delete-yes">
                            <i class="glyphicon glyphicon-thumbs-up"></i>&nbspSim
                        </a>
                        <a href="#" type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="glyphicon glyphicon-thumbs-down"></i>&nbspN&atilde;o
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal de ativação do serviço-->
        <div class="modal fade" id="ativacao-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Ativar Serviço</h4>
                    </div>
                    <div class="modal-body">
                        Deseja realmente ativar o serviço? <span id="ativando-servico"></span>
                    </div>
                    <div class="modal-footer">
                        <a name="ativar" value="excluir" type="button" class="btn btn-success" id="ativar-servico">
                            <i class="glyphicon glyphicon-thumbs-up"></i>&nbspSim
                        </a>
                        <a href="#" type="button" class="btn btn-danger" data-dismiss="modal" id="nao-ativa">
                            <i class="glyphicon glyphicon-thumbs-down"></i>&nbspN&atilde;o
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal de desativação do serviço-->
        <div class="modal fade" id="desativacao-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Desativar Serviço</h4>
                    </div>
                    <div class="modal-body">
                        Deseja realmente desativar o serviço? <span id="desativando-servico"></span>
                    </div>
                    <div class="modal-footer">
                        <a name="desativar" value="excluir" type="button" class="btn btn-success" id="desativar-servico">
                            <i class="glyphicon glyphicon-thumbs-up"></i>&nbspSim
                        </a>
                        <a href="#" type="button" class="btn btn-danger" data-dismiss="modal" id="nao-desativa">
                            <i class="glyphicon glyphicon-thumbs-down"></i>&nbspN&atilde;o
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para Editar cadastro de serviço -->
        <div id="modal-EditarCadastro" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <img src="/iservices/img/logo.png" alt="Logo da empresa" class="logoTelaCadastroServico"></img>
                    </div>
                    <div class="modal-body">
                        <form action="/iservices/functions/acoes.php" role="form" method="GET">
                            <label for="identificador">Identificador:</label>
                            <input type="text" name="Editaridentificador" class="form-control" id="identificador" readonly="true"></input>
                            <label for="tipoServico">Tipo de Serviço:</label>
                                <select type="text" name="EditartipoServico" class="form-control" id="tipoServico">
                                  <option>Selecione Serviço</option>
                                  <option>Babá</option>
                                  <option>Mecânico Automotivo</option>
                                  <option>Eletricista</option>
                                  <option>Encanador</option>
                                  <option>Bombeiro Hidráulico</option>
                                </select>
                            <label for="valor">Preço do Serviço:</label>
                            <input type="text" name="Editarvalor" class="form-control" id="preco"></input>
                            <label for="descricao">Descrição:</label>
                            <input type="text" name="Editardescricao" class="form-control" id="descricao"></input>
                            </br>
                            <button type="submit" name="alterar" value="alterar" class="btn btn-success">
                                <i class="glyphicon glyphicon-ok"></i>&nbspAlterar
                            </button>
                            <button type="button" name="cancelar" class="btn btn-danger" data-dismiss="modal">
                                <i class="glyphicon glyphicon-remove"></i>&nbspCancelar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para visualizar cadastro de serviço -->
        <div id="modal-Visualizacao" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <img src="/iservices/img/logo.png" alt="Logo da empresa" class="logoTelaCadastroServico"></img>
                    </div>
                    <div class="modal-body">
                        <form action="/iservices/functions/acoes.php" role="form" method="GET">
                            <label for="identificador">Identificador:</label>
                            <input type="text" class="form-control" id="identificador" readonly="true"></input>
                            </br>
                            <label for="tipoServico">Tipo de Serviço:</label>
                            <input type="text" class="form-control" id="tipoServico" readonly="true"></input>
                            </br>
                            <label for="valor">Preço do Serviço:</label>
                            <input type="text" class="form-control" id="preco" readonly="true"></input>
                            </br>
                            <label for="descricao">Descrição:</label>
                            <input type="text" class="form-control" id="descricao" readonly="true"></input>
                            </br>
                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                <i class="glyphicon glyphicon-eye-close"></i>&nbspFechar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      <!--Modal de contratação de serviço-->
            <div class="modal fade" id="detalhes-servico-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Atenção!</strong> Não foi selecionada nenhuma modalidade de endereço.
                        </div>
                        <div class="alert alert-success" id="alert-success-contratar">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Sucesso!</strong> O seu serviço foi contratado com sucesso.
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