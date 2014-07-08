<?php
Class NotifyTable extends Model {

function __construct(){
	parent::__construct();
}

// 获取数目
public function count() {
    $cmd = 'SELECT * FROM notify';
    $result = $this->run($cmd);
    return $result->rowCount();
}

// 删除数据
public function delete($id) {
    $cmd   = 'DELETE FROM notify WHERE notify_id = :notify_id';
    $param = array ('notify_id' => $id);
    $this->run($cmd, $param);
}

// 添加
public function insert($title, $content) {
    $cmd = 'INSERT INTO notify(notify_title, notify_content, notify_created)
        VALUES (:title, :content, :time)';
    $param = array(
        'title' => Util::simple_purify($title),
        'content' => LibUtil::html_purify($content),
        'time' => Util::get_datetime()
        );
    $this->run($cmd, $param);
}

// 获取单条数据
public function select($id) {
    $cmd = 'SELECT * FROM notify WHERE notify_id=:notify_id';
    $param = array('notify_id' => $id);
    $result = $this->run($cmd, $param);
    return $result->fetch();
}

// 获取公告列表
public function select_ten($start_num) {
    $cmd = 'SELECT * FROM notify ORDER BY notify_created DESC LIMIT '.$start_num.', 10';
    $result = $this->run($cmd);
    return $result->fetchAll();
}

}