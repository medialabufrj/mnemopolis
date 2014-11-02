<?php

	function random_string($length) {
		$key = '';
		$keys = array_merge(range(0, 9), range('a', 'z'));

		for ($i = 0; $i < $length; $i++) {
			$key .= $keys[array_rand($keys)];
		}

		return $key;
	}

	$ds = DIRECTORY_SEPARATOR;
	$storeFolder = 'uploads';
	if (!empty($_FILES)) {
		$fileName = $_FILES['file']['name'];
		$tempFile = $_FILES['file']['tmp_name'];
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		$targetPath = dirname( __FILE__ ) . $ds . $storeFolder . $ds;
		list($width, $height, $type, $attr) = getimagesize($tempFile);
		//$targetFile =  $targetPath . $_FILES['file']['name'];
		//$targetFile =  $targetPath . time() . "_" . random_string(5) . "." . $ext;
		$targetFile =  $targetPath . time() . "_" . random_string(5) . "_" . $width . "_" . $height . "." . $ext;
		move_uploaded_file($tempFile,$targetFile);

	}
?>