<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\PHPTutorial\WWW\boke\Public/../application/admin\view\banner\add.html";i:1525490740;s:63:"D:\PHPTutorial\WWW\boke\Application\admin\view\public\head.html";i:1524556141;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>添加图册</title>
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
    <link rel="stylesheet" href="/static/admin/lib/bs/css/bootstrap.css">
    <link rel="stylesheet" href="/static/webuploader/css/webuploader.css">
    <link rel="stylesheet" href="/static/webuploader/css/style.css">
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<form style="margin: 25px 0 0 50px;" action="" method="post" enctype="multipart/form-data" id="form1">
    <div class="form-group">
        <label for="picname">图片名称</label>
        <input type="text" class="form-control" id="picname" placeholder="图片名称" name="pic_name">
    </div>
    <div class="form-group">
        <input type="checkbox" id="banner" name="is_banner" value="1">
        <label for="banner">是否Banner</label>
    </div>
    <div class="form-group">
        <label for="category">所属分类</label>
        <select name="cate_id" id="category" class="">
            <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): if( count($cates)==0 ) : echo "" ;else: foreach($cates as $k=>$v): 
                    $str = str_repeat("&nbsp&nbsp",$v['lev'])
                 ?>
                <option value="<?php echo $v['id']; ?>" ><?php echo $str; ?><?php echo $v['cat_name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div class="form-group">
        <div id="container">
            <!--头部，相册选择和格式选择-->
            <div id="uploader">
                <div class="queueList">
                    <div id="dndArea" class="placeholder">
                        <div id="filePicker"></div>
                        <p>或将照片拖到这里，单次最多可选300张</p>
                    </div>
                </div>
                <div class="statusBar" style="display:none;">
                    <div class="progress">
                        <span class="text">0%</span>
                        <span class="percentage"></span>
                    </div><div class="info"></div>
                    <div class="btns">
                        <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="pic_remark">描述:</label>
        <textarea class="form-control" rows="3" id="pic_remark" name="pic_remark"></textarea>
    </div>
    <button type="button" class="btn btn-default" onclick="javascript:history.back();">取消</button>
    <button type="submit" class="btn btn-primary">立即添加</button>
</form>
<script>
    var url = "<?php echo url('picupload'); ?>";
    var url2 = "{<?php echo url("","",true,false);?>}";
</script>
<script type="text/javascript" src="/static/webuploader/js/webuploader.js"></script>
<script type="text/javascript" src="/static/webuploader/js/upload.js"></script>
<script type="text/javascript" src="/static/admin/js/jquery.validate.min.js"></script>
</div>
<script>
    $('#form1').validate({
        //设置验证规则
        rules:{
            pic_name: {
                required : true,
                minlength: 2,
                maxlength: 32
            },
            pic_remark:{
                required:true,
                minlength: 3,
                maxlength: 100
            }
        },
        //设置提示信息
        messages:{
            pic_name:{
                required:"图片名称不能为空" ,
                minlength:"名称不能小于2位",
                maxlength:"名称不能大于32位"
            },
            pic_remark:{
                required:"图片描述不能为空" ,
                minlength:"描述不能小于位",
                maxlength:"描述不能大于32位"
            }
        }
//        //配置成功信息
//        success:function(label){
//            label.addClass('ok').html('验证通过');
//            label.removeClass('error');
//        },
//        errorElement:'div',
//        validClass:'ok'
//        errorPlacement:function(error,element){
//            error.appendTo(element.parent());
//        }
    });
</script>

</body>

</html>