<?php
class News extends Controller {

function __construct(){
	parent::__construct();
}

public function index() {
}

// 添加新闻
public function add() {
    $this->authority(40);

    $title = Util::fetch_post('title');
    $content = Util::fetch_post('content');
    if ($title == null || $content == null) {
        $this->error(2);
    }

    $news_table = new NewsTable;
    $news_table->insert($title, $content);

    Util::go(URL.'news/manage/');
}

// 删除新闻
public function delete($id) {
    $this->authority(40);
    
    $news_table = new NewsTable;
    $news_table->delete($id);
    Util::go_back();
}

// 编辑新闻
public function edit($id) {
    $this->authority(40);

    $this->view->insert_js('tinymce/tinymce.min');
    $news_table = new NewsTable;
    $news = $news_table->select($id);
    $view_data = array(
        'id' => $news['news_id'],
        'title' => $news['news_title'],
        'content' => $news['news_content']
        );

    $this->my_render('edit', $view_data);
}

// 管理新闻
public function manage($page = 1) {
    $this->authority(40);

    $news_table = new NewsTable;
    $count = $news_table->count();
    $page = Util::calculate_page($count, 10, $page);
    $news = $news_table->select_ten($page['start_num']);

    $view_data = array(
        'news' => $news,
        'page' => $page
        );
    $this->my_render('manage', $view_data);
}

// 发布新闻
public function post() {
    $this->authority(40);
    $this->view->insert_js('tinymce/tinymce.min');
    $this->my_render('post');
}

// 更新新闻
public function update($id) {
    $this->authority(40);

    $title = Util::fetch_post('title');
    $content = Util::fetch_post('content');
    if ($title == null || $content == null) {
        $this->error(2);
    }

    $news_table = new NewsTable;
    $news_table->update($id, $title, $content);
    Util::go(URL.'news/manage/');
}

// 专有渲染函数
private function my_render($view, $data = null) {
    $this->view->insert_css('news');
    $this->render('news/'.$view, $data);
}

}