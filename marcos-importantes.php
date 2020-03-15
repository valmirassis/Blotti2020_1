
<h2 class="titulo-pagina"> <i class="fas fa-angle-double-right"></i> Marcos Importantes</h2>
<link rel="stylesheet" href="css/timeliner-future.css" type="text/css" media="screen">
	<link rel="stylesheet" href="js/vendor/venobox/venobox.css" type="text/css" media="screen">

    <div class="container-tl">
		<div id="timeline" class="timeline-container">

<?php
include ('conecta.php');
$sqlv = mysqli_query($link,"SELECT * FROM marcos where status=1 ORDER BY ano DESC") or die("ERRO NO SQL". mysqli_error());
$rowv = mysqli_num_rows($sqlv);
if ($rowv <= 0) { echo "<br>Sem itens cadastrados";}
while($rowv = mysqli_fetch_assoc($sqlv)){
$cod = $rowv['cod'];
$nome = $rowv['nome'];
$descricao = $rowv['descricao'];
$ano = $rowv['ano'];
$foto = $rowv['foto'];
$fotoMini = $rowv['fotomini'];
?>
	<br class="clear">

<div class="timeline-wrapper">
    <h2 class="timeline-time"><span><?php echo $ano ?></span></h2>
    <dl class="timeline-series">
        <span class="tick tick-before"></span>
        <dt id="marco<?php echo $ano?>" class="timeline-event"><a><?php echo $nome ?></a></dt>
        <span class="tick tick-after"></span>
        <dd class="timeline-event-content" id="marco<?php echo $ano?>EX">
            <div class="media">
                <a href="http://www.blotti.com.br/arquivos/empresa/marcos/<?php echo $foto ?>" class="venobox" data-type="image/jpg" data-overlay="rgba(0,0,0,0.5)"><img src="http://www.blotti.com.br/arquivos/empresa/marcos/<?php echo $fotoMini ?>" alt="<?php echo $nome ?>" width="200"></a>
                
            </div><!-- /.media -->
<div class="texto">
            
                <p> <?php echo $descricao ?> </p>
            
        </div>	

        <br class="clear">
        </dd><!-- /.timeline-event-content -->


    </dl><!-- /.timeline-series -->
</div><!-- /.timeline-wrapper -->






<br class="clear">

<?php
}
?>

		

		</div><!-- /#timeline -->

	</div><!-- /.container -->

	<!-- GLOBAL CORE SCRIPTS -->

	<script type="text/javascript" src="js/vendor/venobox/venobox.min.js"></script>
	<script type="text/javascript" src="js/timeliner.js"></script>
	<script>
		$(document).ready(function() {
			$.timeliner({
				timelineContainer:'#timeline',
			});
			$('.venobox').venobox();
		});

	</script>