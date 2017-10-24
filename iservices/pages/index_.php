<!DOCTYPE html">

<html lang="pt-BR">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Delivery de serviços | Entrega de serviços online | Peça iServices
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="/iservices/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="/iservices/img/icon_logo.ico"/>
        <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">        
        <link href="/iservices/css/business-frontpage.css" rel="stylesheet">
        <script language="javaScript" type="text/javascript" src="/iservices/js/script.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./index.php">iServices</a>
                </div>
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="./index.php">Home</a>
                    </li>
                    <li role="presentation"><a href="#">Quem Somos</a>
                    </li>
                    <li role="presentation"><a href="#">Contato</a>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cliente</a>
                        <ul class="dropdown-menu">
                            <li><a href="#modalCadastroServico" data-toggle="modal">Cadastro
                                    Cliente</a>
                            </li>
                    </li>
                    <li><a class="nav-link" href="#modalLoginServico" data-toggle="modal">Acesso
                            Cliente</a>
                    </li>
                    <li><a href="./buscaServico.html" data-toggle="modal">Consulta
                            Serviço</a>
                    </li>
                </ul>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#modal" data-toggle="modal"><span
                                class="glyphicon glyphicon-user"></span>&nbspCadastro Usuário</a>
                    </li>
                    <li><a href="#modalLogin" data-toggle="modal"><span
                                class="glyphicon glyphicon-log-in"></span>&nbspLogin</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Header with Background Image -->
    <header class="business-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="display-3 text-center text-white mt-4">Encontre o melhor serviço</h1>
          </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <div class="col-sm-8">
          <h2 class="mt-4">Quem Somos</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
          <p>
            <a class="btn btn-primary btn-lg" href="#">Call to Action &raquo;</a>
          </p>
        </div>
        <div class="col-sm-4">
          <h2 class="mt-4">Contact Us</h2>
          <address>
            <strong>Start Bootstrap</strong>
            <br>3481 Melrose Place
            <br>Beverly Hills, CA 90210
            <br>
          </address>
          <address>
            <abbr title="Phone">P:</abbr>
            (123) 456-7890
            <br>
            <abbr title="Email">E:</abbr>
            <a href="mailto:#">name@example.com</a>
          </address>
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus totam ut praesentium aut.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; iServices</p>
      </div>
      <!-- /.container -->
    </footer>

    <!--Modal Cadastro usuário-->
                <div id="modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <img src="/iservices/img/logo.png" alt="Logo da empresa"></img>
                            </div>
                            <div class="modal-body">
                                <form action="cadastroUsuario.php" method="POST">
                                    <label>Nome:</label>
                                    <input type="text" name="nome" class="form-control"></input>
                                    <label>Email:</label>
                                    <input type="email" name="email" class="form-control"></input>
                                    <label>Senha:</label>
                                    <input type="password" name="senha" class="form-control" maxlength="15"></input>
                                    <label>Confirmar Senha:</label>
                                    <input type="password" name="confirmaSenha" class="form-control"></input>
                                    <label>Av/Rua:</label>
                                    <input type="text" name="rua" class="form-control"></input>
                                    <label>Número:</label>
                                    <input type="text" name="numero" class="form-control"></input>
                                    <label>Complemento:</label>
                                    <input type="text" name="complemento" class="form-control"></input>
                                    <label>Bairro:</label>
                                    <input type="text" name="bairro" class="form-control"></input>
                                    <label>Cidade:</label>
                                    <input type="text" name="cidade" class="form-control"></input>
                                    <label>Estado:</label>
                                    <input type="text" name="estado" class="form-control"></input>
                                    <label>CEP:</label>
                                    <input type="text" name="cep" class="form-control"></input>
                                    <label>Telefone:</label>
                                    <input maxlength="14" name="telefone" type="text" class="form-control"></input>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="cadastrar" value="Cadastrar">Cadastrar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal Login Usuário-->
                <div id="modalLogin" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <img src="/iservices/img/logo.png" alt="Logo da empresa" class="logoTelaLogin"></img>
                            </div>
                            <div class="modal-body">
                                <form action="validaLoginUsuario.php" role="form" method="POST">
                                    <label for="email">Email:&nbsp</label>
                                    <input type="email" name="email" class="form-control" id="email"></input>
                                    <label for="senha">Senha:&nbsp</label>
                                    <input type="password" name="senha" class="form-control" id="senha"></input>
                                    <div class="modal-footer">
                                        <a href="#">Esqueceu a sua senha?</a>
                                        <button type="submit" class="btn btn-info" name="acessar" value="Acessar">Acessar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        </br>
                                        <a href="#modal" data-toggle="modal">Cadastra-se</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal Cadastro Cliente-->
                <div id="modalCadastroServico" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <img src="/iservices/img/logo.png" alt="Logo da empresa" class="logoCadastroServico"></img>
                            </div>
                            <div class="modal-body">
                                <form action="cadastroCliente.php" method="POST">
                                    <label for="razaoSocial">Nome/Razação Social:</label>
                                    <input type="text" name="razaoSocial" id="razaoSocial" class="form-control"></input>
                                    <label for="cpfcnpj">CPF/CNPJ:</label>
                                    <input type="text" name="cpfcnpj" id="cpfcnpj" class="form-control"></input>
                                    <label for="senhaServico">Senha:</label>
                                    <input type="password" name="senhaServico" id="senhaServico" class="form-control"></input>
                                    <label for="confirmaSenhaServico">Confirmar Senha:</label>
                                    <input type="password" name="confirmaSenhaServico" id="confirmaSenhaServico" class="form-control"></input>
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
                                    <label for="estado">Estado:</label>
                                    <input type="text" name="estado" id="estado" class="form-control"></input>
                                    <label for="cep">CEP:</label>
                                    <input type="text" name="cep" class="form-control"></input>
                                    <label for="telefone">Telefone:</label>
                                    <input type="tel" name="telefone" id="telefone" class="form-control"></input>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="enviar" value="Enviar">Enviar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal Login Cliente-->
                <div id="modalLoginServico" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <img src="/iservices/img/logo.png" alt="Logo da empresa" class="logoTelaLogin"></img>
                            </div>
                            <div class="modal-body">
                                <form action="validaLoginCliente.php" role="form" method="POST">
                                    <label>CPF/CNPJ:&nbsp</label>
                                    <input type="text" name="cnpj" class="form-control"></input>
                                    <label>Senha:&nbsp</label>
                                    <input type="password" name="senha" class="form-control"></input>
                                    <div class="modal-footer">
                                        <a href="#">Esqueceu a sua senha?</a>
                                        <button type="submit" class="btn btn-info" name="acessar" value="Acessar">Acessar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- Bootstrap core JavaScript -->
    <script src="/iservices/jquery/jquery.min.js"></script>
    <script src="/iservices/popper/popper.min.js"></script>
    <script src="/iservices/bootstrap/js/bootstrap.min.js"></script>
                <script src="http://code.jquery.com/jquery-latest.js"></script>
                <script src="/iservices/bootstrap/js/bootstrap.min.js"></script>
                </body>
                </html>