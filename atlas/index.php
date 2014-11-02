<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Atlas #ProtestosBR</title>
	<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="swipebox/css/swipebox.css">
	<link rel="stylesheet" href="style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="jquery.nested.js"></script>
	<script src="swipebox/js/jquery.swipebox.js"></script>
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-545609ad2a7664df" async="async"></script>
</head>
<body>

	<h1 class="page-title">Atlas #ProtestosBR</h1>
	
	<div class="page-intro">
		<p>Um atlas a construir coletivamente com as múltiplas imagens que vêm tecendo os protestos políticos desde junho de 2013 no Brasil. Como lembrar delas? Onde procurar, já que a sua migração é tão incerta e por tantos caminhos subjetivos, afetivos, coletivos, pessoais, maquínicos, orgânicos, inorgânicos, escondidos, revelados? E em seguida, onde guardá-las novamente e devolvê-las ao uso comum? Como lutar com elas e ao lado das imagens que estão por vir?</p>
		<p>Enquanto os algoritmos do Big Data criam bancos de imagens automatizados e massivos, ChIPS quer ativar outras formas de lembrar: uma memória fragmentária, afetiva, involuntária, cheia de lapsos e de imagens que sobrevivem segundo caminhos pouco sondáveis.</p>
		<p>Este projeto é resultado da <a href="..">Chamada de Imagens Políticas Sobreviventes</a></p>
		<p>&nbsp;</p>
		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<div class="addthis_sharing_toolbox"></div>
	</div>
	
	<div id="container">
	<?php

		error_reporting(E_ALL);

		$dirname = "../uploads/";
		$images = glob($dirname."*");

		shuffle($images);

		foreach($images as $image){
			
			list($width, $height, $type, $attr) = getimagesize($image);
			
			$ratio = $width / $height;
			
			$rand = rand(1,20);

			$w = 256;
			$h = 256;

			$box = ($rand < 5) ? '44' : '22';

			if($ratio > 1.3){
				$w = 384;
				$h = 256;
				$box = ($rand < 5) ? '64' : '32';
			} else if($ratio < 0.7){
				$w = 256;
				$h = 384;
				$box = ($rand < 5) ? '46' : '23';
			}

			$image_size = $w.'x'.$h;
			$medium = '/mnemopolis/thumb.php?src=' . str_replace('../uploads','uploads',$image) . '&size=<720';
			$thumb = '/mnemopolis/thumb.php?src=' . str_replace('../uploads','uploads',$image) . '&zoom=1&crop=1&size=' . $image_size;
			
			echo "\n\t\t<a rel=\"atlas\" class=\"box size$box\" href=\"$medium\" target=\"_blank\">\n\t\t\t<img src=\"$thumb\" data-ratio=\"$ratio\" />\n\t\t</a>";
		}

	?>
	</div>
	
	<script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-44330723-1']);
        _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
	
		$(function() { 
		 
			$('#container').nested({
				minWidth: 64,
				gutter: 10
			});

			$('.box').swipebox();

		});
		
		
	</script>
</body>
</html>