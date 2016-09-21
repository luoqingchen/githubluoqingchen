<?php
	namespace Admin\Controller;
	use Think\Controller;
	class AuthController extends CommonController {
		
	    public function _initialize() {
	    	if (!is_login()) {
	    		// 获取当前页面的完整地址
	    		$url =  urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	    		redirect(U('Admin/index') . '?url=' . $url);
	    	} else {
            	$this -> user = D('admin') -> where(array('id' => is_login())) -> relation(true) -> find();
	    	}
    	}
	}