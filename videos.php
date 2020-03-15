<link href="https://unpkg.com/nanogallery2/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="https://unpkg.com/nanogallery2/dist/jquery.nanogallery2.min.js"></script>

<h2 class="titulo-pagina"> <i class="fas fa-angle-double-right"></i> Vídeos</h2>


<?php
include ('conecta.php');
$sqlv = mysqli_query($link,"SELECT * FROM videos where status=1 ORDER BY cod DESC") or die("ERRO NO SQL". mysqli_error());
      $rowv = mysqli_num_rows($sqlv);
    if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}
    while($rowv = mysqli_fetch_assoc($sqlv)){
    $cod = $rowv['cod'];
    $nome = $rowv['nome'];
    $descricao = $rowv['descricao'];
    $midia = $rowv['midia'];
    $idVideo = $rowv['idVideo'];
   
?>
 <div class="acordc0">
	<h4 class="acordc"><i class="fa fa-film" style="font-size: 110%; vertical-align:middle;" aria-hidden="true"></i> <?php echo $nome ?><br></h4>
	<div class="acordc" style="display: none;">
    
    <p>  <?php echo $descricao ?> </p>
<div class="video-container">
<?php if ($midia == "Youtube") { ?>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $idVideo ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>    
                    <?php } else if ($midia == "Facebook") { ?>
                        <iframe src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/Fblottimovimentacao/videos/<?php echo $idVideo ?>/&show_text=0&width=560"  style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true" class="video-iframe"></iframe>
<?php
                    } else {
                        echo "Algo deu errado com o vídeo";
                    } ?>
</div>
                            
</div></div>
<?php
}
?>

<h1> Outra opçao para exibição só funciona com Youtube</h1>

<div ID="ngy2" data-nanogallery2='{
        "itemsBaseURL": "",
        "thumbnailWidth": "200",
        "thumbnailDisplayTransition": "slideUp2",
        "thumbnailLabel": {
          "position": "overImageOnTop",
          "align": "left",
          "titleMultiLine": true,
          "descriptionMultiLine": true
        },
        "allowHTMLinData": true,
        "thumbnailHoverEffect2": "image_blur_0px_5px_1000|label_translateX_1_1_1000|label_font-size_1em_2em_2000",
        "thumbnailAlignment": "center",
        "galleryFilterTags": true,
        "thumbnailLevelUp": true
      }'>
<?php
$sqlv = mysqli_query($link,"SELECT * FROM videos where status=1 ORDER BY cod DESC") or die("ERRO NO SQL". mysqli_error());
      $rowv = mysqli_num_rows($sqlv);
    if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}
    while($rowv = mysqli_fetch_assoc($sqlv)){
    $cod = $rowv['cod'];
    $nome = $rowv['nome'];
    $descricao = $rowv['descricao'];
    $midia = $rowv['midia'];
    $idVideo = $rowv['idVideo'];
   
?>

<?php echo $nome ?>
    
    <!-- <p>  <?php echo $descricao ?> </p> -->
    

 <?php if ($midia == "Youtube") { 
    echo "<a href='https://www.youtube.com/watch?v=$idVideo' data-ngthumb='https://www.youtube.com/watch?v=$idVideo' data-ngdesc='$descricao'>$nome</a>";
                        
                     } else if ($midia == "Facebook") { 
echo "<a href='https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/Fblottimovimentacao/videos/448548206093586' data-ngthumb='https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/Fblottimovimentacao/videos/448548206093586' data-ngdesc='$descricao'>$nome</a>";
                      
                    } else {
                        echo "Algo deu errado com o vídeo";
                    } 
}
?>
</div>



<script>
$('h4.acordc').click(function(){ $('div.acordc:visible').stop().slideUp("slow"); $(this).next('div.acordc').stop().slideToggle("slow"); });
</script>