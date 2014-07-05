<?php
//该类用于页面的初始化工作
class Bootstrap {
/*URL参数
 *控制器
 *默认页面
 */
private $url          = array('index', 'index');
private $controller   = null;

//启动
public function init() {
	$this->get_url();
	$this->load_controller();
}

/*执行控制器对应的函数
 *url[1] 方法名
 *url[2] 参数1
 *url[3] 参数2
 *url[4] 参数3
 */
private function call_method() {
	$length = count($this->url);
	//方法不存在责跳转到错误页面
	if($length > 1 && !method_exists($this->controller, $this->url[1])){
		$this->error();
	}

	switch ($length) {
		case 5:
			$this->controller->{$this->url[1]}($this->url[2], $this->url[3], $this->url[4]);
			break;
		case 4:
			$this->controller->{$this->url[1]}($this->url[2], $this->url[3]);
			break;
		case 3:
			$this->controller->{$this->url[1]}($this->url[2]);
			break;
		case 2:
			$this->controller->{$this->url[1]}();
			break;
		default:
			$this->controller->index();
			break;
	}
}

//处理错误请求
private function error() {
	header('location:'.URL.'error/index/1');
	exit();
}

//获取URL参数
private function get_url() {
	if(isset($_GET['url'])){
		$url = $_GET['url'];
		$url = ltrim($url, '/');
		$url = rtrim($url, '/');
		//过滤非法url字符
		$url = filter_var($url, FILTER_SANITIZE_URL);
		if(!empty($url)){
			$this->url = explode('/', $url);
		}
	}
}

//加载控制器
private function load_controller() {
	$controller_path = CON.$this->url[0].'_c.php';
	if(file_exists($controller_path)){
		require_once $controller_path;
		$this->controller = new $this->url[0];
		$this->controller->load_model($this->url[0]);
		$this->call_method();
	}else{
		$this->error();
	}
}
}