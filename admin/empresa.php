<?php
  require_once("verifica.php");
    include ('conecta.php');
  $cod_usuario = $_SESSION['cod'];
  $nomeUsuario = $_SESSION['nomeUsuario']
    ?>
       <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ambiente Restrito: ... Blotti...</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

    <body>
    <header>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <!-- Brand -->
         <a class="navbar-brand" href="#"><img src="../img/blotti_movimentacao_de_cargas_acessorios.png" width="100px"></a> 
      
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button> 
      
        <!-- Navbar links -->
       <div class="collapse navbar-collapse" id="collapsibleNavbar">
       <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link anima" href="home.php"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link anima" href="empresa.php"><i class="fas fa-industry"></i> Empresa </a>
            </li>
            <li class="nav-item">
              <a class="nav-link anima" href="produtos.php"><i class="fas fa-archive"></i> Produtos</a>
            </li>        
            <li class="nav-item">
                <a class="nav-link anima" href="logoff.php"><i class="fas fa-user"></i> <?php echo $nomeUsuario ?> [ Sair ]</a>
              </li> 
      
          </ul>
        </div> 
      </nav> 
 
    </header>
    <section class="content">
<div class="container">
    <div class="row">
    <div class="col-md-3">
        <div class="card">
  <div class="card-header">
    <h3>Páginas</h3> 
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a href="?page=Seriados">Videos</a></li>
    <li class="list-group-item"><a href="?page=Categorias">Marcos</a></li>
    <!-- <li class="list-group-item"><a href="?page=Produtos">Feira</a></li> -->
  </ul>
</div>
 </div>
<div class="col-md-9">
<div class="card">
    </div>

</div>
    </div>
</div>
</section>
    </body>
    </html>