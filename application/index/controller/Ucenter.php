<?php

namespace app\index\controller;

use app\index\controller\Base;
use think\Db;


/**
 * 会员中心
 */
class Ucenter extends Base
{

    protected $layout = 'default';
    protected $noNeedLogin = ['login', 'register', 'third'];
    protected $noNeedRight = ['*'];

    public function _initialize()
    {
        parent::_initialize();
    }

    public function menu(){
//        var_dump(get_included_files());exit;
        $menu = Db::name('food_list')->paginate(10);
        $this->assign('menu',$menu);
        return $this->view->fetch();
    }

    public function menu_add(){
        $menu = Db::name('food_list')->paginate(10);
        $this->assign('menu',$menu);
        return $this->view->fetch();
    }
}