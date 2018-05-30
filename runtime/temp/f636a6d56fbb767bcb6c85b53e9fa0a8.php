<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\PHPTutorial\WWW\boke\Public/../application/admin\view\user\show.html";i:1525489795;s:63:"D:\PHPTutorial\WWW\boke\Application\admin\view\public\head.html";i:1524556141;}*/ ?>
<!DOCTYPE html>
<html>

<head>
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
    <title>欢迎页面-X-admin2.0</title>
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
            <input type="text" name="username"  placeholder="请输入会员名称" autocomplete="off" class="layui-input">
            <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
    </div>
    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="toadd()"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<?php echo $cont; ?>条</span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>用户名</th>
            <th>性别</th>
            <th>手机</th>
            <th>邮箱</th>
            <th>地址</th>
            <th>加入时间</th>
            <th>状态</th>
            <th>操作</th></tr>
        </thead>
        <tbody>
        <?php foreach($data as $v): ?>
        <tr>
            <td>
                <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $v['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td><?php echo $v['id']; ?></td>
            <td><?php echo $v['username']; ?></td>
            <td><?php echo $v['sex']; ?></td>
            <td><?php echo $v['phone']; ?></td>
            <td><?php echo $v['email']; ?></td>
            <td><?php echo $v['address']; ?></td>
            <td><?php echo $v['created_at']; ?></td>

            <?php switch($v['state']): case "1": ?>
                    <td class="td-status">
                    <span class="layui-btn layui-btn-normal layui-btn-mini" onclick="member_stop(this,'<?php echo $v['id']; ?>','<?php echo $v['state']; ?>')"><?php echo $state[$v['state']]; ?></span>
                    </td>
                    <td class="td-manage">
                        <a onclick="member_stop(this,'<?php echo $v['id']; ?>','<?php echo $v['state']; ?>')" href="javascript:;"  title="禁用">
                            <i class="layui-icon">&#xe62f;</i>
                        </a>
                <?php break; case "0": ?>
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled" onclick="member_stop(this,'<?php echo $v['id']; ?>','<?php echo $v['state']; ?>')"><?php echo $state[$v['state']]; ?></span>
                    </td>
                <td class="td-manage">
                    <a onclick="member_stop(this,'<?php echo $v['id']; ?>','<?php echo $v['state']; ?>')" href="javascript:;"  title="启用">
                        <i class="layui-icon">&#xe601;</i>
                    </a>
                <?php break; endswitch; ?>
            <!--操作-->

                <a title="查看信息"  onclick="x_admin_show('查看信息','<?php echo url('user/edit',['id'=>$v['id']]); ?>',600,400)" href="javascript:;">
                    <i class="layui-icon">&#xe642;</i>
                </a>
                <!--<a onclick="x_admin_show('修改密码','<?php echo url('user/pwd'); ?>',600,400)" title="修改密码" href="javascript:;">-->
                    <!--<i class="layui-icon">&#xe631;</i>-->
                <!--</a>-->
                <a title="删除" onclick="member_del(this,'<?php echo $v['id']; ?>')" href="javascript:;">
                    <i class="layui-icon">&#xe640;</i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="page">
        <?php echo $data->render(); ?>
    </div>

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
    function member_stop(obj,id,sta) {
        if (sta == 1) {
            layer.confirm('确认要停用吗？', function () {
                $.ajax({
                    url:"<?php echo url('User/state'); ?>",
                    type:'get',
                    data:{'id':id,'sta':sta},
                    success:function(res){
                        if(res.error){
                            //发异步把用户状态进行更
                            $(obj).attr('title','启用');
                            $(obj).find('i').html('&#xe601;');
                            $(obj).parents("tr").find(".td-status").find('span').attr('class','layui-btn layui-btn-disabled layui-btn-mini').html('已停用');
                            $(obj).attr('onclick',"member_stop(this,'"+res.id+"','"+res.sta+"')");
                            layer.msg('已停用!',{icon: 5,time:1000});
                        }else{
                            layer.msg('停用失败!',{icon: 5,time:1000});
                        }
                    }
                })
                //发异步把用户状态进行更改
            });
        }else{
            layer.confirm('确认要启用吗？', function () {
                $.ajax({
                    url:"<?php echo url('User/state'); ?>",
                    type:'get',
                    data:{'id':id,'sta':sta},
                    success:function(res){
                        if(res.error){
                            //发异步把用户状态进行更
                            $(obj).attr('title','停用');
                            $(obj).find('i').html('&#xe62f;');
                            $(obj).parents("tr").find(".td-status").find('span').attr('class',"layui-btn layui-btn-normal layui-btn-mini").html('已启用');
                            $(obj).attr('onclick',"member_stop(this,'"+res.id+"','"+res.sta+"')");
                            layer.msg('已启用!',{icon: 1,time:1000});

                        }else{
                            layer.msg('停用失败!',{icon: 5,time:1000});
                        }
                    }
                })
            });

        }
    }

    /*用户-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            $.ajax({
                url:"<?php echo url('User/del'); ?>",
                type:'post',
                data:{'id':id},
                success:function (res) {
                    if(res.mage==1){

                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    }
                }
            });

        });
    }

    function delAll () {

        var data = tableCheck.getData();

        layer.confirm('确认要删除吗？',function(index){
            //捉到所有被选中的，发异步进行删除
            $.ajax({
                url:"<?php echo url('User/delall'); ?>",
                type:'post',
                data:{'data':data},
                success:function (res) {
                    if(res.message==1){
                        layer.msg('删除成功', {icon: 1},function () {
                            location.reload();
                        });
                    }else if(res.message == 0){
                        layer.msg('删除失败!',{icon:5,time:1000});
                    }else{
                        layer.msg('请选择要删除的用户',{icon:2,time:1000});
                    }
                }
            });

        });
    }
    function toadd() {
        location.href='<?php echo url('User/add'); ?>';
    }
</script>

</body>

</html>