<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:74:"D:\PHPTutorial\WWW\boke\Public/../application/home\view\index\article.html";i:1525853448;s:62:"D:\PHPTutorial\WWW\boke\Application\home\view\public\head.html";i:1524830915;s:61:"D:\PHPTutorial\WWW\boke\Application\home\view\public\nav.html";i:1526302219;s:68:"D:\PHPTutorial\WWW\boke\Application\home\view\public\friendLink.html";i:1525844400;s:60:"D:\PHPTutorial\WWW\boke\Application\home\view\public\js.html";i:1524830664;}*/ ?>
<!doctype html>
<html>
<head>
  <title>article with sidebar  | Amaze UI Examples</title>
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
    <style>
    </style>
</head>

<body id="blog-article-sidebar">
<!-- header start -->
<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        <img width="200" src="http://s.amazeui.org/media/i/brand/amazeui-b.png" alt="Amaze UI Logo"/>
        <h2 class="am-hide-sm-only">中国首个开源 HTML5 跨屏前端框架</h2>
    </div>
</header>
<!-- header end -->
<hr>

<!-- nav start -->
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
<!-- nav end -->
<hr>
<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed blog-content">
    <div class="am-u-md-8 am-u-sm-12">
      <article class="am-article blog-article-p">
        <div class="am-article-hd">
          <h1 class="am-article-title blog-text-center"><?php echo $article['tag_title']; ?></h1>
          <p class="am-article-meta blog-text-center">
              <span><a href="#" class="blog-color">article &nbsp;</a></span>-
              <span><a href="#">@<?php echo $article['username']; ?> &nbsp;</a></span>-
              <span><a href="#"><?php echo date('Y/m/d',$article['tag_addtime']); ?></a></span>
          </p>
        </div>        
        <div class="am-article-bd">
        <img src="/article/<?php echo $article['tag_img']; ?>" alt="" class="blog-entry-img blog-article-margin">
        <!--<p class="class="am-article-lead"">-->
        <!--引用blockquote：-->
        <!--<blockquote><p>People think focus means saying yes to the thing you’ve got to focus on. But that’s not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I’m actually as proud of the things we haven’t done as the things I have done. Innovation is saying no to 1,000 things.</p> <footer><cite>Steve Jobs</cite> – Apple Worldwide Developers’ Conference, 1997</footer></blockquote>-->
        <h1>文章内容：</h1>
        <p><?php echo $article['tag_content']; ?></p>
        <!--</p>-->
        </div>
      </article>
        
        <div class="am-g blog-article-widget blog-article-margin">
          <div class="am-u-lg-4 am-u-md-5 am-u-sm-7 am-u-sm-centered blog-text-center">
            <span class="am-icon-tags"> &nbsp;</span><a href="#"><?php echo $article['tag_label']; ?></a>
            <hr>
            <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
            <a href=""><span class="am-icon-wechat am-icon-fw blog-icon"></span></a>
            <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
          </div>
        </div>

        <hr>
        <div class="am-g blog-author blog-article-margin">
          <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
            <img src="assets/i/f15.jpg" alt="" class="blog-author-img am-circle">
          </div>
          <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
          <!--<h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color">amazeui</span></h3>-->
            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
          </div>
        </div>
        <hr>
        <hr>
        <form class="am-form am-g" action="<?php echo url('Index/discuss'); ?>" method="post" id="discuss">
            <input type="hidden" name="tag_uid" value="<?php echo $article['tag_uid']; ?>" />
            <input type="hidden" name="artid" value="<?php echo $article['id']; ?>">
            <h3 class="blog-comment">评论</h3>
          <fieldset>
            <!--<div class="am-form-group am-u-sm-4 blog-clear-left">-->
              <!--<input type="text" class="" placeholder="名字">-->
            <!--</div>-->
            <!--<div class="am-form-group am-u-sm-4">-->
              <!--<input type="email" class="" placeholder="邮箱">-->
            <!--</div>-->

            <!--<div class="am-form-group am-u-sm-4 blog-clear-right">-->
              <!--<input type="password" class="" placeholder="网站">-->
            <!--</div>-->
            <div class="am-form-group">
              <textarea class="" rows="5" placeholder="一字千金" name="dis_content"></textarea>
            </div>
            <p><button type="submit" class="am-btn am-btn-default">发表评论</button></p>
          </fieldset>
        </form>
        <hr>
        <!--
            评论楼层
        -->
        <div class="am-g doc-am-g">
            <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">目前评论:<?php echo $disnum; ?></div>
        </div>
        <?php if($disnum!=0): foreach($discuss as $dk=>$dv): ?>
                <div class="am-g" style="margin-top: 30px;">
                    <div class="am-u-sm-6 am-u-md-4 am-u-lg-4">
                        <img src="/user/<?php echo $dv['member_photo']; ?>" alt="" class="am-img-thumbnail am-circle" width="60px"/>
                        <span><?php echo $dk+1; ?>楼</span><span><?php echo $dv['created_time']; ?></span>
                    </div>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12"><?php echo $dv['dis_content']; ?></div>
                    <div class="am-u-sm-11 am-u-md-11 am-u-lg-11 reply" style="cursor: pointer;" reply-id="<?php echo $dv['did']; ?>">
                        <span class="am-icon-twitch am-monospace" style="float: right;margin-left: 10px;" onclick="toreply(this)" id="isreply<?php echo $dv['did']; ?>">回复<span><?php echo $dv['num']; ?></span></span>
                        <?php if(in_array($dv['did'],$praise_id)): ?>
                            <span class="am-icon-thumbs-up am-monospace" style="float: right">已赞<span><?php echo $dv['praise_num']; ?></span></span>
                        <?php else: ?>
                            <span class="am-icon-thumbs-o-up am-monospace" style="float: right" onclick="praise(this)">点赞<span><?php echo $dv['praise_num']; ?></span></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="am-container" style="border-left: 1px solid #808080;margin-left: 10px;">
                <?php if($dv['num']!=0): foreach($dv['reply'] as $rk=>$rv): ?>
                            <div class="am-g">
                                <div class="am-u-sm-3"><?php if($rv['user_id']==$article['tag_uid']): ?><span class="am-icon-user am-monospace">作者:<?php echo $rv['username']; ?></span><?php else: ?><span class="am-monospace">用户:<?php echo $rv['username']; ?></span><?php endif; ?></div>
                                <div class="am-u-sm-9"><?php echo $rv['rcontent']; ?></div>
                            </div>
                            <div class="am-g" style="margin-bottom: 5px;">
                                <div class="am-u-sm-12"><span class="am-monospace">时间:&nbsp;</span><?php echo date('Y-m-d',$rv['created_time']); ?></div>
                            </div>
                        <?php endforeach; endif; ?>
                </div>
            <?php endforeach; endif; ?>



    </div>

    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
            <img src="/static/home/images/tiankong1.gif" alt="about me" class="blog-entry-img" >
            <p>鬼神-超越人智，成神之者</p>
            <p>
                吉格祭祀袍的原所有者，“神官”吉格。鬼泣的善导者。
            </p><p>作为开祖且最强的鬼泣，是他发现了召唤鬼神并用于战斗的方法。自在的驱使着七匹鬼神的他在战场上是敌人恐惧的对象。然而在战斗中失去力量的他却被依附在身上的鬼神拖入了地下。</p>
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
<?php if($a=session("dis_error")): ?>
<script>
    layer.alert('<?php echo $a; ?>');
