<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5 0005
 * Time: 上午 10:38
 */

namespace app\admin\controller\categorys;

use app\common\controller\Backend;
use app\common\model\Category as CategoryModel;
use fast\Tree;
/**
 * 分类管理
 *
 * @icon fa fa-list
 * @remark 用于统一管理网站的所有分类,分类可进行无限级分类
 */
class ShicaiCategory extends Backend
{
    public function index(){

        return $this->fetch();
    }
}