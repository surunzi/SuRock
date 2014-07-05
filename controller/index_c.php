<?php
//默认控制器，即主页面
class Index extends Controller {

function __construct(){
	parent::__construct();
}

public function index(){
	$this->render("index/login");
}

}