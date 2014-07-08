<?php
//控制器基类
class Controller {
/* 模型
 * 视图
 */
protected $view  = null;
protected $model = null;

function __construct() {
	$this->view = new View();
}

// 检查权限
public function authority($num) {
    if (!Util::has_authority($num)) {
        $this->error(3);
    }
}

/* 出错
 * error_num 错误代码
 */
public function error($error_num){
	header('location:'.URL.'error/index/'.$error_num);
	exit();
}

/* 出错
 * error_msg 错误信息
 */
public function errorMsg($error_msg){
    header('location:'.URL.'error/index/?error='.urlencode($error_msg));
    exit();
}

/* 加载模型
 * name 控制器名称
 */
public function load_model($name){
	$model_path = MOD.$name.'_m.php';
	if(file_exists($model_path)){
		require_once $model_path;
		$model_name = $name.'Model';
		$this->model = new $model_name();
	}
}

/* 渲染页面
 * view 页面
 * data 数据
 */
public function render($view, $data = null) {
	if($data != null){
		$this->view->insert_data($data);
	}
	$this->view->render($view);
}
}