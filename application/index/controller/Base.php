<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/3
 * Time: 21:13
 */
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/2
 * Time: 23:29
 */

namespace app\index\controller;

use think\Controller;
use think\Db;
class Base extends Controller{
    public $static_domain = 'http://static.meishiheavn.com';

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->assign('static',$this->static_domain);
    }
}