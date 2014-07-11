<?php
class Association extends Controller {
function __construct(){
	parent::__construct();
}

public function index(){
}

// 添加部门
public function addDepartment() {
    $this->authority(20);

    $name = Util::fetch_post('name');
    $info = Util::fetch_post('info');
    if ($name == null || $info == null) {
        $this->error(2);
    }
    $department_table = new DepartmentTable;
    $department_table->insert($name, $info);
    Util::go_back();
}

// 添加公告
public function addNotify() {
    $this->authority(21);

    $title = Util::fetch_post('title');
    $content = Util::fetch_post('content');
    if ($title == null || $content == null) {
        $this->error(2);
    }

    $notify_table = new NotifyTable;
    $notify_table->insert($title, $content);

    Util::go(URL.'association/manageNotify/');
}

// 删除部门
public function deleteDepartment($id) {
    $this->authority(20);
    
    $department_table = new DepartmentTable;
    $department_table->delete($id);
    $user_table = new UserTable;
    $user_table->clear_department($id);
    Util::go_back();
}

// 删除留言
public function deleteMessage($id) {
    $this->authority(20);
    
    $msg_table = new MessageTable;
    $msg_table->delete($id);
    Util::go_back();
}

// 删除公告
public function deleteNotify($id) {
    $this->authority(21);
    
    $notify_table = new NotifyTable;
    $notify_table->delete($id);
    Util::go_back();
}

// 获取单个公告
public function getNotify($id) {
    $notify_table = new NotifyTable;
    $result = $notify_table->select($id);
    echo $result['notify_content'];
}

// 发布公告
public function notify() {
    $this->authority(21);
    $this->view->insert_js('tinymce/tinymce.min');
    $this->my_render('notify');
}

// 部门管理
public function manageDepartment($page = 1) {
    $this->authority(20);
    
    $department_table = new DepartmentTable;
    $view_data = array('deps' => $department_table->select_all());
    $this->my_render('department', $view_data);
}

// 管理社团留言
public function manageMessage($page = 1) {
    $this->authority(20);

    $msg_table = new MessageTable;
    $count = $msg_table->count();
    $page = Util::calculate_page($count, 10, $page);
    $msgs = $msg_table->select_ten($page['start_num']);

    $view_data = array(
        'msgs' => $msgs,
        'page' => $page
        );

    $this->my_render('manage_message', $view_data);
}

// 管理公告
public function manageNotify($page = 1) {
    $this->authority(21);

    $notify_table = new NotifyTable;
    $count = $notify_table->count();
    $page = Util::calculate_page($count, 10, $page);
    $notifications = $notify_table->select_ten($page['start_num']);

    $view_data = array(
        'notifications' => $notifications,
        'page' => $page
        );

    $this->my_render('manage_notify', $view_data);
}

// 更改社团基本信息
public function modifyAssoInfo() {
    $this->authority(20);

    $asso_table = new AssociationTable;
    $asso_name = $asso_table->get('association_name');
    $asso_intro = $asso_table->get('association_intro');

    $view_data = array(
        'asso_name' => $asso_name,
        'asso_intro' => $asso_intro
        );
    $this->my_render('modify_asso_info', $view_data);
}

// 处理修改社团基本信息
public function modifyAssoInfoHandler() {
    $this->authority(20);
    $name = Util::fetch_post('name');
    $intro = Util::fetch_post('intro');
    if ($name == null && $intro == null) {
        $this->error(2);
    }

    $asso_table = new AssociationTable;
    $asso_table->set('association_name', $name);
    $asso_table->set('association_intro', $intro);

    Util::go_back();
}

// 更改社团联系方式
public function modifyContact() {
    $this->authority(20);

    $asso_table = new AssociationTable;
    $contact_phone = $asso_table->get('contact_phone');
    $contact_email = $asso_table->get('contact_email');

    $view_data = array(
        'phone' => $contact_phone,
        'email' => $contact_email
        );

    $this->my_render('modify_contact', $view_data);
}

// 处理更改社团联系方式
public function modifyContactHandler() {
    $this->authority(20);

    $phone = Util::fetch_post('phone');
    $email = Util::fetch_post('email');

    $asso_table = new AssociationTable;
    $asso_table->set('contact_phone', $phone);
    $asso_table->set('contact_email', $email);

    Util::go_back();
}

// 更新部门
public function updateDepartment($id) {
    $this->authority(20);
    
    $name = Util::fetch_post('name');
    $info = Util::fetch_post('info');
    if ($name == null || $info == null) {
        $this->error(2);
    }
    $department_table = new DepartmentTable;
    $department_table->update($id, $name, $info);
    Util::go_back();
}

// 专有渲染函数
private function my_render($view, $data = null) {
    $this->view->insert_css('association');
    $this->render('association/'.$view, $data);
}

}