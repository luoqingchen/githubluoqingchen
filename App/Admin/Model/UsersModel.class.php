<?php
	namespace Admin\Model;
	use Think\Model\RelationModel;
	class UsersModel extends RelationModel {
		protected $tableName = 'users';
		/**
	     * 登录指定用户
	     * @param  integer $name 用户名/手机号/邮箱, $pass 密码
	     * @return boolean      ture-登录成功，false-登录失败
	     */
	    public function login($name, $pass) {
	    	// 判断用户名类型
	    	if (check_email($name)) {
	    		$where = array(
	    			'email' => $name,
	    		);
	    	} else{              //如果是纯英文数字
	    		$where = array(
                    'name' => $name,
	    			);
	    	}
	        $user = $this -> where($where) -> find();
	        if(is_array($user)) {
	        	if(think_ucenter_md5($pass) === $user['pass']) {
			        $this -> auto_login($user);
			        return true;
	        	} else {
					$this -> error = '密码错误！';
					return false;
				}
	        } else {
				$this -> error = '对不起，该账户被锁定';
				return false;
			}
	    }
	    /**
	     * 注销当前用户
	     * @return void
	     */
	    public function logout() {
	        session('user_auth', null);
	        session('user_auth_sign', null);
	    }
	    /**
	     * 自动登录用户
	     * @param  integer $user 用户信息数组
	     */
	    private function auto_login($user) {
	        /* 更新登录信息 */
	        $data = array(
	            'id'                => $user['id'],
	            'lastlogintime'   => NOW_TIME,
	        );
	        $this -> save($data);
	        /* 记录登录SESSION和COOKIES */
	        $auth = array(
	            'id'        => $user['id'],
	            'logintime' => $user['lastlogintime'],
	        );
	        session('user_auth', $auth);
	        session('user_auth_sign', data_auth_sign($auth));
	    }
	    /**
		 * 更新用户信息
		 * @param int $uid 用户id
		 * @param string $password 密码，用来验证
		 * @param array $data 修改的字段数组
		 * @return true 修改成功，false 修改失败
		 */
		public function update_user_fields($uid, $password, $data) {
			if(empty($uid) || empty($password) || empty($data)){
				$this -> error = '参数错误！';
				return false;
			}		
			if(!$this -> verify_user($uid, $password)) {
				$this -> error = '验证出错：原始密码不正确！';
				return false;
			}
			$data['pass'] = think_ucenter_md5($data['pass']);
			if(false !== $this -> where(array('id' => $uid)) -> save($data)) {
				return true;
			}else {
				$this -> error = '密码保存出错！';
				return false;
			}
		}
	    /**
		 * 验证用户密码
		 * @param int $uid 管用户id
		 * @param string $password 密码
		 * @return true 验证成功，false 验证失败
		 */
		public function verify_user($uid, $password, $data) {
			$pass = $this -> getFieldById($uid, 'pass');
			if(think_ucenter_md5($password) === $pass){
				return true;
			}
			return false;
		}
		/*
			获取用户的昵称
			* @param int $uid 管用户id
		*/
		public function get_user_nick ($uid) {
			$rs = $this -> where(array('id' => $uid)) -> field('email,mobile,truename') -> find();
			if ($rs['truename']) {
				return cut_str($rs['truename'], 2, 6);
			} else {
				if ($rs['mobile']) {
					return substr_replace($rs['mobile'], '****', 3, 4);
				} else {
					$n = strpos($rs['email'], '@');
					if ($n < 3) {
						return substr_replace($rs['email'], '****', $n, 0);
					} elseif ($n < 6) {
						return substr_replace($rs['email'], '****', 2, $n - 2);
					} else {
						return substr_replace($rs['email'], '****', 2, 4);
					}
				}
			}
		}
	}
?>