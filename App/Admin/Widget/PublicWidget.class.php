<?php
	namespace Admin\Widget;
	use Think\Controller;
	class PublicWidget extends Controller {	

		// 页脚 
		public function footer ($active) {
	    	$this -> active = $active;
	    	$this -> display('Public:footer');
		}
        //红包页脚
        public function money(){
        	$this ->display('Public:money');
        }

        //裂变红包页脚
        public function sendpack(){
        	$this ->display('Public:sendpack');
        }
	   
	}
?>