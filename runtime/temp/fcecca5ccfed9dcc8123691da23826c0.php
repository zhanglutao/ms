<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"E:\wamp64\www\ms\public/../application/index\view\ucenter\menu.html";i:1536598103;s:59:"E:\wamp64\www\ms\application\index\view\common\sidenav.html";i:1536598103;}*/ ?>
<style>
    .basicinfo {
        margin: 15px 0;
    }

    .basicinfo .row > .col-xs-4 {
        padding-right: 0;
    }

    .basicinfo .row > div {
        margin: 5px 0;
    }
    #content-container > div > div.col-md-9 > div > div > h2 > a{
        margin: 0px 0px 0px 5px;
    }

</style>
<div id="content-container" class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="sidenav">
    <ul class="list-group">
        <li class="list-group-heading"><?php echo __('User center'); ?></li>
        <li class="list-group-item <?php echo $config['actionname']=='index'?'active':''; ?>"> <a href="<?php echo url('user/index'); ?>"><i class="fa fa-user-circle fa-fw"></i> <?php echo __('User center'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='menu'?'active':''; ?>"> <a href="<?php echo url('ucenter/menu'); ?>"><i class="fa fa-cutlery fa-fw"></i> <?php echo __('Menu'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='topic'?'active':''; ?>"> <a href="<?php echo url('ucenter/topic'); ?>"><i class="fa fa-sticky-note-o fa-fw"></i> <?php echo __('Topic'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='menus'?'active':''; ?>"> <a href="<?php echo url('ucenter/menus'); ?>"><i class="fa fa-heart fa-fw"></i> <?php echo __('Menus'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='blog'?'active':''; ?>"> <a href="<?php echo url('ucenter/blog'); ?>"><i class="fa fa-pencil fa-fw"></i> <?php echo __('Blog'); ?></a> </li>

        <li class="list-group-item <?php echo $config['actionname']=='profile'?'active':''; ?>"> <a href="<?php echo url('user/profile'); ?>"><i class="fa fa-user-o fa-fw"></i> <?php echo __('Profile'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='changepwd'?'active':''; ?>"> <a href="<?php echo url('user/changepwd'); ?>"><i class="fa fa-key fa-fw"></i> <?php echo __('Change password'); ?></a> </li>
        <li class="list-group-item <?php echo $config['actionname']=='logout'?'active':''; ?>"> <a href="<?php echo url('user/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> <?php echo __('Sign out'); ?></a> </li>
    </ul>
</div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default ">
                <div class="panel-body">
                    <h2 class="page-header">
                        <?php echo __('Menu'); ?>
                        <a href="<?php echo url('ucenter/menu_send_back'); ?>" class="btn btn-success pull-right"><i class="fa fa-minus-circle"></i>
                            <?php echo __('Send back'); ?>
                        </a>

                        <a href="<?php echo url('ucenter/menu_drafts'); ?>" class="btn btn-success pull-right"><i class="fa fa-play-circle-o"></i>
                            <?php echo __('Drafts'); ?>
                        </a>

                        <a href="<?php echo url('ucenter/menu_add'); ?>" class="btn btn-success pull-right"><i class="fa fa-product-hunt"></i>
                            <?php echo __('Pending'); ?>
                        </a>

                        <a href="<?php echo url('ucenter/menu_add'); ?>" class="btn btn-success pull-right"><i class="fa fa-pencil"></i>
                            <?php echo __('Menu Add'); ?>
                        </a>
                    </h2>
                    <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="row user-baseinfo">
                        <div class="col-md-3 col-sm-3 col-xs-2 text-center user-center">
                            <a href="<?php echo url('Food/food',['food_id'=>$vo['food_id']]); ?>" title="<?php echo __('Click to edit'); ?>">
                                <span class="img"><img src="<?php if($vo['images'] != ''): ?><?php echo $vo['images']; ?>?x-oss-process=style/c180<?php else: endif; ?>" alt=""></span>
                            </a>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-10">
                            <!-- Content -->
                            <div class="ui-content">
                                <!-- Heading -->
                                <h2><a href="<?php echo url('Food/food',['food_id'=>$vo['food_id']]); ?>"><?php echo $vo['food_name']; ?></a></h2>
                                <!-- Paragraph -->
                                <p></p><p></p>
                                <p>
                                    <a href="<?php echo url('space/index',['author_id' => $vo['author_id']]); ?>">
                                        <?php echo $vo['author_name']; ?>
                                    </a>
                                </p>
                                <!-- Success -->
                                <p>
                                    <?php echo $vo['tags']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php echo $menu->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>