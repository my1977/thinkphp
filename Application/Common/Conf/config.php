<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'mythink', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PARAMS' =>  array(), // 数据库连接参数
	'DB_PREFIX' => 'zt_', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
	'WEB_NAME'  =>  '马莹的个人网站',
	'URL_ROUTER_ON'   => true, 
	'URL_ROUTE_RULES'=>array(
	    'maying/:id/:name'          => 'home/index/test',
	    'maying1/:id/:name'          => '/home/index/test/id/:1/name/:2',
	    /*'test'        => 
        function(){ 
            echo 'just test';
        },
        写 /   跳转 并且必须写参数  
        不写   不跳转  不能写参数    访问目标页面 并且合理传值*/
	),
);