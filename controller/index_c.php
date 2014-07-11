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

    $news_table = new NewsTable;
    $news = $news_table->select_ten(0);

    $view_data = array(
        'asso_name' => $asso_name,
        'asso_intro' => $asso_intro,
        'notifications' => $notifications,
        'news' => $news
        );
	$this->my_render('index', $view_data);
}

// 添加消息
public function addMsg() {
    $name = Util::fetch_post('name');
    $email = Util::fetch_post('email');
    $content = Util::fetch_post('content');
    if ($name == null || $email == null || $content == null) {
        $this->error(2);
    }

    $msg_table = new MessageTable;
    $result = $msg_table->insert($name, $email, $content);
    Util::go(URL.'index/message/');
}

// 社团联系方式
public function contact() {
    $asso_table = new AssociationTable;
    $contact_phone = $asso_table->get('contact_phone');
    $contact_email = $asso_table->get('contact_email');

    $view_data = array(
        'phone' => $contact_phone,
        'email' => $contact_email
        );
    $this->my_render('contact', $view_data);
}

// 新闻
public function news($page = 1) {
    $news_table = new NewsTable;
    $count = $news_table->count();
    $page = Util::calculate_page($count, 10, $page);
    $news = $news_table->select_ten($page['start_num']);

    $view_data = array(
        'news' => $news,
        'page' => $page
        );
    $this->my_render('news', $view_data);
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
public function message($page = 1) {
    $msg_table = new MessageTable;
    $count = $msg_table->count();
    $page = Util::calculate_page($count, 10, $page);
    $msgs = $msg_table->select_ten($page['start_num']);

    $view_data = array(
        'msgs' => $msgs,
        'page' => $page
        );

    $this->my_render('message', $view_data);
}

// 查看新闻
public function view_news($id) {
    $news_table = new NewsTable;
    $news = $news_table->select($id);
    $view_data = array(
        'TITLE' => $news['news_title'],
        'title' => $news['news_title'],
        'content' => $news['news_content']
        );
    $this->my_render('view_news', $view_data);
}

// 专有渲染函数
private function my_render($view, $data = null) {
    $this->view->insert_css('index');
    $this->render('index/'.$view, $data);
}

}