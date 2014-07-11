<?php
Class NewsTable extends Model {

function __construct(){
	parent::__construct();
}

// 获取数目
public function count() {
    $cmd = 'SELECT * FROM news';
    $result = $this->run($cmd);
    return $result->rowCount();
}

// 删除数据
public function delete($id) {
    $cmd   = 'DELETE FROM news WHERE news_id = :news_id';
    $param = array ('news_id' => $id);
    $this->run($cmd, $param);
}

// 添加
public function insert($title, $content) {
    $cmd = 'INSERT INTO news(news_title, news_content, news_created)
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
    $cmd = 'SELECT * FROM news WHERE news_id=:news_id';
    $param = array('news_id' => $id);
    $result = $this->run($cmd, $param);
    return $result->fetch();
}

// 获取新闻列表
public function select_ten($start_num) {
    $cmd = 'SELECT * FROM news ORDER BY news_created DESC LIMIT '.$start_num.', 10';
    $result = $this->run($cmd);
    return $result->fetchAll();
}

// 更新新闻
public function update($id, $title, $content) {
    $cmd = 'UPDATE news set news_title=:title, news_content=:content, news_created=:time
        WHERE news_id=:id';
    $param = array(
        'id' => $id,
        'title' => Util::simple_purify($title),
        'content' => LibUtil::html_purify($content),
        'time' => Util::get_datetime()
        );
    $this->run($cmd, $param);
}

}