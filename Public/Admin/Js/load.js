/*
    script
*/
define(function(require, exports, module) {
	/*
	    require
	 */
	require("tmpl");
	require("lazyload");

	var ajaxPageFrist = 1;

	function getData(page) {
		$('.load-more-openid-list1').html('<i style="text-align:center;margin-left:120px"></i> 玩命加载中...再等等哦^_^');
		$.post(load_action, {
			page: page
		}, success, "json");

		function success(data) {
			if (data.status == 1) {
				if (data.data.list != '' && data.data.list != null ) {
					$("#redpack").tmpl(data).appendTo(".redpack");
					$('.load-more-openid-list1').html('点击加载更多内容');
				} else{
					$('.load-more-openid-list1').html('已加载全部内容咯~~').addClass('none');
				}
			} else {
				alert(data.info);
			}
		}
	}

	$('.load-more-openid-list1').click(function() {
		ajaxPageFrist++;
		getData(ajaxPageFrist);
	});

	function initData() {
		getData(ajaxPageFrist);
	}
	
	initData(); 
});