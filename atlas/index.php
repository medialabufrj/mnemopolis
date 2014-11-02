<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Atlas #ProtestosBR</title>
</head>
<body>

	<h1>Atlas #ProtestosBR</h1>
	
	<table>
	<?php

		error_reporting(E_ALL);

		$dirname = "../uploads/";
		$images = glob($dirname."*");

		foreach($images as $image){
			
			list($width, $height, $type, $attr) = getimagesize($image);
			
			$ratio = $width / $height;
			
			$w = 384;
			$h = 384;

			if($ratio > 1.2){
				$w = 384;
				$h = 256;
			} else if($ratio < 0.8){
				$w = 256;
				$h = 384;
			}

			$size = $w.'x'.$h;
			$medium = '../thumb.php?src=' . str_replace('../uploads','uploads',$image) . '&size=<720';
			$thumb = '../thumb.php?src=' . str_replace('../uploads','uploads',$image) . '&zoom=1&crop=1&size=' . $size;
			
			//echo '<a href="'.$medium.'" target="_blank" style="float:left;"><img src="'.$thumb.'"></a>';
			
			echo '<tr><td>'.$ratio.'</td><td><a href="'.$medium.'" target="_blank"><img src="'.$thumb.'"></a></td></tr>';
		}

	?>
	</table>

</body>
</html>