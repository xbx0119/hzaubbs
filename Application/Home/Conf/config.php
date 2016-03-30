<?php
return array(
	//'配置项'=>'配置值'
	//'配置项'=>'配置值'
	'URL_CASE_INSENSITIVE'=>true,  //URL不区分大小写
	'URL_ROUTER_ON'=>true,
	'URL_ROUTE_RULES'=>array(
		'index.html'=>'Index/index',
	),

	//'SHOW_PAGE_TRACE'=>true,      //开启页面TRACE
	
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	'DB_NAME'=>'bbs',//设置数据库名；
	'DB_user'=>'root',
	'DB_PWD'=>'',
	'DB_PORT'=>'3306',
	'DB_CHARSET' => 'utf8',
	
	'TMPL_L_DELIM'=>'{',
	'TMPL_R_DELIM'=>'}',

	'SHOW_PAGE_TRACE'=>'true',

	// 'session_auto_start' => true,
	// 	'SESSION_OPTIONS' => array('use_trans_sid'=>1),
	// 	 'SESSION_OPTIONS' => array('use_trans_sid'=>1,'use_only_cookies'=>1)
	'COOKIE_DOMAIN' => 'localhost', //cookie的有效域名
	'COOKIE_PATH' => '/' , //保存路径

	'COOKIE_EXPIRE' => 36000, //cookie的生存时间

	//'USER_AUTH_KEY' =>'authId', // 用户认证SESSION标记
);