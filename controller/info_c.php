<?php
class Info extends Controller {

function __construct(){
	parent::__construct();
}

public function index(){
}

// 通讯录
public function contactBook($page = 1) {
    $this->authority(30);

    $user_table = new UserTable;
    $count = $user_table->count();
    $page = Util::calculate_page($count, 10, $page);
    $contacts = $this->model->select_ten($page['start_num']);

    $view_data = array(
        'contacts' => $contacts,
        'page' => $page
        );

    $this->my_render('contact_book', $view_data);
}

// 专有渲染函数
private function my_render($view, $data = null) {
    $this->render('info/'.$view, $data);
}

}