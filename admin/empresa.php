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
    <li class="list-group-item"><a href="?page=Videos">Videos</a></li>
    <li class="list-group-item"><a href="?page=Marcos">Marcos</a></li>
    <!-- <li class="list-group-item"><a href="?page=Produtos">Feira</a></li> -->
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
    if ($page == "Videos") {
      $sqlv = mysqli_query($link,"SELECT * FROM videos") or die("ERRO NO SQL". mysqli_error());
      $rowv = mysqli_num_rows($sqlv);
    if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}
    while($rowv = mysqli_fetch_assoc($sqlv)){
    $cod = $rowv['cod'];
    $nome = $rowv['nome'];
    $descricao = $rowv['descricao'];
    $midia = $rowv['midia'];
    $idVideo = $rowv['idVideo'];
    $status = $rowv['status'];

    $status == 1 ? $status = "Ativo" : $status = "Inativo";
    
    echo "<div class='alert alert-dark item' role='alert'> 
    <div>  <b>$nome</b> - <b>Mídia: </b>$midia<br> <b>Descrição:</b> $descricao <br>";
    echo "<b>Status:</b> $status  "; 
    echo "</div><div>";
    echo "<a href='' data-toggle='modal' data-target='#modalEdita$page' data-doc='$cod'><i class='fas fa-edit'></i></a>
    <a href='videoBD.php?excluir&cod=$cod'><i class='fas fa-trash'></i></a>  
    </div></div>";
}
  echo "</div>";
} else {
  $sqlv = mysqli_query($link,"SELECT * FROM marcos") or die("ERRO NO SQL". mysqli_error());
  $rowv = mysqli_num_rows($sqlv);
if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}
while($rowv = mysqli_fetch_assoc($sqlv)){
$cod = $rowv['cod'];
$nome = $rowv['nome'];
$status = $rowv['status'];
$descricao = $rowv['descricao'];
$ano = $rowv['ano'];
$status == 1 ? $status = "Ativo" : $status = "Inativo";

echo "<div class='alert alert-dark item' role='alert'> 
<div>  <b>$nome</b> - <b>Ano: </b> $ano <br> <b>Descrição:</b> $descricao <br>";
echo "<b>Status:</b> $status"; 
echo "</div><div>";
echo "<a href='' data-toggle='modal' data-target='#modalEdita$page' data-doc='$cod'><i class='fas fa-edit'></i></a>
<a href='marcoBD.php?excluir&cod=$cod'><i class='fas fa-trash'></i></a>  
</div></div>";
}
echo "</div>";
}
} else {
  header ("Location: empresa.php?page=Marcos");
}
 ?>
    </div>

</div>
    </div>
</div>
</section>

<!-- Cadastra Vídeo -->
<div class="modal fade " id="modalCadastraVideos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Vídeo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="videoBD.php" method="POST" name="frmcadastra" id="frmcadastra" enctype="multipart/form-data">
                    Nome: 
                    <input type="text" name="nome" class="form-control input-group2" required>  
                    
                    Descrição: <textarea  name="descricao" class="form-control input-group2" required></textarea>
                    Mídia:
                    <select name="midia" class="form-control input-group2" required>
                     <option value="Facebook"> Facebook</option>
                     <option value="Youtube"> Youtube</option>
                     </select>
                    Código do vídeo: 
                    <input type="text" name="idVideo" class="form-control input-group2" required>  
                    
                    <br> <br>
                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success btn-block">
                </form>
      </div>
    
    </div>
  </div>
</div>
<!-- Edita Vídeo -->
<div class="modal fade " id="modalEditaVideos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edição de Vídeo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="fetched-data-videos">
          <!-- Vai abrir aqui o conteudo do arquivo anexo -->
        </div>
      </div>
    
    </div>
  </div>
</div>
<!-- Cadastra Marco -->
<div class="modal fade " id="modalCadastraMarcos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Marco</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="marcoBD.php" method="POST" name="frmcadastra" id="frmcadastra" enctype="multipart/form-data">
                    Nome: 
                    <input type="text" name="nome" class="form-control input-group2" required>  
                    
                    Descrição: <textarea  name="descricao" class="form-control input-group2" required></textarea>
                    Ano:

                    <select name="ano" class="form-control input-group2" required>
                    <option></option>
<?php

$anoatual = date('Y');
for ($i=2006;$i <= $anoatual;$i++) {
  echo "<option> $i </option>";
}
?>
                     
                     </select>
                     Foto Miniatura [200 x 200 px]: <input type="file" value="selecione" name="fotoMini" class="form-control input-group2" required>
                     Foto principal: <input type="file" value="selecione" name="foto" class="form-control input-group2" required>
                    
                    <br> <br>
                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success btn-block">
                </form>
      </div>
    
    </div>
  </div>
</div>
<!-- Edita Marco -->
<div class="modal fade " id="modalEditaMarcos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edição de Marco sss</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="fetched-data-marcos">
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
  $('#modalEditaVideos').on('show.bs.modal', function (e) {
    var documento = $(e.relatedTarget).data('doc');
    $.ajax({
      type : 'post', 
      url : 'videoBD.php', 
      data :  'documento='+ documento, 
      success : function(data){
        $('.fetched-data-videos').html(data);
      } 
    });
  });
  $('#modalEditaMarcos').on('show.bs.modal', function (e) {
    var documento = $(e.relatedTarget).data('doc');
    $.ajax({
      type : 'post', 
      url : 'marcoBD.php', 
      data :  'documento='+ documento, 
      success : function(data){
        $('.fetched-data-marcos').html(data);
      } 
    });
  });

});
</script>
    </body>
    </html>