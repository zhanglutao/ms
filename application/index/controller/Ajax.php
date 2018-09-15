<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Lang;

/**
 * Ajax异步请求接口
 * @internal
 */
class Ajax extends Frontend
{

    protected $noNeedLogin = ['lang'];
    protected $noNeedRight = ['*'];
    protected $layout = '';

    /**
     * 加载语言包
     */
    public function lang()
    {
        header('Content-Type: application/javascript');
        $callback = $this->request->get('callback');
        $controllername = input("controllername");
        $this->loadlang($controllername);
        //强制输出JSON Object
        $result = 'define(' . json_encode(Lang::get(), JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE) . ');';
        return $result;
    }
    
    /**
     * 上传文件
     */
    public function upload()
    {
        return action('api/common/upload');
        if (!empty($food['cooking_process'])){
            echo'
                    <div class="recipeStep">
                        <ul>';
            foreach($food['cooking_process'] as $key => $value)
            {
                echo'
                            <li>
                                <div class="recipeStep_img">
                                    <img src="'.$food['images'][$key].'" alt="'.$food['food_name'].'的做法步骤：'.$key.'">
                                </div>
                                <div class="recipeStep_word">
                                    <div class="recipeStep_num">'.$key.'</div>'.
            $value.
            '</div>
                            </li>';
                            }
            echo'
                        </ul>
                    </div>';
        }
    }

}
