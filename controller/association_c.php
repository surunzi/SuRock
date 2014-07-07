<?php
class Association extends Controller {
function __construct(){
	parent::__construct();
}

public function index(){
}

// 添加部门
public function addDepartment() {
    $name = Util::fetch_post('name');
    $info = Util::fetch_post('info');
    if ($name == null || $info == null) {
        $this->error(2);
    }
    $department_table = new DepartmentTable;
    $department_table->insert($name, $info);
    Util::go_back();
}

// 删除部门
public function deleteDepartment($id) {
    $department_table = new DepartmentTable;
    $department_table->delete($id);
    $user_table = new UserTable;
    $user_table->clear_department($id);
    Util::go_back();
}

// 部门管理
public function manageDepartment() {
    $department_table = new DepartmentTable;
    $view_data = array('deps' => $department_table->select_all());
    $this->my_render('department', $view_data);
}

// 更新部门
public function updateDepartment($id) {
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