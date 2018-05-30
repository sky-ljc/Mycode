<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:81:"D:\PHPTutorial\WWW\boke\Public/../application/home\view\index\index-noslider.html";i:1526362941;s:62:"D:\PHPTutorial\WWW\boke\Application\home\view\public\head.html";i:1524830915;s:61:"D:\PHPTutorial\WWW\boke\Application\home\view\public\nav.html";i:1526302219;s:68:"D:\PHPTutorial\WWW\boke\Application\home\view\public\friendLink.html";i:1525844400;s:60:"D:\PHPTutorial\WWW\boke\Application\home\view\public\js.html";i:1524830664;}*/ ?>
<!doctype html>
<html>
<head>
    <title>BLOG  | Amaze UI Examples</title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<link rel="icon" type="image/png" href="/static/home/assets/i/favicon.png">
<meta name="mobile-web-app-capable" content="yes">
<link rel="icon" sizes="192x192" href="/static/home/assets/i/app-icon72x72@2x.png">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Amaze UI"/>
<link rel="apple-touch-icon-precomposed" href="/static/home/assets/i/app-icon72x72@2x.png">
<meta name="msapplication-TileImage" content="assets/i/app-icon72x72@2x.png">
<meta name="msapplication-TileColor" content="#0e90d2">
<link rel="stylesheet" href="/static/home/assets/css/amazeui.min.css">
<link rel="stylesheet" href="/static/home/assets/css/app.css">
<style>
    label.error{color: red;font-size: 12px;}
</style>
</head>
<body id="blog">
<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        <img width="200" src="http://s.amazeui.org/media/i/brand/amazeui-b.png" alt="Amaze UI Logo"/>
        <h2 class="am-hide-sm-only">中国首个开源 HTML5 跨屏前端框架</h2>
    </div>
</header>
<hr>
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
                    <!--<li><a href="<?php echo url('Index/standard'); ?>">1. blog-index-standard</a></li>-->
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
<hr>

<!-- banner start -->
<!-- banner end -->

<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-md-8 am-u-sm-12" id="isarticle">

    </div>

    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
            <img src="/static/../article/moren.jpg" alt="about me" class="blog-entry-img" >
            <p>感谢浏览我的个人博客</p>
            <p>
                大家可以积极发布自己的文章
            </p><p>我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？</p>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>Contact ME</span></h2>
            <p>
                <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                <a href=""><span class="am-icon-github am-icon-fw blog-icon"></span></a>
                <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                <a href=""><span class="am-icon-reddit am-icon-fw blog-icon"></span></a>
                <a href=""><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
            </p>
        </div>
        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
    <h2 class="blog-title"><span>友情链接</span></h2>
    <div class="am-u-sm-12 blog-clear-padding">
        <?php if(!empty($links)): foreach($links as $lk=>$lv): ?>
        <a href="http://<?php echo $lv['link_url']; ?>" class="blog-tag" target="_blank"><?php echo $lv['link_name']; ?></a>
        <?php endforeach; endif; ?>
    </div>
</div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>热点文章</span></h2>
            <ul class="am-list">
                <?php if(!empty($hotArticle)): foreach($hotArticle as $hk=>$hv): ?>
                <li><a href="<?php echo url('Index/detail',['id'=>$hv['id']]); ?>"><?php echo $hv['tag_describe']; ?></a></li>
                <?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
