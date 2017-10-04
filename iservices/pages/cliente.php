<?php
include("C:XAMPP/htdocs/iservices/conexao/conecta.php");
include("C:XAMPP/htdocs/iservices/functions/funcoes.php");
$recebeu = recebeNomeCliente($conexao);
?>

<!DOCTYPE html">
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Delivery de serviços | Entrega de serviços online | Peça iServices
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css" />
        </link>
        <link rel="shortcut icon" href="./img/icon_logo.ico">
        </link>
        <link rel="stylesheet" type="text/css" href="./css/design.css">
        <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <script language="javascript" type="text/javascript" src="./js/script.js"></script>
    </head>
    <body>
        <div class="navbar-header">
            <a class="navbar-brand">iServices</a>
        </div>
        <div class="container">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#cadastro" arial-controls="cadastro" data-toggle="tab" role="tab">Serviços</a></li>
                <li role="presentation"><a href="#historico" arial-controls="historico" data-toggle="tab" role="tab">Histórico</a></li>
                <li role="presentation"><a href="#servicoSolicitado" arial-controls="servicoSolicitado" data-toggle="tab" role="tab">Serviços Solicitados</a></li>
                <li class="navbar-right"><a href=""  id="dropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seja bem vindo, <?=$recebeu;?>!</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown" href="#">Meu Perfil</a></li>
                        <li><a class="dropdown" href="#">Contratos</a></li>
                        <li><a class="dropdown" href="encerrarSessao.php?act=logout">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="cadastro">
                <div class="row">
                    <div class="col-md-3">
                        <h2>Serviços</h2>
                    </div>
                    <div class="col-md-7">
                        <a href="" class="btn btn-primary pull-right h2" data-toggle="modal" data-target="#modalCadastro">Novo Serviço</a>
                    </div>
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>Número do Serviço</th>
                                    <th>Tipo de Serviço</th>
                                    <th>Preço</th>
                                    <th>Descrição</th>
                                    <th class="actions">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $servicos = carregaServico($conexao);
                                foreach ($servicos as $recebe) {

                                ?>

                                <tr>
                                    <td><?=$recebe['idServico'];?></td>
                                    <td><?=$recebe['tiposervico'];?></td>
                                    <td>R$<?=$recebe['valor'];?></td>
                                    <td><?=$recebe['descricao'];?></td>
                                    <td class="actions">
                                        <a href="" class="btn btn-success">Visualizar</a>
                                        <a href="" class="btn btn-warning">Editar</a>
                                        <a href="excluiServico.php?id=<?=$recebe['idServico'];?>" class="btn btn-danger" data-toggle="modal">Excluir</a>
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
            <div class="tab-pane" id="servicoSolicitado">
                <div class="row">
                    <div class="col-md-3">
                        <h2>Serviços Solicitados</h2>
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
                                    <th>Contratante</th>
                                    <th>Telefone</th>                           
                                    <th>Status</th>
                                    <th class="actions">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contratosSolicitados = carregarContratoCliente($conexao);
                                foreach ($contratosSolicitados as $recebe) {

                                ?>

                                <tr>
                                    <td><?=$recebe['idContrato'];?></td>
                                    <td><?=$recebe['tiposervico'];?></td>
                                    <td>R$<?=$recebe['valor'];?></td>
                                    <td><?=$recebe['descricao'];?></td>
                                    <td><?=$recebe['nome'];?></td>
                                    <td><?=$recebe['telefone'];?></td>
                                    <td><?=$recebe['status'];?></td>
                                    <td class="actions">
                                        <?php
                                        if($recebe['status']=="Aceito"){
                                        $disabledA = "disabled";
                                        $disabledB = "";  
                                        $btnAC = "Aceitar";
                                        $btnRC = "Cancelar";
                                        $hrefA = "aceitar";
                                        $hrefR  = "cancelarCliente"; 

                                        }elseif($recebe['status']=="Solicitado"){
                                        $disabledA = "";
                                        $disabledB = "";  
                                        $btnAC = "Aceitar";
                                        $btnRC = "Rejeitar";
                                        $hrefA = "aceitar";
                                        $hrefR  = "rejeitar";

                                        }else{
                                        $disabledA = "";
                                        $disabledB = "";
                                        $btnAC = "Concluir";
                                        $btnRC = "Cancelar";
                                        $hrefA = "concluidoCliente";
                                        $hrefR  = "cancelarCliente";

                                        }
                                        ?>
                                        <a href="<?=$hrefA;?>.php?id=<?=$recebe['idContrato'];?>" class="btn btn-success" id="btnAceitar" <?=$disabledA;?>><?=$btnAC;?></a>
                                        <a href="<?=$hrefR;?>.php?id=<?=$recebe['idContrato'];?>" class="btn btn-danger" id="btnRejeitar" <?=$disabledB;?>><?=$btnRC;?></a>
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
            <div class="tab-pane" id="historico">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Histórico de Contratos</h2>
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
                                    <th>Contratante</th>
                                    <th>Telefone</th>                           
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contratosFinalizado = carregaHistoricoCliente($conexao);
                                foreach ($contratosFinalizado as $recebe) {

                                ?>

                                <tr>
                                    <td><?=$recebe['idContrato'];?></td>
                                    <td><?=$recebe['tiposervico'];?></td>
                                    <td>R$<?=$recebe['valor'];?></td>
                                    <td><?=$recebe['descricao'];?></td>
                                    <td><?=$recebe['nome'];?></td>
                                    <td><?=$recebe['telefone'];?></td>
                                    <td><?=$recebe['status'];?></td>
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
        <!-- Modal para cadastro de serviço -->
        <div id="modalCadastro" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <img src="./img/logo.png" alt="Logo da empresa" class="logoTelaCadastroServico"></img>
                    </div>
                    <div class="modal-body">
                        <form action="cadastroServico.php" role="form" method="GET">
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
                            <input type="text" name="descricao" class="form-control"></input></br>
                            <button type="submit" name="envia" value="Enviar" class="btn btn-info">Enviar</button>
                            <button type="button" name="fecha" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 footerleft ">
                        <div class="logofooter"> iServices</div>
                        <p>Conexões têm por objetivo articular o conhecimento nas áreas da educação, da emoção, das relações e da espiritualidade. Compreendemos a aprendizagem como a essência desse processo, o que nos possibilita ser e estar no mundo.</p>
                        <p><i class="fa fa-map-pin"></i> Av. Raja Gabaglia, 3000 - Belvedere, Belo Horizonte/MG - BRAZIL</p>
                        <p><i class="fa fa-phone"></i> Telefone (Brasil) : +55 31 3444-4444</p>
                        <p><i class="fa fa-envelope"></i> E-mail : iservices@iservices.com.br</p>        
                    </div>
                    <div class="col-md-2 col-sm-6 paddingtop-bottom">
                        <h6 class="heading7">LINKS GERAIS</h6>
                        <ul class="footer-ul">
                            <li><a href="#"> Contato</a></li>
                            <li><a href="#"> Política de Privacidade</a></li>
                            <li><a href="#"> Termos e Condições</a></li>
                            <li><a href="#"> Clientes</a></li>
                            <li><a href="#"> Ranking</a></li>
                            <li><a href="#"> Perguntas Frequentes</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 paddingtop-bottom">
                        <h6 class="heading7">ÚLTIMO POST</h6>
                        <div class="post">
                            <p>Facebook - Propaganda: iServices entrega o melhor serviço para você.<span>3, Agosto 2017</span></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 paddingtop-bottom">
                        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer start from here-->
        <div class="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p>© Copyrigth 2016 iServices Serviços e Participações S.A.</p>
                </div>
                <script src="http://code.jquery.com/jquery-latest.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>
                </body>
                </html>