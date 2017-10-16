<?php

return array(

	'DEFAULT_MODULE'        =>  'Module',
    // 默认控制器名称
	'DEFAULT_CONTROLLER'    =>  'Entry',
    // 默认操作名称
    'DEFAULT_ACTION'        =>  'handler',
    // 数据库类型
    'DB_TYPE' => 'mysql',
    // 服务器地址
    'DB_HOST' => '127.0.0.1',
    // 数据库名
    'DB_NAME' => 'weixin',
    // 用户名
    'DB_USER' => 'root',
    // 密码
    'DB_PWD'  => 'fosuseie123,./',
    // 端口
    'DB_PORT' => '',
    // 数据库表前缀
    'DB_PREFIX' => 'wx_',
    //数据库表名的区分大小写
    'DB_PARAMS' => array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL),
    // 默认参数过滤方法 用于I函数...
    'DEFAULT_FILTER'        =>  '',
    'DB_BBS'=>array(
        'db_type' => 'mysql',
        'db_user' => 'root',
        'db_pwd' => 'fosuseie123,./',
        'db_host' => '127.0.0.1',
        'db_port' => '3306',
        'db_name' => 'ok_cloud',
        'db_charset' => 'utf8',
    ),
);