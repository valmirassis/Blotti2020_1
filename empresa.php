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
?>
         
            </header>
    <div class="container topo-page">
               <div class="row">
              <img src="img/blotti_empresa.jpg" alt="" class="img-responsive">     
</div>
                           
        </div>

        <section class="content">
          <div class="container">
            <ul class="nav justify-content-center nav-empresa">
                <li class="nav-item">
                  <a class="nav-link active" href="?institucional">Institucional</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?marcos-importantes">Marcos Importantes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Certificados</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?videos">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Complience</a>
                  </li>
                  </ul>
<hr>

<?php 
if (isset($_GET['marcos-importantes'])) {
include('marcos-importantes.php');
} else if (isset($_GET['videos'])) {
  include('videos.php');
}
else {
?>
    <h2 class="titulo-pagina"> <i class="fas fa-angle-double-right"></i> B.lotti</h2>

             
                  <div class="row">
                     
                      <div class="col-md-6 col-sm">
                       Fundada em 2006 na cidade de Jaraguá do Sul – SC, a B.lotti é uma empresa especializada em fornecer os melhores produtos e soluções
                        para movimentação de cargas. A ideia foi desenvolver um modelo de negócio personalizado, procurando superar as expectativas do
                        cliente, desenvolvendo e fornecendo produtos de qualidade, priorizando a segurança e agilidade de seus serviços. <br>
                        Hoje a empresa é líder no segmento, através de uma gestão embasada nos princípios de cooperação, comprometimento, respeito, ética
                        e dedicação a clientes, fornecedores, colaboradores e sociedade.</p>
                              <p><b>Pol&iacute;tica de Sistema de Gest&atilde;o Integrada</b><br>
                        Nós da B.lotti oferecemos soluções em Segurança para Movimentação de Cargas, com Qualidade e Confiabilidade, estabelecendo ações para: <br>
                        - Prevenção aos riscos à saúde, poluição e segurança;<br>
                        - Melhoria contínua em nossos produtos e serviços no mercado brasileiro;<br>
                        
                        - Atendimento aos requisitos legais e outros aplicáveis ao nosso segmento;<br>
                        
                        - Tratamento adequado de resíduos industriais.<br>
                              <p><b>Certificação</b><br>
                              A B.lotti possui um Sistema de Gestão Integrado, cujo cumprimento é
                        condição imprescindível para satisfazer as necessidades dos clientes
                        e colaboradores, bem como a preservação do meio ambiente. <br>
                        O cumprimento desta pol&iacute;tica, e dos requisitos nela contemplados,
                        estão garantidos através do órgão Bureau Veritas Certification.</p>
                      </div>
                      <div class="col-md-6 col-sm">
                        <iframe class="video" id="myVideo" src="https://www.youtube.com/embed/6491l7YTe1w?hl=en&rel=0&autoplay=0&enablejsapi=1" frameborder="0" volueme="0" allowfullscreen loop="1"></iframe>
                        <script>
                          var myVideo =  iframe.getElementById('myVideo'); 
                            myVideo.mute();
                          </script> 
                      </div>
                  </div>
                  <div class="row">
                    <hr> 
                    <div class="col-md-6 col-sm">
                        <h2 class="titulo-pagina"> <i class="fas fa-angle-double-right"></i> Missão</h2>
                        Todos os nossos produtos são resultados de inovação e ótimas ideias, e pela busca incessante de excelência para movimentação e
                        amarração de cargas segura. <br>
                        A gestão familiar participativa guia a dinâmica empresarial da B.lotti, proporcionando um ambiente harmonioso de trabalho, investindo
                        em educação corporativa e comprometimento com o sucesso. <br>
                        Desenvolver soluções personalizadas de acordo com a necessidade de cada cliente. <br>
                        Promover aos nossos clientes: Excelência no atendimento, eficiência e eficácia. <br>
                        Oferecer liderança clara e participativa, transparência nas negociações. <br>
                        Destinar corretamente os resíduos produzidos pela empresa preocupando em não agredir o meio ambiente.<br>
                        Responsabilidade Social</p>
                    </div>
                    <div class="col-md-6 col-sm">
                        <h2 class="titulo-pagina"> <i class="fas fa-angle-double-right"></i> Visão</h2>
                     <p>Ser uma empresa reconhecida pela qualidade e segurança de nossos produtos, serviços e atendimento, em todo o território nacional.</p>
                     <h2 class="titulo-pagina"> <i class="fas fa-angle-double-right"></i> Valores</h2>
                     <p><i class="fas fa-check"></i> Seguran&ccedil;a<br>
                        <i class="fas fa-check"></i> Lideran&ccedil;a<br>
                        <i class="fas fa-check"></i> Efici&ecirc;ncia<br>
                        <i class="fas fa-check"></i> Inova&ccedil;&atilde;o<br>
                        <i class="fas fa-check"></i> Trabalho em equipe<br>
                        <i class="fas fa-check"></i> Qualidade<br>
                        <i class="fas fa-check"></i> Meio Ambiente<br>
                        <i class="fas fa-check"></i> Responsabilidade Social<br>
                        <i class="fas fa-check"></i> Desenvolvimento dos Colaboradores<br>
                        <i class="fas fa-check"></i> Excel&ecirc;ncia no atendimento.</p>
                    </div>

                        <?php } ?>       
                </div>       
        </section>
        <?php include ('footer.php');?>
            </body>
            </html>