</div>
<!-- content end -->


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

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/static/home/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/static/home/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="/static/home/assets/js/amazeui.min.js"></script>
<!-- <script src="assets/js/app.js"></script> -->
<script type="text/javascript" src="/static/admin/plug/layer/layer.js"></script>
<script type="text/javascript" src="/static/admin/js/jquery.validate.min.js"></script>
</body>
<script>
    $(function () {
        //文章
        $.ajax({
            url : "<?php echo url('Index/article'); ?>",
            type : 'post',
            dataType : 'json',
            success :function (res) {
                if(res.code==2000){
                    var article = '';
                    $.each(res.data,function (index,val) {
                        var url = '<?php echo url("Index/detail"); ?>?id='+val.id;
                        article+='<article class="am-g blog-entry-article newarticle"><div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img"><img src="/article/'+val.tag_img+'" alt="'+val.tag_key+'" class="am-u-sm-12"></div>';
                        article+='<div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text"><span><a href="'+url+'" class="blog-color">article&nbsp;</a></span><span>@'+val.username+' &nbsp;</span><span>'+val.tag_addtime+'</span>';
                        article+='<h1><a href="'+url+'">'+val.tag_title+'</a></h1>';
                        article+='<p>'+val.tag_content+'</p><p><a href="" class="blog-continue">continue</a></p></div></article>';
                    });
                    $('#isarticle').append(article);
//					分页
                    var curPage = parseInt(res.page);
                    var pagestr = '';
                    pagestr+=' <ul class="am-pagination"><li class="am-pagination-prev" data-page="'+(curPage-1)+'"><a href="#" style="color: grey">&laquo; Prev</a></li><li class="am-pagination-next" data-page="'+(curPage+1)+'"><a href="#">Next &raquo;</a></li></ul>';
                    $('#isarticle').append(pagestr);
                }
            }
        });
        //a链接
        $('#isarticle').on('click','ul.am-pagination li',function () {
            var artpage = $(this).attr('data-page');
            var keyword = $('#toSearch').val();
            if(artpage<1){
                layer.alert('已经是第一页了');
            }else{
                $.ajax({
                    url : "<?php echo url('Index/article'); ?>",
                    type : 'post',
                    data : {page:artpage,keyword:keyword},
                    dataType : 'json',
                    success :function (res) {
                        if(res.code==2000){
                            $('.newarticle').remove();
                            $('.am-pagination').remove();
                            var article = '';
                            $.each(res.data,function (index,val) {
                                var url = '<?php echo url("Index/detail"); ?>?id='+val.id;
                                article+='<article class="am-g blog-entry-article"><div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img"><img src="/article/'+val.tag_img+'" alt="'+val.tag_key+'" class="am-u-sm-12"></div>';
                                article+='<div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text"><span><a href="'+url+'" class="blog-color">article&nbsp;</a></span><span>@'+val.username+' &nbsp;</span><span>'+val.tag_addtime+'</span>';
                                article+='<h1><a href="'+url+'">'+val.tag_title+'</a></h1>';
                                article+='<p>'+val.tag_content+'</p><p><a href="" class="blog-continue">continue</a></p></div></article>';
                            });
                            $('#isarticle').append(article);
//					分页
                            var curPage = parseInt(res.page);
                            var pageNum = parseInt(res.pageNum);
                            var pagestr = '';
                            var colorpage = '';
                            if(curPage==1){
                                colorpage = 'style="color: grey;"';
                            }
                            pagestr+=' <ul class="am-pagination"><li class="am-pagination-prev" data-page="'+(curPage-1)+'"><a href="#"'+colorpage+'>&laquo; Prev</a></li>';
                            if(curPage<pageNum){
                                pagestr+='<li class="am-pagination-next" data-page="'+(curPage+1)+'"><a href="#">Next &raquo;</a></li>';
                            }
                            pagestr+='</ul>';
                            $('#isarticle').append(pagestr);
                        }
                    }
                });
            }
        });

        //热词搜索
        $('#toSearch').blur(function () {
            var keyword = $(this).val();
            if(keyword !=''){
                $.ajax({
                    url : "<?php echo url('Index/article'); ?>",
                    type : 'post',
                    data : {keyword:keyword},
                    dataType : 'json',
                    success :function (res) {
                        if(res.code==2000){
                            $('.newarticle').remove();
                            $('.am-pagination').remove();
                            var article = '';
                            $.each(res.data,function (index,val) {
                                var url = '<?php echo url("Index/detail"); ?>?id='+val.id;
                                article+='<article class="am-g blog-entry-article newarticle"><div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img"><img src="/article/'+val.tag_img+'" alt="'+val.tag_key+'" class="am-u-sm-12"></div>';
                                article+='<div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text"><span><a href="'+url+'" class="blog-color">article&nbsp;</a></span><span>@'+val.username+' &nbsp;</span><span>'+val.tag_addtime+'</span>';
                                article+='<h1><a href="'+url+'">'+val.tag_title+'</a></h1>';
                                article+='<p>'+val.tag_content+'</p><p><a href="" class="blog-continue">continue</a></p></div></article>';
                            });
                            $('#isarticle').append(article);
//					分页
                            var curPage = parseInt(res.page);
                            var pageNum = parseInt(res.pageNum);
                            var pagestr = '';
                            var colorpage = '';
                            if(curPage==1){
                                colorpage = 'style="color: grey;"';
                            }
                            pagestr+=' <ul class="am-pagination"><li class="am-pagination-prev" data-page="'+(curPage-1)+'"><a href="#"'+colorpage+'>&laquo; Prev</a></li>';
                            if(curPage<pageNum){
                                pagestr+='<li class="am-pagination-next" data-page="'+(curPage+1)+'"><a href="#">Next &raquo;</a></li>';
                            }
                            pagestr+='</ul>';
                            $('#isarticle').append(pagestr);
                        }else{
                            layer.alert('未找到相关文章!');
                        }
                    }
                })
            }else{

            }
        })

    });

</script>
</html>
</html>