<?php
	namespace Admin\Controller;
	use Think\Controller;
	class CommonController extends Controller {
	    public function _initialize() {
			//初始化微信接口
		   Vendor("WxPayPubHelper");
    	}
	}