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
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/main.css">
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/topic.css">
	<script src="/hzaubbs/Public/front/js/jquery.min.js"></script>
	<script src="/hzaubbs/Public/front/js/indexword.js"></script>
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
		<div id="main">
			<section class="content">
				<header class="content-header">主题</header>
				<?php if(is_array($topic)): $i = 0; $__LIST__ = $topic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topic): $mod = ($i % 2 );++$i;?><!-- start title 分块小主题区域 -->
				<article class="content-topic topic-page">		
					<header class="topic-header">
						<img src="/hzaubbs/Public/upload/head-img/<?php echo ($topic["img"]); ?>" alt="" class="head-img"/>
						<h1><?php echo ($topic["topicname"]); ?></h1>
						<!-- <i class="topic-class"><?php echo ($topic["class"]); ?></i> -->
						<div class="about-title">
							<span>by <?php echo ($topic["author"]); ?>　 at <?php echo ($topic["time"]); ?></span>
						</div>
					</header>
					<section class="real-content">
						<pre><?php echo ($topic["content"]); ?></pre>
					</section>
				</article>
				<!-- end title --><?php endforeach; endif; else: echo "" ;endif; ?>
				<footer class="content-footer"></footer>
			</section>
			<section class="information">
				<h1>每日箴言</h1>
				<article id="indexword">

				</article>
				<script>
					$("#indexword").html(indexword);
				</script>
			</section>
			<section class="talk-area">
				<header class="content-header" style="box-shadow:0px 0px 0px #000;">评论
					<button onclick="writepinlun();" class="write">写评论</button>
					<button onclick="pinglun();" class="submitpinlun" style="display:none;">提交评论</button>
				</header>
				<form action="" class="talkform" style="display:none;">
					<textarea name="talk" id="talk"></textarea>
				</form>
			</section>
			<!-- 回复区 -->
			<section class="response-area">
				<header class="content-header">回复</header>
				<?php $i=1;?>
				<?php if(is_array($response)): $i = 0; $__LIST__ = $response;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$response): $mod = ($i % 2 );++$i;?><article class="response">
					<img src="/hzaubbs/Public/upload/head-img/<?php echo ($response["img"]); ?>" alt="" class="response-img"/>
					<section class="response-content">
						<div class="about-response">
							<span><?php echo ($response["responser"]); ?>　<?php echo ($response["restime"]); ?></span>
							<span style="float:right;margin-right:1%"><?php echo $i;?>楼</span>
						</div>
						<div class="real-response-content">
							<?php echo ($response["rescontent"]); ?>
						</div>
						
					</section>
				</article><?php endforeach; endif; else: echo "" ;endif; ?>
			</section>
		</div>
		<!-- 尾部 -->
		<footer id="bottom-footer">
	<h1>&copy;2016 讨论区 <i>designed by</i> <a href="http://www.52feidian.com/" target="_blanket">沸点工作室</a></h1>
</footer>
	</div>
	<script>
		function writepinlun(){
			$(".write").hide();
			$(".submitpinlun").show();
			$(".content-header").css("box-shadow","0px 0px 1px #aaa");
			$(".talkform").slideDown();

		} 
		function pinglun(){
			$.post('/hzaubbs/index.php/Home/Index/pinglun',{
				talk:$("#talk").val(),
				topicID:<?php echo ($topic["topicid"]); ?>
			},function(result){
				if(result=="当前为游客身份不能评论，请登录"){
					alert(result);
					window.location.href="/hzaubbs/index.php/Home/Login/login";
				}else{
					$("#talk").val('');
					location.reload();
				}
			})
		}
	</script>
</body>
</html>