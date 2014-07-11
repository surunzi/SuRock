<?php
Class DocumentTable extends Model {

function __construct(){
	parent::__construct();
}

// 获取数目
public function count() {
    $cmd = 'SELECT * FROM document';
    $result = $this->run($cmd);
    return $result->rowCount();
}

// 删除数据
public function delete($id) {
    $cmd   = 'DELETE FROM document WHERE doc_id = :doc_id';
    $param = array ('doc_id' => $id);
    $this->run($cmd, $param);
}

// 插入数据
public function insert($name, $time) {
    $cmd = 'INSERT INTO document(doc_name, doc_created) VALUES (:name, :time)';
    $param = array(
        'name' => $name,
        'time' => $time
        );
    $this->run($cmd, $param);
    return $this->db->lastInsertId();
}

// 获取单条数据
public function select($id) {
    $cmd = 'SELECT * FROM document WHERE doc_id=:doc_id';
    $param = array('doc_id' => $id);
    $result = $this->run($cmd, $param);
    return $result->fetch();
}

// 获取文档列表
public function select_ten($start_num) {
    $cmd = 'SELECT * FROM document ORDER BY doc_created DESC LIMIT '.$start_num.', 10';
    $result = $this->run($cmd);
    return $result->fetchAll();
}

}