<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\PHPTutorial\WWW\boke\Public/../application/admin\view\banner\show.html";i:1524557307;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>栏目列表</title>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="/static/admin/js/jquery.js"></script>
    <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
    <link rel="stylesheet" href="/static/admin/lib/bs/css/bootstrap.css">
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="body">
<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="javascript:void(0);" onclick="piclose()">图册列表</a>
        <a>
          <cite>我的图册</cite></a>
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="container">
    <?php $a=0; $__FOR_START_514__=0;$__FOR_END_514__=$offset;for($y=$__FOR_START_514__;$y < $__FOR_END_514__;$y+=1){ ?>
        <div class="row">
            <?php $__FOR_START_16881__=0;$__FOR_END_16881__=4;for($i=$__FOR_START_16881__;$i < $__FOR_END_16881__;$i+=1){ if($a<$total): ?>
                    <div class="col-md-3"><img src="/uploads/<?php echo $img[$a]; ?>" style="width: 260px;height: 180px;" class="img-thumbnail"></div>
                <?php endif; $a++; } ?>
        </div>
    <?php } ?>
</div>
<script>
    function piclose()
    {
        var index = parent.layer.getFrameIndex(window.name);
        parent.layer.close(index);
        location.href='<?php echo url("Banner/index"); ?>';
    }
</script>
</body>

</html>