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
use think\Log;

class Food extends Base{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }
    public function food(){
        $foodId = input('food_id/d',0);
        $page = input('page/d',1);
        $pageSize = 10;
        if ($foodId > 0){
            $food = Db::name('food')
                ->where('food_id ='.$foodId)
                ->page($page,$pageSize)
                ->find();
//            var_dump($list);
            $food['descrpition'] = json_decode($food['descrpition']);
            $food['images'] = ltrim($food['images'],"'[");
            $food['images'] = rtrim($food['images'],"]'");
            $food['images'] = str_replace('\/','/',$food['images']);
            $food['images'] = explode(',',$food['images']);
            $food['main_material'] = json_decode($food['main_material']);
            $food['assist_material'] = json_decode($food['assist_material']);
            $food['mix_material'] = json_decode($food['mix_material']);
            $food['other_tags'] = json_decode($food['other_tags']);
            $food['cooking_process'] = json_decode($food['cooking_process']);
            $food['tips'] = json_decode($food['tips']);

//            $food['main_material'] = json_decode($food['main_material']);
        }else{
            Log::error('菜谱里面什么都没有');
        }
        foreach ($food['images'] as $key => &$value){
            $value = str_replace('"','',$value);
        }
//        var_dump($food);
        $category = Db::name('food_category')->alias('a')
            ->join('food_category_relation b','a.food_category_id = b.food_category_id')
            ->where('b.food_id ='.$food['food_id'].' and a.type = 1')
            ->select();
//        var_dump($category);
        $this->assign('page',$page);
        $this->assign('food',$food);
        $this->assign('category',$category);
        return $this->fetch();

    }


}