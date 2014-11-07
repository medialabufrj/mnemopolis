<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php 
	$model = $_GET["model"];
	if(!$model){
		$model = "square";
	}
?>
	<meta charset="UTF-8">
	<title>Atlas #ProtestosBR: <?php echo $model; ?></title>
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
			<form action="?">
			<select id="select-model" name="model">
			<?php foreach (array("square","horizontal","vertical") as $value) {
				if($value == $model){
					echo "<option value=\"$value\" selected>$value</option>";
				}else{
					echo "<option value=\"$value\">$value</option>";
				}
			} ?>
			</select>
			<input type="submit"/>
			</form>
		</div>

	</header>

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

			$w = 512;
			$h = 512;

			$box = ($rand < 5) ? '44' : '22';

			if($ratio > 1.25){
				if($model != 'horizontal'){
					continue;
				}
				$w = 768;
				$h = 512;
				$box = ($rand < 5) ? '64' : '32';
			} else if($ratio < 0.75){
				if($model != 'vertical'){
					continue;
				}
				$w = 512;
				$h = 768;
				$box = ($rand < 5) ? '46' : '23';
			}else{
				if($model != 'square'){
					continue;
				}
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