<?php
include ('../admin20/conecta.php');
?>
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
<link rel="stylesheet" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
  <header>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                <!-- Brand -->
                <a class="navbar-brand" href="#"><img src="img/blotti_movimentacao_de_cargas_acessorios.png" width="150px"></a>
              
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link anima" href="index.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link anima" href="empresa.php"><i class="fas fa-industry"></i> Empresa</a>
                    </li>
        
                    <li class="nav-item">
                        <a class="nav-link anima" href="produtos.php"><i class="fas fa-archive"></i> Produtos</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link anima" href="servicos.php"><i class="fas fa-cogs"></i> Serviços</a>
                      </li>   
                      <li class="nav-item">
                          <a class="nav-link anima" href="http://conteudo.blotti.com.br/catalogo" target="_blank"><i class="fas fa-book"></i> Catálogo</a>
                      </li>  
                      <li class="nav-item">
                          <a class="nav-link anima" href="trabalhe-conosco.php" target="_blank"><i class="fas fa-cubes"></i> Trabalhe conosco</a>
                      </li>         
                        <li class="nav-item">
                                <a class="nav-link anima" href="contato.php"><i class="fas fa-envelope"></i> Contato</a>
                        </li>    
                  </ul>
                </div>
              </nav> 
         
            </header>
    <div class="container topo-page">
               <div class="row">
              <img src="img/blotti_contato.jpg" alt="" class="img-responsive">     
</div>
                           
        </div>

        <section class="content">
          <div class="container">
        
    <h2 class="titulo-pagina"> <i class="fas fa-angle-double-right"></i> Contato</h2>
    <script type="text/javascript">

        </script>
             
                  <div class="row">
                     
                      <div class="col-md-6 col-sm">
                        <form action="" onsubmit="return enviar_contato(this); return false;" method="POST" name="frmcontato" id="formcontato">
        
                            <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-industry"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Empresa" aria-label="Informe Empresa" aria-describedby="btnGroupAddon" name="empresa" required>
                              </div>

                              <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-industry"></i></div>
                                </div>
                                <input type="text" id="cnpj" class="form-control" placeholder="Represento uma empresa - CNPJ" aria-label="Informe seu CNPJ" aria-describedby="btnGroupAddon" name="cnpj" maxlength="18">
                              </div>

                              <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Nome" aria-label="Informe seu Nome" aria-describedby="btnGroupAddon" name="nome" required>
                              </div>

                              <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" id="cpf" class="form-control" placeholder="Sou uma pessoa física - CPF" aria-label="Informe seu CPF" aria-describedby="btnGroupAddon" name="cpf" maxlength="14">
                              </div>

                              <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-user-tag"></i></div>
                                </div>
                                <select name="cargo" id="cargo" class="form-control" required>
                                    <option value="">Cargo</option>
                                    <option value="Compras">Compras</option>
                                    <option value="Diretoria">Diretoria</option>
                                    <option value="Engenharia">Engenharia</option>
                                    <option value="Gerência">Gerência</option>
                                    <option value="Manutenção">Manutenção</option>
                                    <option value="Segurança no Trabalho">Segurança no Trabalho</option>
                                    <option value="Técnico">Técnico</option>
                                    <option value="Outros">Outros</option>
                                </select>
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
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-building"></i></div>
                                </div>
                                <select name="estado" id="estado" class="form-control" required>
                                    <option value="">Estado</option>
                                 <?php
    $selecao = "SELECT * FROM estado";
    $sql = mysqli_query($link, $selecao) or die("ERRO NO SQL".mysqli_error());
    
    $row = mysqli_num_rows($sql);
    while($row = mysqli_fetch_assoc($sql)){
    
    
    ?>
      <option value="<?php  echo utf8_encode($row['id']); ?>"><?php  echo $row['nome']; ?></option>
     <?php } ?> 
                                </select>
                              </div>
                        
                              <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-building"></i></i></div>
                                </div>
                                <select name="cidade" id="cidade" class="form-control" required>
                                    <option value="">Aguardando estado...</option>
                              
                                </select>
                              </div>
                       
                              <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-building"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="País" aria-label="Informe seu País" aria-describedby="btnGroupAddon" name="pais" required>
                              </div>

                             <div class="input-group input-group2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-comments"></i></div>
                                </div>
                                <textarea id="mensagem" name="mensagem" class="form-control textarea" required></textarea>
                              </div>
                      
                        <label for="captcha">
                            <span>&nbsp;</span>
                              <!--                        gera check recaptcha -->
                            <div class="g-recaptcha" data-sitekey="6LfL_XcUAAAAAFypnPbF5a2d7gSwKLoGlTY2Sh_J"></div>
                        
                        </label>
                        <div class="form_buttons">
                            
                           
                            <input type="reset" class="btn btn-blotti" value="Limpar" style="border:none; cursor:pointer;" />
                            <input type="submit" id="enviar" class="btn btn-blotti" value="Enviar" name="enviar" style="border:none; cursor:pointer;" />
                        </div>
                    </form>
                      </div>
                      <div class="col-md-6 col-sm">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14285.653663177854!2d-49.0246034!3d-26.4746307!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdb49fd936bdf9d69!2sB.lotti%20Ind%C3%BAstria%20da%20Movimenta%C3%A7%C3%A3o!5e0!3m2!1spt-PT!2sbr!4v1582278641264!5m2!1spt-PT!2sbr" width="100%" height="650" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                      </div>
                  </div>
                     
        </section>
