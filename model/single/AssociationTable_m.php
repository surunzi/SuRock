<?php
Class AssociationTable extends Model {

function __construct(){
	parent::__construct();
}

// 设置值
public function set($key, $value) {

}

// 获取值
public function get($key) {
    $cmd = 'SELECT * FROM association WHERE key=:key';
    $param = array('key' => $key);
    $result = $this->run($cmd, $param);
    $result = $result->fetch();
    return $result['value'];
}

}