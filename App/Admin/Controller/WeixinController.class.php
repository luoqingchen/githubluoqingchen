<?php
namespace Admin\Controller;
use Think\Controller;
class WeixinController extends CommonController{

    public function group(){
    	 $group = D("rules")->where($where)->select();
    	// p($group);
    	 $this-> group = $group;
    	 $this -> display();
    }
    public function redpack_list(){
    	$db = D('redpack_list');
      $res = $db ->find();
      $data['list'] = $db->where($where) ->limit(8)->order('send_date desc')-> select();
      //$_SESSION['id'] = $data['list']['id'];
      //$data['list'] = $db->where(array('id'=>$res['id'])) ->limit(8)->order('send_date desc')-> select();
    	$this -> data = $data;
    	$this ->display();
    }
    //动态加载内容
        public function ajax_load () {
        if (!IS_AJAX) E('页面不存在！');    
        $db = D('redpack_list');
        $currentPage = I('post.page', 1, 'intval');
        $size =8;
        $start = ($currentPage - 1) * $size;
        $res =$db ->where($where)->find(); 
        $data['list'] = $db -> where($where)  -> limit(8) -> order('send_date DESC') -> select();
        $this -> ajaxreturn(array('status' => 1, 'data' => $data ));
      }
    //  //group_remove
    // public function group_remove($id){
    //   $res = D('users_rules')->where(array('groupId'=>$id))->select();
    //   $res_array = array();
    //    foreach($res as $k=>$v){
    //       $res_array[$k]['userId'] = $v['userid'];
    //       $data = array(
    //               'id'     =>$v['userid'],
    //               'states' => 1,
    //         );
    //      $number = D('users_rules')->where(array('userId'=>$v['userid']))->delete();
    //    }
    //   $resault = D('rules')->where(array('id'=>$id)) ->delete();  //grouId
      
    //   if($resault && $number && false !==M('weixin_user')->data($data)->save()) {
    //     $this ->ajaxreturn(array('status'=>1));
    //   }else{
    //     $this -> ajaxreturn(array('status'=>0,'info'=>'删除失败'));
    //   }
    
    // }
    //edit
    public function group_edit($id){
      
      $list = D('rules')->where(array('id'=>$id))->select();
      
      $this -> list = $list;
      $this ->display();
    }
    //
    public function group_view(){
      $db = D('rules');
      $select = $db->where($where)->select();
      if(isset($_SESSION['option'])){
        $groupId = $_SESSION['option'];
        $rules_model = new\Think\model();
        $list = $rules_model ->table('sp_weixin_user as u,sp_users_rules as r') -> where('u.id=r.userId and r.groupId ='.$groupId.'') -> field('u.openid as openid,u.nickname as nickname,u.headimgurl as headimgurl,u.subscribe_time as subscribe_time') -> select();
        $this->list = $list;
        $this -> select = $select;
        $this ->display();
      }else{
        $this -> select = $select;
        $this ->display();
      }
      
       
     
      
    }
    public function select_search(){
      if(!IS_AJAX) die;
      $post = I('post.');
      $groupId = $post['options'];
      if(!$post){
         $this->ajaxreturn(array('status'=>0,'info'=>'查询失败'));
      }
      else{
        $_SESSION['option'] = $post['options'];
        $this->ajaxreturn(array('status'=>1));
      }
    }
    public function sendredpack(){
     if(!IS_AJAX) die;
     $post = I('post.');
     $jsApi=new \JsApi_pub();
            if(isset($post['ids'])){
             // p($_POST['ids']);
              $ids = implode(',', $post['ids']);
              $this->redpacklist_model=D("redpack_list");
              $total_number = $post['total_number'];
              $typename     = $post['typename'];  
              if(!is_numeric( $total_number)){
                  $this->error('总金额只能在2-200之间');
              }
             foreach ($post['ids'] as $openid){
              //p($openid);
                if($typename == '1'){
                      $total_amout = $this ->randomFloat(1,$total_number);
                } else{
                      $total_amout = $total_number;
                } 
                $timeStamp = time();
                $mch_billno = c('APPID')."$timeStamp";
                $nickname = $this->get_nickname($openid);
                $data['openid'] =  $openid;
                $data['nickname'] =$nickname;
                $data['total_fee'] =$total_amount;
                $data['send_date'] =time();
                $data['mch_billno'] =$mch_billno;

                // 
                $redpack=new \Redpack_pub();
                //设置统一支付接口参数
                //设置必填参数
                //appid已填,商户无需重复填写
                //mch_id已填,商户无需重复填写
                //noncestr已填,商户无需重复填写
                //spbill_create_ip已填,商户无需重复填写
                //sign已填,商户无需重复填写

        $total_amount = $total_amount*100;

        $redpack->setParameter("re_openid","$openid");
        $redpack->setParameter("total_amount","$total_amount");// 红包金额 2-200元之间
        $redpack->setParameter("total_num","1"); ;//红包发放总人数

        //自定义订单号，此处仅作举例
        
        
        $redpack->setParameter("mch_billno","$mch_billno");//商户订单号
        $redpack->setParameter("send_name",c('SEND_NAME'));
        $redpack->setParameter("wishing",c('WISHING'));//总金额$total
        $ip = $_SERVER['REMOTE_ADDR'];//终端ip
        $ip = "127.0.0.1";

        $redpack->setParameter("client_ip","$ip"); 
        $redpack->setParameter("act_name",c('ACT_NAME')); 
        $redpack->setParameter("remark",c('REMARK')); 

        $result = $redpack->postXmlSSL();
        $r = $this->xmlToArray($result);
        
        if($r["result_code"]=="SUCCESS"&&$r["result_code"]=="SUCCESS")
        {
          $send_status="发放成功";
        }
        else
        {
          $send_status="发放失败";
        }
        
        $data['send_status'] =$send_status;
        $data['return_value'] =$result;

        $this->redpacklist_model->add($data);
      }
       //$this->success('红包发送成功');
      $this ->ajaxreturn(array('status'=>1,'info'=>'红包发送成功'));
     }else{
               //$this->success('红包发送失败');
            $this ->ajaxreturn(array('status'=>0,'info'=>'红包发送失败'));
         }

          
       
      //$this ->display('group_view');
    }

