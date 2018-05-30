<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"D:\PHPTutorial\WWW\boke\Public/../application/admin\view\index\welcome.html";i:1525676529;s:63:"D:\PHPTutorial\WWW\boke\Application\admin\view\public\head.html";i:1524556141;}*/ ?>
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
        <div class="x-body">
            <blockquote class="layui-elem-quote">欢迎使用x-admin 后台模版！v2.0官方交流群： 519492808</blockquote>
            <fieldset class="layui-elem-field">
              <legend>信息统计</legend>
              <div class="layui-field-box">
                <table class="layui-table" lay-even>
                    <thead>
                        <tr>
                            <th>统计</th>
                            <th>文章库</th>
                            <th>用户</th>
                            <th>管理员</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>总数</td>
                            <td><?php echo $num['tag']['total']; ?></td>
                            <td><?php echo $num['user']['total']; ?></td>
                            <td><?php echo $num['admin']['total']; ?></td>
                        </tr>
                        <tr>
                            <td>今日</td>
                            <td><?php echo $num['tag']['today']; ?></td>
                            <td><?php echo $num['user']['today']; ?></td>
                            <td><?php echo $num['admin']['today']; ?></td>
                        </tr>
                        <tr>
                            <td>昨日</td>
                            <td><?php echo $num['tag']['yesterday']; ?></td>
                            <td><?php echo $num['user']['yesterday']; ?></td>
                            <td><?php echo $num['admin']['yesterday']; ?></td>
                        </tr>
                        <tr>
                            <td>本周</td>
                            <td><?php echo $num['tag']['thisweek']; ?></td>
                            <td><?php echo $num['user']['thisweek']; ?></td>
                            <td><?php echo $num['admin']['thisweek']; ?></td>
                        </tr>
                        <tr>
                            <td>本月</td>
                            <td><?php echo $num['tag']['thismonth']; ?></td>
                            <td><?php echo $num['user']['thismonth']; ?></td>
                            <td><?php echo $num['admin']['thismonth']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="layui-table">
                <thead>
                    <tr>
                        <th colspan="2" scope="col">服务器信息</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width="30%">服务器计算机名</th>
                        <td><span id="lbServerName"><?php echo $data['server']['jm']; ?></span></td>
                    </tr>
                    <tr>
                        <td>服务器IP地址</td>
                        <td><?php echo $data['server']['SERVER_NAME']; ?></td>
                    </tr>
                    <tr>
                        <td>服务器域名</td>
                        <td><?php echo $data['server']['SERVER_ADDR']; ?></td>
                    </tr>
                    <tr>
                        <td>服务器端口 </td>
                        <td><?php echo $data['server']['SERVER_PORT']; ?></td>
                    </tr>
                    <tr>
                        <td>服务器IIS版本 </td>
                        <td>Microsoft-IIS/6.0</td>
                    </tr>
                    <tr>
                        <td>本文件所在文件夹 </td>
                        <td><?php echo $data['file']; ?></td>
                    </tr>
                    <tr>
                        <td>服务器操作系统 </td>
                        <td><?php echo $data['os']; ?></td>
                    </tr>
                    <tr>
                        <td>系统所在文件夹 </td>
                        <td><?php echo $data['base']; ?></td>
                    </tr>
                    <tr>
                        <td>服务器脚本超时时间 </td>
                        <td>30000秒</td>
                    </tr>
                    <tr>
                        <td>服务器的语言种类 </td>
                        <td>Chinese (People's Republic of China)</td>
                    </tr>
                    <tr>
                        <td>.NET Framework 版本 </td>
                        <td>2.050727.3655</td>
                    </tr>
                    <tr>
                        <td>服务器当前时间 </td>
                        <td><?php echo date('Y-m-d H:i:s',$data['time']); ?></td>
                    </tr>
                    <tr>
                        <td>服务器IE版本 </td>
                        <td>6.0000</td>
                    </tr>
                    <tr>
                        <td>服务器上次启动到现在已运行 </td>
                        <td>7210分钟</td>
                    </tr>
                    <tr>
                        <td>逻辑驱动器 </td>
                        <td>C:\D:\</td>
                    </tr>
                    <tr>
                        <td>CPU 总数 </td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>CPU 类型 </td>
                        <td>x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
                    </tr>
                    <tr>
                        <td>虚拟内存 </td>
                        <td>52480M</td>
                    </tr>
                    <tr>
                        <td>当前程序占用内存 </td>
                        <td>3.29M</td>
                    </tr>
                    <tr>
                        <td>Asp.net所占内存 </td>
                        <td>51.46M</td>
                    </tr>
                    <tr>
                        <td>当前Session数量 </td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>当前SessionID </td>
                        <td>gznhpwmp34004345jz2q3l45</td>
                    </tr>
                    <tr>
                        <td>当前系统用户名 </td>
                        <td>NETWORK SERVICE</td>
                    </tr>
                </tbody>
            </table>
              </div>
            </fieldset>
            <blockquote class="layui-elem-quote layui-quote-nm">感谢layui,百度Echarts,jquery,本后台系统由X前端框架提供前端技术支持。</blockquote>
            
        </div>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>
</html>