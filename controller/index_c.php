<?php
//默认控制器，即主页面
class Index extends Controller {

function __construct(){
	parent::__construct();
}

public function index(){
    $asso_table = new AssociationTable;
    $asso_name = $asso_table->get('association_name');
    $asso_intro = $asso_table->get('association_intro');

    $notify_table = new NotifyTable;
    $notifications = $notify_table->select_ten(0);

    $view_data = array(
        'asso_name' => $asso_name,
        'asso_intro' => $asso_intro,
        'notifications' => $notifications
        );
	$this->my_render('index', $view_data);
}

// 社团联系方式
public function contact() {
    $this->my_render('contact');
}

// 新闻
public function news() {
    $this->my_render('news');
}

// 查看公告页面
public function notify($page = 1) {
    $notify_table = new NotifyTable;
    $count = $notify_table->count();
    $page = Util::calculate_page($count, 10, $page);
    $notifications = $notify_table->select_ten($page['start_num']);

    $view_data = array(
        'notifications' => $notifications,
        'page' => $page
        );

    $this->my_render('notify', $view_data);
}

// 留言板
public function message() {
    $this->my_render('message');
}

// 专有渲染函数
private function my_render($view, $data = null) {
    $this->view->insert_css('index');
    $this->render('index/'.$view, $data);
}

}