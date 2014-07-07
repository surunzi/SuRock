<?php
Class UserTable extends Model {

function __construct(){
	parent::__construct();
}

// 重置部门
public function clear_department($dep_id) {
    $cmd = 'UPDATE user SET user_department=0 WHERE user_department=:user_department';
    $param = array('user_department' => $dep_id);
    $this->run($cmd, $param);
}

// 重置角色
public function clear_type($type_id) {
    $cmd = 'UPDATE user SET user_type=0 WHERE user_type=:user_type';
    $param = array('user_type' => $type_id);
    $this->run($cmd, $param);
}

// 获取数目
public function count() {
    $cmd = 'SELECT * FROM user WHERE user_type<>1';
    $result = $this->run($cmd);
    return $result->rowCount();
}

// 删除数据
public function delete($id) {
    $cmd   = 'DELETE FROM user WHERE user_id = :user_id';
    $param = array ('user_id' => $id);
    $this->db->run($cmd, $param);
}

// 插入新数据
public function insert($username, $password, $realname) {
    $cmd = 'INSERT INTO user(user_login, user_pass, user_name, user_created, user_modified)
        VALUES(:user_login, :user_pass, :user_name, :user_created, :user_created)';
    $param = array('user_login' => Util::simple_purify($username),
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

// 获取用户列表
public function select_ten($start_num) {
    $cmd = 'SELECT * FROM user user WHERE user_type<>1 ORDER BY user_created DESC LIMIT '.$start_num.', 10';
    $result = $this->db->run($cmd);
    return $result->fetchAll();
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

// 通过学号查找
public function select_with_login($user_login) {
    $cmd = 'SELECT * FROM user WHERE user_login=:user_login AND user_type<>1';
    $param = array('user_login' => $user_login);
    $result = $this->run($cmd, $param);
    if ($result->rowCount() == 1) {
        return $result->fetch();
    } else {
        return false;
    }
}

// 更新数据
public function update($id, $phone, $email, $department) {
    $cmd   = 'UPDATE user SET user_phone=:user_phone, user_email=:user_email, user_department=:user_department, user_modified=:user_modified WHERE user_id=:user_id';
    $param = array ('user_id' => $id,
                    'user_phone' => Util::simple_purify($phone),
                    'user_email' => Util::simple_purify($email),
                    'user_department' => $department,
                    'user_modified' => Util::get_datetime()
                   );
    $this->run($cmd, $param);
}

// 更新用户角色
public function update_authority($id, $authority) {
    $cmd   = 'UPDATE user SET user_authority=:user_authority WHERE user_id=:user_id';
    $param = array ('user_id' => $id,
                    'user_authority' => $authority
                   );
    $this->run($cmd, $param);
}

// 更新用户角色
public function update_type($id, $type) {
    $cmd   = 'UPDATE user SET user_type=:user_type WHERE user_id=:user_id';
    $param = array ('user_id' => $id,
                    'user_type' => $type
                   );
    $this->run($cmd, $param);
}

}