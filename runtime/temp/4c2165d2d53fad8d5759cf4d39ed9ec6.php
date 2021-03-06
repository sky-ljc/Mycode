<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"D:\PHPTutorial\WWW\boke\Public/../application/admin\view\category\index.html";i:1525489276;s:63:"D:\PHPTutorial\WWW\boke\Application\admin\view\public\head.html";i:1524556141;}*/ ?>
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
<link rel="stylesheet" href="/static/admin/css/font.css">
<link rel="stylesheet" href="/static/admin/css/xadmin.css">
<script type="text/javascript" src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
<style>
    label.ok{color: green;}
    label.error{color: red;}
</style>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="" method="post">
            <input class="layui-input" placeholder="开始日" name="start" id="start">
            <input class="layui-input" placeholder="截止日" name="end" id="end">
            <input type="text" name="cat_name"  placeholder="请输入栏目名称" autocomplete="off" class="layui-input">
            <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
    </div>
    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加栏目','<?php echo url('category/add'); ?>')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<?php echo $num; ?> 条</span>
    </xblock>
<?php if(!empty($data)): ?>
    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>序号</th>
            <th>栏目名称</th>
            <th>详细路径</th>
            <th>别名</th>
            <th>描述</th>
            <th>添加时间</th>
            <th >操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $k=>$v): ?>
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $v['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td><?php echo $k+1; ?></td>
                <td><?php echo $v['cat_name']; ?></td>
                <td><?php echo $v['path']; ?></td>
                <td><?php echo $v['cat_alias']; ?></td>
                <td><?php echo $v['remark']; ?></td>
                <td><?php echo $v['created_time']; ?></td>
                <td class="td-manage">
                    <a title="查看"  onclick="x_admin_show('编辑','<?php echo url('Category/update',['id'=>$v['id']]); ?>')" href="javascript:void(0);">
                        <i class="layui-icon">&#xe63c;</i>
                    </a>
                    <a title="删除" onclick="member_del(this,'<?php echo $v['id']; ?>')" href="javascript:;">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

    <div class="page">
        <?php echo $data->render(); ?>
    </div>
<?php else: ?>
    <p style="text-align: center;font-size: 14px;">还没有栏目信息,赶紧去添加吧!</p>
<?php endif; ?>
</div>
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
            elem: '#end' //指定元素
        });
    });

    /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){

            if($(obj).attr('title')=='启用'){

                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

            }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
            }

        });
    }

    /*用户-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            var url = '<?php echo url("oneDel"); ?>';
            var data = {id:id};
            $.post(url,data,function (res) {
                if(res.error){
                      $(obj).parents("tr").remove();
                      layer.msg(res.mess,{icon:1,time:1000});
                }else{
                    layer.msg(res.mess,{icon:2,time:1000});
                }
            },'json')
        });
    }



    function delAll (argument) {
        //var data = tableCheck.getData();
        layer.confirm('确认要删除吗？',function(index){
            var ids = [];
            var obj = $(".layui-form-checked");
            obj.each(function () {
                ids.push($(this).attr('data-id'));
            });
            $.ajax({
                type: 'post',
                url: "<?php echo url('dataDel'); ?>",
                data : {ids :ids},
                success: function(res){
                    if (res.error == 1){
                        layer.msg(res.mess,{icon:1,time:1000},function () {
                            location.reload();
                        });
                    }else if(res.error == 0){
                        layer.msg('删除失败!',{icon:5,time:1000});
                    }else{
                        layer.msg(res.mess,{icon:2,time:1000});
                    }
                },
                error:function(data) {
                    console.log(data.msg);
                }
            });
        });
    }
</script>
</body>

</html>