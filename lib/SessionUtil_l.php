<?php
class SessionUtil {

// 销毁Session
public static function destroy() {
    @session_start();
    session_destroy();
}

// 获取Session
public static function get($name) {
    @session_start();
    return $_SESSION[$name];
}

// 设置Session
public static function set($name, $value = null) {
    @session_start();
    if ($value == null) {
        // 第一个参数传的是数组
        foreach ($name as $key => $value) {
            $_SESSION[$key] = $value; 
        }
    } else {
        $_SESSION[$name] = $value;
    }
}

}
?>