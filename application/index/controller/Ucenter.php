<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\index\controller\Base;
use think\Db;
use think\Url;


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
//        var_dump(get_included_files());exit;
        $menu = Db::name('food_list')->paginate(10);
        $this->assign('menu',$menu);
        return $this->view->fetch();
    }

    public function menu_add(){
        $menu = Db::name('food_list')->paginate(10);
        $this->assign('menu',$menu);
        $this->assign('upload_image',Url::build('index/Ucenter/upload_image'));
        return $this->view->fetch();
    }

    public function upload_image(){
        $this->success('请求成功');
    }

    /**
     * 修改会员个人信息
     *
     * @param string $avatar 头像地址
     * @param string $username 用户名
     * @param string $nickname 昵称
     * @param string $bio 个人简介
     */
    public function menu_save()
    {
        $user = $this->auth->getUser();
        $username = $this->request->request('username');
        $nickname = $this->request->request('nickname');
        $bio = $this->request->request('bio');
        $avatar = $this->request->request('avatar');
        $exists = \app\common\model\User::where('username', $username)->where('id', '<>', $this->auth->id)->find();
        if ($exists)
        {
            $this->error(__('Username already exists'));
        }
        $user->username = $username;
        $user->nickname = $nickname;
        $user->bio = $bio;
        $user->avatar = $avatar;
        $user->save();
        $this->success();
    }
}