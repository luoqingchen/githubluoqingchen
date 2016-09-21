<?php


	namespace Lib;

	class Rsa
	{
	private  $PRIVATE_KEY = '-----BEGIN RSA PRIVATE KEY-----
MIICXwIBAAKBgQDULoYcBM+567E2imguwivco2SjXhxd8dQ/xPJBl9S3mLy3/QGS
d0dJxN7YtlkAK0q+ovEfeJa87lzWFdMe+JNoI+1nYMoB2R9nfxRZAZODZ514vnL+
Z+fBw/2hpRS1/jWHmpqdyQ6uBZlIzSIvTGnzfyPwhkESzUqK4rT9nsNilwIDAQAB
AoGBAIUDVVcjPQWUV1eVlJIbb1u1olU3nhjWjPQdBrFP+S3PNh8xIFctJyd7nyfD
yC9u9EBl7TqJYhW2Z8RdkigMNHsjWrEBZLFaN5nVz/57T9pagjEW9NpIoI5s/tEf
J0vuHOdK0WEEWZLu3oWaiwSMqf7Off1eHaJecf0mJDgPu42hAkEA+4tF+9WNn6/U
HtrXe/V9TkE61FE7ye84TajmBJ2UVmiWfkBAD75TbN1LNj6ZDuJztte9usYg+ie7
iswrRvcDkwJBANfwvxdncFFoRcCFjISbEoWN60H0ML/ZvHK77qj2RvvQ5WXgT8fB
BG4BLZzEb9VnUyoYuug5dv8APfuONQthz20CQQDu4b7egFn00qghfTays9oCHRRf
WZ3sEdBogAOhUnzy6nQxBZdQ3DCh7C5nH19/sTKu64d0/n+G0YDbOTXIOQEdAkEA
pIhkIaIH+482roVTVuqNR0OmQF+eEWAG7WjyZL0Zwt8dGu25/Bq+lE7DgVJPX8vV
mxqytySp3YxCrfxhwGVrVQJBAMp5axmbBmwrNRPSDkIH9dhatjR8Sj+84VLb0KU1
Bg1BO664jWA6RnPJRsS5UB3Zi3clV7cRn4QcrYbeLQE8mXw=
-----END RSA PRIVATE KEY-----';
private  $PUBLIC_KEY = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDULoYcBM+567E2imguwivco2Sj
Xhxd8dQ/xPJBl9S3mLy3/QGSd0dJxN7YtlkAK0q+ovEfeJa87lzWFdMe+JNoI+1n
YMoB2R9nfxRZAZODZ514vnL+Z+fBw/2hpRS1/jWHmpqdyQ6uBZlIzSIvTGnzfyPw
hkESzUqK4rT9nsNilwIDAQAB
-----END PUBLIC KEY-----';
		private static $_instance;
		

		
		public static function getInstance() {//调用多次返回的是同一个对象。而返回唯一实例的一个引用 
			if (! (self::$_instance instanceof self)) {
				self::$_instance = new rsa();
			}
			return self::$_instance;
		}
		public  function getPrivateKey(){
		
			$privKey =$this->PRIVATE_KEY;
			 
			return openssl_pkey_get_private($privKey);
		}		
		public function getPublicKey(){
		
			$pubkey =$this->PUBLIC_KEY;
			 
			return openssl_pkey_get_public($pubkey);
		}
		
		public  function privEncrypt($data)
		{
			if(!is_string($data)){
				return null;
			}
			return openssl_private_encrypt($data,$encrypted,$this->getPrivateKey())? base64_encode($encrypted) : null;
		}
		
		
	
		public  function privDecrypt($encrypted, $fromjs = FALSE)
		{
			if(!is_string($encrypted)){
				return null;
			}
			$padding = $fromjs ? OPENSSL_NO_PADDING : OPENSSL_PKCS1_PADDING;
			if (openssl_private_decrypt(base64_decode($encrypted), $decrypted, $this->getPrivateKey(), $padding))
			{
				//return $fromjs ? trim(strrev($decrypted)) : $decrypted;
				return $fromjs ? substr(trim(strrev($decrypted)) ,0,strlen(trim(strrev($decrypted)))-1): $decrypted;
			}
			return null;
		}
		
		public  function encrypt($data) {
			if (openssl_public_encrypt($data, $encrypted,$this->getPublicKey()))
				$data = base64_encode($encrypted);
			else
				throw new Exception('Unable to encrypt data. Perhaps it is bigger than the key size?');
		
			return $data;
		}
		
		
		
	}
?>