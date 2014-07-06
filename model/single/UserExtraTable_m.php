<?php
Class UserExtraTable extends Model {

function __construct(){
	parent::__construct();
}

// 新建数据
public function insert($user_id) {
    $cmd = 'INSERT INTO user_extra(user_id) VALUES(:user_id)';
    $param = array('user_id' => $user_id);
    $result = $this->run($cmd, $param);
    if ($result != false) {
        return true;
    } else {
        return false;
    }
}

}