<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Db;


/**
 * 会员中心
 */
class Ucenter extends Frontend
{

    protected $layout = 'default';
    protected $noNeedLogin = ['login', 'register', 'third'];
    protected $noNeedRight = ['*'];

    public function _initialize()
    {
        parent::_initialize();
    }

    public function menu(){
        $menu = Db::name('food_list')->paginate(10);
        $this->assign('menu',$menu);
        return $this->view->fetch();
    }
}