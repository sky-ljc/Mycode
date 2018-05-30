<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"D:\PHPTutorial\WWW\boke\Public/../application/admin\view\admin\adminlist.html";i:1524725267;s:63:"D:\PHPTutorial\WWW\boke\Application\admin\view\public\head.html";i:1524556141;}*/ ?>
<!DOCTYPE html>
<html>

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
        <form action="<?php echo url('Admin/adminlist'); ?>" method="post" class="layui-form layui-col-md12 x-so">
          <input class="layui-input" placeholder="开始日" name="start" id="start">
          <input class="layui-input" placeholder="截止日" name="end" id="end">
          <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
          <button class="layui-btn" type="submit" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url('Admin/adminadd'); ?>')"><i class="layui-icon"></i>添加</button>
        <?php if(!empty($data)): ?>
        <span class="x-right" style="line-height:40px">共有数据：<?php echo $num; ?> 条</span>
        <?php else: ?>
        <span class="x-right" style="line-height:40px">共有数据：0 条</span>
        <?php endif; ?>
      </xblock>
      <?php if(!empty($data)): ?>
      <table class="layui-table">
        <thead>

          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>登录名</th>
            <th>邮箱</th>
            <th>角色</th>
            <th>加入时间</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" ids="<?php echo $v['id']; ?>" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td><?php echo $k; ?></td>
            <td><?php echo $v['name']; ?></td>
            <td><?php echo $v['email']; ?></td>
            <td>
              <?php if(!empty($v['role_name'])): if(is_array($v['role_name']) || $v['role_name'] instanceof \think\Collection || $v['role_name'] instanceof \think\Paginator): $k = 0; $__LIST__ = $v['role_name'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($k % 2 );++$k;?>
              <p><?php echo $vv; ?></p>
              <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </td>
            <td><?php echo date('Y-m-d H:i:s',$v['created_time']); ?></td>
            <?php if($v['status']): ?>
            <td class="td-status">
              <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>
            </td>
            <?php else: ?>
            <td class="td-status">
              <span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span>
            </td>
            <?php endif; ?>
            <td class="td-manage">
              <?php if($v['status'] != 1): ?>
              <a onclick="member_stop(this,'<?php echo $v['id']; ?>','<?php echo $v['status']; ?>')" href="javascript:;"  title="启用">
                <i class="layui-icon">&#xe601;</i>
              </a>
              <?php else: ?>
              <a onclick="member_stop(this,'<?php echo $v['id']; ?>','<?php echo $v['status']; ?>')" href="javascript:;"  title="停用">
                <i class="layui-icon">&#xe62f;</i>
              </a>
              <?php endif; ?>
              <a title="编辑"  onclick="x_admin_show('编辑','<?php echo url('Admin/adminedit'); ?>?id=<?php echo $v['id']; ?>')" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
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
        <?php echo $page->render(); ?>
      </div>
      <?php else: ?>
      <p>当前没有数据</p>
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
      function member_stop(obj,id,sta){
          if(sta==1){
              layer.confirm('确认要停用吗？',function(index){
                  $.ajax({
                      type:'get',
                      url:"<?php echo url('Admin/aonoff'); ?>",
                      data: {'rid':id,'act':sta},
                      success:function(res){
                          if(res){
                              if($(obj).attr('title')=='启用'){
                                  //发异步把用户状态进行更
                                  $(obj).attr('title','停用');
                                  $(obj).find('i').html('&#xe62f;');
                                  $(obj).parents("tr").find(".td-status").find('span').attr('class',"layui-btn layui-btn-normal layui-btn-mini").html('已启用');
                                  $(obj).attr('onclick',"member_stop(this,'"+res['id']+"','"+res['stat']+"')");
                                  layer.msg('已启用!',{icon: 5,time:1000});
                              }else{
                                  $(obj).attr('title','启用');
                                  $(obj).find('i').html('&#xe601;');
                                  $(obj).parents("tr").find(".td-status").find('span').attr('class','layui-btn layui-btn-disabled layui-btn-mini').html('已停用');
                                  $(obj).attr('onclick',"member_stop(this,'"+res['id']+"','"+res['sta']+"')");
                                  layer.msg('已停用!',{icon: 5,time:1000});
                              }
                          }else{

                          }
                      }
                  })
              })
          }else{
              layer.confirm('确认要启用吗？',function(index){
                  $.ajax({
                      type:'get',
                      url:"<?php echo url('Admin/aonoff'); ?>",
                      data: {'rid':id,'act':sta},
                      success:function(res){
                          if(res){
                              if($(obj).attr('title')=='启用'){
                                  //发异步把用户状态进行更
                                  $(obj).attr('title','停用');
                                  $(obj).find('i').html('&#xe62f;');
                                  $(obj).parents("tr").find(".td-status").find('span').attr('class',"layui-btn layui-btn-normal layui-btn-mini").html('已启用');
                                  $(obj).attr('onclick',"member_stop(this,'"+res['id']+"','"+res['stat']+"')");
                                  layer.msg('已启用!',{icon: 5,time:1000});

                              }else{
                                  $(obj).attr('title','启用');
                                  $(obj).find('i').html('&#xe601;');
                                  $(obj).parents("tr").find(".td-status").find('span').attr('class','layui-btn layui-btn-disabled layui-btn-mini').html('已停用');
                                  $(obj).attr('onclick',"member_stop(this,'"+res['id']+"','"+res['sta']+"')");
                                  layer.msg('已停用!',{icon: 5,time:1000});
                              }
                          }else{

                          }
                      }
                  })
              })
          }

      }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.ajax({
                  type:'get',
                  url:"<?php echo url('Admin/addel'); ?>",
                  data: {'userid':id},
                  success:function(res){
                      if(res){
                          $(obj).parents("tr").remove();
                          layer.msg('已删除!',{icon:1,time:1000});
                      }else{
                          layer.msg('删除失败!',{icon:1,time:1000});
                      }
                  }
              });
          });
      }




      function delAll() {
          layer.confirm('确认要删除吗？',function(){
              var ids = [];
              $('.layui-form-checked').each(function () {
                  ids.push($(this).attr('ids'));
              });
              $.ajax({
                  type: 'post',
                  url: "<?php echo url('Admin/adalldel'); ?>",
                  data : {'ids' :ids},
                  success: function(res){
                      if (res){
                          layer.msg('已删除!',{icon:1,time:1000},function () {
                              location.reload();
                          });
                      }else{
                          layer.msg('删除失败!',{icon:5,time:1000});
                      }
                  }
              });
          });
      }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>