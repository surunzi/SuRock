<?php
Class UserModel extends Model {

function __construct(){
	parent::__construct();
}

// 根据用户id获取所有用户信息，包括表user和表user_extra
public function select($user_id) {
    $cmd = 'SELECT * FROM user JOIN user_extra ON user.user_id = user_extra.user_id WHERE user.user_id=:user_id';
    $param = array('user_id' => $user_id);
    $result = $this->run($cmd, $param);
    if ($result->rowCount() == 1) {
        return $result->fetch();
    } else {
        return false;
    }
}

}