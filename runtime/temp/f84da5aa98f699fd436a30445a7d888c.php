<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"D:\PHPTutorial\WWW\boke\Public/../application/home\view\member\member.html";i:1525676529;s:61:"D:\PHPTutorial\WWW\boke\Application\home\view\public\nav.html";i:1525844510;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>个人中心</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta name="renderer" content="webkit">
    <meta name="baidu-site-verification" content="R9XA5lWxu2" />
    <meta name="author" content="虎嗅网">
    <meta name="keywords" content="科技资讯,商业评论,明星公司,动态,宏观,趋势,创业,精选,有料,干货,有用,细节,内幕">
    <meta name="description" content="聚合优质的创新信息与人群，捕获精选|深度|犀利的商业科技资讯。在虎嗅，不错过互联网的每个重要时刻。">
    <link rel="stylesheet" type="text/css" href="/static/home/member/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/home/member/css/build.css">
    <link href="/static/home/member/css/login.css" rel="stylesheet" type="text/css"/>
    <link href="/static/home/member/css/zzsc.css" rel="stylesheet" type="text/css"/>
    <link href="/static/home/member/css/dlzc.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/static/admin/css/page.css" />

    <script language="javascript" type="text/javascript" src="/static/home/member/js/jquery-1.11.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="/static/home/member/js/main.js"></script>
    <!--<script language="javascript" type="text/javascript" src="/static/home/member/js/popwin.js"></script>-->
    <link rel="stylesheet" href="/static/home/assets/css/amazeui.min.css">
    <link rel="stylesheet" href="/static/home/assets/css/app.css">
    <script src="/static/home/assets/js/jquery.min.js"></script>
    <!--<![endif]-->
    <!--[if lte IE 8 ]>
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="/static/home/assets/js/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->
    <script src="/static/home/assets/js/amazeui.min.js"></script>

</head>

<body style="background-color:#f0f4fb;">

<nav class="am-g am-g-fixed blog-fixed blog-nav">
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="blog-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            <li class="am-active"><a href="<?php echo url('Index/index'); ?>">首页</a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    首页布局 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="<?php echo url('Index/standard'); ?>">1. blog-index-standard</a></li>
                    <li><a href="<?php echo url('Index/nosidebar'); ?>">2. blog-index-nosidebar</a></li>
                    <li><a href="<?php echo url('Index/index'); ?>">3. blog-index-layout</a></li>
                    <li><a href="<?php echo url('Index/noslider'); ?>">4. blog-index-noslider</a></li>
                </ul>
            </li>
            <?php if(!empty($column)): foreach($column as $cv): ?>
                <li><a href="<?php echo url('Lst/lst',['id'=>$cv['id']]); ?>"><?php echo $cv['cat_name']; ?></a></li>
            <?php endforeach; endif; ?>
            <li><a href="<?php echo url('Img/img'); ?>">图片库</a></li>
            <li><a href="<?php echo url('Member/member'); ?>">个人中心</a></li>
        </ul>
        <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
            <div class="am-form-group">
                <input type="text" class="am-form-field am-input-sm" placeholder="搜索" id="toSearch">
            </div>
        </form>
    </div>
