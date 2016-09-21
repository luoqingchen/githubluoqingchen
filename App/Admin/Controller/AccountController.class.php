<?php
	namespace Admin\Controller;
	use Think\Controller;
	class AccountController extends CommonController {
		
		 // 登录处理
	    public function login_handle () {
            if (!IS_AJAX) E('页面不存在！');    	
	    	$post = I('post.', '', 'htmlspecialchars');
	    	//还原密码
	    	$key = base64_encode(pack("H*", $post['pass']));
	        $rsa = new \Lib\Rsa;
	    	$post['pass'] = $rsa -> privDecrypt($key, true);
	    	// 调用模型
	    	//p($post['pass']);
	    	$db = D('admin');
	    	if($db -> login($post['user'], $post['pass'])){
                 $this -> success('登录成功',U('/User'));
	    	} else {
	    		$this -> error($db -> getError());
            }
	    }
		//
		  //退出登录
        public function logout() {
            if(is_login()) {
                D('admin') -> logout();
                $this -> redirect('/');
            } else {
                $this -> redirect('/');
            }
        }   

		
	}