// 添加收藏
function favorites() {
    var b = window.location.href;
    var a = document.title;
    try {
        window.external.addFavorite(b, a)
    } catch (c) {
        try {
            window.sidebar.addPanel(a, b, "")
        } catch (c) {
            alert("加入收藏失败，请使用Ctrl+D进行添加")
        }
    }
};
var CheckInput = function() {};
CheckInput.prototype = {
    IsEmpty: function(a) {
        return null == a ? !0 : "" == $.trim(String(a))
    },
    IsDomain: function(a) {
        a = $.trim(a);
        return /^[A-Za-z0-9_\-\u4E00-\u9FA5]+([\.][A-Za-z0-9_\-\u4E00-\u9FA5]+)+$/.test(a)
    },
    IsUserName: function(a) {
        a = $.trim(a);
        return /^([\w]+)$/g.test(a)
    },
    IsPassword: function(a) {
        return /^[\x21-\x7E]{6,16}$/.test(a)
    },
    IsMail: function(a) {
        a = $.trim(a);
        return /^[a-zA-Z0-9_\-\+\.]+@[a-zA-Z0-9_\-]+(\.[a-zA-Z0-9_\-]+)+$/.test(a)
    },
    IsNumber: function(a) {
        a = $.trim(a);
        return /^[0-9]+$/.test(a)
    },
    IsMoney: function(a) {
        a = $.trim(a);
        return /^[0-9]{1,7}([.]{1}[0-9]{1,2})?$/.test(a)
    },
    IsDiscount: function(a) {
        a = $.trim(a);
        return /^[0-9]?([.]{1}[0-9]{1})?$/.test(a)
    },
    IsLevelDiscount: function(a) {
        a = $.trim(a);
        return /^[0-9]{1,7}([.]{1}[0-9]{1,2})?$/.test(a)
    },
    IsPhone: function(a) {
        a = $.trim(a);
        return /^0[0-9]{2,3}\-\d{7,8}(\-\d{1,6})?$/.test(a) ? !0 : !1
    },
    IsMobilePhone: function(a) {
        a = $.trim(a);
        return /^1\d{10}$/.test(a)
    },
    IsMobileCheckCode: function(a) {
        a = $.trim(a);
        return /^\d{6}$/.test(a)
    },
    IsChinese: function(a) {
        a = $.trim(a);
        return /^[\u0391-\uFFE5]+$/.test(a)
    },
    IsQQ: function(a) {
        a = $.trim(a);
        return /^[1-9]\d{4,9}$/.test(a)
    },
    IsZip: function(a) {
        a = $.trim(a);
        return /^\d{6}$/.test(a)
    },
    IsUrl: function(a) {
        return this.IsEmpty(a) ? !1 : /http:\/\/.*/i.test(a)
    },
    IsIp: function(a) {
        return /^((2[0-4]\d|25[0-5]|[01]?\d\d?)\.){3}(2[0-4]\d|25[0-5]|[01]?\d\d?)$/.test(a)
    },
    IsIdnum: function(a) {
        if ("" === a) return !1;
        a = a.toUpperCase();
        return !1 === this.IsCardNo(a) || !1 === this.checkProvince(a) || !1 === this.checkBirthday(a) || !1 === this.checkParity(a) ? !1 : !0
    },
    IsCardNo: function(a) {
        return /(^\d{15}$)|(^\d{17}(\d|X|x)$)/.test(a)
    },
    checkProvince: function(a) {
        return void 0 == {
            11: "\u5317\u4eac",
            12: "\u5929\u6d25",
            13: "\u6cb3\u5317",
            14: "\u5c71\u897f",
            15: "\u5185\u8499\u53e4",
            21: "\u8fbd\u5b81",
            22: "\u5409\u6797",
            23: "\u9ed1\u9f99\u6c5f",
            31: "\u4e0a\u6d77",
            32: "\u6c5f\u82cf",
            33: "\u6d59\u6c5f",
            34: "\u5b89\u5fbd",
            35: "\u798f\u5efa",
            36: "\u6c5f\u897f",
            37: "\u5c71\u4e1c",
            41: "\u6cb3\u5357",
            42: "\u6e56\u5317",
            43: "\u6e56\u5357",
            44: "\u5e7f\u4e1c",
            45: "\u5e7f\u897f",
            46: "\u6d77\u5357",
            50: "\u91cd\u5e86",
            51: "\u56db\u5ddd",
            52: "\u8d35\u5dde",
            53: "\u4e91\u5357",
            54: "\u897f\u85cf",
            61: "\u9655\u897f",
            62: "\u7518\u8083",
            63: "\u9752\u6d77",
            64: "\u5b81\u590f",
            65: "\u65b0\u7586",
            71: "\u53f0\u6e7e",
            81: "\u9999\u6e2f",
            82: "\u6fb3\u95e8",
            91: "\u56fd\u5916"
        }[a.substr(0, 2)] ? !1 : !0
    },
    checkBirthday: function(a) {
        var b = a.length;
        if ("15" == b) {
            var d = a.match(/^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/);
            a = d[2];
            var b = d[3],
                d = d[4],
                c = new Date("19" + a + "/" + b + "/" + d);
            return this.verifyBirthday("19" + a, b, d, c)
        }
        return "18" == b ? (d = a.match(/^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/), a = d[2], b = d[3], d = d[4], c = new Date(a + "/" + b + "/" + d), this.verifyBirthday(a, b, d, c)) : !1
    },
    verifyBirthday: function(a, b, d, c) {
        var f = (new Date).getFullYear();
        return c.getFullYear() == a && c.getMonth() + 1 == b && c.getDate() == d && (a = f - a, 3 <= a && 100 >= a) ? !0 : !1
    },
    checkParity: function(a) {
        a = this.changeFivteenToEighteen(a);
        if ("18" == a.length) {
            var b = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2],
                d = 0,
                c;
            for (c = 0; 17 > c; c++) d += a.substr(c, 1) * b[c];
            if ("10X98765432".split("")[d % 11] == a.substr(17, 1)) return !0
        }
        return !1
    },

    changeFivteenToEighteen: function(a) {
        if ("15" == a.length) {
            var b = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2],
                d = 0,
                c;
            a = a.substr(0, 6) + "19" + a.substr(6, a.length - 6);
            for (c = 0; 17 > c; c++) d += a.substr(c, 1) * b[c];
            a += "10X98765432".split("")[d % 11]
        }
        return a
    },
    Is_Letters: function(a) {
        a = $.trim(a);
        return /[^a-zA-Z]/g.test(a)
    },
    Is_letter_num: function(a) {
        a = $.trim(a);
        return /[^0-9a-zA-Z]/g.test(a)
    },
    notchinese: function(a) {
        a = $.trim(a);
        return /[^A-Za-z0-9_]/g.test(a) ? !1 : !0
    },
    IsDate: function(a) {
        a = $.trim(a);
        return !/^(\d{4})-(\d{2})-(\d{2})$/.test(a) && 12 >= RegExp.$2 && 31 >= RegExp.$3 ? !1 : !0
    }
};
CheckInput = new CheckInput;

function get_url_param(a) {
    a = RegExp("(^|&)" + a + "=([^&]*)(&|$)", "i");
    a = window.location.search.substr(1).match(a);
    return null != a ? decodeURIComponent(a[2]) : null
}

function get_callback_url(a) {
    var b = get_url_param("url");
    if (null == b || "" == $.trim(b)) b = null != a ? a : window.location.href;
    return b
}

function goto_link(a) {
    window.location.href = a
}


