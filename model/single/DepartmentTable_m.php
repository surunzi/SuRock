<?php
Class DepartmentTable extends Model {

function __construct(){
	parent::__construct();
}

// 删除数据
public function delete($id) {
    $cmd   = 'DELETE FROM department WHERE dep_id = :dep_id';
    $param = array ('dep_id' => $id);
    $this->run($cmd, $param);
}

// 插入新数据
public function insert($name, $info) {
    $cmd = 'INSERT INTO department(dep_name, dep_info) VALUES (:dep_name, :dep_info)';
    $param = array('dep_name' => Util::simple_purify($name),
                   'dep_info' => Util::simple_purify($info)
                   );
    $result = $this->run($cmd, $param);
    if ($result != false) {
        return true;
    } else {
        return false;
    }
}

// 是否有这个部门存在
public function is_exist($id) {
    $cmd = 'SELECT dep_id FROM department WHERE dep_id=:dep_id';
    $param = array('dep_id' => $id);
    $result = $this->run($cmd, $param);
    if ($result->rowCount() == 1) {
        return true;
    } else {
        return false;
    }
}

// 获取单条数据
public function select($id) {
    $cmd = 'SELECT * FROM department WHERE dep_id=:dep_id';
    $param = array('dep_id' => $id);
    $result = $this->run($cmd, $param);
    return $result->fetch();
}

// 获取所有数据
public function select_all() {
    $cmd = 'SELECT * FROM department';
    $result = $this->run($cmd);
    return $result->fetchAll();
}

// 更新数据
public function update($id, $name, $info) {
    $cmd   = 'UPDATE department SET dep_name=:dep_name, dep_info=:dep_info WHERE dep_id=:dep_id';
    $param = array ('dep_id' => $id,
                    'dep_name' => Util::simple_purify($name),
                    'dep_info' => Util::simple_purify($info)
                   );
    $this->run($cmd, $param);
}

}