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
include('conecta.php');
include('header.php');
?>
<!-- POPUP -->
<?php

$sqlv = mysqli_query($link,"SELECT * FROM popups where status=1 ORDER BY cod DESC LIMIT 1") or die("ERRO NO SQL". mysqli_error());
$rowv = mysqli_num_rows($sqlv);
if ($rowv != 0) { 
  $dados = mysqli_fetch_array($sqlv);
  $foto = $dados['foto'];
  $nome = $dados['nome'];
?>

<div id="popup" style="display:block">        
    	<img src="img/xis.gif" width="20" height="20"  id="close-popup"><br>
 <img src="http://www.blotti.com.br/arquivos/layout/popups/<?php echo $foto ?>" alt="<?php echo $foto ?>" title="<?php echo $foto ?>" style="max-width:500px"/>
</div>
<script>
var close = document.getElementById('close-popup'); 
var close2 = document.getElementById('popup'); 
var popup = document.getElementById('popup'); 

close.addEventListener("click", function() { popup.style.display = 'none'; }); 
close2.addEventListener("click", function() { popup.style.display = 'none'; });  

</script>
<?php

}

?>
<!-- /POPUP -->
            </header>
            <div id="carousel" class="carousel slide" data-ride="carousel" style="margin-top: 80px;">

<?php
$sqlv = mysqli_query($link,"SELECT * FROM carousel where status=1 ORDER BY posicao ASC") or die("ERRO NO SQL". mysqli_error());
$rowv = mysqli_num_rows($sqlv);
if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}


?>
    <ol class="carousel-indicators">
      <?php 
      for($i=0;$i<$rowv;$i++){
        echo "<li data-target='#carousel' data-slide-to='$i'></li>";
      }
      ?>
     </ol>
    <div class="carousel-inner">
    <?php
while($rowv = mysqli_fetch_assoc($sqlv)){

$cod = $rowv['cod'];
$nome = $rowv['nome'];
$foto = $rowv['foto'];
$frase = $rowv['frase'];
$posicao = $rowv['posicao'];
$parte1 = substr($frase, 0,  strpos($frase, " "));
$parte2 = substr($frase, (strpos($frase, ' ')) + 1);
    ?>
    
      <div class="carousel-item <?php if ($posicao == 1) echo 'active'?>">
        <img class="d-block w-100" src="http://www.blotti.com.br/arquivos/layout/carousel/<?php echo $foto ?>" alt="<?php echo $nome ?>" title="<?php echo $nome ?>">
        <div class="carousel-caption d-none d-md-block">
            <h2> <?php echo $parte1 ?> </h2>
            <p><?php echo $parte2 ?></p>
          </div>
      </div>
  
   
      
<?php 
}
?>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>
</div>

        <section class="content">
          <div class="container">
          <div clas="destaque-home">
            <div class="row">
            <?php
$sqlv = mysqli_query($link,"SELECT * FROM seriados where status=1 ORDER BY nome ASC LIMIT 6") or die("ERRO NO SQL". mysqli_error());
$rowv = mysqli_num_rows($sqlv);
if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}

while($rowv = mysqli_fetch_assoc($sqlv)){

$cod = $rowv['cod'];
$nome = $rowv['nome'];
$foto = $rowv['foto'];


    ?>
              <div class="col-md-4 col-sm">
                <div class="destaque-item">
                  <a href="produtos.php?seriado=<?php  echo $nome ?>"><img src="http://www.blotti.com.br/arquivos/produtos/seriados/<?php echo $foto ?>" alt="<?php echo $nome ?>" title="<?php echo $nome ?>">
                  <h4><?php  echo $nome ?> </h4> </a>
                </div>
              </div>

              
              <?php } ?>         
             
             
              

            </div>
           
        </div>
        </section>
        <section class="destaques">
<div class="container">
  <div class="row">
  <?php
$sqlv = mysqli_query($link,"SELECT * FROM destaques where status=1 ORDER BY posicao ASC LIMIT 4") or die("ERRO NO SQL". mysqli_error());
$rowv = mysqli_num_rows($sqlv);
if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}

while($rowv = mysqli_fetch_assoc($sqlv)){

$cod = $rowv['cod'];
$nome = $rowv['nome'];
$foto = $rowv['foto'];
$linkpagina = $rowv['linkpagina'];

    ?>
  <div class="col-md-3 col-sm">
    <div class="destaque-item">
       <a href="<?php echo $linkpagina ?>"><img src="http://www.blotti.com.br/arquivos/layout/destaques/<?php echo $foto ?>" alt="<?php echo $nome ?>" title="<?php echo $nome ?>">
       
        </a>              
  </div>
</div>
<?php } ?> 

</div>
</div>
</section>
<?php include ('footer.php'); ?>
            </body>
            </html>