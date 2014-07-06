<?php
class Manager extends Controller {

function __construct(){
	parent::__construct();
}

// 登录界面
public function index() {
    // 已经登录的话自动跳转到用户中心页
    if (Util::is_login()) {
        Util::go(URL.'manager/usercenter');
    }
	$this->my_render('login');
}

// 处理登录
public function loginHandler() {
    $username = Util::fetch_post('username');
    $password = Util::fetch_post('password');
    if ($username == null || $password == null) {
        $this->error(2);
    }

    if (SQLUtil::login($username, $password)) {
        Util::go(URL.'manager/usercenter');
    } else {
        $this->errorMsg('用户名或密码填写错误');
    }
}

// 退出登录
public function logout() {
    SessionUtil::destroy();
    Util::go(URL.'manager');
}

// 注册
public function signup() {
    $this->my_render('signup');
}

// 处理注册
public function signupHandler() {
    $username = Util::fetch_post('username');
    $password = Util::fetch_post('password');
    $realname = Util::fetch_post('realname');
    if ($username == null || $password == null || $realname == null) {
        $this->error(2);
    }

    $userTable = new UserTable();
    if ($userTable->is_exist($username)) {
        $this->errorMsg('该用户已存在');
    }

    // 插入数据
    $userTable->insert($username, $password, $realname);
    $result = $userTable->select($username, $password);
    $userExtraTable = new UserExtraTable;
    $userExtraTable->insert($result['user_id']);

    SQLUtil::login($username, $password);
    $this->usercenter();
}

// 用户中心
public function usercenter() {
    Util::need_to_login();
    $this->my_render('usercenter');
}

// 专有渲染函数
private function my_render($view, $data = null) {
    $this->view->insert_css('manager');
    $this->render('manager/'.$view, $data);
}

}