</nav>
<div class="placeholder-height"></div>
<div class="container per_center_body" id="per_center">
    <div class="user-info-warp">
        <div class="user-head-box">
            <div class="user-face"><img src="/user/<?php echo $data['member_photo']; ?>"></div>
            <div class="user-name"><?php echo $data['username']; ?><a href="#" target="_blank"><i class="i-vip icon-vip" ></i></a></div>
            <div class="user-one">产品老司机</div>
                 <!--<div class="user-one user-auth">虎嗅认证作者<i class="i-icon icon-auth3" title="虎嗅认证作者"></i></div>-->
                 <a href="<?php echo url('Member/edit'); ?>?id=<?php echo $data['id']; ?>" class="btn btn-messages js-login" uid="1373658" >修改信息</a>
                 <a href="<?php echo url('addtag'); ?>" class="btn btn-messages js-login" uid="1373658" name="判官">添加文章</a>
                 <div class="admin-btn-warp"></div>
        	</div>
        	<div class="user-info-box">
            <div class="col-lg-5">
                <div class="user-info"><i class="icon icon-user-point"></i>公司：保密</div>
                <div class="user-info"><i class="icon icon-user-point"></i>职业：保密</div>
                <div class="user-info"><i class="icon icon-user-point"></i>邮箱：<?php echo $data['email']; ?></div>
            </div>
            <div class="col-lg-7">
                <div class="user-info"><i class="icon icon-user-point"></i>微博：http://weibo.com/alexli2011</div>
                <div class="user-info"><i class="icon icon-user-point"></i>微信：保密</div>
                <div class="user-info"><i class="icon icon-user-point"></i>微信公众号：保密</div>
            </div>
            <div class="btn-box"><a class="js-sea-more-info more-info pull-right">更多<span class="caret"></span></a></div>
            <div class="more-user-info-box">
                <div class="col-lg-5">
                    <div class="more-user-info"><i class="icon icon-user-point"></i>真实姓名：<?php echo $data['name']; ?></div>
                    <div class="more-user-info"><i class="icon icon-user-point"></i>手机：<?php echo $data['mobile']; ?></div>
                </div>
                <div class="col-lg-7">
                    <div class="more-user-info"><i class="icon icon-user-point"></i>性别:<?php echo $data['sex']; ?></div>
                    <div class="more-user-info"><i class="icon icon-user-point"></i>所在地址：<?php echo $data['city']; ?></div>
                </div>
                <div style="clear:both; width:100%;">
                    <div class="more-user-info"><i class="icon icon-user-point"></i>注册时间：<?php echo date('Y-m-d H:i:s',$data['created_at']); ?></div>
                </div>

            </div>
        </div>
    </div>
    <div id="menu" name="menu"></div>
    <div class="user-menu-warp">
        <div class="menu-warp">
            <ul id=myTabs1>
                <li class="active" onMouseDown=Tabs1(this,0);><a href="#menu">我的文章</a></li>
                <li class="" onMouseDown=Tabs1(this,1);><a href="#menu">我的评论</a></li>
                <!--<li class="" onMouseDown=Tabs1(this,2);><a href="#menu">我的收藏</a></li>-->
                <li class="" onMouseDown=Tabs1(this,3);><a href="#menu">我的关注</a></li>
            </ul>
        </div>
		<div class="user-content-warp" id=myTabs1_Content0>
            <?php if(!empty($datas)): ?>
            <div class="message-box" >
                <?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): $k = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                <div class="mod-b mod-art ">
                	<a class="transition" href="<?php echo url('Index/detail'); ?>?id=<?php echo $v['id']; ?>" target="_blank">
                       <div class="mod-thumb"><img class="lazy" src="/article/<?php echo $v['tag_img']; ?>" alt="<?php echo $v['tag_title']; ?>" style="display: inline;"></div>
                    </a>
                    <div class="mob-ctt">
                         <h3><a href="<?php echo url('Index/detail'); ?>?id=<?php echo $v['id']; ?>" class="transition" target="_blank"><?php echo $v['tag_title']; ?></a></h3>
                         <div class="mob-author"><span class="time"><?php echo date('Y-m-d H:i:s',$v['tag_addtime']); ?></span></div>
                         <div class="mob-sub"><?php echo $v['tag_key']; ?></div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                 <div class="page">
                     <div>
                         <?php echo $datas->render(); ?>
                     </div>
                 </div>


            </div>
            <?php else: ?>
            <div class="message-box" >
            <p>您还没有文章</p>
            </div>
            <?php endif; ?>
        </div>
        <div class="user-content-warp" style="display:none" id=myTabs1_Content1>

    		<ul class='nav-box' id=myTabs2>
        		<li class="active" onMouseDown=Tabs2(this,0);><a href="#">评论（<?php echo $count; ?>）</a></li>
    		</ul>
            <?php if(!empty($pldatas)): ?>
            <div class="message-box" id=myTabs2_Content0>
                <?php if(is_array($pldatas) || $pldatas instanceof \think\Collection || $pldatas instanceof \think\Paginator): $k = 0; $__LIST__ = $pldatas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        		<ul>
                    <li type="comment" >
                    	<div class="message-title"><a href="<?php echo url('Index/detail'); ?>?id=<?php echo $v['artid']; ?>" target="_blank"><?php echo $v['dis_content']; ?></a></div>
                    	<div class="message-time"><?php echo date('Y-m-d H:i:s',$v['created_time']); ?><span class="message-article">来自文章：<a href="<?php echo url('Index/detail'); ?>?id=<?php echo $v['artid']; ?>" target="_blank"><?php echo $v['tag_title']; ?></a></span></div>
                    </li>
                </ul>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <nav class="page-nav">
                 	<ul class="pagination">
                     </ul>
                 </nav> 
            </div>
            <?php else: ?>
            <div class="message-box" id=myTabs2_Content0>
                <p>您还没有评论</p>
            </div>
            <?php endif; ?>
        	<!--<div class="message-box" style="display:none" id=myTabs2_Content1>-->
        		<!--<ul>-->
                    <!--<li type="recomment">-->
                    	<!--<blockquote>1社交国内产品真能成大气候，月活过三亿的，我估计最终会有四个，微信、QQ、微博、……。过一亿在垂直领域有大成就的，也会有四个左右［不算过三亿］，陌陌、快手基本上会是，还有二个位置</blockquote>-->
                    	<!--<div class="message-title"><span class="me-dp">TA的点评：</span><a href="#" target="_blank">微博是social media，快手是video community，严格讲不算社交产品</a></div>-->
                    	<!--<div class="message-time">2017-05-29<span class="message-article">来自文章：<a href="/article/197348.html" target="_blank">冷眼看快手、陌陌们的"短视频社交"</a></span></div>-->
                    <!--</li>-->

                <!--</ul>-->
        		<!--<nav class="page-nav">-->

                 <!--</nav> -->
            <!--</div>-->
    	</div>
        <!--<div class="user-content-warp" style="display:none" id=myTabs1_Content2>-->
        	 <!--<div class="collect-box" data-cid="129416"><span class="collect-title">我的默认收藏夹</span></div>-->
		<!--</div>-->
        <div class="user-content-warp" style="display:none" id=myTabs1_Content3>
    		<div class="topic-message-wrap">
                 <div class="no-content-prompt">TA还没有关注</div>
            </div>
		</div>






        <!--文章-->

