<?php

	$dirname = "UPLOAD_DIR/";
	$images = glob($dirname."*");

	foreach($images as $image){
		echo '<a href="'.$image.'" target="_blank" style="float:left;"><img src="'.$image.'" height="100"></a>';
	}

?>