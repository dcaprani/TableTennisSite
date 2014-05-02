<?php
	function imgResize($target, $newcopy, $w, $h, $ext){
		list($origW, $origH) = getimagesize($target);
		$scaleRatio = $origW/$origH;
		if(($w/$h)>$scaleRatio){
			$w = $h*$scaleRatio;
		}else{
			$h = $w/$scaleRatio;
		}
		$img = "";
		$ext = strtolower($ext);
		if($ext == "gif"){
			$img = imagecreatefromgif($target);
		}else if($ext == "png"){
			$img = imagecreatefrompng($target);
		}else{
			$img = imagecreatefromjpeg($target);
		}
		$tci = imagecreatetruecolor($w, $h);
		imagecopyresampled($tci, $img, 0,0,0,0, $w, $h, $origW, $origH);
		imagejpeg($tci, $newcopy, 80);
	}
?>