<?php
	namespace Admin\Controller;
	use Think\Controller;
	class UserController extends CommonController {
		
		public function index(){
			$uname = D('admin') -> where(array('id'=> is_login())) -> field('name')->select();
			$data = D('weixin_user') -> where($where) ->limit(10) -> order('subscribe_time DESC')->select();
			$res = D('weixin_user') -> where($where)->find();
			//p($post);
			if($res){
				file_put_contents('file.json',"用户信息已经存在，他的openid是：".$res['openid']."时间是：".date('Y-m-d H:i:s'). "\n", FILE_APPEND);
			}
			$this -> uname = $uname;
			$this -> post = $data;
			$this ->display();
		}
        //动态加载内容
           public function ajax_load () {
	    	if (!IS_AJAX) E('页面不存在！');    
	    	$db = D('weixin_user');
	    	$currentPage = I('post.page', 1, 'intval');
	    	$size =8;
	    	$start = ($currentPage - 1) * $size;
	    	$data = $db -> where($where)  -> limit(8) -> order('subscribe_time DESC') -> select();
	    	$this -> ajaxreturn(array('status' => 1, 'data' => $data ));
	    }
       //view
	    public function view(){
	    	$id = I('get.id');
	    	//var_dump($id);
	    	$res = D('weixin_user') -> where(array('id' =>$id)) ->find();
	    	$content = D('weixin_user') -> where(array('id' =>$id)) ->select();
	    	$this -> content = $content;
	    	$us = D('weixin_user') -> where(array('id' => array('NOTIN', $res['id']))) -> limit(5)->select();
            $this -> us = $us;
	    	$this->display();
	    }
    public function info(){
    	$this -> display();
    }
    public function send_pack(){
    	$this->display();
    }
    public function group_pack(){
    	$this->display();
    }
		
		
		
		
		
		
		
		
		
		
		
		
		
	}