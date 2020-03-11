
<h2 class="titulo-pagina"> <i class="fas fa-angle-double-right"></i> Vídeos</h2>


<?php
include ('admin/conecta.php');
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
 <div class="acordcsc0">
	<h4 class="acordcsc"><i class="fa fa-film" style="font-size: 110%; vertical-align:middle;" aria-hidden="true"></i> <?php echo $nome ?><br></h4>
	<div class="acordcsc" style="display: none;">
	

    
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


<script>
$('h4.acordcsc').click(function(){ $('div.acordcsc:visible').stop().slideUp("slow"); $(this).next('div.acordcsc').stop().slideToggle("slow"); });
</script>
		