<section class="footer">
<div class="container">
  <div class="row">
    <div class="col-sm text-center">
     <h1> B.lotti - Indústria da Movimentação</h1>
<p>Todos os nossos produtos são resultados de inovação e ótimas ideias, <br>e pela busca incessantes de excelência para movimentação e amarração de cargas seguras.</p>
<br>
<a href="#" class="btn btn-success btn-blotti">Solicitar Orçamento</a>
    </div>
  </div>
  <br>
  <div class="row text-center" style="margin-top: 30px;">
    <div class="col-sm">
      <i class="fas fa-phone-square icon-footer-big"></i><br>
      <b>Contatos</b><br> 
      47 3307-3800<br>
      blotti@blotti.com.br<br>
    </div>
    <div class="col-sm">
      <i class="fas fa-map-marker-alt icon-footer-big"></i><br>
      <b>Localização</b> <br>
      KM 60 BR 280, 15765, Imigrantes, Guaramirim/SC.
     
    </div>
    <div class="col-sm">
      <i class="fas fa-clock icon-footer-big"></i> <br>
      
      <b>Horário de Atendimento</b><br>
      De segunda a sexta das 08:00 às 12:00  e das 13:15 às 18:00
      </div>

<!-- 
    <div class="col-sm">
      <h3>CENTRAL DE ATENDIMENTO</h3> <br>
      <div class="status">
        <a href="https://www.linkedin.com/company/blottimovimentacao" target="_blank"><i class="fab fa-linkedin"></i>&nbsp;<b>/blottimovimentacao</b> </a></div><br>
  <div class="status">
        <a href="https://www.instagram.com/b.lottimovimentacao/" target="_blank"><i class="fab fa-instagram"></i>&nbsp;<b>/b.lottimovimentacao</b> </a> </div>
<br>
          <div class="status">
       <a href="https://www.facebook.com/blottimovimentacao/" target="_blank"><i class="fab fa-facebook-square"></i>&nbsp;<b>/blottimovimentacao</b> </a> </div>
       <br>
              <div class="status">
                <a href="#" target="_blank"><i class="fas fa-phone-square"></i>&nbsp;<b>47 3307-3800</b> </a> </div><br>
                <div class="status">
                  <a href="#" target="_blank"><i class="fas fa-envelope"></i>&nbsp;<b>blotti@blotti.com.br</b> </a> </div>
            </div>
              <div class="col-sm">
                <h3>FUTURAS FEIRAS</h3> <br>
                <img src="img/feira1.jpg" width="200px">
              </div> -->
    </div>
   
  </div>
</div>
</section>
<section class="footer2">
  <div class="container">
    <div class="row">
      <div class="col-sm">
        © 2020 | POLÍTICA DA PRIVACIDADE | COMPLIENCE | CERTIFICADOS | INTRANET | EXTRANET
      </div>
    </div>
  </div>
</section>

<script>
       $(document).ready(function(){
        // Evento change no campo tipo  
         $("select[name=estado]").change(function(){

			$("select[name=cidade]").html('<option value="">Carregando...</option>');
            $.post("cidade.php",
                  {estado:$(this).val()},
                  // Carregamos o resultado acima para o campo marca
				  function(valor){
                     $("select[name=cidade]").html(valor);
                  }
                  )
         })

	  })
                        </script>
            </body>
            </html>