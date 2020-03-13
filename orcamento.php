<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Blotti 2020</title>
<link rel="apple-touch-icon" sizes="57x57" href="img/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="img/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="img/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="img/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/icon/favicon-16x16.png">
<link rel="manifest" href="img/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="img/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
  <header>
  <?php
include('header.php');
?>
         
            </header>
    <div class="container topo-page">
               <div class="row">
              <img src="img/blotti_empresa.jpg" alt="" class="img-responsive">     
</div>
                           
        </div>

        <section class="content">
          <div class="container">
    <h2 class="titulo-pagina"> <i class="fas fa-angle-double-right"></i> Orçamento</h2>

                 
                  <div class="row orcamento">                    
                  <div class="col-md-6 col-sm">
                 <p>Já conhece toda nossa linha de produtos?<br>
                    <a href="produtos.php" class="btn btn-success">Ver Produtos</a></p>
                    <p>Aproveite também para acessar no catalogo em formato PDF <br>
                    <a href="http://conteudo.blotti.com.br/catalogo" target="_blank" class="btn btn-success">Acessar Catálogo</a></p>
                  </div>
                  <div class="col-md-6 col-sm">
                  <h3>Solicitar Orçamento</h3>
                  <form action="seriadoBD.php" method="POST" name="frmcadastra" id="frmcadastra" enctype="multipart/form-data">
                  <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Nome" aria-label="Informe seu Nome" aria-describedby="btnGroupAddon" name="nome" required>
                              </div>

                                              
                              <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-at" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Email" aria-label="Informe seu Email" aria-describedby="btnGroupAddon" name="email" required>
                              </div>

                              <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" id="telefone" class="form-control" placeholder="Telefone" aria-label="Informe seu Telefone" aria-describedby="btnGroupAddon" name="telefone" required maxlength="15">
                              </div>

                              <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" id="empresa" class="form-control" placeholder="Empresa" aria-label="Informe sua Empresa" aria-describedby="btnGroupAddon" name="empresa" required>
                              </div>

                              <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-comments"></i></div>
                                </div>
                                <textarea id="mensagem" name="mensagem" class="form-control textarea" required></textarea>
                              </div>
                              <br>
                                     <input type="submit" name="cadastrar" value="Enviar" class="btn btn-success btn-block">
                </form>
                  </div>

                 
                  </div>
               
                   
                </div>       
        </section>
        <?php include ('footer.php');?>
            </body>
            </html>