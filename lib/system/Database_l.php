<?php
// 连接数据库类，继承自PDO
class Database extends PDO {

function __construct($DB_TYPE, $DB_HOST, $DB_PORT,
					 $DB_NAME, $DB_USER, $DB_PASS) {
	parent::__construct($DB_TYPE.':host='.$DB_HOST.';port='.$DB_PORT.';dbname='.$DB_NAME,
						$DB_USER, $DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}

/* 执行方法
 */
public function run($query, $param = array()) {
	$sth = $this->prepare($query);
	$sth->execute($param);
	return $sth;
}

}