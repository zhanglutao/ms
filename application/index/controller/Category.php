<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/2
 * Time: 23:29
 */

namespace app\index\controller;

use think\Controller;
use think\Db;
class Category extends controller{
    public function foodCategory(){
        $categoryId = input('category/d',0);
        $page = input('page/d',1);
        $pageSize = 10;
        $list = array();
        if ($categoryId > 0){
            $list = Db::name('food_list')
                ->alias('a')
                ->join('food_category_relation b','a.food_id = b.food_id and a.status = 1')
                ->where('b.food_category_id ='.$categoryId)
                ->page($page,$pageSize)
                ->select();
//            var_dump($list);
        }else{

        }
        var_dump($list);
        $this->assign('foodlist',$list);
        return $this->fetch();

    }

}