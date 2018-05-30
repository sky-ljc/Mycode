<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\PHPTutorial\WWW\boke\Public/../application/admin\view\user\add.html";i:1525490418;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <title>添加用户</title>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
    <link rel="stylesheet" href="/static/admin/css/xadmin.css">
    <script type="text/javascript" src="/static/admin/js/jquery.js"></script>
    <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .dh{
            height: 40px;
            width: 1200px;
            margin:0 auto;
            background-color: #009688;
        }
        .vip{
            line-height: 40px;
            font-size: 28px;
        }
        .x-body{
            width: 1200px;
            margin:0 auto;
        }
        .layui-anim span{
            display: none;
        }
        .layui-input{
            width: 570%;
        }

    </style>
</head>

<body>
<!--<div class="dh">-->
    <!--<h2 class="vip">添加会员</h2>-->
<!--</div>-->
<div class="x-body">
    <form class="layui-form" method="post" action="<?php echo url('User/add'); ?>" enctype="application/x-www-form-urlencoded" id="form1">
        <!--用户名-->
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>昵称
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="username" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <!--性别-->
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>性别
            </label>
        <div class="layui-input-block">
            <input type="radio" name="sex" value="1" title="男" checked>
            <input type="radio" name="sex" value="0" title="女" >
        </div>
        </div>
        <!--密码-->
        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label">
                <span class="x-red">*</span>密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_pass" name="pass" required="" lay-verify="pass"
                       autocomplete="off" class="layui-input" placeholder="6到16个字符">
            </div>

        </div>
        <!--确认密码-->
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>确认密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_repass" name="pass" required="" lay-verify="repass"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <!--手机号-->
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>手机号
            </label>
            <div class="layui-input-inline">
                <input type="text" id="" name="phone" required="" lay-verify="phone"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <!--地址-->
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>地址
            </label>
            <div class="layui-input-inline">
                <input type="text"  name="address" required=""
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <!--邮箱-->
        <div class="layui-form-item">
            <label for="L_email" class="layui-form-label">
                <span class="x-red">*</span>邮箱
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_email" name="email" required="" lay-verify="email"
                       autocomplete="off" class="layui-input" placeholder="将会成为您唯一的登入名">
            </div>


        </div>


        <!--提交按钮-->
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn layui-btn-primary" onclick="javascript:history.back();">
                取消
            </button>
            <button  class="layui-btn layui-btn-normal" lay-filter="add" lay-submit="">
                添加会员
            </button>
        </div>
    </form>
</div>
<script>
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;

        //自定义验证规则
        form.verify({
            nikename: function (value) {

                    if(value.length < 2){
                        return '昵称至少得2个字符啊';
                        if(value.length >8){
                            return '昵称至多得8个字符啊';
                        }
                    }
                }
            ,pass: [/^(\S){6,12}$/, '密码必须6到12位']
            ,repass: function(value){
                if($('#L_pass').val()!=$('#L_repass').val()){
                    return '两次密码不一致';
                }
            }
        });

        //监听提交
        form.on('submit(add)', function(){
            ('#form1').submit();
        });
    });
</script>

</body>

</html>