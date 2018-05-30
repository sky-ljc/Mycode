<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\PHPTutorial\WWW\boke\Public/../application/admin\view\book\lst.html";i:1525676529;s:63:"D:\PHPTutorial\WWW\boke\Application\admin\view\public\head.html";i:1524556141;}*/ ?>
<!DOCTYPE html>
<html>
  <head>

    <title>文章列表</title>
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
        <form class="layui-form layui-col-md12 x-so" >

          <input type="text" name="username"  placeholder="请输入标题" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url('add'); ?>')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<?php echo $num; ?> 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>标题</th>
            <th>栏目</th>
            <th>标签</th>
            <th>描述</th>
            <th>日期</th>
            <th>状态</th>
            <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id=<?php echo $vo['id']; ?>><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td><?php echo $vo['tag_title']; ?></td>
            <td><?php echo $vo['tag_column']; ?></td>
            <td><?php echo $vo['tag_label']; ?></td>
            <td><?php echo $vo['tag_describe']; ?></td>
            <td><?php echo date("Y-m-d H:i:s",$vo['tag_addtime']); ?></td>
            <td class="td-status">
              <?php if($vo['tag_status']==1): ?>
              <span class="layui-btn layui-btn-normal layui-btn-mini">已发布</span>
            <?php else: ?>
            <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled">已停用</span>
            <?php endif; ?>
            </td>
            <td class="td-manage">
              <?php if($vo['tag_status']==1): ?>
              <a onclick="member_stop(this,'<?php echo $vo['id']; ?>')" href="javascript:;"  title="停用">
                <i class="layui-icon">&#xe601;</i>
              </a>
              <?php else: ?>
              <a onclick="member_stop(this,'<?php echo $vo['id']; ?>')" href="javascript:;"  title="发布">
                <i class="layui-icon">&#xe62f;</i>
              </a>
              <?php endif; ?>
              <a title="查看"  onclick="x_admin_show('编辑','<?php echo url('show'); ?>?id=<?php echo $vo['id']; ?>')" href="javascript:;">
                <i class="layui-icon">&#xe63c;</i>
              </a>
              <a title="编辑"  onclick="x_admin_show('编辑','<?php echo url('show'); ?>?edit=y&id=<?php echo $vo['id']; ?>')" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
              <a title="删除" onclick="member_del(this,'<?php echo $vo['id']; ?>')" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
      <div class="page">
        <div>
          <?php echo $arr->render(); ?>
        </div>
      </div>

    </div>
    <script>

      //查询操作




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
          layer.confirm('确认要改变状态吗？',function(index){
              if($(obj).attr('title')=='停用'){
                  //停用
                  //进行停用操作
                  var url = "<?php echo url('Book/haha2'); ?>";
                  $.ajax({
                      url:url,
                      data:'id='+id,
                      type:'post'
                  });
                  $(obj).attr('title','发布');
                  $(obj).find('i').html('&#xe62f;');

                  $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                  layer.msg('已停用!',{icon: 5,time:1000});
              }else{
                  //启用
                  //进行发布操作
                  var url = "<?php echo url('Book/haha'); ?>";
                  $.ajax({
                      url:url,
                      data:'id='+id,
                      type:'post'
                  });
                  //发异步把用户状态进行更改
                  $(obj).attr('title','停用');
                  $(obj).find('i').html('&#xe601;');

                  $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已发布');
                  layer.msg('已发布!',{icon: 6,time:1000});

              }

              
          });
      }

      /*用户-删除*/
      function member_del(obj,id){
//          alert(id);
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              var url = "<?php echo url('Book/del'); ?>";
              $.ajax({
                  url:url,
                  data:'id='+id,
                  type:'post'
              });
              $(obj).parents("tr").remove();
              layer.msg('已删除!',{icon:1,time:1000});
          });
      }



      function delAll (argument) {

        var data = tableCheck.getData();
        layer.confirm('确认要删除吗？',function(index){
            //捉到所有被选中的，发异步进行删除
//            var a = $('.layui-unselect layui-form-checkbox layui-form-checked').data-id.val();
            var url = "<?php echo url('Book/alldel'); ?>";
            $.ajax({
                url:url,
                data:'id='+data,
                type:'post',
                success:function (res) {
                    if(res.code==1){
                        layer.msg(res.msg, {icon: 3});
                    }else if(res.code==2){
                        layer.msg(res.msg, {icon: 1});
                        $(".layui-form-checked").not('.header').parents('tr').remove();
                    } else {
                        layer.msg(res.msg, {icon: 2});
                    }
                }
            });

        });
      }
    </script>

  </body>

</html>