<?php
class User extends Controller {

function __construct(){
	parent::__construct();
    Util::need_to_login();
}

public function index(){
}

// 管理所有用户
public function manage() {
    $this->my_render('manage');
}

// 修改个人信息
public function modifyInfo($user_id = null) {
    if ($user_id != null && $user_id != SessionUtil::get('user_id')) {
        // 如果是要修改其它用户的信息，需检查是否有权限10
        if (!Util::has_authority(10)) {
            $this->error(3);
        }
    } else {
        $user_id = SessionUtil::get('user_id');
    }
    $user_info = $this->model->select($user_id);
    $view_data = array(
        'sex' => $user_info['user_sex'],
        'phone' => $user_info['user_phone'],
        'email' => $user_info['user_email'],
        'qq' => $user_info['user_qq'],
        'dormitory' => $user_info['user_dormitory'],
        'major' => $user_info['user_major'],
        'birthplace' => $user_info['user_birthplace'],
        'birthday' => $user_info['user_birthday']
        );
    $this->my_render('modify_info', $view_data);
}

// 管理指定用户
public function search() {
    $this->my_render('search');
}

// 管理用户角色
public function type() {
    $this->my_render('type');
}

// 浏览个人信息
public function viewInfo($user_id = null) {
    if ($user_id != null && $user_id != SessionUtil::get('user_id')) {
        // 如果是要修改其它用户的信息，需检查是否有权限10
        if (!Util::has_authority(10)) {
            $this->error(3);
        }
    } else {
        $user_id = SessionUtil::get('user_id');
    }
    $user_info = $this->model->select($user_id);
    $view_data = array(
        'stunum' => $user_info['user_login'],
        'name' => $user_info['user_name'],
        'sex' => $user_info['user_sex'],
        'phone' => $user_info['user_phone'],
        'email' => $user_info['user_email'],
        'qq' => $user_info['user_qq'],
        'dormitory' => $user_info['user_dormitory'],
        'major' => $user_info['user_major'],
        'birthplace' => $user_info['user_birthplace'],
        'birthday' => $user_info['user_birthday'],
        'created' => $user_info['user_created']
        );
    $this->my_render('info', $view_data);
}

// 专有渲染函数
private function my_render($view, $data = null) {
    $this->view->insert_css('user');
    $this->render('user/'.$view, $data);
}

}