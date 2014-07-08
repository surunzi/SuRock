<?php
//默认控制器，即主页面
class Index extends Controller {

function __construct(){
	parent::__construct();
}

public function index(){
	$this->my_render('index');
}

// 专有渲染函数
private function my_render($view, $data = null) {
    $this->view->insert_css('index');
    $this->render('index/'.$view, $data);
}

}