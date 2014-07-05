<?php
//控制器模板
class Template extends Controller {
function __construct(){
	parent::__construct();
}

public function index(){
	$view_data = array ('title' => '模板标题');
	$this->render("video/index", $view_data);
}
}