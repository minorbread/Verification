<?php
	/**
	* 		
	*/
	class Verification  
	{
		//私有图片
		private $image;
		private $width;
		private $height;
		private $fontcolor;
		private $cn_data = '啥都会会儿空空空合计你马屁哦请勿喷我去网上传播你抽根烟阿水一个和督促你一头牛最下面';
		private $cn_code = '';
		private $en_code = '';

		function __construct($width,$height)
		{
			session_start();
			if (isset($width)&&isset($height)) {
				$this->width = $width;
				$this->height = $height;
			} else {
				$this->width = 100;
				$this->height = 30;
			}
			$this->image = imagecreate($width, $height);
			$col = imagecolorallocate($this->image, 255, 255, 255);
			imagefill($this->image, 0, 0, $col);
		}

		private function __drawdisturb()
		{
			$width = $this->width-1;
			$height = $this->height-1;
			for ($i=0; $i < 4; $i++) { 
				$rancolor = imagecolorallocate($this->image, rand(100,150), rand(100,150), rand(100,150));
				imageline($this->image, rand(0,$height), rand(0,$width), rand(0,$width), rand(0,$height), $rancolor);
			}
			for ($i=0; $i < 200; $i++) { 
				$rancolor = imagecolorallocate($this->image, rand(100,150), rand(100,150), rand(100,150));
				imagesetpixel($this->image, rand(0,$width), rand(0,$height), $rancolor);
			}
		}

		private function __show()
		{
			header("Content-type:image/png;charset=utf8");
			imagepng($this->image);
		}

		public function cnVercat($data='',$fontsize=10,$font='msyh.ttf')
		{
			if (!@$data) {
				$cn_data = $this->cn_data;
			} else {
				$cn_data = $data;
			}
			$strdb = str_split($cn_data,3);
			for ($i=0; $i < 4; $i++) { 
				$fontcolor = imagecolorallocate($this->image, rand(50,130), rand(50,130), rand(50,130)); 
				$index = rand(1,count($strdb))-1;
				$cn = $strdb[$index];
				$this->cn_code .= $cn;
				$x = ($i*$this->width/4)+rand(5,10);
				$y = rand(16,21);
				imagettftext($this->image, $fontsize, 0, $x, $y, $fontcolor, $font, $cn);
			}
			$_SESSION['userAuth'] = $this->cn_code;
			$this->__drawdisturb();
			$this->__show();
		}

		public function enVercat($fontsize=10)
		{
			if (!is_numeric($fontsize)) {
				echo "error!argument has num!<br>";
				exit();
			}
			$data = "abcdefghijklmnopqrstuvwxyz1234567890";
			for ($i=0; $i < 4; $i++) { 
				$fontcolor = imagecolorallocate($this->image, rand(50,130), rand(50,130), rand(50,130)); 
				$content = substr($data, rand(1,strlen($data)),1);
				$x = ($i*100/4)+rand(5,10);
				$y = rand(5,9);
				$this->en_code .= $content;
				imagestring($this->image, $fontsize, $x, $y, $content, $fontcolor);
			}
			$_SESSION['userAuth'] = $this->en_code;
			$this->__drawdisturb();
			$this->__show();
		}
	}
?>