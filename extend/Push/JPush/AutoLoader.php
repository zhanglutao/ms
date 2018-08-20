<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16 0016
 * Time: 上午 10:48
 */

XPush_Autoloader::Register();

class XPush_Autoloader {

    public static function Register() {
        spl_autoload_register(array(self, 'loader'));
    }
    private function loader($className) {
        require_once $className . '.php';
    }

}