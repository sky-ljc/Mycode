<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\PHPTutorial\WWW\boke\Public/../application/home\view\Login\login.html";i:1524831310;}*/ ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>LOG-IN | 你好，欢迎登陆</title>

  <!-- Set render engine for 360 browser -->
  <meta name="renderer" content="webkit">

  <!-- No Baidu Siteapp-->
  <meta http-equiv="Cache-Control" content="no-siteapp"/>

  <link rel="icon" type="image/png" href="/static/home/i/favicon.png">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="/static/home/i/app-icon72x72@2x.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="/static/home/i/app-icon72x72@2x.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="/static/home/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">

  <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
  <!--
  <link rel="canonical" href="http://www.example.com/">
  -->
  <link rel="stylesheet" href="/static/home/css/amazeui.min.css">
  <link rel="stylesheet" href="/static/home/css/app.css">
</head>
<body>
<header>
  <div class="log-re">
    <a href="<?php echo url('Login/lwre'); ?>" class="am-btn am-btn-default am-radius log-button" style="color: white">注册</a>
  </div> 
</header>

<div class="log"> 
  <div class="am-g">
  <div class="am-u-lg-3 am-u-md-6 am-u-sm-8 am-u-sm-centered log-content">
    <h1 class="log-title am-animation-slide-top">你好，欢迎登陆</h1>
    <br>
    <form class="am-form" id="log-form" method="post" action="<?php echo url('Login/login'); ?>" name="fom">
      <div class="am-input-group am-radius am-animation-slide-left">       
        <input type="email" id="doc-vld-email-2-1" class="am-radius" data-validation-message="请输入正确邮箱地址" placeholder="邮箱" required name="email"/>
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-user am-icon-sm am-icon-fw"></i></span>
      </div>      
      <br>
      <div class="am-input-group am-animation-slide-left log-animation-delay">       
        <input type="password" class="am-form-field am-radius log-input" placeholder="密码" minlength="6" required name="pass">
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
      </div>      
      <br>
      <button type="submit" class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius am-animation-slide-bottom log-animation-delay">登 录</button>
            <p class="am-animation-slide-bottom log-animation-delay"><a href="#">忘记密码?</a></p>
      <div class="am-btn-group  am-animation-slide-bottom log-animation-delay-b">
      <p>使用第三方登录</p>
      <a href="#" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-github am-icon-sm"></i> QQ</a>
      <a href="#" class="am-btn am-btn-success am-btn-sm"><i class="am-icon-google-plus-square am-icon-sm"></i> 微信</a>
      <a href="#" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-stack-overflow am-icon-sm"></i> 微博</a>
      </div>
    </form>
  </div>
  </div>
  <footer class="log-footer">   
    © 2014 AllMobilize, Inc. Licensed under MIT license.
  </footer>
</div>



<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/static/home/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/static/home/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="/static/home/js/amazeui.min.js"></script>
<script src="/static/home/js/app.js"></script>
</body>
</html>