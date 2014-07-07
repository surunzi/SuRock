<?php
Class UserTypeTable extends Model {

function __construct(){
	parent::__construct();
}

// 删除数据
public function delete($id) {
    $cmd   = 'DELETE FROM user_type WHERE user_type_id = :user_type_id';
    $param = array ('user_type_id' => $id);
    $this->db->run($cmd, $param);
}

// 插入新数据
public function insert($name, $authority) {
    $cmd = 'INSERT INTO user_type(user_type_name, user_type_authority) VALUES(:user_type_name, :user_type_authority)';
    $param = array('user_type_name' => Util::simple_purify($name),
                   'user_type_authority' => Util::simple_purify($authority)
                   );
    $result = $this->run($cmd, $param);
    if ($result != false) {
        return true;
    } else {
        return false;
    }
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

// 获取所有数据
public function select_all() {
    $cmd = 'SELECT * FROM user_type';
    $result = $this->run($cmd);
    return $result->fetchAll();
}

// 更新数据
public function update($id, $name, $authority) {
    $cmd   = 'UPDATE user_type SET user_type_name=:user_type_name, user_type_authority=:user_type_authority WHERE user_type_id=:user_type_id';
    $param = array ('user_type_id' => $id,
                    'user_type_name' => Util::simple_purify($name),
                    'user_type_authority' => Util::simple_purify($authority)
                   );
    $this->run($cmd, $param);
}

}