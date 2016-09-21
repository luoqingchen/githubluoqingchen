<?php
	namespace Lib;
	class Message {
	    /*发送邮件*/
	    static public function send_email ($to, $subject, $content) {
			return send_email($to, $subject, $content);
	    }
	}
?>