<?php
return array(

	    'SESSION_AUTO_START' => true,
		'URL_MODEL' 			=> 1,		
		'DATA_CACHE_TIME'       => 3600,
	    'DATA_CACHE_CHECK'      => TRUE,
	    'DATA_CACHE_PREFIX'     => 'admin_', 
	    'DATA_CACHE_SUBDIR'     => TRUE,
	    'DATA_PATH_LEVEL'       => 1,
		'TMPL_PARSE_STRING' 	=> array(
			'__STATIC__'  		=> __ROOT__ . '/Public/Static/',
			'__JS__'     		=> __ROOT__ . '/Public/' . MODULE_NAME . '/Js/',
			'__CSS__'     		=> __ROOT__ . '/Public/' . MODULE_NAME . '/Css/',
			'__IMG__'     		=> __ROOT__ . '/Public/' . MODULE_NAME . '/Images/',
		),
);
