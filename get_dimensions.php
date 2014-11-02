<?php

	$dirname = "uploads2/";
	$images = glob($dirname."*");

	foreach($images as $image){
		list($width, $height, $type, $attr) = getimagesize($image);
		print_r(array($image,$width,$height));
	}

	
?>