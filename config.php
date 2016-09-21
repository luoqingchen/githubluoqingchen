<?php	return array (
  'SP_MAIL_ADDRESS' => '1292752432@qq.com',
  'SP_MAIL_SENDER' => '黄生',
  'SP_MAIL_SMTP' => 'smtp.qq.com',
  'SP_MAIL_SMTP_PORT' => '25',
  'SP_MAIL_LOGINNAME' => '1292752432',
  'SP_MAIL_PASSWORD' => '1234561',
  'APPID' => 'wx9938b5a99e36b8d6',
  'APPSECRET' => '9b8d8896e3d31de980f60fb6385c6db9',
  'MCHID' => '1239508802',
  'KEY' => 'ILOVEbookcityILOVEshuaxin5201314',
  'JS_API_CALL_URL' => 'http://www.shuaxinyixia.com/index.php/wxpay/pay',
  'NOTIFY_URL' => 'http://www.shuaxinyixia.com/index.php/wxpay/notify',
  'Day_Price' => '3',
  'Day_Number' => '1',
  'SP_DEFAULT_THEME' => 'pijfk',
  'DEFAULT_THEME' => 'pijfk',
  'SP_ADMIN_STYLE' => 'bluesky',
  'URL_MODEL' => '0',
  'URL_HTML_SUFFIX' => '',
  'UCENTER_ENABLED' => 0,
  'COMMENT_NEED_CHECK' => 0,
  'COMMENT_TIME_INTERVAL' => 60,
  'MOBILE_TPL_ENABLED' => 0,
  'HTML_CACHE_ON' => true,
  'SORT_NUMBER' => '3',
  'SORT_DAYS' => '1095',
 //支付宝配置参数 
'alipay_config'=>array(
'partner' =>'2088002214412044',   //这里是你在成功申请支付宝接口后获取到的PID；
'key'=>'rmame4x5dggh6r7d3i6ozrb0kbz97bku',//这里是你在成功申请支付宝接口后获取到的Key
'sign_type'=>strtoupper('MD5'),
'input_charset'=> strtolower('utf-8'),
'cacert'=> getcwd().'\\cacert.pem',
'transport'=> 'http',
  ),
 //以上配置项，是从接口包中alipay.config.php 文件中复制过来，进行配置；

	'alipay'   =>array(
	 //这里是卖家的支付宝账号，也就是你申请接口时注册的支付宝账号
	'seller_email'=>'556573@qq.com',
	//这里是异步通知页面url，提交到项目的Pay控制器的notifyurl方法；
	'notify_url'=>'http://www.shuaxinyixia.com/Pay/notify_url', 
	//这里是页面跳转通知url，提交到项目的Pay控制器的returnurl方法；
	'return_url'=>'http://www.shuaxinyixia.com/author/recharge',
	//支付成功跳转到的页面，我这里跳转到项目的User控制器，myorder方法，并传参payed（已支付列表）
	'successpage'=>'User/myorder?ordtype=payed',   
	//支付失败跳转到的页面，我这里跳转到项目的User控制器，myorder方法，并传参unpay（未支付列表）
	'errorpage'=>'User/myorder?ordtype=unpay', 
	),
 //支付宝配置参数
'tenpay_config'=>array(
	'partner' =>'1274612701',   //这里是你在成功申请支付宝接口后获取到的PID；
	'key'=>'367ada47763d45964c52e74a3fb48e5a',//这里是你在成功申请支付宝接口后获取到的Key
	'return_url'=>'http://www.shuaxinyixia.com/index.php/onlinepay/tenpay_return',			//显示支付结果页面,*替换成payReturnUrl.php所在路径
	'notify_url'=>'http://www.shuaxinyixia.com/index.php/onlinepay/tenpay_notify',			//支付完成后的回调处理页面,*替换成payNotifyUrl.php所在路径
	),

);?>