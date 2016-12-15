<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Atlas #ProtestosBR</title>
	<meta name="viewport" content="width=768">
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
	
	<header id="header">

		<h1 class="page-title">Atlas #ProtestosBR</h1>

		<div class="page-intro">
			<img class="image-header" src="atlas-protestosbr.jpg" />
			
			<p>O Atlas #ProtestosBR é uma construção coletiva, resultado da <a href="..">Chamada de Imagens Políticas Sobreviventes / ChIPS</a>. As imagens que ele abriga foram enviadas anonimamente por aqueles que desejam colaborar na criação de uma memória visual comum dos protestos iniciados em junho de 2013 no Brasil. Este Atlas surgiu do desejo de criar um espaço capaz de simultaneamente receber, abrigar e devolver ao uso comum as imagens que teceram e tecem nossas lutas urbanas. Desejo também de reunir imagens políticas que circularam tão profusamente na web desde junho de 2013, com migração e destinos tão incertos. Mas não queríamos usar nenhum procedimento automatizado de coleta; queríamos que as imagens que compusessem esse Atlas e aqui viessem se abrigar, se reunir, fossem mobilizadas por algum gesto, desejo, lembrança. As imagens que aqui sobrevivem nos chegam portanto por caminhos pouco sondáveis, mas expressivos.</p>

			<p>O Atlas #ProtestosBR é ao mesmo tempo de todos e de ninguém; por isso optamos pelo envio anônimo das imagens. Mas respeitamos e agradecemos imensamente os seus autores, aqueles que as fizeram ganhar mundo, de modo que se você for um deles e desejar que a sua imagem seja creditada, por favor <a href="mailto:medialabufrj@gmail.com" title="medialabufrj@gmail.com">entre em contato conosco</a>. Agradecemos a todos os colaboradores e reminiscentes que fizeram com que cada uma dessas imagens aqui aportasse.</p>

			<p>Cada imagem que chega guarda um segredo sobre o seu trajeto e mobiliza secretamente imagens por vir. Vida secreta das imagens. Memória coletiva em ação. O Atlas #ProtestosBR permanecerá assim indefinidamente aberto à chegada de novas imagens, através da <a href="..">ChIPS</a>, e crescerá a cada nova colaboração, bem-vinda em qualquer hora.</p>

			<p>Novembro de 2014, Brasil.</p>

			<p>&nbsp;</p>
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<div class="addthis_sharing_toolbox"></div>
		</div>

	</header>
	
	<div id="container">
	<?php

		error_reporting(E_ALL);

		$dirname = "../uploads/";
		$images = glob($dirname."*");

		if(isset($_GET['recentes'])) {
			usort($images, create_function('$a,$b', 'return filemtime($b) - filemtime($a);'));
		}
		else {
			shuffle($images);	
		}

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
			$medium = '/mnemopolis/thumb.php?src=' . str_replace('../uploads','uploads',$image) . '&size=<960';
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
				gutter: 10,
				animate: false,
				resizeToFit: false
			});

			$('.box').swipebox();

			$(window).scroll(function(e) {
				
				var wTop = $(window).scrollTop();
				var wHeight = $(window).height();

				$('.box img').each(function (i) {

					var oTop = $(this).offset().top;
					var oHeight = $(this).outerHeight();

					if (oTop > wTop && oTop + oHeight < wTop + wHeight ) {
						$(this).addClass('show')
					} else {
						$(this).removeClass('show')
					}
				});

				$('#header').each(function (i) {
					var oHeight = $(this).outerHeight();
					if(wTop < oHeight-300){
						$(this).css('opacity', 1);
					}else{
						$(this).css('opacity', Math.max(0, 1-((wTop-oHeight+300)/300)));	
					}
				});
			})

			setTimeout(function(){
				$(window).scroll();
			},1000);

		});
		
		
	</script>
</body>
</html>
