<?php
Class InfoModel extends Model {

function __construct(){
	parent::__construct();
}

// 选择用户列表
public function select_ten($start_num) {
    $cmd = 'SELECT * FROM user JOIN user_extra ON user.user_id = user_extra.user_id ORDER BY user_department LIMIT '.$start_num.', 10';
    $result = $this->run($cmd);
    return $result->fetchAll();
}

}