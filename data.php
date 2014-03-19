<?php

	header("Content-type: text/csv");
	header("Content-Disposition: attachment; filename=data.csv");
	header("Pragma: no-cache");
	header("Expires: 0");

	echo "date,images\n";
	echo "2014-03-17 00:00,0\n";

	$dirname = "uploads/";
	$images = glob($dirname."*");

	$img = array();

	foreach($images as $image){
		$f = explode("/",$image);
		$p = explode("_",$f[1]);
		$d = date("Y-m-d H", $p[0]) . ":00";
		if($img[$d]){
			$img[$d] += 1;
		} else {
			$img[$d] = 1;
		}
	}

	foreach($img as $k => $i) {
   		echo $k . "," . $i . "\n";
   	}

   	$now = date("Y-m-d H") . ":00";

   	if(!$img[$now]){
		echo $now . ",0\n";
	}
   	
?>