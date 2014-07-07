<?php
Class UserExtraTable extends Model {

function __construct(){
	parent::__construct();
}

// 删除数据
public function delete($id) {
    $cmd   = 'DELETE FROM user_extra WHERE user_id = :user_id';
    $param = array ('user_id' => $id);
    $this->db->run($cmd, $param);
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

// 更新数据
public function update($id, $sex, $dormitory, $birthday, $major, $birthplace, $qq) {
    $cmd   = 'UPDATE user_extra SET user_sex=:user_sex, user_dormitory=:user_dormitory, user_birthday=:user_birthday, user_major=:user_major, user_birthplace=:user_birthplace, user_qq=:user_qq WHERE user_id=:user_id';
    $param = array ('user_id' => $id,
                    'user_sex' => $sex,
                    'user_dormitory' => Util::simple_purify($dormitory),
                    'user_birthday' => $birthday,
                    'user_major' => Util::simple_purify($major),
                    'user_birthplace' => Util::simple_purify($birthplace),
                    'user_qq' => Util::simple_purify($qq)
                   );
    $this->run($cmd, $param);
}

}