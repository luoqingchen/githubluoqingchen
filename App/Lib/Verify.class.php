<?php
	namespace Lib;
	class Verify {
		/*自定义验证码*/
		static public function verify ($counts, $width = 100, $height = 30) {
			$checkcode = self::make_rand($counts);
			session('verify', strtolower($checkcode));
			self::getVerifyImage($checkcode, $width, $height);
	    }
	    static public function getVerifyImage($text, $width, $height) {
			$font      = 'Public/Static/Font/t1.ttf';
			$im_x      = $width;
			$im_y      = $height;
			$im        = imagecreatetruecolor($im_x,$im_y);
			$text_c    = ImageColorAllocate($im, mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
			/*画布背景颜色*/
			$tmpC0     = 255;//mt_rand(100,255);
			$tmpC1     = 255;//mt_rand(100,255);
			$tmpC2     = 255;//mt_rand(100,255);
			$buttum_c  = ImageColorAllocate($im,$tmpC0,$tmpC1,$tmpC2);
			imagefill($im, 36, 13, $buttum_c);
			for ($i=0;$i<strlen($text);$i++) {
				$tmp    = substr($text, $i, 1);
				$array  = array(-1, 1);
				$p      = array_rand($array);
				$an     = $array[$p]*mt_rand(1,10);//角度
				$size   = 30;
				imagettftext($im, $size, $an, 100+$i*$size, 45, $text_c, $font, $tmp);
			}
			$distortion_im = imagecreatetruecolor ($im_x, $im_y);
			imagefill($distortion_im, 0, 0, $buttum_c);
			for ( $i=0; $i < $im_x; $i++) {
				for ( $j=0; $j < $im_y; $j++) {
					$rgb = imagecolorat($im, $i , $j);
					if( (int)($i+1+sin($j/$im_y)*30) <= imagesx($distortion_im)&& (int)($i+sin($j/$im_y)*30) >=0 ) {
						imagesetpixel ($distortion_im, (int)($i+0) , $j+10 , $rgb);
					}
				}
			}
			//加入干扰象素;
			$count = 500;//干扰像素的数量
			for($i=0; $i<$count; $i++){
				$randcolor = ImageColorallocate($distortion_im,mt_rand(0, 255),mt_rand(0, 255),mt_rand(0, 255));
				imagesetpixel($distortion_im, mt_rand()%$im_x , mt_rand()%$im_y , $randcolor);
			}
			$rand = rand(0, $height);
			$rand1 = rand($width, $height);
			$rand2 = rand(0, $height);
			for ($yy = $rand; $yy <=+ $rand + 1; $yy++) {
				for ($px = -$width; $px <= $width; $px = $px+0.8) {
					$x = $px / $rand1;
					if ($x != 0) {
						$y = sin($x);
					}
					$py = $y * $rand2 *2;
					imagesetpixel($distortion_im, $px+80, $py+$yy, $text_c);
				}
			}
			//设置文件头;
			Header("Content-type: image/JPEG");
			//以JPEG格式将图像输出到浏览器或文件;
			ImagePNG($distortion_im);
			//销毁一图像,释放与image关联的内存;
			ImageDestroy($distortion_im);
			ImageDestroy($im);
		}
	    static public function make_rand($length="32") {
			$str = "abcdefghijklmnopqrstuvwxyz";
			$result = "";
			for($i=0; $i < $length; $i++) {
				$num[$i] = rand(0, 25);
				$result .= $str[$num[$i]];
			}
			return $result;
		}
	}
?>