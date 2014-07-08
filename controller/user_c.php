<?php
class User extends Controller {

function __construct(){
	parent::__construct();
    Util::need_to_login();
}

public function index(){
}

// 添加用户角色
public function addUserType() {
    $this->authority(10);

    $name = Util::fetch_post('name');
    $authority = Util::fetch_post('authority');
    if ($name == null) {
        $this->error(2);
    }

    $user_type_table = new UserTypeTable;
    $user_type_table->insert($name, $authority);
    Util::go_back();
}

// 删除用户
public function delete($id) {
    $user_table = new UserTable;
    $user_table->delete($id);

    $user_extra_table = new UserExtraTable;
    $user_extra_table->delete($id);

    Util::go_back();
}

// 删除角色
public function deleteType($id) {
    $user_type_table = new UserTypeTable;
    $user_type_table->delete($id);
    $user_table = new UserTable;
    $user_table->clear_type($id);
    Util::go_back();
}

// 管理所有用户
public function manage($page = 1) {
    $this->authority(10);

    $user_table = new UserTable;
    $count = $user_table->count();
    $page = Util::calculate_page($count, 10, $page);
    $users = $user_table->select_ten($page['start_num']);
    $user_type_table = new UserTypeTable;
    $types = $user_type_table->select_all();

    $view_data = array(
        'users' => $users,
        'page' => $page,
        'types' => $types
        );
    $this->my_render('manage', $view_data);
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
    $department_table = new DepartmentTable;
    $deps = $department_table->select_all();
    $view_data = array(
        'id' => $user_id,
        'sex' => $user_info['user_sex'],
        'phone' => $user_info['user_phone'],
        'email' => $user_info['user_email'],
        'qq' => $user_info['user_qq'],
        'department' => $user_info['user_department'],
        'departments' => $deps,
        'dormitory' => $user_info['user_dormitory'],
        'major' => $user_info['user_major'],
        'birthplace' => $user_info['user_birthplace'],
        'birthday' => $user_info['user_birthday']
        );
    $this->my_render('modify_info', $view_data);
}

// 管理指定用户
public function search() {
    if (!Util::has_authority(10)) {
        $this->error(3);
    }

    $key = Util::fetch_get('key');
    if ($key != null) {
        $user_table = new UserTable;
        $result = $user_table->select_with_login($key);
        if ($result != false) {
            $user_type_table = new UserTypeTable;
            $types = $user_type_table->select_all();
            $view_data = array(
                'has_key' => true,
                'has_result' => true,
                'user' => $result,
                'types' => $types
                );
        } else {
            $view_data = array(
                'has_key' => true,
                'has_result' => false
                );
        }
        $this->my_render('search', $view_data);
    } else {
        $this->my_render('search');
    }
}

// 管理用户角色
public function type() {
    if (!Util::has_authority(10)) {
        $this->error(3);
    }

    $user_type_table = new UserTypeTable;
    $types = $user_type_table->select_all();

    $view_data = array(
        'types' => $types
        );
    $this->my_render('type', $view_data);
}

// 更新用户角色
public function updateType($id) {
    $name = Util::fetch_post('name');
    $authority = Util::fetch_post('authority');
    if ($name == null) {
        $this->error(2);
    }

    $user_type_table = new UserTypeTable;
    $user_type_table->update($id, $name, $authority);
    Util::go_back();
}

// 更新用户信息
public function updateUser($id) {
    if ($id != SessionUtil::get('user_id')) {
        if (!Util::has_authority(10)) {
            $this->error(3);
        }
    }

    $sex = Util::fetch_post('sex');
    $phone = Util::fetch_post('phone');
    $email = Util::fetch_post('email');
    $qq = Util::fetch_post('qq');
    $department = Util::fetch_post('department');
    $dormitory = Util::fetch_post('dormitory');
    $major = Util::fetch_post('major');
    $birthplace = Util::fetch_post('birthplace');
    $birthday = Util::fetch_post('birthday');

    $user_table = new UserTable;
    $user_table->update($id, $phone, $email, $department);

    $user_extra_table = new UserExtraTable;
    $user_extra_table->update($id, $sex, $dormitory, $birthday, $major, $birthplace, $qq);

    Util::go_back();
}

// 更新用户的权限
public function updateUserAuthority($id) {
    $this->authority(10);

    $authority = Util::fetch_post('authority');

    $user_table = new UserTable;
    $user_table->update_authority($id, $authority);

    Util::go_back();
}

// 更新用户的角色
public function updateUserType($id) {
    $this->authority(10);

    $type = Util::fetch_post('type');

    $user_table = new UserTable;
    $user_table->update_type($id, $type);

    Util::go_back();
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
    $user_type_table = new UserTypeTable;
    $user_type_name = SQLUtil::get_type_name($user_info['user_type']);
    $user_department = SQLUtil::get_department($user_info['user_department']);

    $view_data = array(
        'stunum' => $user_info['user_login'],
        'name' => $user_info['user_name'],
        'sex' => Util::get_sex($user_info['user_sex']),
        'phone' => $user_info['user_phone'],
        'email' => $user_info['user_email'],
        'qq' => $user_info['user_qq'],
        'department' => $user_department,
        'dormitory' => $user_info['user_dormitory'],
        'major' => $user_info['user_major'],
        'birthplace' => $user_info['user_birthplace'],
        'birthday' => $user_info['user_birthday'],
        'usertype' => $user_type_name,
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