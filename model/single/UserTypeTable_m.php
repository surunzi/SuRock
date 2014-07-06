<?php
Class UserTypeTable extends Model {

function __construct(){
	parent::__construct();
}

// 获取用户权限
public function select($user_type_id) {
    $cmd = 'SELECT * FROM user_type WHERE user_type_id=:user_type_id';
    $param = array('user_type_id' => $user_type_id);
    $result = $this->run($cmd, $param);
    if ($result->rowCount() == 1) {
        return $result->fetch();
    } else {
        return false;
    }
}

}