<?php
/*公共方法类
 *所有不涉及数据库操作的公用函数都请放在此类内
 *所有类都必须是静态类
 */
class Util {

//生成验证码图片
public static function captcha(){
	session_start();
	header('Content-type:image/jpeg');

	$_SESSION['captcha'] = rand(1000, 9999);
	$text = $_SESSION['captcha'];
	$font_size = 30;

	$image_width = 110;
	$image_height = 30;

	$image = imagecreate($image_width, $image_height);
	imagecolorallocate($image, 255, 255, 255);
	$text_color = imagecolorallocate($image, 0, 0, 0);

	for($x = 1; $x <= 30; $x++){
		$x1 = rand(1, 100);
		$x2 = rand(1, 100);
		$y1 = rand(1, 100);
		$y2 = rand(1, 100);
		imageline($image, $x1, $y1, $x2, $y2, $text_color);
	}

	$x = rand(0, 60);
	$y = rand(0, 15);
	imagestring($image, $font_size, $x, $y, $text, $text_color);
	imagejpeg($image);
}

/*获取GET数据，假如不存在或为空则返回null
 *name GET的参数名
 */
public static function fetch_get($name){
	if(isset($_GET[$name]) && !empty($_GET[$name])){
		return $_GET[$name];
	}else{
		return null;
	}
}

/*获取POST数据，假如不存在或为空则返回null
 *name POST的参数名
 */
public static function fetch_post($name){
	if(isset($_POST[$name]) && !empty($_POST[$name])){
		return $_POST[$name];
	}else{
		return null;
	}
}

//获取当前的日期，精确到秒
public static function get_datetime(){
	date_default_timezone_set('Asia/Chongqing');
	return date("Y-m-d H:i:s");
}

//将页面转回发出请求的页面，如果是直接访问则跳转到主页
public static function go_back(){
	if(isset($_SERVER['HTTP_REFERER'])){
		$http_referer = $_SERVER['HTTP_REFERER'];
		header('location:'.$http_referer);
	}else{
		header('location:index');
	}
}

/*简单过滤HTML标签
 *data 要过滤的数据
 */
public static function simple_purify($data){
	return str_replace("\n", '<br>', strip_tags($data));
}

}