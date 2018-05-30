<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/*
* param access  Admin|Home  静态资源路径入口
* param url  返回路径
* param info 返回的错误信息
* */
function _msg($url,$info)
{
    $path = config('view_replace_str')['__ADMIN__'];
    $url = url($url);
    //<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
    //<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
    //定义字符串  now doc   here doc
    $str=<<<EOF
        <script type="text/javascript" src="{$path}/js/jquery.min.js"></script>
        <script type="text/javascript" src="{$path}/plug/layer/layer.js"></script>
        <script>
        //提示层
            $(function() {
              layer.msg('{$info}',function(){
                      var index = parent.layer.getFrameIndex(window.name);
                      parent.layer.close(index);
                      location.href = '{$url}';            
              });
            })
        </script>
EOF;
    echo $str;
}
function _alert($url,$info)
{
    $path = config('view_replace_str')['__ADMIN__'];
    $url = url($url);
    $str=<<<EOF
        <script type="text/javascript" src="{$path}/js/jquery.min.js"></script>
        <script type="text/javascript" src="{$path}/plug/layer/layer.js"></script>
        <script>
        //提示层
            $(function() {
              layer.alert('{$info}',function() {
                 var index = parent.layer.getFrameIndex(window.name);
                 parent.layer.close(index);
                location.href = '{$url}';
              });
            })
        </script>
EOF;
    echo $str;
}
function _callBack($info)
{
    $path = config('view_replace_str')['__ADMIN__'];
    $str=<<<EOF
        <script type="text/javascript" src="{$path}/js/jquery.min.js"></script>
        <script type="text/javascript" src="{$path}/plug/layer/layer.js"></script>
        <script>
        //提示层
            $(function() {
              layer.alert('{$info}',function() {
                 var index = parent.layer.getFrameIndex(window.name);
                 parent.layer.close(index);
                 history.back();
              });
            })
        </script>
EOF;
    echo $str;
}
function easyBack()
{
    echo '<script>history.back()</script>';
    die();
}
