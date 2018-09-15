<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"E:\wamp64\www\ms\public/../application/index\view\ucenter\menu_add.html";i:1536858205;s:59:"E:\wamp64\www\ms\application\index\view\common\sidenav.html";i:1536598103;}*/ ?>
<style>
    .profile-avatar-container {
        position:relative;
        width:100px;
    }
    .profile-avatar-container .profile-user-img{
        width:100px;
        height:100px;
    }
    .profile-avatar-container .profile-avatar-text {
        display:none;
    }
    .profile-avatar-container:hover .profile-avatar-text {
        display:block;
        position:absolute;
        height:100px;
        width:100px;
        background:#444;
        opacity: .6;
        color: #fff;
        top:0;
        left:0;
        line-height: 100px;
        text-align: center;
    }
    .profile-avatar-container button{
        position:absolute;
        top:0;left:0;width:100px;height:100px;opacity: 0;
    }
    .inputfile {
        opacity: 0;
    }
    .inputfile {
        position:absolute;clip:rect(0 0 0 0);
    }
    .inputfile {
        z-index: -11111;  width: 0px;  height: 1px;
    }
</style>
<script src="<?php echo $static; ?>/js/ms/jquery-1.7.js"></script>
<script src="<?php echo $static; ?>/js/ms/jquery.ajaxfileupload.js" type="text/javascript"></script>
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="page-header"><?php echo __('Menu edit'); ?></h2>
                    <form id="profile-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="<?php echo url('index/ucenter/menu_save'); ?>">
                        <?php echo token(); ?>
                        <input type="hidden" name="avatar" id="c-avatar" value="<?php echo $user['avatar']; ?>" />

                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-2"><?php echo __('Menu name'); ?>:</label>
                            <div class="col-xs-12 col-sm-8">
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" data-rule="required;username;remote(<?php echo url('api/validate/check_username_available'); ?>, id=<?php echo $user['id']; ?>)" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-2"><?php echo __('Nickname'); ?>:</label>
                            <div class="col-xs-12 col-sm-4">
                                <input type="file" class="form-control" id="file" name="file" value="<?php echo $user['nickname']; ?>" onchange="changepic(this)" data-rule="required" placeholder="">
                                <img src="" id="show" width="200">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c-bio" class="control-label col-xs-12 col-sm-2"><?php echo __('Intro'); ?>:</label>
                            <div class="col-xs-12 col-sm-8">
                                <input id="c-bio" data-rule="" data-tip="一句话介绍一下你自己" class="form-control" name="bio" type="text" value="<?php echo $user['bio']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c-email" class="control-label col-xs-12 col-sm-2"><?php echo __('Email'); ?>:</label>
                            <div class="col-xs-12 col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="c-email" name="email" value="<?php echo $user['email']; ?>" disabled placeholder="">
                                    <span class="input-group-btn" style="padding:0;border:none;">
                                        <a href="javascript:;" class="btn btn-info btn-change" data-type="email"><?php echo __('Change'); ?></a>
                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c-mobile" class="control-label col-xs-12 col-sm-2"><?php echo __('Mobile'); ?>:</label>
                            <div class="col-xs-12 col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="c-mobile" name="mobile" value="<?php echo $user['mobile']; ?>" disabled placeholder="">
                                    <span class="input-group-btn" style="padding:0;border:none;">
                                        <a href="javascript:;" class="btn btn-info btn-change" data-type="mobile"><?php echo __('Change'); ?></a>
                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="form-group normal-footer">
                            <label class="control-label col-xs-12 col-sm-2"></label>
                            <div class="col-xs-12 col-sm-8">
                                <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('Ok'); ?></button>
                                <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/html" id="emailtpl">
    <form id="email-form" class="form-horizontal form-layer" method="POST" action="<?php echo url('api/user/changeemail'); ?>">
        <div class="form-body">
            <input type="hidden" name="action" value="changeemail" />
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3"><?php echo __('New Email'); ?>:</label>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="" data-rule="required;email;remote(<?php echo url('api/validate/check_email_available'); ?>, event=changeemail, id=<?php echo $user['id']; ?>)" placeholder="<?php echo __('New email'); ?>">
                    <span class="msg-box"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3"><?php echo __('Captcha'); ?>:</label>
                <div class="col-xs-12 col-sm-8">
                    <div class="input-group">
                        <input type="text" name="captcha" id="email-captcha" class="form-control" data-rule="required;length(4);integer[+];remote(<?php echo url('api/validate/check_ems_correct'); ?>, event=changeemail, email:#email)" />
                        <span class="input-group-btn" style="padding:0;border:none;">
                            <a href="javascript:;" class="btn btn-info btn-captcha" data-url="<?php echo url('api/ems/send'); ?>" data-type="email" data-event="changeemail">获取验证码</a>
                        </span>
                    </div>
                    <span class="msg-box"></span>
                </div>
            </div>
        </div>
        <div class="form-footer">
            <div class="form-group" style="margin-bottom:0;">
                <label class="control-label col-xs-12 col-sm-3"></label>
                <div class="col-xs-12 col-sm-8">
                    <button type="submit" class="btn btn-md btn-info"><?php echo __('Submit'); ?></button>
                </div>
            </div>
        </div>
    </form>
