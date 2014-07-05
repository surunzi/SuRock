<?php
// 该文件定义所有常量

/* 库目录
 * 控制器目录
 * 模型目录
 * 图片目录
 */
$constant = array ('LIB'    => 'lib/',
                   'SYSLIB' => 'lib/system/',
				   'CON'    => 'controller/',
				   'MOD'    => 'model/',
				   'IMG'    => 'public/img/',
				   'ATT'    => 'public/att/',
				   'TITLE'  => 'SuRock');

/* 当LOCAL_FLAG为true时，使用本地SQL配置，反之使用服务器配置，默认为SAE
 * 网址
 * CSS目录
 * JavaScript目录
 * 视图目录
 * 数据库类型
 * 主机
 * 端口号
 * 数据库名称
 * 用户名
 * 密码
 */
define("LOCAL_FLAG", true);
if (LOCAL_FLAG) {
	$change_constant = array ('URL'         => 'http://localhost/SuRock/',
							  'CSS'         => 'public/css/',
				   			  'JS'          => 'public/js/',
				   			  'VIEW'        => 'view/',
                              'DEFAULT_CSS' => 'bootstrap,font-awesome,tag,class,id',
                              'DEFAULT_JS'  => 'jquery,bootstrap');
	$db_setting      = array (
						      'DB_TYPE' => 'mysql',
						      'DB_HOST' => 'localhost',
						 	  'DB_PORT' => '3306',
						 	  'DB_NAME' => 'surock',
						 	  'DB_USER' => 'root',
						 	  'DB_PASS' => '');
} else {
	$change_constant = array ('URL'         => 'http://simplemvc.sinaapp.com/',
							  'CSS'         => 'public/css_min/',
				   			  'JS'          => 'public/js_min/',
				   			  'VIEW'        => 'view_min/',
                              'DEFAULT_CSS' => 'SuRock',
                              'DEFAULT_JS'  => 'SuRock');
	$db_setting      = array ('DB_TYPE' => 'mysql',
						 	  'DB_HOST' => SAE_MYSQL_HOST_M,
						 	  'DB_PORT' => SAE_MYSQL_PORT,
						 	  'DB_NAME' => SAE_MYSQL_DB,
						 	  'DB_USER' => SAE_MYSQL_USER,
						 	  'DB_PASS' => SAE_MYSQL_PASS);
}

// 将数组合并并进行常量定义
$merge_array = array_merge($constant, $change_constant, $db_setting);
foreach ($merge_array as $key => $value) {
	define($key, $value);
}