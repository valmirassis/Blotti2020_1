<?php
require_once("verifica.php");
include ('conecta.php');
$cod_usuario = $_SESSION['cod'];

?> 


        <div class="col">
    <!-- <h1>Inspeções</h1> -->
    <div class="direita">
    <a href="#" data-toggle="modal" data-target="#modalCadastraCategoria" class="btn btn-success btn-blotti"> Nova Categoria</a>
</div>
   <?php
                    if (isset($_GET['cadastrar'])){ // formulário de cadastro de Inspeção
                        ?>
                   
                        <?php
                    } if (isset($_GET['editar'])){ // formulário de edição
                        $cod = $_GET['cod'];
                        $sqlv = mysqli_query($link,"SELECT i.*, c.nome as nomeCli FROM inspecao as i, cliente as c where i.cod=$cod AND i.cliente=c.cod") or die("ERRO NO SQL: ".mysqli_error());
                        $dados = mysqli_fetch_array($sqlv);
                        $nomeCli = $dados['nomeCli'];
                        $codCli = $dados['cliente'];
                        $status = $dados['status'];
                        $publicar = $dados['publicar'];
                        $descricao = $dados['descricao'];
          
                        ?>
                    <form action="inspecao.php" method="post">
                    Cliente: 
                     <select name="cliente" class="form-control input-group2">
                     <?php   echo "<option value='".$codCli."'>".$nomeCli."</option>";?>
                     <?php
                        $sqlc = mysqli_query($link,"SELECT * FROM cliente  where status = 1 ORDER BY cod DESC") or die("ERRO NO SQL");
                        $rowc = mysqli_num_rows($sqlc);
                      if ($rowc <= 0) { echo "<br>Sem clientes cadastrados";}
                    while($rowc = mysqli_fetch_assoc($sqlc)){
                      echo "<option value='".$rowc['cod']."'>".$rowc['nome']."</option>";
                    }?>

                     </select>
                     Status:  <input type="radio" name="status" class="" value="1" <?php echo $status == 1 ? "checked" : "";?> > Ativo  <input type="radio" name="status" class="" value="0" <?php echo $status == 0 ? "checked" : "";?>> Inativo <br>
                     Publicar:  <input type="radio" name="publicar" class="" value="1" <?php echo $publicar == 1 ? "checked" : "";?>> Sim  <input type="radio" name="publicar" class="" value="0" <?php echo $publicar == 0 ? "checked" : "";?>> Não
                 <br>
                   Descricao:
                    <textarea name="descricao" class="form-control input-group2"><?php echo $descricao; ?> </textarea>
                    <input type="hidden" value="<?php echo $_GET['cod']; ?>" name="cod">
                    <br>
                    <input type="submit" name="editar" value="Salvar" class="btn btn-warning btn-block">
                </form>
                        <?php
                    } else if (isset($_POST['cadastrar'])){
                      $nome = $_POST['nome'];
                      $seriados = $_POST['seriados'];
                      $descricao = $_POST['descricao'];
                      $foto = $_FILES['foto'];

                      $sql = mysqli_query($link,"INSERT INTO catProdutos(`cod`, `nome`,`descricao`,`foto`, `seriados`) VALUES 
                      ('','$nome','$descricao', '$foto', '$seriados')") or die ("Houve erro na gravação dos dados" . mysqli_error()); 
                  
                      if($sql) {
                          echo "<script>alert('Item cadastrado com sucesso');</script>";
                          echo "<meta http-equiv='refresh' content='0;URL=categorias.php'> ";  
                      } else {
                        echo "<script>alert('Ocorreu algum erro. Tente novamente!');</script>";
                        echo "<meta http-equiv='refresh' content='0;URL=categorias.php'> ";  
                      }
                  } else if (isset($_POST['editar'])){
                    $cod = $_POST['cod'];
                    $cliente = $_POST['cliente'];
                    $descricao = $_POST['descricao'];
                    $status = $_POST['status'];                   
                    $publicar = $_POST['publicar'];
                    
                    $sql = mysqli_query($link,"UPDATE inspecao SET cliente='$cliente', descricao='$descricao', status=$status, publicar=$publicar WHERE cod=$cod ") or die ("Houve erro na gravação dos dados" . mysqli_error()); 
                  
                  if($sql) {
                    echo "<script>alert('Inspeção alterado com sucesso');</script>";
                    echo "<meta http-equiv='refresh' content='0;URL=inspecao.php'> ";   
                  } else {
                  echo "<script>alert('Ocorreu algum erro. Tente novamente!');</script>";
                  echo "<meta http-equiv='refresh' content='0;URL=inspecao.php'> ";  
                  }
                  
                  } 
                    
                    else { // Listar itena cadastradss
                        $sqlv = mysqli_query($link,"SELECT c.*, s.nome as nomeSer FROM catProdutos as c, seriados as s where c.seriados=s.cod  ORDER BY c.nome DESC") or die("ERRO NO SQL". mysqli_error());
                        $rowv = mysqli_num_rows($sqlv);
                      if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}
                    while($rowv = mysqli_fetch_assoc($sqlv)){
                        $cod = $rowv['cod'];
                    $seriados = $rowv['nomeSer'];
                     $nome = $rowv['nome'];
                    $descricao = $rowv['descricao'];
              
echo "<div class='alert alert-dark destaque' role='alert'> 
        <div>  $nome - $descricao <br>";
echo "Seriado: ".$seriados; 
echo "</div><div>";
echo "<a href='?editar&cod=$cod'><i class='fas fa-edit'></i></a> 



</div></div>";
}
                    }

                    ?>
    </div>

<!-- Modais -->
<div class="modal fade " id="modalCadastraCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" onsubmit="return enviarDados(this); return false;" method="POST" name="frmcontato" id="formcontato">
                    Seriado: 
                     <select name="seriados" class="form-control input-group2">
                     <option></option>
                     <?php
                        $sqlc = mysqli_query($link,"SELECT * FROM seriados where status = 1 ORDER BY cod DESC") or die("ERRO NO SQL");
                        $rowc = mysqli_num_rows($sqlc);
                      if ($rowc <= 0) { echo "<br>Sem Seriados cadastrados";}
                    while($rowc = mysqli_fetch_assoc($sqlc)){
                      echo "<option value='".$rowc['cod']."'>".$rowc['nome']."</option>";
                    }?>

                     </select>
                     Nome: 
                    <input type="text" name="nome" class="form-control input-group2">
                   
                    Descrição: <textarea  name="descricao" class="form-control input-group2"></textarea>
                    Foto: <input type="file" value="selecione" name="foto" class="form-control input-group2">
                    <br> <br>
                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success btn-block">
                </form>

                <div id="result">
                </div>
      </div>
    
    </div>
  </div>
</div>

