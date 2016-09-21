<?php

 //打印函数
    function p($array) {
        echo dump($array, '', '', false);
    }

    //系统非常规MD5加密方法
    function think_ucenter_md5($str){
        return '' === $str ? '' : md5(sha1(trim($str)));
    }

    //数据签名认证
    function data_auth_sign($data) {
        if(!is_array($data)) {
            $data = (array)$data;
        }
        ksort($data);
        $code = http_build_query($data);
        $sign = sha1($code);
        return $sign;
    }

//检测账号(中英文)
    function check_uname($name) {
      return preg_match("/^[\x7f-\xff_a-zA-Z0-9]+$/",$name);
    }

    //时间格式化
    function format_date($time){
        $rtime = date ( "m-d", $time );     
        $time = time () - $time;        
        if ($time < 60) {
            $str = '刚刚';
        } elseif ($time < 60 * 60) {
            $min = floor ( $time / 60 );
            $str = $min . '分钟前';
        } elseif ($time < 60 * 60 * 24) {
            $h = floor ( $time / (60 * 60) );
            $str = $h . '小时前';
        } elseif ($time < 60 * 60 * 24 * 3) {
            $d = floor ( $time / (60 * 60 * 24) );
            if ($d == 1)
                $str = '昨天 ';
            else
                $str = '前天 ';
        } else {
            $str = $rtime;
        }
        return $str;  
    }



?>