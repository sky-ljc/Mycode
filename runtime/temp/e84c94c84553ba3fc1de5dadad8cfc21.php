<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\PHPTutorial\WWW\boke\Public/../application/home\view\member\edit.html";i:1525488235;}*/ ?>
<!DOCTYPE HTML>
<html>
<!--@include('Admin.Public.head')-->
<link rel="stylesheet" type="text/css" href="/static/home/member/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/home/member/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/home/member/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/home/member/static/h-ui.admin/skin/green/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/home/member/static/h-ui.admin/css/style.css" />
<link href="/static/home/member/css/webuploader.css" rel="stylesheet" type="text/css" />
<link href="/static/home/member/css/style.css" rel="stylesheet" type="text/css" />
<title>个人信息修改</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
<style type="text/css">
    .up_load_img{
        width: 110px;
        height: 110px;
        overflow:hidden;
        float: left;
        position: relative;
    }
    .up_load_img input[type="file"]{
        position: absolute;
        width: 110px;
        height: 110px;
        opacity: 0;
        filter:alpha(opacity=0);
        z-index:2;
    }
</style>
<body>
<article class="page-container">
    <form action="<?php echo url('Member/doedit'); ?>" method="post" enctype="multipart/form-data" class="form form-horizontal" id="form-member-add">
        <input type="hidden" value="<?php echo $data['id']; ?>" name="uid">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $data['username']; ?>" style="width: 300px; " placeholder="" id="username" name="username"><strong></strong>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">头像：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="up_load_img">
                    <input type="file" id="member_photo" name="member_photo">
                    <img src="/user/<?php echo $data['member_photo']; ?>" width="102" height="101" id="photoimg" />
                </div>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="sex" type="radio" id="sex-1" value=1 checked>
                    <label for="sex-1">男</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="sex-2" name="sex" value=0>
                    <label for="sex-2">女</label>
                </div>
                <strong></strong>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" style="width: 300px; " value="<?php echo $data['mobile']; ?>" placeholder="" id="mobile" name="mobile"><strong></strong>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="password" style="width: 300px; " class="input-text" value="" placeholder="" id="pass" name="pass"><strong></strong>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="@" name="email" style="width: 300px; " value="<?php echo $data['email']; ?>" id="email"><strong></strong>
            </div>
        </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">所在省份：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width: 300px; ">
				<select class="select" name="province" id="s1">
                    <option></option>
                </select>
				</span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">所在城市：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width: 300px; ">
				<select class="select" name="city" id="s2">
                    <option></option>
                </select>
				</span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">所在地区：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width: 300px; ">
				<select class="select" name="town" id="s3">
                    <option></option>
                </select>
				</span> </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>
<!--_footer 作为公共模版分离出去-->

<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/home/member/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/static/home/member/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<!--<script type="text/javascript" src="/static/home/member//lib/jquery.validation/1.14.0/jquery.validate.js"></script>-->
<!--<script type="text/javascript" src="/static/home/member//lib/jquery.validation/1.14.0/validate-methods.js"></script>-->
<!--<script type="text/javascript" src="/static/home/member//lib/jquery.validation/1.14.0/messages_zh.js"></script>-->
<script type="text/javascript" src="/static/home/member/js/jquery-migrate-1.4.1.js"></script>
<script type="text/javascript" src="/static/home/member/js/uploadPreview.js"></script>
<script type="text/javascript" src="/static/home/member/js/geo.js"></script>

<script type="text/javascript">

    //初始华
    setup();
    //默认省份
    preselect('<?php echo $data['province']; ?>');
    //var s1 = document.getElementById('s1');
    //获取市
    var s2 = document.getElementById('s2');   //$("#s2");
    //获取县区
    var s3 = document.getElementById('s3'); //$("#s3");
    s2.value = '<?php echo $data['city']; ?>';    //$("#s2").val('广州市');
    s2.onchange();   //$("#s2").change();
    s3.value = '<?php echo $data['town']; ?>'; //$("#s3").val('番禺区');

    $(function(){
        $("#member_photo").uploadPreview({Img: "photoimg", Width: 102,Height: 101});
    });
</script>

<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>