<?php
class SQLUtil {

// 登录
public static function login($username, $password) {
    $user_table = new UserTable;
    $result = $user_table->select($username, $password);
    if ($result != false) {
        // 设置Session
        SessionUtil::set(array(
            'is_login' => true,
            'user_id' => $result['user_id'],
            'user_login' => $result['user_login'],
            'user_name' => $result['user_name'],
            'user_phone' => $result['user_phone'],
            'user_email' => $result['user_email'],
            'user_type' => $result['user_type'],
            'user_authority' => SQLUtil::get_authority($result['user_type'],
                $result['user_authority'])
        ));
        return true;
    } else {
        return false;
    }
}

// 获取权限列表
public static function get_authority($user_type_id, $user_authority) {
    if ($user_type_id == 0 || $user_type_id == 1) {
        $result = '';
    } else {
        $user_type_table = new UserTypeTable;
        $result = $user_type_table->select($user_type_id);
        $result = trim($result['user_type_authority']);
    }
    if ($result == '') {
        $result = $user_authority;
    } else {
        $result = $result.','.$user_authority;
    }
    return explode(',', $result);
}

// 获取部门
public static function get_department($dep_id) {
    if ($dep_id == 0) {
        return '无';
    }
    $department_table = new DepartmentTable;
    $result = $department_table->select($dep_id);
    return $result['dep_name'];
}

// 获取角色名
public static function get_type_name($user_type_id) {
    if ($user_type_id == 0) {
        return '会员';
    } else if ($user_type_id == 1) {
        return '管理员';
    }
    $user_type_table = new UserTypeTable;
    $result = $user_type_table->select($user_type_id);
    return  $result['user_type_name'];
}

}
?>