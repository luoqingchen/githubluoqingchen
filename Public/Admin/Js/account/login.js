/*
    script
*/
define(function(require, exports, module) {
    /*
        require
    */
    require("rsa");
    var layer = require("layer");
//
    $('.login-submit').removeAttr('disabled').click(function() {
        var name = $.trim($('input[name=user]').val());
        var pass = $.trim($('input[name=pass]').val());
        if (name == '') {
			alert('请输入用户名');
            $('input[name=user]').val('');
            return false;
        }
        if (pass == '') {
            alert('请输入密码');
            $('input[name=user_pass]').val('');
            return false;
        }
        var str = 'D42E861C04CFB9EBB1368A682EC22BDCA364A35E1C5DF1D43FC4F24197D4B798BCB7FD0192774749C4DED8B659002B4ABEA2F11F7896BCEE5CD615D31EF8936823ED6760CA01D91F677F1459019383679D78BE72FE67E7C1C3FDA1A514B5FE35879A9A9DC90EAE059948CD222F4C69F37F23F0864112CD4A8AE2B4FD9EC36297';
        setMaxDigits(131);
        var key = new RSAKeyPair("10001", '', str);
        $('input[name=pass]').val(encryptedString(key, $('input[name=pass]').val() + '\x01'));
         var action = $('.login-form').data('action');
        var post_data = $('.login-form').serialize();
        $('input[name=user], input[name=pass], button').attr('disabled', true);
         var loading = layer.open({
             type: 2
         });
        $.post(action, post_data, success, "json");

        function success(data) {
            layer.close(loading);
            if (data.status == 1) {
                window.location.href = data.url;
            } else {
                alert(data.info);
                $('input[name=name], input[name=pass], button').removeClass('disabled').removeAttr('disabled');
                $('input[name=pass]').val('');
            }
        }
        return false;
    });
});