<?php
class LibUtil {

//html过滤
public static function html_purify($data){
    require_once LIB.'htmlpurifier/HTMLPurifier.auto.php';
    $config = HTMLPurifier_Config::createDefault();
    $config->set('Cache.DefinitionImpl', null);
    $config->set('Attr.EnableID', true);
    $purifier = new HTMLPurifier($config);
    $data = $purifier->purify($data);
    return $data;
}

}