</script>
<?php endif; ?>
<script>
    $(function(){
        $('#discuss').validate({
            //设置验证规则
            rules:{
                dis_content:{
                    required:true,
                    maxlength: 255
                }
            },
            //设置提示信息
            messages:{
                dis_content:{
                    required:"评论信息不能为空" ,
                    maxlength:"评论信息不能大于255位"
                }
            }
        });
        $('div.am-g').on('click','.newform fieldset button.am-btn-default',function(){
            console.log($(this));
            var id = $(this).parent().attr('data-id');
            $('#isreply'+id+'').attr('onclick','toreply(this)');
            $(this).parents('.newform').remove();
        })
    });
    //回复
    function toreply(obj)
    {
        var replyid = $(obj).parent().attr('reply-id');
        var str = '';
        str = '<form class="am-form am-g newform" onsubmit="return false"><fieldset><div class="am-form-group"><textarea class="newarea" rows="5" placeholder="一字千金" name="dis_content" required></textarea></div><p data-id="'+replyid+'"><button class="am-btn am-btn-default" style="margin-right: 3px;">取消</button><button class="am-btn am-btn-secondary" onclick="toissue(this)">发布</button></p></fieldset></form>';
        $(obj).parents('div.am-g').eq(0).next().append(str);
        $(obj).attr('onclick','');
    }
    function toissue(obj) {
        //console.log($(obj).parent().prev().val());
        var  text = $(obj).parent().prev().children('.newarea').val();
        if(text.trim()==''){
            return false;
        }
        if(text.length>120){
            layer.alert('回复字符超过限制!');
            return false;
        }
//        一级评论的id
        var did = $(obj).parent('p').attr('data-id');
        //文章id
        var aid = '<?php echo $article['id']; ?>';
        //作者的id
        var uid = '<?php echo $article['tag_uid']; ?>';
        $.ajax({
            url : "<?php echo url('Index/twodiscuss'); ?>",
            type : 'post',
            data : {pid:did,aid:aid,rcontent:text,uid:uid},
            success : function (res) {
                if(res.error){
                    var str = '';
                    //评论数目
                    var dchild = $(obj).children('span');
                    var dnum = parseInt(dchild.text())+1;
//                    var str = '<div class="am-u-sm-12 am-u-md-12 am-u-lg-12"><span>用户:&nbsp;&nbsp;'+res.name+'</span><span>内容:&nbsp;&nbsp;'+res.content+'</span></div><div class="am-u-sm-12 am-u-md-12 am-u-lg-12">时间:<span>'+res.addtime+'</span></div>';
                     str += '<div class="am-g">'+
                                '<div class="am-u-sm-3">'+res.indetity+'</div>' +
                                '<div class="am-u-sm-9">'+res.content+'</div>' +
                                '</div>';
                    str += '<div class="am-g" style="margin-bottom: 5px;">'+
                            '<div class="am-u-sm-12"><span class="am-monospace">时间:&nbsp;'+res.addtime+'</span></div>' +
                            '</div>';
                    $(obj).parents('.am-container').eq(0).append(str);
                    $(obj).parents('.newform').remove();
                    dchild.text(dnum);
                    layer.alert(res.mess);
                }else{
                    layer.alert(res.mess);
                }
            }
        })
    }
    //点赞
    function praise(obj){
        var praise = $(obj);
        var did = praise.parent().attr('reply-id');
        var pchild = praise.children('span');
        var pnum = parseInt(pchild.text())+1;
        $.ajax({
            url : "<?php echo url('Index/topraise'); ?>",
            type : 'post',
            data : {discuss_id:did},
            success : function (res) {
                if(res.error){
                    praise.removeClass('am-icon-thumbs-o-up');
                    praise.addClass('am-icon-thumbs-up');
                    praise.attr('onclick','');
                    praise.html('已赞<span>'+pnum+'</span>');
                    layer.msg('点赞成功!');
                }else{
                    layer.alert(res.mess);
                }
            }
        })
    }
    //热词搜索
    $('#toSearch').blur(function () {
        var keyword = $(this).val();
        if(keyword !=''){
           location.href = '<?php echo url("Index/index"); ?>?keyword='+keyword;
        }
    })
</script>
</html>