<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\PHPTutorial\WWW\boke\Public/../application/admin\view\book\add.html";i:1525676529;s:63:"D:\PHPTutorial\WWW\boke\Application\admin\view\public\head.html";i:1524556141;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <title>添加文章</title>
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
    <!--富文本编辑器-->
    <script type="text/javascript" src="/static/admin/lib/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/static/admin/lib/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="/static/admin/lib/ueditor/lang/zh-cn/zh-cn.js"></script>
    <!--文件上传-->
    <script type="text/javascript" src="/static/admin/js/jquery-migrate-1.4.1.js"></script>
    <script type="text/javascript" src="/static/admin/js/uploadPreview.js"></script>
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
</head>
  
  <body>
    <div class="x-body">
        <form class="layui-form" method="post" name="fom" id="fom" enctype="multipart/form-data" action="<?php echo url('Book/add'); ?>">
          <div class="layui-form-item">
              <label for="tag_title" class="layui-form-label">
                  <span class="x-red">*</span>标题
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="tag_title" name="tag_title" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
          </div>
            <div class="layui-form-item">
                <label for="tag_writer" class="layui-form-label">
                    <span class="x-red">*</span>作者
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="tag_writer" name="tag_writer" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="tag_column" class="layui-form-label">
                    <span class="x-red">*</span>栏目
                </label>
                <div class="layui-input-inline">
                    <select id="shipping" name="tag_column" class="valid" style="z-index: 1000">
                        <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): if( count($cates)==0 ) : echo "" ;else: foreach($cates as $k=>$v): 
                        $str = str_repeat("&nbsp&nbsp",$v['lev'])
                         ?>
                        <option value="<?php echo $v['id']; ?>" ><?php echo $str; ?><?php echo $v['cat_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>

          <div class="layui-form-item">
              <label for="tag_describe" class="layui-form-label">
                  <span class="x-red">*</span>描述
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="tag_describe" name="tag_describe" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
          </div>

            <div class="layui-form-item">
                <label for="tag_img" class="layui-form-label">
                    <span class="x-red">*</span>图片
                </label>
                <div class="layui-input-inline up_load_img">
                    <input type="file" id="tag_img" name="tag_img">
                    <img src="/article/moren.jpg" width="102" height="101" id="photoimg" />
                </div>
            </div>

            <!--&lt;!&ndash;dom结构部分&ndash;&gt;-->
            <!--<div id="uploader-demo">-->
                <!--&lt;!&ndash;用来存放item&ndash;&gt;-->
                <!--<div id="fileList" class="uploader-list"></div>-->
                <!--<div id="filePicker">选择图片</div>-->
            <!--</div>-->


          <div class="layui-form-item">
              <label for="tag_label" class="layui-form-label">
                  <span class="x-red">*</span>标签
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="tag_label" name="tag_label" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
          </div>

            <div class="layui-form-item">
            <label for="tag_key" class="layui-form-label">
            <span class="x-red">*</span>关键字
            </label>
            <div class="layui-input-inline">
            <input type="text" id="tag_key" name="tag_key" required="" lay-verify="required"
            autocomplete="off" class="layui-input">
            </div>
            </div>

          <!--<div class="layui-form-item layui-form-text">-->
              <!--<label for="desc" class="layui-form-label">-->
                  <!--内容-->
              <!--</label>-->
              <div class="layui-input-block">
                  <textarea  id="tag_content" name="tag_content"  style="z-index:1;"></textarea>
              <!--</div>-->
          </div>
          <div class="layui-form-item">
              <label for="tijiao" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="" id="tijiao" >
                  发布
              </button>
          </div>
      </form>
    </div>
    <script>
        $(function(){
            $("#tag_img").uploadPreview({Img: "photoimg", Width: 102,Height: 101});
        });

            UE.getEditor('tag_content',{initialFrameWidth:1335,initialFrameHeight:342});


        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
        
          //自定义验证规则
          form.verify({
            nikename: function(value){
              if(value.length < 5){
                return '昵称至少得5个字符啊';
              }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,repass: function(value){
                if($('#L_pass').val()!=$('#L_repass').val()){
                    return '两次密码不一致';
                }
            }
          });

          //监听提交

          form.on('submit(add)', function(){
            //发异步，把数据提交给php
             $('#fom').submit();
             return false;
          });

          
        });

//        //用AJAX提交表单
//            $('#tijiao').click(function () {
//                var url = "<?php echo url('Book/add'); ?>";
//                $.ajax({
//                    url:url,
//                    data:$('#fom').serialize(),
//                    type:'post',
//                    success:function (res) {
//                        console.log(res)
//                    }
//                })
//            })


    </script>

  </body>

</html>