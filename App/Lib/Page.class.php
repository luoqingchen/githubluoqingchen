<?php
	namespace Lib;
	class Page {
		/*自定义分页样式*/
		static public function page ($count, $perPage = 10) {
	    	$page = new \Think\Page($count, $perPage);
			$page -> rollPage = 3;
			$page -> lastSuffix = false;
			$page -> setConfig('prev', C('PAGE_PREV'));
			$page -> setConfig('next', C('PAGE_NEXT'));
			$page -> setConfig('last', C('PAGE_LAST'));
			$page -> setConfig('header', C('PAGE_HEADER'));
			$page -> setConfig ('theme', C('PAGE_THEME'));
			return $page;
	    }
	}
?>