</script>
<script type="text/html" id="mobiletpl">
    <form id="mobile-form" class="form-horizontal form-layer" method="POST" action="<?php echo url('api/user/changemobile'); ?>">
        <div class="form-body">
            <input type="hidden" name="action" value="changemobile" />
            <div class="form-group">
                <label for="c-mobile" class="control-label col-xs-12 col-sm-3"><?php echo __('New mobile'); ?>:</label>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" class="form-control" id="mobile" name="mobile" value="" data-rule="required;mobile;remote(<?php echo url('api/validate/check_mobile_available'); ?>, event=changemobile, id=<?php echo $user['id']; ?>)" placeholder="<?php echo __('New mobile'); ?>">
                    <span class="msg-box"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="mobile-captcha" class="control-label col-xs-12 col-sm-3"><?php echo __('Captcha'); ?>:</label>
                <div class="col-xs-12 col-sm-8">
                    <div class="input-group">
                        <input type="text" name="captcha" id="mobile-captcha" class="form-control" data-rule="required;length(4);integer[+];remote(<?php echo url('api/validate/check_sms_correct'); ?>, event=changemobile, mobile:#mobile)" />
                        <span class="input-group-btn" style="padding:0;border:none;">
                            <a href="javascript:;" class="btn btn-info btn-captcha" data-url="<?php echo url('api/sms/send'); ?>" data-type="mobile" data-event="changemobile">获取验证码</a>
                        </span>
                    </div>
                    <span class="msg-box"></span>
                </div>
            </div>
        </div>
        <div class="form-footer">
            <div class="form-group" style="margin-bottom:0;">
                <label class="control-label col-xs-12 col-sm-3"></label>
                <div class="col-xs-12 col-sm-8">
                    <button type="submit" class="btn btn-md btn-info"><?php echo __('Submit'); ?></button>
                </div>
            </div>
        </div>
    </form>
</script>
<style>
    .form-layer {height:100%;min-height:150px;min-width:300px;}
    .form-body {
        width:100%;
        overflow:auto;
        top:0;
        position:absolute;
        z-index:10;
        bottom:50px;
        padding:15px;
    }
    .form-layer .form-footer {
        height:50px;
        line-height:50px;
        background-color: #ecf0f1;
        width:100%;
        position:absolute;
        z-index:200;
        bottom:0;
        margin:0;
    }
    .form-footer .form-group{
        margin-left:0;
        margin-right:0;
    }
</style>
<script>
    function changepic(obj) {
        //console.log(obj.files[0]);//这里可以获取上传文件的name
        var newsrc=getObjectURL(obj.files[0]);
        document.getElementById('show').src=newsrc;
    }
    //建立一個可存取到該file的url
    function getObjectURL(file) {
        var url = null ;
        // 下面函数执行的效果是一样的，只是需要针对不同的浏览器执行不同的 js 函数而已
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }
</script>