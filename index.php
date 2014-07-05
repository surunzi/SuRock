<?php
// 读取配置文件
require_once 'config.php';

// 读取函数库
require_once SYSLIB.'Function_l.php';

// 当找不到类时自动到库目录下寻找对应类
function __autoload($class) {
	$lib_path   = LIB.$class.'_l.php';
	$sys_lib_path = SYSLIB.$class.'_l.php';
	$model_path = MOD.'single/'.$class.'_m.php';
	if (file_exists($sys_lib_path)) {
		require_once $sys_lib_path;
	} elseif (file_exists($lib_path)) {
		require_once $lib_path;
	} elseif (file_exists($model_path)) {
		require_once $model_path;
	}
}

// 创建数据库连接
$db = new Database(DB_TYPE, DB_HOST, DB_PORT, DB_NAME, DB_USER, DB_PASS);

// 加载引导类并初始化
$bootstrap = new Bootstrap();
$bootstrap->init();

// 关闭数据库连接
$db = NULL;