</div>
<footer class="blog-footer">
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-footer-padding">
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>模板简介</h3>
            <p class="am-text-sm">这是一个使用amazeUI做的简单的前端模板。<br> 博客/ 资讯类 前端模板 <br> 支持响应式，多种布局，包括主页、文章页、媒体页、分类页等<br>嗯嗯嗯，不知道说啥了。外面的世界真精彩<br><br>
                Amaze UI 使用 MIT 许可证发布，用户可以自由使用、复制、修改、合并、出版发行、散布、再授权及贩售 Amaze UI 及其副本。</p>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>社交账号</h3>
            <p>
                <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-github am-icon-fw blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-weibo am-icon-fw blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-reddit am-icon-fw blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-weixin am-icon-fw blog-icon blog-icon"></span></a>
            </p>
            <h3>Credits</h3>
            <p>我们追求卓越，然时间、经验、能力有限。Amaze UI 有很多不足的地方，希望大家包容、不吝赐教，给我们提意见、建议。感谢你们！</p>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h1>我们站在巨人的肩膀上</h1>
            <h3>Heroes</h3>
            <p>
            <ul>
                <li>jQuery</li>
                <li>Zepto.js</li>
                <li>Seajs</li>
                <li>LESS</li>
                <li>...</li>
            </ul>
            </p>
        </div>
    </div>
    <div class="blog-text-center">© 2015 AllMobilize, Inc. Licensed under MIT license. Made with love By LWXYFER</div>
</footer>
<script language="javascript" type="text/javascript" src="/static/home/member/js/jquery-1.11.1.min.js"></script>
<script>


$(document).ready(function() {
     $(".more-user-info-box").fadeOut(0);
     $(".btn-box").click(function() {
          $(".more-user-info-box").not($(this).next()).slideUp('fast');
          $(this).next().slideToggle(400);
     });
});
</script>
<script type="text/javascript" src="/static/home/member/js/mouse.js"></script>
</body>
</html>