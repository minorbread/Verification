<?php
	session_start();
	$_SESSION['userAuth'] = '';
	$image = imagecreatetruecolor(100, 30);
	$col = imagecolorallocate($image, 255, 255, 255);
	imagefill($image, 0, 0, $col);
	$fontsize = 10;
	$cn_code = '';
	$data = '啥都会会儿空空空合计你马屁哦请勿喷我去网上传播你抽根烟阿水一个和督促你一头牛最下面';
	$strdb = str_split($data,3);
	for ($i=0; $i < 4; $i++) { 
		$font = './msyh.ttf';
		$fontcolor = imagecolorallocate($image, rand(50,130), rand(50,130), rand(50,130));
		// $data = "abcdefghijklmnopqrstuvwxyz1234567890";
		// $content = substr($data, rand(1,strlen($data)),3);
		$index = rand(0,count($strdb));
		$cn = $strdb[$index];
		$cn_code .= $cn;
		$x = ($i*100/4)+rand(5,10);
		$y = rand(11,15);
		imagettftext($image, $fontsize, 0, $x, $y, $fontcolor, $font, $cn);
		// imagestring($image, $fontsize, $x, $y, $content, $fontcolor);
	}
		$_SESSION['userAuth'] = $cn_code;
	for ($i=0; $i < 4; $i++) { 
		$rancolor = imagecolorallocate($image, rand(100,150), rand(100,150), rand(100,150));
		imageline($image, rand(0,29), rand(0,99), rand(0,99), rand(0,29), $rancolor);
	}
	for ($i=0; $i < 200; $i++) { 
		$rancolor = imagecolorallocate($image, rand(100,150), rand(100,150), rand(100,150));
		imagesetpixel($image, rand(0,99), rand(0,29), $rancolor);
	}
	header("Content-type:image/png;charset=utf8");
	imagepng($image);




?>