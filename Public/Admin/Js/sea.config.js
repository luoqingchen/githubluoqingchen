seajs.config({
	//别名
    alias :{
     'jquery'        : '/mobile/Public/Admin/Js/common/jquery.1.11.3.min.js',
     'layer'         : '/mobile/Public/Admin/Js/layer.mobile/layer.js',
     'tmpl'          : '/mobile/Public/Admin/Js/common/jQuery.tmpl.min',
     'common'        : '/mobile/Public/Admin/Js/common/common', 
     'bigint'        : '/mobile/Public/Admin/Js/common/bigInt',
     'barrett'       : '/mobile/Public/Admin/Js/common/barrett',    
     'swiper'        : '/mobile/Public/Admin/Js/common/swiper.jquery.min',
     'rsa'           : '/mobile/Public/Admin/Js/common/rsa',
     'script'        : '/mobile/Public/Admin/Js/common/script',
     'lazyload'      : '/mobile/Public/Admin/Js/common/plugin.lazy.load',
     'distpicker'    : '/mobile/Public/Admin/Js/common/distpicker',
     'page'          : '/mobile/Public/Admin/Js/common/plugin.page',
     'mobiscrol'     : '/mobile/Public/Admin/Js/mobiscroll/mobiscrol',
     'plupload'      : '/mobile/Public/Admin/Js/plupload/plupload.full.min',
     'login'         : '/mobile/Public/Admin/Js/account/login',
     'DatePicker'    : '/mobile/Public/Admin/Js/DatePicker/WdatePicker',
     'load'          : '/mobile/Public/Admin/Js/load',
    
    },
  // 路径配置
  paths: {
    'admin': '/mobile/Public/Admin/Js'
  },
  // 映射配置
  map: [
    [ /^(.*\.(?:css|js|tpl))(.*)$/i, '$1?' + lqc]
  ],
  // 预加载项
  preload: ['jquery', 'common', 'bigint', 'barrett'],
  
  //开启调试
  debug  :true,
  //文件编码
  charset : 'utf-8'

});