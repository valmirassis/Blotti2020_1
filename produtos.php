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
include('conecta.php');
?>
         
            </header>
    <div class="container topo-page">
               <div class="row">
              <img src="img/blotti_produtos.jpg" alt="" class="img-responsive">     
</div>
                           
        </div>

        <section class="content">
          <div class="container">
    <h2 class="titulo-pagina"> <i class="fas fa-angle-double-right"></i> Produtos</h2>

             
    <div clas="destaque-produtos">
            <div class="row">
            <div class="row">
            <?php
$sqlv = mysqli_query($link,"SELECT * FROM seriados where status=1 ORDER BY nome ASC LIMIT 6") or die("ERRO NO SQL". mysqli_error());
$rowv = mysqli_num_rows($sqlv);
if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}

while($rowv = mysqli_fetch_assoc($sqlv)){

$cod = $rowv['cod'];
$nome = $rowv['nome'];
$foto = $rowv['foto'];
$descricao = $rowv['descricao'];


    ?>
              <div class="col-md-4 col-sm">
                <div class="destaque-item">
                  <a href="produtos.php?seriado=<?php  echo $nome ?>"><img src="http://www.blotti.com.br/arquivos/produtos/seriados/<?php echo $foto ?>" alt="<?php echo $nome ?>" title="<?php echo $nome ?>">
                  <h4><?php  echo $nome ?> </h4> </a> <?php  echo $descricao ?>
                </div>
              </div>

              
              <?php } ?>   

            </div>
           
        </div>
               
                   
                </div>       
        </section>
        <?php include ('footer.php');?>
            </body>
            </html>