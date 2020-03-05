<?php
require_once("verifica.php");
include ('conecta.php');
$cod_usuario = $_SESSION['cod'];

$sucesso = "<script>alert('Operação realizada com sucesso');</script><meta http-equiv='refresh' content='0;URL=empresa.php?page=Videos'> ";   
$erro = "<script>alert('Ocorreu algum erro. Tente novamente!');</script><meta http-equiv='refresh' content='0;URL=empresa.php?page=Videos'> ";  
?> 

   <?php
 if (isset($_POST['documento'])){
 $cod = $_POST['documento'];
 $sqlb = mysqli_query($link,"SELECT * FROM videos where cod=$cod") or die("ERRO NO SQL");
 $dados = mysqli_fetch_array($sqlb);
                    $nome = $dados['nome'];
                    $descricao = $dados['descricao'];
                    $midia = $dados['midia'];
                    $idVideo = $dados['idVideo'];
                    $status = $dados['status'];
?>
     <form action="videoBD.php" method="POST" name="frmcadastra" id="frmcadastra" enctype="multipart/form-data">
                       <input type="hidden" name="cod" value="<?php echo $cod?>">
                     Nome: 
                    <input type="text" name="nome" class="form-control input-group2" required value="<?php echo $nome ?>">
                   
                    Descrição: <textarea  name="descricao" class="form-control input-group2" required><?php echo $descricao ?></textarea>
                    Mídia:
                    <select name="midia" class="form-control input-group2" required>
                    <option value="<?php echo $midia ?>"><?php echo $midia ?></option>
                     <option value="Facebook"> Facebook</option>
                     <option value="Youtube"> Youtube</option>
                     </select>
                    Código do vídeo: 
                    <input type="text" name="idVideo" class="form-control input-group2" required value="<?php echo $idVideo ?>">  
                    Status:
                    <input type="radio" name="status" value="1" <?php if ($status == 1) echo "checked"; ?>> Ativo
                    <input type="radio" name="status" value="0" <?php if ($status == 0) echo "checked"; ?>>  Inativo<br>
                    <input type="hidden" name="fotoAtual" value="<?php echo $foto?>">
                    <div style="text-align: center"><br>
                    <?php if ($midia == "Youtube") { ?>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $idVideo ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>    
                    <?php } else if ($midia == "Facebook") { ?>
                        <iframe src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/Fblottimovimentacao/videos/<?php echo $idVideo ?>/&show_text=0&width=560" width="560" height="373" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
<?php
                    } else {
                        echo "Algo deu errado com o vídeo";
                    } ?>
                    
                </div>
                    <input type="submit" name="editar" value="Editar" class="btn btn-success btn-block">
                </form>
<?php
} else if (isset($_POST['cadastrar'])){
                      $nome = $_POST['nome'];
                      $descricao = $_POST['descricao'];
                      $midia = $_POST['midia'];                                               
                      $idVideo = $_POST['idVideo']; 
                 
                            // Insere os dados no banco
                            $sql = mysqli_query($link,"INSERT INTO videos (`cod`, `nome`,`descricao`,`midia`,`idVideo`) VALUES 
                      ('','$nome','$descricao', '$midia','$idVideo')") or die ("Houve erro na gravação dos dados" . mysqli_error()); 
                 
                            // Se os dados forem inseridos com sucesso
                            if($sql) {
                                echo $sucesso; 
                              } else {
                              echo $erro;
                              }
                            } 
                            else if (isset($_POST['editar'])){
                                $cod = $_POST['cod'];
                                $nome = $_POST['nome'];
                                $descricao = $_POST['descricao'];
                                $midia = $_POST['midia'];
                                $status = $_POST['status'];
                                $idVideo = $_POST['idVideo'];
                               
                    $sql = mysqli_query($link,"UPDATE videos SET nome='$nome', descricao='$descricao', status=$status, midia='$midia', idVideo='$idVideo' WHERE cod=$cod") or die ("Houve erro na gravação dos dados" . mysqli_error()); 
                     
                if($sql) {
                  echo $sucesso; 
                } else {
                echo $erro;
                }
                  
                  }  else if (isset($_GET['excluir'])){
                      $cod= $_GET['cod'];
                              
                    $sqld = mysqli_query($link,"DELETE FROM videos where cod=$cod") or die("ERRO NO SQL");
                    if($sqld) {
                      echo $sucesso; 
                    } else {
                    echo $erro;
                    }
                  }
                    

                    ?>



