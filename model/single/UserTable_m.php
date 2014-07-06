<?php
Class UserTable extends Model {

function __construct(){
	parent::__construct();
}

// 插入新数据
public function insert($username, $password, $realname) {
    $cmd = 'INSERT INTO user(user_login, user_pass, user_name, user_created, user_modified)
        VALUES(:user_login, :user_pass, :user_name, :user_created, :user_created)';
    $param = array('user_login' => $username,
                   'user_pass' => md5($password),
                   'user_name' => $realname,
                   'user_created' => Util::get_datetime(),
                   'user_modified' => Util::get_datetime()
                   );
    $result = $this->run($cmd, $param);
    if ($result != false) {
        return true;
    } else {
        return false;
    }
}

// 检查用户名是否已经存在
public function is_exist($username) {
    $cmd = 'SELECT user_id FROM user WHERE user_login=:user_login';
    $param = array('user_login' => $username);
    $result = $this->run($cmd, $param);
    if ($result->rowCount() == 1) {
        return true;
    } else {
        return false;
    }
}

// 通过用户名密码查找
public function select($username, $password) {
    $cmd = 'SELECT * FROM user WHERE user_login=:user_login AND user_pass=:user_pass';
    $param = array('user_login' => $username,
                   'user_pass' => md5($password));
    $result = $this->run($cmd, $param);
    if ($result->rowCount() == 1) {
        return $result->fetch();
    } else {
        return false;
    }
}

// 通过用户ID查找
public function select_with_id($user_id) {
    $cmd = 'SELECT * FROM user WHERE user_id=:user_id';
    $param = array('user_id' => $user_id);
    $result = $this->run($cmd, $param);
    if ($result->rowCount() == 1) {
        return $result->fetch();
    } else {
        return false;
    }
}

}