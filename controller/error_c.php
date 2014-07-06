<?php
class Error extends Controller {

//错误列表
private $error = array (0 => '出错啦！',
						1 => '页面不存在',
						2 => '填写参数不完整',
                        3 => '无权访问该页'
                        );

function __construct(){
	parent::__construct();
}

public function index($error_num = 0) {
    $error = Util::fetch_get('error');
    if ($error == null) {
        $error = $this->get_error($error_num);
    }
	$view_data = array('error' => $error);
	$this->my_render('index', $view_data);
}

/* 根据错误代码返回实际的错误信息
 * error_num 错误代码
 */
private function get_error($error_num) {
	if ($error_num <= count($this->error)) {
		return $this->error[$error_num];
	} else {
		return $this->error[0];
	}
}

// 专有渲染函数
private function my_render($view, $data = null) {
    $this->view->insert_css('error');
    $this->render('error/'.$view, $data);
}

}