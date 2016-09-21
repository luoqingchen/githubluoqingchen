<?php
return array(
	//'配置项'=>'配置值'
    'VAR_URL_PARAMS'            => '_URL_',
	'URL_HTML_SUFFIX' 			=> '',
	'URL_CASE_INSENSITIVE' 		=> FALSE,
	'LOAD_EXT_CONFIG'  				=> 'db,setting',
	'SEAJSTIMESTAMP' 			=>  '20160901' . rand(0, 50000),
  'AUTOLOAD_NAMESPACE'    => array(
        'Lib'           => APP_PATH . 'Lib',
    ),
	//======================================
  'SP_MAIL_ADDRESS' => '1292752432@qq.com',
  'SP_MAIL_SENDER' => '黄生',
  'SP_MAIL_SMTP' => 'smtp.qq.com',
  'SP_MAIL_SMTP_PORT' => '25',
  'SP_MAIL_LOGINNAME' => '1292752432',
  'SP_MAIL_PASSWORD' => '1234561',
  'APPID' => 'wx7eaf68fbc71d7c3c',
  'APPSECRET' => 'e61019369c83b716f432e2b77f6d4884',
  'MCHID' => '1328784701',
  'KEY' => '67ac66cddc65795b4fe290ee7d4dfa02',
  'JS_API_CALL_URL' => NULL,
  'NOTIFY_URL' => NULL,
  'Day_Price' => '3',
  'Day_Number' => '2',
  'URL_MODEL' => '0',
  'URL_HTML_SUFFIX' => '',
  'UCENTER_ENABLED' => 0,
  'COMMENT_NEED_CHECK' => 0,
  'COMMENT_TIME_INTERVAL' => 60,
  'MOBILE_TPL_ENABLED' => 0,
  'HTML_CACHE_ON' => true,
  'SORT_NUMBER' => '3',
  'SORT_DAYS' => '1095',
  'alipay_config' => 
  array (
    'partner' => '1274612701',
    'key' => '367ada47763d45964c52e74a3fb48e5a',
    'sign_type' => 'MD5',
    'input_charset' => 'utf-8',
    'cacert' => 'E:\\web\\hesheng\\ThinkCMFX_1.6.1_20150624\\cacert.pem',
    'transport' => 'http',
  ),
  'alipay' => 
  array (
    'seller_email' => '556573@qq.com',
    'notify_url' => 'http://www.shuaxinyixia.com/Pay/notify_url',
    'return_url' => 'http://www.shuaxinyixia.com/author/recharge',
    'successpage' => 'User/myorder?ordtype=payed',
    'errorpage' => 'User/myorder?ordtype=unpay',
  ),
  'tenpay_config' => 
  array (
    'partner' => '1274612701',
    'key' => '367ada47763d45964c52e74a3fb48e5a',
    'return_url' => 'http://www.chuangbie.com//index.php/pay/tenpay_return',
    'notify_url' => 'http://www.chuangbie.com/index.php/pay/tenpay_notify',
  ),
  'SSLCERT_PATH' => '/cacert/apiclient_cert.pem',
  'SSLKEY_PATH' => '/cacert/apiclient_key.pem',
  'SEND_NAME' => '卡梦岚服饰',
  'WISHING' => '卡梦岚感恩有你！',
  'ACT_NAME' => '感恩红包！',
  'REMARK' => '感恩红包！',
  //
  'GROUPSEND_NAME' => '卡梦岚服饰(友情红包)',
  'GROUPWISHING' => '卡梦岚感恩有你！',
  'GROUPACT_NAME' => '友情红包！',
  'GROUPREMARK' => '友情红包！',
);

<xml>
<return_code><![CDATA[SUCCESS]]></return_code>
<return_msg><![CDATA[IP地址非你在商户平台设置的可用IP地址]]></return_msg>
<result_code><![CDATA[FAIL]]></result_code>
<err_code><![CDATA[NO_AUTH]]></err_code>
<err_code_des><![CDATA[IP地址非你在商户平台设置的可用IP地址]]></err_code_des>
<mch_billno><![CDATA[wx3559c05c37f354d61473402739]]></mch_billno>
<mch_id><![CDATA[1276166701]]></mch_id>
<wxappid><![CDATA[wx3559c05c37f354d6]]></wxappid>
<re_openid><![CDATA[oHb-jxFpRfYeap-v8JcmvmiOBWzw]]></re_openid>
<total_amount>100</total_amount>
</xml>