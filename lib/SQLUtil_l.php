<?php
class SQLUtil {

// 登录
public static function login($username, $password) {
    $userTable = new UserTable;
    $result = $userTable->select($username, $password);
    if ($result != false) {
        // 设置Session
        SessionUtil::set(array(
            'user_id' => $result['user_id'],
            'user_login' => $result['user_login'],
            'user_name' => $result['user_name'],
            'user_phone' => $result['user_phone'],
            'user_email' => $result['user_email'],
            'user_type' => $result['user_type'],
            'user_authority' => $result['user_authority']
        ));
        return true;
    } else {
        return false;
    }
}

}
?>