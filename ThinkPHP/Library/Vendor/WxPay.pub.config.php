<?php
/**
* 	配置账号信息
*/

class WxPayConf_pub
{
	//=======【基本信息设置】=====================================
	//微信公众号身份的唯一标识。审核通过后，在微信发送的邮件中查看
	const APPID = 'wxc7c9a9ba3dbc413c';
	//受理商ID，身份标识
	const MCHID = '1233114102';
	//商户支付密钥Key。审核通过后，在微信发送的邮件中查看
	const KEY = 'yreNbOxtENZlyho49MFeUy8lNibtaaaa';
	//JSAPI接口中获取openid，审核后在公众平台开启开发模式后可查看
	const APPSECRET = '4410b94ddd4a5e0d6d9b477e3ca4ad7b';
	
	//=======【JSAPI路径设置】===================================
	//获取access_token过程中的跳转uri，通过跳转将code传入jsapi支付页面
	const JS_API_CALL_URL = 'http://www.mzzto.com/wxpay/pay.php';
	
	//=======【证书路径设置】=====================================
	const SSLCERT_PATH = '';
	const SSLKEY_PATH = '';

	//=======【异步通知url设置】===================================
	//异步通知url，商户根据实际开发过程设定
	const NOTIFY_URL = 'http://www.mzzto.com/wxpay/notify_url.php';

	//=======【curl超时设置】===================================
	//本例程通过curl使用HTTP POST方法，此处可修改其超时时间，默认为30秒
	const CURL_TIMEOUT = 30;
}
	
?>