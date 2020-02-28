<?php
  require_once("verifica.php");
    include ('conecta.php');
  $cod_usuario = $_SESSION['cod'];
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
            <!-- <li class="nav-item">
                <a class="nav-link anima" href="servicos.php"><i class="fas fa-tag"></i> Serviços</a>
              </li> -->
      
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
    <li class="list-group-item"><a href="?page=Carousel">Carousel</a></li>
    <li class="list-group-item"><a href="?page=Popups">Popup</a></li>
    <li class="list-group-item"><a href="?page=Destaques">Destaques</a></li>
  </ul>
</div>
 </div>
<div class="col-md-9">
<div class="card">
<?php

if (isset($_GET['page'])){
  $page = $_GET['page'];
  ?>
    <div class='card-header'> <h3>   <?php echo $page ?></h3>   </div>

      <div class='card-body'>
      <div class="direita">
    <a href="#" data-toggle="modal" data-target="#modalCadastra<?php echo $page ?>" class="btn btn-success btn-blotti"> Cadastrar</a>
</div>

    <?php
    if ($page == "Categorias") {
    $sqlv = mysqli_query($link,"SELECT c.*, s.nome as nomeSer FROM catProdutos as c, seriados as s where c.seriados=s.cod  ORDER BY c.cod DESC") or die("ERRO NO SQL". mysqli_error());
    $rowv = mysqli_num_rows($sqlv);
  if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}
while($rowv = mysqli_fetch_assoc($sqlv)){
$cod = $rowv['cod'];
$seriados = $rowv['nomeSer'];
 $nome = $rowv['nome'];
 $status = $rowv['status'];
$descricao = $rowv['descricao'];
	
$status == 1 ? $status = "Ativo" : $status = "Inativo";

echo "<div class='alert alert-dark item' role='alert'> 
<div>  <b>$nome</b> <br> $descricao <br>";
echo "<b>Seriado:</b> ".$seriados." - <b>Status:</b> ".$status; 
echo "</div><div>";
echo "<a href='' data-toggle='modal' data-target='#modalEdita$page' data-doc='$cod'><i class='fas fa-edit'></i></a>
<a href='categoriaBd.php?excluir&cod=$cod'><i class='fas fa-trash'></i></a>  
</div></div>";
}
  echo "</div>";
} else if  ($page == "Popups") {
  $sqlv = mysqli_query($link,"SELECT * FROM popups") or die("ERRO NO SQL". mysqli_error());
  $rowv = mysqli_num_rows($sqlv);
if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}
while($rowv = mysqli_fetch_assoc($sqlv)){
$cod = $rowv['cod'];
$nome = $rowv['nome'];
$status = $rowv['status'];

$status == 1 ? $status = "Ativo" : $status = "Inativo";

echo "<div class='alert alert-dark item' role='alert'> 
<div>  <b>$nome</b> ";
echo "<b>Status:</b> ".$status; 
echo "</div><div>";
echo "<a href='' data-toggle='modal' data-target='#modalEdita$page' data-doc='$cod'><i class='fas fa-edit'></i></a>
<a href='popupBd.php?excluir&cod=$cod'><i class='fas fa-trash'></i></a>  
</div></div>";


} 


} else {
  $sqlv = mysqli_query($link,"SELECT * FROM destaques") or die("ERRO NO SQL". mysqli_error());
  $rowv = mysqli_num_rows($sqlv);
if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}
while($rowv = mysqli_fetch_assoc($sqlv)){
$cod = $rowv['cod'];
$nome = $rowv['nome'];
$status = $rowv['status'];
$link = $rowv['link'];

$status == 1 ? $status = "Ativo" : $status = "Inativo";

echo "<div class='alert alert-dark item' role='alert'> 
<div>  <b>$nome</b> <br> $link <br>";
echo "<b>Status:</b> ".$status; 
echo "</div><div>";
echo "<a href='' data-toggle='modal' data-target='#modalEdita$page' data-doc='$cod'><i class='fas fa-edit'></i></a>
<a href='destaqueBd.php?excluir&cod=$cod'><i class='fas fa-trash'></i></a>  
</div></div>";
}
echo "</div>";
}
} else {
  header ("Location: home.php?page=Destaques");
}
 ?>


    </div>

</div>
    </div>
</div>
</section>

<!-- Cadastra Destaque -->
<div class="modal fade " id="modalCadastraDestaques" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Destaque</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="destaqueBD.php" method="POST" name="frmcadastra" id="frmcadastra" enctype="multipart/form-data">
                    Nome: 
                    <input type="text" name="nome" class="form-control input-group2" required>
                    Link: 
                    <input type="text" name="link" class="form-control input-group2" required>
                   
                    Foto: <input type="file" value="selecione" name="foto" class="form-control input-group2" required>
                    <br> <br>
                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success btn-block">
                </form>
      </div>
    
    </div>
  </div>
</div>
<!-- Edita Destaque -->
<div class="modal fade " id="modalEditaDestaques" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edição de Destaque</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="fetched-data-destaques">
          <!-- Vai abrir aqui o conteudo do arquivo anexo -->
        </div>
      </div>
    
    </div>
  </div>
</div>

<!-- Cadastra Popup -->
<div class="modal fade " id="modalCadastraPopups" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Popup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="popupBD.php" method="POST" name="frmcadastra" id="frmcadastra" enctype="multipart/form-data">
                    Nome: 
                    <input type="text" name="nome" class="form-control input-group2" required>  
                    Foto: <input type="file" value="selecione" name="foto" class="form-control input-group2" required>
                    <br> <br>
                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success btn-block">
                </form>
      </div>
    
    </div>
  </div>
</div>
<!-- Edita Popup -->
<div class="modal fade " id="modalEditaPopups" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edição de Popup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="fetched-data-popups">
          <!-- Vai abrir aqui o conteudo do arquivo anexo -->
        </div>
      </div>
    
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="main.js"></script>
<script>
 $(document).ready(function(){
  $('#modalEditaCarousel').on('show.bs.modal', function (e) {
    var documento = $(e.relatedTarget).data('doc');
    $.ajax({
      type : 'post', 
      url : 'carouselBD.php', 
      data :  'documento='+ documento, 
      success : function(data){
        $('.fetched-data-carousel').html(data);
      } 
    });
  });
  $('#modalEditaPopups').on('show.bs.modal', function (e) {
    var documento = $(e.relatedTarget).data('doc');
    $.ajax({
      type : 'post', 
      url : 'popupBD.php', 
      data :  'documento='+ documento, 
      success : function(data){
        $('.fetched-data-popups').html(data);
      } 
    });
  });
$('#modalEditaDestaques').on('show.bs.modal', function (e) {
    var documento = $(e.relatedTarget).data('doc');
    $.ajax({
      type : 'post', 
      url : 'destaqueBD.php', 
      data :  'documento='+ documento, 
      success : function(data){
        $('.fetched-data-destaques').html(data);
      } 
    });
  });
});
</script>
    </body>
    </html>