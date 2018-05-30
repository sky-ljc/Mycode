<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\PHPTutorial\WWW\boke\Public/../application/admin\view\login.html";i:1524278097;s:63:"D:\PHPTutorial\WWW\boke\Application\admin\view\public\head.html";i:1524556141;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <title>后台登录-X-admin2.0</title>
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
<style>
    label.ok{color: green;}
    label.error{color: red;}
</style>
</head>
<body class="login-bg">

<div class="login">
    <div class="message">x-admin2.0-管理登录</div>
    <div id="darkbannerwrap"></div>

    <form method="post" class="layui-form" action="">
        <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <input name="captcha" lay-verify="required" placeholder="验证码"  type="text" class="layui-input" style="width: 50%;display: inline-block;"><img src="<?php echo captcha_src(); ?>" alt="captcha" style="margin-left: 10px;" id="code">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    </form>
</div>

<script>
    $(function  () {

        layui.use('form', function(){
            var form = layui.form;

            //监听提交
            form.on('submit(login)', function(data){
//                layer.msg(JSON.stringify(data.field),function(){
//
//                });
                $('form').submit();
                return false;
            });
        });
        $('#code').click(function () {
           $(this).attr('src','/captcha?id='+Math.random());
        })
    })


</script>

</body>
</html>