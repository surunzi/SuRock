<?php
Class MessageTable extends Model {

function __construct(){
	parent::__construct();
}

// 获取数目
public function count() {
    $cmd = 'SELECT * FROM message';
    $result = $this->run($cmd);
    return $result->rowCount();
}

// 删除数据
public function delete($id) {
    $cmd   = 'DELETE FROM message WHERE msg_id = :msg_id';
    $param = array ('msg_id' => $id);
    $this->run($cmd, $param);
}

// 新建留言
public function insert($name, $email, $content) {
    $cmd = 'INSERT INTO message(msg_name, msg_email, msg_content, msg_created)
        VALUES (:name, :email, :content, :time)';
    $param = array(
        'name' => Util::simple_purify($name),
        'email' => Util::simple_purify($email),
        'content' => Util::simple_purify($content),
        'time' => Util::get_datetime()
        );
    $this->run($cmd, $param);
}

// 获取留言列表
public function select_ten($start_num) {
    $cmd = 'SELECT * FROM message ORDER BY msg_created DESC LIMIT '.$start_num.', 10';
    $result = $this->run($cmd);
    return $result->fetchAll();
}

}