<?php
require_once("verifica.php");
include ('conecta.php');
$cod_usuario = $_SESSION['cod'];
$pasta = "../arquivos/layout/destaques/";     
$sucesso = "<script>alert('Operação realizada com sucesso');</script><meta http-equiv='refresh' content='0;URL=home.php?page=Destaques'> ";   
$erro = "<script>alert('Ocorreu algum erro. Tente novamente!');</script><meta http-equiv='refresh' content='0;URL=home.php?page=Destaques'> ";  
?> 

   <?php
 if (isset($_POST['documento'])){
 $cod = $_POST['documento'];
 $sqlb = mysqli_query($link,"SELECT * FROM destaques where cod=$cod") or die("ERRO NO SQL");
 $dados = mysqli_fetch_array($sqlb);
                    $nome = $dados['nome'];
                    $link = $dados['descricao'];
                    $foto = $dados['foto'];
                    $status = $dados['status'];
?>
     <form action="destaqueBD.php" method="POST" name="frmcadastra" id="frmcadastra" enctype="multipart/form-data">
                       <input type="hidden" name="cod" value="<?php echo $cod?>">
                     Nome: 
                    <input type="text" name="nome" class="form-control input-group2" required value="<?php echo $nome ?>">
                    Nome: 
                    <input type="text" name="link" class="form-control input-group2" required value="<?php echo $link ?>">
                    
                    Status:
                    <input type="radio" name="status" value="1" <?php if ($status == 1) echo "checked"; ?>> Ativo
                    <input type="radio" name="status" value="0" <?php if ($status == 0) echo "checked"; ?>>  Inativo<br>
                    <input type="hidden" name="fotoAtual" value="<?php echo $foto?>">
                    Foto:
                    <img src="<?php echo $pasta.$foto?>" width="150px"> <br>
                    Alterar imagem:
                    <input type="radio" name="alteraFoto" value="sim" class="simChecked"> Sim
                    <input type="radio" name="alteraFoto" value="nao" checked class="naoChecked">  Não
                    <input type="file" value="selecione" name="foto" class="form-control input-group2 inputImagem" style="display:none">
                    <br> <br>
                    <input type="submit" name="editar" value="Editar" class="btn btn-success btn-block">
                </form>
<?php
}
else if (isset($_POST['cadastrar'])){
                      $nome = $_POST['nome'];
                      $link = $_POST['link'];
                      $foto = $_FILES['foto'];
                                                
                        if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0):   
                            $extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
                            $array_extensoes   = explode('.', $_FILES['foto']['name']);
                            $extensao = strtolower(end($array_extensoes));                     
                             // Validamos se a extensão do arquivo é aceita
                            if (array_search($extensao, $extensoes_aceitas) === false):
                                  echo 'Extensão Inválida!';                              
                               exit(); 
                            endif;                     
                             // Verifica se o upload foi enviado via POST   
                             if(is_uploaded_file($_FILES['foto']['tmp_name'])):                                    
                                  // Verifica se o diretório de destino existe, senão existir cria o diretório  
                                  if(!file_exists($pasta)):  
                                       mkdir($pasta);  
                                  endif;                            
                                  // Monta o caminho de destino com o nome do arquivo  
                                  $caminho_imagem = $pasta . $foto["name"];
                                    $nomeFoto = $foto["name"];
                                  // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
                                  if (!move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_imagem)):  
                                      echo 'Houve um erro ao gravar arquivo na pasta de destino!'; 
                                       exit();  
                                  endif;  
                             endif;  
                        endif;                
             
                //  echo "Link: $link - nome: $nome - foto: $nomeFoto";
                            // Insere os dados no banco
                            $sql = mysqli_query($link,"INSERT INTO destaques (`cod`,`nome`,`link`,`foto`) VALUES 
                            ('','$nome','$link','$nomeFoto')") or die ("Houve erro na gravação dos dados" . mysqli_error()); 
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
                                $link = $_POST['link'];
                                $alteraFoto = $_POST['alteraFoto'];
                                $status = $_POST['status'];
                                $fotoAtual = $_POST['fotoAtual'];
                                if ($alteraFoto == "sim"):
                                   unlink($pasta.$fotoAtual);
                                  if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0):  
                                    $foto = $_FILES['foto'];
                                      $extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
                                      $array_extensoes   = explode('.', $_FILES['foto']['name']);
                                      $extensao = strtolower(end($array_extensoes));
                               
                                       // Validamos se a extensão do arquivo é aceita
                                      if (array_search($extensao, $extensoes_aceitas) === false):
                                            echo 'Extensão Inválida!';                              
                                         exit(); 
                                      endif;
                               
                                       // Verifica se o upload foi enviado via POST   
                                       if(is_uploaded_file($_FILES['foto']['tmp_name'])):  
                                            
                                            // Verifica se o diretório de destino existe, senão existir cria o diretório  
                                            if(!file_exists($pasta)):  
                                                 mkdir($pasta);  
                                            endif;  
                                    
                                            // Monta o caminho de destino com o nome do arquivo  
                                            $caminho_imagem = $pasta . $foto["name"];
                                              $nomeFoto = $foto["name"];
                                            // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
                                            if (!move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_imagem)):  
                                                echo 'Houve um erro ao gravar arquivo na pasta de destino!'; 
                                                 exit();  
                                            endif;  
                                       endif;  
                                  endif;                
                                  $sql = mysqli_query($link,"UPDATE destaques SET nome='$nome', link='$link', status=$status, foto='$nomeFoto' WHERE cod=$cod ") or die ("Houve erro na gravação dos dados" . mysqli_error());              
                                else:
                    $sql = mysqli_query($link,"UPDATE destaques SET nome='$nome', link='$link', status=$status WHERE cod=$cod") or die ("Houve erro na gravação dos dados" . mysqli_error()); 
                endif;          
                if($sql) {
                  echo $sucesso; 
                } else {
                echo $erro;
                }
                  
                  }  else if (isset($_GET['excluir'])){
                      $cod= $_GET['cod'];
                     
                      $sqlb = mysqli_query($link,"SELECT foto FROM destaques where cod=$cod") or die("ERRO NO SQL");
                      $dados = mysqli_fetch_array($sqlb);
                                         $foto = $dados['foto'];
                                         unlink($pasta.$foto);                 
                    $sqld = mysqli_query($link,"DELETE FROM destaques where cod=$cod") or die("ERRO NO SQL");
                    if($sqld) {
                      echo $sucesso; 
                    } else {
                    echo $erro;
                    }
                  }
                    

                    ?>
   <script src="jquery.min.js"></script>
<script>
 $('.simChecked').click(function(){    
                    $('.inputImagem').fadeIn(1000);                
              }) ;
              $('.naoChecked').click(function(){    
                    $('.inputImagem').fadeOut(1000);                
              }) ;
</script>