   /*
   *   mt_rand()        产生随机数
   *   mt_getrandmax()  返回调用 mt_rand() 所能返回的最大的随机数
   *   round() 四舍五入函数，二个参数，第一个为要四舍五入的之，第二个位指定的位数
   */
  public function randomFloat($min = 0.01, $max = 1) {
       $s = $min + mt_rand() / mt_getrandmax() * ($max - $min);
     return  round($s, 2);
  }
  public function get_nickname($openid) {
    $this->weixinuser_model=D("weixin_user");
    $list = $this->weixinuser_model->where('openid="'.$openid.'"')->find();

    if($list){
      return $list['nickname'];
    }
    else
    {
      echo '';
    }
  } 
  public function xmlToArray($xml)
  {   
        //将XML转为array        
        $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);    
    return $array_data;
  }
 //
  public function sendgroup() {
    if(isset($_SESSION['search'])){
       $search = $_SESSION['search'];
       $db = M('weixin_user');
       $resault = $db ->where(array('nickname'=>array('like',array('%'.$search.'%'))))->select();
       $this -> resault = $resault;
       $this ->display();
    }else{
      $this ->display();
    }
}
  public function sendgroup_submit(){
     if(!IS_AJAX) die;
     $post = I('post.');
     if($post){
        $_SESSION['search'] = $post['search'];
        $this ->ajaxreturn(array('status'=>1));
     }else{
        $this ->ajaxreturn(array('status'=>0,'info'=>'查找用户失败,小鱼已经尽力了,再试试吧'));
     }
  }

//裂变红包
  public function  sendgroupredpack(){
     if(!IS_AJAX) die;
     $post = I('post.');
     $jsApi=new \JsApi_pub();
     if(isset($post['ids'])){
         $this->groupredpack_model=D("sendgroupredpack_list");
         $total_number = $post['total_number']; //总金额
         $total_num    = $post['total_num'];    //总人数 
        foreach ($post['ids'] as $openid){
              $total_amout = $total_number;
              $timeStamp = time();
              $mch_billno = c('APPID')."$timeStamp";
              $nickname = $this->get_nickname($openid);
              $data['openid'] =  $openid;
              $data['nickname'] =$nickname;
              $data['total_fee'] =$total_amount;
              $data['send_date'] =time();
              $data['mch_billno'] =$mch_billno;
           
            //设置统一支付接口参数
            $Redpack = new \Groupredpack_pub();
            //设置必填参数
            //appid已填,商户无需重复填写
            //mch_id已填,商户无需重复填写
            //noncestr已填,商户无需重复填写
            //spbill_create_ip已填,商户无需重复填写
            //sign已填,商户无需重复填写   
            //用户openid
            $Redpack->setParameter('re_openid', $openid);
            //商户订单号
            $Redpack->setParameter('mch_billno', "$mch_billno");       
            //付款金额
            $Redpack->setParameter('total_amount', "$total_amount");
            //红包发放总人数
            $Redpack->setParameter('total_num',"$total_num");
            //返回类型
            $Redpack->setParameter('amt_type','ALL_RAND');
            //商户名称
            $Redpack->setParameter('send_name',c('GROUPSEND_NAME')); 
            //红包祝福语
            $Redpack->setParameter('wishing', c('GROUPWISHING'));
            //活动名称
            $Redpack->setParameter('act_name', c('GROUPACT_NAME'));
             //备注
            $Redpack->setParameter('remark', c('GROUPREMARK'));
            //以下是非必填项目
            $ip = $_SERVER['REMOTE_ADDR'];//终端ip
            $redpack->setParameter("client_ip","$ip"); 
            //子商户号  
//         $Redpack->setParameter('sub_mch_id', $parameterValue);
//        //商户logo的url
//         $Redpack->setParameter('amt_list', '200|100|100');
            $result = $Redpack->postXmlSSL();
            $r = $this->xmlToArray($result);
            if($r["result_code"]=="SUCCESS"&&$r["result_code"]=="SUCCESS")
            {
              $send_status="发放成功";
            }
            else
            {
              $send_status="发放失败";
            }
        
            $data['send_status'] =$send_status;
            $data['return_value'] =$result;

            $this->groupredpack_model->add($data);

        //var_dump($result); 
            }
             $this->success("发送红包成功！");
    
            }else
                {
                 $this->error("发送红包出错！");
                }
              exit;

       }

       //  public
    

       












}