<?php
require_once("verifica.php");
include ('conecta.php');
$cod_usuario = $_SESSION['cod'];
$pasta = "../arquivos/produtos/produtos/";     
$sucesso = "<script>alert('Operação realizada com sucesso');</script><meta http-equiv='refresh' content='0;URL=produtos.php?page=Produtos'> ";   
$erro = "<script>alert('Ocorreu algum erro. Tente novamente!');</script><meta http-equiv='refresh' content='0;URL=produtos.php?page=Produtos.php'> ";  
?> 

   <?php
 if (isset($_POST['documento'])){
 $cod = $_POST['documento'];
 $sqlb = mysqli_query($link,"SELECT p.*, c.nome as nomeCat FROM catprodutos as c, produtos as p where p.cod=$cod") or die("ERRO NO SQL");
 $dados = mysqli_fetch_array($sqlb);
                    $nome = $dados['nome'];
                    $descricao = $dados['descricao'];
                    $codCat = $dados['categoria'];
                    $categoria = $dados['nomeCat'];
                    $fotoProduto = $dados['foto_produto'];
                    $fotoTabela = $dados['foto_tabela'];
                    $status = $dados['status'];
?>
     <form action="produtoBD.php" method="POST" name="frmcadastra" id="frmcadastra" enctype="multipart/form-data">
                    Categoria: 
                     <select name="categoria" class="form-control input-group2" required>
                     <option value="<?php echo $codCat ?>"><?php echo $categoria ?></option>
                     <?php
                        $sqlc = mysqli_query($link,"SELECT * FROM catprodutos where status = 1 ORDER BY cod DESC") or die("ERRO NO SQL");
                        $rowc = mysqli_num_rows($sqlc);
                      if ($rowc <= 0) { echo "<br>Sem categorias cadastradas";}
                    while($rowc = mysqli_fetch_assoc($sqlc)){
                      echo "<option value='".$rowc['cod']."'>".$rowc['nome']."</option>";
                    }?>

                     </select>
                     <input type="hidden" name="cod" value="<?php echo $cod?>">
                     Nome: 
                    <input type="text" name="nome" class="form-control input-group2" required value="<?php echo $nome ?>">
                   
                    Descrição: <textarea  name="descricao" class="form-control input-group2" required><?php echo $descricao ?></textarea>
                    Status:
                    <input type="radio" name="status" value="1" <?php if ($status == 1) echo "checked"; ?>> Ativo
                    <input type="radio" name="status" value="0" <?php if ($status == 0) echo "checked"; ?>>  Inativo<br>
                    <input type="hidden" name="fotoAtualProd" value="<?php echo $fotoProduto ?>">
                    <input type="hidden" name="fotoAtualTab" value="<?php echo $fotoTabela ?>">
                    Fotos:
                    <img src="<?php echo $pasta.$fotoProduto ?>" width="150px"> <img src="<?php echo $pasta.$fotoTabela ?>" width="150px"><br>
                    Alterar foto Produto:
                    <input type="radio" name="alteraFotoProd" value="sim" class="simCheckedProd"> Sim
                    <input type="radio" name="alteraFotoProd" value="nao" checked class="naoCheckedProd">  Não<br>
                    <input type="file" value="selecione" name="foto_produto" class="form-control input-group2 inputImagemProd" style="display:none">
                    Alterar foto Tabela:
                    <input type="radio" name="alteraFotoTab" value="sim" class="simCheckedTab"> Sim
                    <input type="radio" name="alteraFotoTab" value="nao" checked class="naoCheckedTab">  Não
                    <input type="file" value="selecione" name="foto_tabela" class="form-control input-group2 inputImagemTab" style="display:none">
                    <br> <br>
                    <input type="submit" name="editar" value="Editar" class="btn btn-success btn-block">
                </form>
<?php
}
else if (isset($_POST['cadastrar'])){
                      $nome = $_POST['nome'];
                      $categoria = $_POST['categoria'];
                      $descricao = $_POST['descricao'];
                      $fotoProduto = $_FILES['foto_produto'];
                      $fotoTabela = $_FILES['foto_tabela'];
                         
                    //   Tratamentos FotoProduto
                        if(isset($_FILES['foto_produto']) && $_FILES['foto_produto']['size'] > 0):   
                            $extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
                            $array_extensoes   = explode('.', $_FILES['foto_produto']['name']);
                            $extensao = strtolower(end($array_extensoes));                     
                             // Validamos se a extensão do arquivo é aceita
                            if (array_search($extensao, $extensoes_aceitas) === false):
                                  echo 'Extensão Inválida!';                              
                               exit(); 
                            endif;                     
                             // Verifica se o upload foi enviado via POST   
                             if(is_uploaded_file($_FILES['foto_produto']['tmp_name'])):                                    
                                  // Verifica se o diretório de destino existe, senão existir cria o diretório  
                                  if(!file_exists($pasta)):  
                                       mkdir($pasta);  
                                  endif;                            
                                  // Monta o caminho de destino com o nome do arquivo  
                                  $caminho_imagem = $pasta . $fotoProduto["name"];
                                    $nomeFotoProd = $fotoProduto["name"];
                                  // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
                                  if (!move_uploaded_file($_FILES['foto_produto']['tmp_name'], $caminho_imagem)):  
                                      echo 'Houve um erro ao gravar arquivo na pasta de destino!'; 
                                       exit();  
                                  endif;  
                             endif;  
                        endif;                
             //   Tratamentos FotoTabela
                        if(isset($_FILES['foto_tabela']) && $_FILES['foto_tabela']['size'] > 0):   
                            $extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
                            $array_extensoes   = explode('.', $_FILES['foto_tabela']['name']);
                            $extensao = strtolower(end($array_extensoes));                     
                             // Validamos se a extensão do arquivo é aceita
                            if (array_search($extensao, $extensoes_aceitas) === false):
                                  echo 'Extensão Inválida!';                              
                               exit(); 
                            endif;                     
                             // Verifica se o upload foi enviado via POST   
                             if(is_uploaded_file($_FILES['foto_tabela']['tmp_name'])):                                    
                                  // Verifica se o diretório de destino existe, senão existir cria o diretório  
                                  if(!file_exists($pasta)):  
                                       mkdir($pasta);  
                                  endif;                            
                                  // Monta o caminho de destino com o nome do arquivo  
                                  $caminho_imagem = $pasta . $fotoTabela["name"];
                                    $nomeFotoTab = $fotoTabela["name"];
                                  // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
                                  if (!move_uploaded_file($_FILES['foto_tabela']['tmp_name'], $caminho_imagem)):  
                                      echo 'Houve um erro ao gravar arquivo na pasta de destino!'; 
                                       exit();  
                                  endif;  
                             endif;  
                        endif; 

                            // Insere os dados no banco
                            $sql = mysqli_query($link,"INSERT INTO produtos(`cod`, `nome`,`descricao`,`categoria`,`foto_produto`, `foto_tabela`) VALUES 
                      ('','$nome','$descricao','$categoria', '$nomeFotoProd', '$nomeFotoTab')") or die ("Houve erro na gravação dos dados" . mysqli_error()); 
                 
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
                                $categoria = $_POST['categoria'];
                                $descricao = $_POST['descricao'];
                                $alteraFotoProd = $_POST['alteraFotoProd'];
                                $alteraFotoTab = $_POST['alteraFotoTab'];
                                $status = $_POST['status'];
                                $fotoAtualProd = $_POST['fotoAtualProd'];
                                $fotoAtualTab = $_POST['fotoAtualTab'];

                                // Alterar a foto do produto
                                if ($alteraFotoProd == "sim"):
                                   unlink($pasta.$fotoAtualProd);
                                   $fotoProduto = $_FILES['foto_produto'];
                                   if(isset($_FILES['foto_produto']) && $_FILES['foto_produto']['size'] > 0):   
                                    $extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
                                    $array_extensoes   = explode('.', $_FILES['foto_produto']['name']);
                                    $extensao = strtolower(end($array_extensoes));                     
                                     // Validamos se a extensão do arquivo é aceita
                                    if (array_search($extensao, $extensoes_aceitas) === false):
                                          echo 'Extensão Inválida!';                              
                                       exit(); 
                                    endif;                     
                                     // Verifica se o upload foi enviado via POST   
                                     if(is_uploaded_file($_FILES['foto_produto']['tmp_name'])):                                    
                                          // Verifica se o diretório de destino existe, senão existir cria o diretório  
                                          if(!file_exists($pasta)):  
                                               mkdir($pasta);  
                                          endif;                            
                                          // Monta o caminho de destino com o nome do arquivo  
                                          $caminho_imagem = $pasta . $fotoProduto["name"];
                                            $nomeFotoProd = $fotoProduto["name"];
                                          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
                                          if (!move_uploaded_file($_FILES['foto_produto']['tmp_name'], $caminho_imagem)):  
                                              echo 'Houve um erro ao gravar arquivo na pasta de destino!'; 
                                               exit();  
                                          endif;  
                                     endif;  
                                    endif;
                                     $sql = mysqli_query($link,"UPDATE produtos SET foto_produto='$nomeFotoProd' WHERE cod=$cod ") or die ("Houve erro na gravação dos dados" . mysqli_error());                    
                                endif; 
                            //  Alterar foto Tabela
                                if ($alteraFotoTab == "sim"):
                                    unlink($pasta.$fotoAtualTab);
                                    $fotoTabela = $_FILES['foto_tabela'];
                                    if(isset($_FILES['foto_tabela']) && $_FILES['foto_tabela']['size'] > 0):   
                                        $extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
                                        $array_extensoes   = explode('.', $_FILES['foto_tabela']['name']);
                                        $extensao = strtolower(end($array_extensoes));                     
                                         // Validamos se a extensão do arquivo é aceita
                                        if (array_search($extensao, $extensoes_aceitas) === false):
                                              echo 'Extensão Inválida!';                              
                                           exit(); 
                                        endif;                     
                                         // Verifica se o upload foi enviado via POST   
                                         if(is_uploaded_file($_FILES['foto_tabela']['tmp_name'])):                                    
                                              // Verifica se o diretório de destino existe, senão existir cria o diretório  
                                              if(!file_exists($pasta)):  
                                                   mkdir($pasta);  
                                              endif;                            
                                              // Monta o caminho de destino com o nome do arquivo  
                                              $caminho_imagem = $pasta . $fotoTabela["name"];
                                                $nomeFotoTab = $fotoTabela["name"];
                                              // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
                                              if (!move_uploaded_file($_FILES['foto_tabela']['tmp_name'], $caminho_imagem)):  
                                                  echo 'Houve um erro ao gravar arquivo na pasta de destino!'; 
                                                   exit();  
                                              endif;  
                                         endif;  
                                    endif;
                                      $sql = mysqli_query($link,"UPDATE produtos SET foto_tabela='$nomeFotoTab' WHERE cod=$cod ") or die ("Houve erro na gravação dos dados" . mysqli_error());                    
                                 endif; 
                            
                                 
                               
                    
                    $sql = mysqli_query($link,"UPDATE produtos SET nome='$nome', descricao='$descricao', categoria='$categoria', status=$status WHERE cod=$cod") or die ("Houve erro na gravação dos dados" . mysqli_error()); 
                         
                if($sql) {
                  echo $sucesso; 
                } else {
                echo $erro;
                }
                  
                  }  else if (isset($_GET['excluir'])){
                      $cod= $_GET['cod'];
                
                        //pegar o nome da imagem para apagar
                      $sqlb = mysqli_query($link,"SELECT foto_produto, foto_tabela FROM produtos where cod=$cod") or die("ERRO NO SQL");
                      $dados = mysqli_fetch_array($sqlb);
                                         unlink($pasta.$dados['foto_produto']);    
                                         unlink($pasta.$dados['foto_tabela']); 
                                         
                     //apagar o registro
                    $sqld = mysqli_query($link,"DELETE FROM produtos where cod=$cod") or die("ERRO NO SQL");
                    if($sqld) {
                      echo $sucesso; 
                    } else {
                    echo $erro;
                    }
                  }
                    

                    ?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
 $('.simCheckedProd').click(function(){    
                    $('.inputImagemProd').fadeIn(1000);                
}) ;
 $('.naoCheckedProd').click(function(){    
                    $('.inputImagemProd').fadeOut(1000);                
 }) ;
 $('.simCheckedTab').click(function(){    
                    $('.inputImagemTab').fadeIn(1000);                
}) ;
 $('.naoChecked').click(function(){    
                    $('.inputImagemTab').fadeOut(1000);                
 }) ;
</script>


