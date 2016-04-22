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
	<!-- <link rel="stylesheet" href="/hzaubbs/Public/front/css/topic.css"> -->
	<link rel="stylesheet" href="/hzaubbs/Public/front/css/person.css">
	<script src="/hzaubbs/Public/front/js/jquery.min.js"></script>
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
			<section class="main-header">
				<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><img src="/hzaubbs/Public/upload/head-img/<?php echo ($user["img"]); ?>" alt="" class="head-img"/><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="edit-header">
				<h1>博勋 <i>个人中心</i> </h1>
			</div>
			</section>
			<section class="main-side">
				<section class="main-side-second">
					<h1>账号设置</h1>
					<div class="side-content">
						<span><a href="/hzaubbs/index.php/Home/Person/edit">编辑资料</a></span>
						<i>|</i>
						<span><a href="/hzaubbs/index.php/Home/Person/changepwd">修改密码</a></span>
						<!-- <span><a href="">其他其他</a></span>
						<i>|</i>
						<span><a href="">其他其他</a></span> -->
					</div>
				</section>
				<section class="main-side-second">
					<h1>部落信息</h1>
					<div class="side-content">
						<span><a href="/hzaubbs/index.php/Home/Person/myforum">我的部落</a></span>
						<i>|</i>
						<span><a href="/hzaubbs/index.php/Home/Person/createforum">创建部落</a></span>
						<!-- <span><a href="">其他其他</a></span>
						<i>|</i>
						<span><a href="">其他其他</a></span> -->
					</div>
				</section>
				
			</section>
			
			<section class="main-container">
				<nav class="main-container-nav">
					<ul class="main-container-nav-ul">
						<li>最近创建的话题</li>
						<!-- <span></span> -->
						<li>最近的回复 </li>
					</ul>
				</nav>
				<hr class="hrhr">
				<div class="main-container-article">
					<article class="main-container-news show-article">
						<!-- 最近创建的话题 -->
						<?php if(is_array($topic)): $i = 0; $__LIST__ = $topic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topic): $mod = ($i % 2 );++$i;?><div class="main-container-topic">
								<a href="/hzaubbs/index.php/Home/Index/topic?id=<?php echo ($topic["topicid"]); ?>"><h1><?php echo ($topic["topicname"]); ?></h1><i>赞：<?php echo ($topic["zan"]); ?> ｜ 评：<?php echo ($topic["resnum"]); ?>｜<?php echo ($topic["time"]); ?></i></a>
							</div>
							<hr class="hrhr"><?php endforeach; endif; else: echo "" ;endif; ?>	
						<!-- <hr class="hrhr"> -->
					</article>
					<!-- <span></span> -->
					<article class="main-container-news">
						<!-- 最近的回复 -->
						<?php if(is_array($response)): $i = 0; $__LIST__ = $response;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$response): $mod = ($i % 2 );++$i;?><div class="main-container-response">
								<a><h1><?php echo ($response["rescontent"]); ?></h1><i>[<?php echo ($response["responser"]); ?>] <?php echo ($response["restime"]); ?></i></a>
								
							</div>
							<hr class="hrhr"><?php endforeach; endif; else: echo "" ;endif; ?>
					</article>
					<footer class="main-container-article-footer">
						
					</footer>
				</div>
			</section>
		</div>
		<!-- 尾部 -->
		<footer id="bottom-footer">
	<h1>&copy;2016 讨论区 <i>designed by</i> <a href="http://www.52feidian.com/" target="_blanket">沸点工作室</a></h1>
</footer>
	</div>
<script>
	$(".main-container-nav-ul > li").click(function(){
		var index=$(this).index();
		$(".main-container-article > article").eq(index).siblings("article").removeClass("show-article");
		$(".main-container-article > article").eq(index).addClass("show-article");
	})
</script>
</body>
</html>