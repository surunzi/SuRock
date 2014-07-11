<?php
class Document extends Controller {

private $location = 'public/doc/';

function __construct(){
	parent::__construct();
}

public function index() {
}

// 添加文档
public function add() {
    $this->authority(51);
    if (isset($_FILES['document'])) {
        $file = $_FILES['document'];
    } else {
        $this->error(2);
    }

    if ($file['size'] > 2097152) {
        $this->errorMsg('文件大小不能超过2M');
    }

    $doc_table = new DocumentTable;
    $time = Util::get_datetime().'';
    $id = $doc_table->insert($file['name'], $time);

    move_uploaded_file($file["tmp_name"], $this->location.$id.'_'.$file['name']);

    Util::go(URL.'document/manage/');
}

// 删除文档
public function delete($id) {
    $this->authority(51);

    $doc_table = new DocumentTable;
    $doc = $doc_table->select($id);
    $doc_table->delete($id);

    unlink($this->location.$doc['doc_id'].'_'.$doc['doc_name']);

    Util::go_back();
}

// 管理文档
public function manage($page = 1) {
    $this->authority(51);

    $doc_table = new DocumentTable;
    $count = $doc_table->count();
    $page = Util::calculate_page($count, 10, $page);
    $docs = $doc_table->select_ten($page['start_num']);

    $view_data = array(
        'docs' => $docs,
        'page' => $page
        );

    $this->my_render('manage', $view_data);
}

// 上传文档
public function upload() {
    $this->my_render('upload');
}

// 查看文档
public function view($page = 1) {
    $this->authority(50);

    $doc_table = new DocumentTable;
    $count = $doc_table->count();
    $page = Util::calculate_page($count, 10, $page);
    $docs = $doc_table->select_ten($page['start_num']);

    $view_data = array(
        'docs' => $docs,
        'page' => $page
        );
    $this->my_render('view', $view_data);
}

// 专有渲染函数
private function my_render($view, $data = null) {
    $this->view->insert_css('document');
    $this->render('document/'.$view, $data);
}

}