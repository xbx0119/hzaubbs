<?php if (!defined('THINK_PATH')) exit();?><!-- 项目开始日期：2016-02-26  -->
<!-- 作者：黄一凡              -->
<!-- 版本：1.0                 -->
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<title>狮山讨论区</title>
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/basic.css">
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/login.css">
	<script src="/hzaubbs/Public/front/js/jquery.min.js"></script>
	</style>
</head>
<body>
	<div id="wrapper">
		<!-- 头部导航栏 -->
		<header id="tophead">
	<h1>狮山讨论区</h1>
	<nav id="top-nav">
		<ul id="top-nav-ul">
			<li><a href="/hzaubbs/index.php/Home/Index/index">大厅</a></li>
			<li><a href="/hzaubbs/index.php/Home/Index/forum">部落</a></li>
			<li><a href="javascript:history.go(-1);">返回</a></li>
			<li class="li-state douser"><a href="<?php echo ($nav["url"]); ?>" class="douser"><?php echo ($nav["state"]); ?> <?php echo ($nav["i"]); ?></a>
				<div id="loged"> 
					<span class="org_bot_cor"></span>
					<span class="emem"></span>
					<ul>
						<li><a href="/hzaubbs/index.php/Home/Person/person">个人中心</a></li>
						<li><a href="">系统通知</a></li>
						<li><a href="/hzaubbs/index.php/Home/Login/do_logout">退出登陆</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</nav>
	<button class="nav-button">
		<span></span>
		<span></span>
		<span></span>
	</button>
	<script>
		$(function(){
			$(".douser").click(function(){
				if("<?php echo ($nav["state"]); ?>"!="登陆"){
					if($("#loged").is(':hidden')){
						$("#loged").show();
					}else{
						$("#loged").hide();
					}
				}
			});
			$(document).not($('.douser')).click(function(){
				if($("#loged").is(':visible')){
					$("#loged").hide();
				}
				// alert("sadsa");
			});
			$('.douser').on("click", function(e) {
			    e.stopPropagation();
			});
			$(".nav-button").click(function(){
				if($("#top-nav").is(":hidden")){
					$(".nav-button").css("background","lightblue");
					$("#top-nav").slideDown("slow");
				}else{
					$("#top-nav").slideUp();
					$(".nav-button").css("background","#eee");
				}
				
			})
		})
	</script>
</header>
		<!-- 中间内容区 -->
		<div id="login">
			<section id="login-form">
				<form action="/hzaubbs/index.php/Home/Login/dologin" method="post">
					<h1>登录</h1>
					<p id="tips"></p><!-- 提示错误信息 -->
					<span><input type="text" name="username" id="username" placeholder="用户名/邮箱" /></span>
					<span><input type="password" name="password" id="password" placeholder="密码" /></span>
					<i><input type="checkbox" name="remember[]" id="remember" value="remember"> 记住账号<a href="">忘记密码？</a></i>
					<!-- <i></i> -->
					<span>
						<a href="javascript:login()">登录</a>
						<a href="/hzaubbs/index.php/Home/Login/register">注册</a>
					</span>
				</form>
			</section>
		</div>
		<div id="introduction" style="display:none;">
			讨论区简介
		</div>
		<!-- 尾部 -->
		<footer id="bottom-footer">
	<h1>&copy;2016 讨论区 <i>designed by</i> <a href="http://www.52feidian.com/" target="_blanket">沸点工作室</a></h1>
</footer>
	</div>
<script>
	function login(){
		$.post('/hzaubbs/index.php/Home/Login/dologin', {
			username:$("#username").val(),
			password:$("#password").val(),
			remember:$("#remember").is(':checked')
		},function(text){
			if(text=="pass"){
				window.location.href="/hzaubbs/index.php/Home/Index/index";
			}else{
				$("#tips").html(text);
			}
		});
	}
</script>
</body>
</html>